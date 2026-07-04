<?php

namespace App\Http\Controllers;

use App\Models\Curahan;
use App\Models\CurahanLike;
use App\Models\CurahanComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $curahans = Curahan::with(['user', 'likes', 'comments.user', 'comments.replies.user'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('curahan.index', compact('curahans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan form create (bisa langsung redirect ke index dengan form di atas)
        // Karena kita sudah punya form di index, kita bisa redirect ke index
        return redirect()->route('curahan.index')->with('info', 'Silakan tulis curahan di form yang tersedia.');
        
        // Atau jika ingin halaman terpisah, buat view 'curahan.create'
        // return view('curahan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|min:5|max:2000',
        ]);

        Curahan::create([
            'user_id' => Auth::id(),
            'content' => $validated['content'],
            'is_anonymous' => $request->has('is_anonymous'),
        ]);

        return redirect()->route('curahan.index')->with('success', 'Curahan berhasil diposting! ❤️');
    }

    /**
     * Display the specified resource.
     */
    public function show(Curahan $curahan)
    {
        // Tampilkan detail curahan (opsional)
        // Bisa redirect ke index atau tampilkan view detail
        return redirect()->route('curahan.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curahan $curahan)
    {
        if (!$curahan->isOwnedBy(Auth::user())) {
            return redirect()->route('curahan.index')->with('error', 'Kamu tidak punya akses!');
        }
        return view('curahan.edit', compact('curahan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curahan $curahan)
    {
        if (!$curahan->isOwnedBy(Auth::user())) {
            return redirect()->route('curahan.index')->with('error', 'Kamu tidak punya akses!');
        }

        $validated = $request->validate([
            'content' => 'required|min:5|max:2000',
        ]);

        $curahan->update([
            'content' => $validated['content'],
            'is_anonymous' => $request->has('is_anonymous'),
        ]);

        return redirect()->route('curahan.index')->with('success', 'Curahan berhasil diupdate! ✨');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curahan $curahan)
    {
        if (!$curahan->isOwnedBy(Auth::user())) {
            return redirect()->route('curahan.index')->with('error', 'Kamu tidak punya akses!');
        }

        $curahan->delete();
        return redirect()->route('curahan.index')->with('success', 'Curahan berhasil dihapus! 🗑️');
    }

    // ===== FITUR TAMBAHAN =====

    public function toggleLike(Curahan $curahan)
    {
        $user = Auth::user();
        $like = CurahanLike::where('curahan_id', $curahan->id)
            ->where('user_id', $user->id)
            ->first();

        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            CurahanLike::create([
                'curahan_id' => $curahan->id,
                'user_id' => $user->id,
            ]);
            $liked = true;
        }

        return response()->json([
            'liked' => $liked,
            'likes_count' => $curahan->likesCount()
        ]);
    }

    public function addComment(Request $request, Curahan $curahan)
    {
        $validated = $request->validate([
            'comment' => 'required|max:1000',
            'parent_id' => 'nullable|exists:curahan_comments,id',
        ]);

        $comment = CurahanComment::create([
            'curahan_id' => $curahan->id,
            'user_id' => Auth::id(),
            'comment' => $validated['comment'],
            'parent_id' => $request->parent_id ?? null,
        ]);

        $comment->load('user');

        return response()->json([
            'success' => true,
            'comment' => $comment,
            'comments_count' => $curahan->commentsCount()
        ]);
    }

    public function deleteComment(CurahanComment $comment)
    {
        if ($comment->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $curahan = $comment->curahan;
        $comment->delete();

        return response()->json([
            'success' => true,
            'comments_count' => $curahan->commentsCount()
        ]);
    }
}