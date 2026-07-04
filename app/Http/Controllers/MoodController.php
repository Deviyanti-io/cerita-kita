<?php

namespace App\Http\Controllers;

use App\Models\Mood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MoodController extends Controller
{
  public function index()
{
    $user = Auth::user();
    $today = Carbon::today();

    $todayMood = Mood::where('user_id', $user->id)->where('date', $today)->first();

    $moodHistory = Mood::where('user_id', $user->id)
        ->where('date', '>=', Carbon::now()->subDays(30))
        ->orderBy('date', 'desc')
        ->get();

    $totalEntries = Mood::where('user_id', $user->id)->count();
    $averageMood = Mood::where('user_id', $user->id)->avg('mood_level');
    $averageMood = $averageMood ? round($averageMood, 1) : 0;
    $streak = $this->calculateStreak($user->id);
    $bestMonth = $this->getBestMonth($user->id);

    $chartData = Mood::where('user_id', $user->id)
        ->where('date', '>=', Carbon::now()->subDays(7))
        ->orderBy('date', 'asc')
        ->get()
        ->map(function($mood) {
            return [
                'date' => $mood->date->format('d/m'),
                'level' => $mood->mood_level,
                'emoji' => $mood->mood_emoji,
            ];
        });

    return view('mood-tracker', compact(
        'todayMood',
        'moodHistory',
        'totalEntries',
        'averageMood',
        'streak',
        'bestMonth',
        'chartData'
    ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'mood_level' => 'required|integer|min:1|max:5',
            'note' => 'nullable|max:500',
        ]);

        $config = Mood::getMoodConfig($validated['mood_level']);
        $user = Auth::user();
        $today = Carbon::today();

        Mood::updateOrCreate(
            [
                'user_id' => $user->id,
                'date' => $today,
            ],
            [
                'mood_level' => $validated['mood_level'],
                'mood_emoji' => $config['emoji'],
                'mood_label' => $config['label'],
                'note' => $validated['note'] ?? null,
            ]
        );

        return redirect()->route('mood.index')
            ->with('success', 'Mood berhasil disimpan!');
    }

    public function destroy(Mood $mood)
    {
        if ($mood->user_id !== Auth::id()) {
            return redirect()->route('mood.index')->with('error', 'Akses ditolak!');
        }

        $mood->delete();
        return redirect()->route('mood.index')->with('success', 'Mood berhasil dihapus!');
    }

    private function calculateStreak($userId)
    {
        $moods = Mood::where('user_id', $userId)
            ->orderBy('date', 'desc')
            ->get();

        $streak = 0;
        $currentDate = Carbon::today();

        foreach ($moods as $mood) {
            if ($mood->date->eq($currentDate)) {
                $streak++;
                $currentDate = $currentDate->subDay();
            } else {
                break;
            }
        }

        return $streak;
    }

  private function getBestMonth($userId)
{
    // SQLite menggunakan strftime untuk ekstrak tahun & bulan
    $bestMonth = Mood::where('user_id', $userId)
        ->selectRaw('strftime("%Y", date) as year, strftime("%m", date) as month, AVG(mood_level) as avg_mood')
        ->groupBy('year', 'month')
        ->orderBy('avg_mood', 'desc')
        ->first();

    if ($bestMonth) {
        // Pastikan month berupa integer (strftime mengembalikan string)
        return Carbon::create((int)$bestMonth->year, (int)$bestMonth->month, 1)->format('F Y');
    }
    return '-';
}
}