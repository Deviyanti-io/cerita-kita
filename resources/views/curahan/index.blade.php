@extends('layouts.app')

@section('title', 'Curahan Hati')

@section('content')
<div style="max-width: 800px; margin: 0 auto; padding: 0 16px 64px;">

    <!-- ========================================================== -->
    <!-- HEADER -->
    <!-- ========================================================== -->
    <div style="text-align: center; margin-bottom: 32px; margin-top: 10px;">
        <h1 style="font-size: 2.25rem; font-weight: 700; color: #1f2937; display: flex; align-items: center; justify-content: center; gap: 12px;">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#db2777" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
            Curahan Hati
        </h1>
        <p style="color: #6b7280; margin-top: 6px;">Bagikan perasaanmu, kamu tidak sendiri.</p>
    </div>

    <!-- ========================================================== -->
    <!-- FORM TULIS CURAHAN -->
    <!-- ========================================================== -->
    <div style="background: white; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.04); padding: 32px; margin-bottom: 32px; border: 1px solid #e5e7eb;">
        <h2 style="font-size: 1.25rem; font-weight: 700; color: #1f2937; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#db2777" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
            Tulis Curahan Baru
        </h2>
        <form action="{{ route('curahan.store') }}" method="POST">
            @csrf
            <textarea
                name="content"
                placeholder="Apa yang ingin kamu bagikan hari ini?"
                rows="5"
                style="width: 100%; padding: 16px 20px; border: 1px solid #d1d5db; border-radius: 12px; font-size: 1rem; resize: vertical; outline: none; background: white; color: #1f2937;"
                required
            ></textarea>

            <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 12px; margin-top: 16px;">
                <label style="display: flex; align-items: center; gap: 8px; font-size: 0.9rem; color: #4b5563; cursor: pointer;">
                    <input type="checkbox" name="is_anonymous" value="1" style="width: 16px; height: 16px; border-radius: 4px; border-color: #d1d5db; color: #ec4899;">
                    <span>Posting sebagai Anonim</span>
                </label>

                <button type="submit" style="
                    background: linear-gradient(135deg, #ec4899, #a855f7);
                    color: white;
                    padding: 14px 44px;
                    border-radius: 12px;
                    font-weight: 700;
                    font-size: 1rem;
                    border: none;
                    cursor: pointer;
                    display: inline-flex;
                    align-items: center;
                    gap: 10px;
                    box-shadow: 0 4px 14px rgba(236, 72, 153, 0.35);
                    transition: all 0.2s ease;
                "
                onmouseover="this.style.boxShadow='0 6px 24px rgba(236, 72, 153, 0.45)'; this.style.transform='translateY(-2px)';"
                onmouseout="this.style.boxShadow='0 4px 14px rgba(236, 72, 153, 0.35)'; this.style.transform='translateY(0)';"
                >
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                    Kirim Curahan
                </button>
            </div>
        </form>
    </div>

    <!-- GARIS PEMISAH -->
    <hr style="margin: 32px 0; border: none; border-top: 1px solid #e5e7eb;">

    <!-- ========================================================== -->
    <!-- DAFTAR CURAHAN -->
    <!-- ========================================================== -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
        <h2 style="font-size: 1.1rem; font-weight: 700; color: #1f2937; display: flex; align-items: center; gap: 8px;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            Semua Curahan
        </h2>
        <span style="font-size: 0.9rem; color: #9ca3af;">{{ $curahans->total() }} curahan</span>
    </div>

    @forelse($curahans as $curahan)
    <div style="background: white; border-radius: 16px; box-shadow: 0 2px 12px rgba(0,0,0,0.04); padding: 24px; margin-bottom: 20px; border: 1px solid #e5e7eb; transition: all 0.2s;" onmouseover="this.style.boxShadow='0 4px 24px rgba(0,0,0,0.08)';" onmouseout="this.style.boxShadow='0 2px 12px rgba(0,0,0,0.04)';">
        <!-- Header -->
        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
            <div style="display: flex; align-items: center; gap: 12px;">
                <div style="width: 40px; height: 40px; border-radius: 50%; background: linear-gradient(135deg, #f472b6, #a855f7); display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 1rem; flex-shrink: 0;">
                    {{ strtoupper(substr($curahan->display_name, 0, 1)) }}
                </div>
                <div>
                    <p style="font-weight: 600; color: #1f2937; display: flex; align-items: center; gap: 4px;">
                        {{ $curahan->display_name }}
                        @if($curahan->is_anonymous)
                            <span style="color: #9ca3af;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            </span>
                        @endif
                    </p>
                    <p style="font-size: 0.8rem; color: #9ca3af;">{{ $curahan->created_at->diffForHumans() }}</p>
                </div>
            </div>
            @if($curahan->isOwnedBy(Auth::user()))
            <div style="display: flex; gap: 8px;">
                <a href="{{ route('curahan.edit', $curahan) }}" style="color: #3b82f6; text-decoration: none;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                </a>
                <form action="{{ route('curahan.destroy', $curahan) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background: none; border: none; cursor: pointer; color: #f87171; padding: 0;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    </button>
                </form>
            </div>
            @endif
        </div>

        <!-- Content -->
        <div style="margin-top: 12px; color: #374151; white-space: pre-wrap; line-height: 1.7;">
            {{ $curahan->content }}
        </div>

        <!-- Like & Comment -->
        <div style="margin-top: 16px; display: flex; align-items: center; gap: 24px;">
            <button onclick="toggleLike({{ $curahan->id }})" style="display: flex; align-items: center; gap: 6px; background: none; border: none; cursor: pointer; font-size: 0.9rem; color: #6b7280; transition: color 0.2s;" id="like-btn-{{ $curahan->id }}">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="{{ $curahan->isLikedBy(Auth::user()) ? 'currentColor' : 'none' }}" stroke="currentColor" stroke-width="2" style="color: #ec4899;"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                <span id="likes-count-{{ $curahan->id }}">{{ $curahan->likesCount() }}</span>
            </button>
            <button onclick="toggleComments({{ $curahan->id }})" style="display: flex; align-items: center; gap: 6px; background: none; border: none; cursor: pointer; font-size: 0.9rem; color: #6b7280; transition: color 0.2s;">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                <span id="comments-count-{{ $curahan->id }}">{{ $curahan->commentsCount() }}</span>
            </button>
        </div>

        <!-- Komentar -->
        <div id="comment-section-{{ $curahan->id }}" style="display: none; margin-top: 16px;">
            <div style="background: #f9fafb; border-radius: 12px; padding: 16px;">
                <textarea id="comment-input-{{ $curahan->id }}" rows="2" style="width: 100%; padding: 8px 12px; border: 1px solid #e5e7eb; border-radius: 8px; resize: vertical; outline: none; font-size: 0.9rem;" placeholder="Tulis komentar..."></textarea>
                <button onclick="addComment({{ $curahan->id }})" style="margin-top: 8px; padding: 8px 20px; background: #ec4899; color: white; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 6px; font-size: 0.9rem;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                    Kirim
                </button>
            </div>
            <div id="comments-list-{{ $curahan->id }}" style="margin-top: 16px; space-y: 12px;">
                @foreach($curahan->comments as $comment)
                    @include('curahan.partials.comment', ['comment' => $comment])
                @endforeach
            </div>
        </div>
    </div>
    @empty
    <div style="text-align: center; padding: 48px 0; color: #6b7280; background: white; border-radius: 16px; box-shadow: 0 2px 12px rgba(0,0,0,0.04); border: 1px solid #e5e7eb;">
        <svg width="72" height="72" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="1.5" style="margin: 0 auto 16px;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
        <p style="font-size: 1.1rem; font-weight: 500;">Belum ada curahan.</p>
        <p style="font-size: 0.9rem;">Yuk, tulis pertama kali di atas!</p>
    </div>
    @endforelse

    {{ $curahans->links() }}
</div>

<script>
const csrf = '{{ csrf_token() }}';
const userId = {{ Auth::id() }};

function toggleLike(id) {
    fetch(`/curahan/${id}/like`, {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': csrf, 'Accept': 'application/json' }
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById('likes-count-' + id).textContent = data.likes_count;
        const btn = document.getElementById('like-btn-' + id);
        const svg = btn.querySelector('svg');
        if (data.liked) {
            svg.setAttribute('fill', 'currentColor');
        } else {
            svg.setAttribute('fill', 'none');
        }
    });
}

function toggleComments(id) {
    const section = document.getElementById('comment-section-' + id);
    if (section.style.display === 'none' || section.style.display === '') {
        section.style.display = 'block';
        document.getElementById('comment-input-' + id).focus();
    } else {
        section.style.display = 'none';
    }
}

function addComment(id) {
    const input = document.getElementById('comment-input-' + id);
    const comment = input.value.trim();
    if (!comment) return;

    fetch(`/curahan/${id}/comment`, {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': csrf, 'Content-Type': 'application/json', 'Accept': 'application/json' },
        body: JSON.stringify({ comment })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            input.value = '';
            document.getElementById('comments-count-' + id).textContent = data.comments_count;
            const list = document.getElementById('comments-list-' + id);
            const wrapper = document.createElement('div');
            wrapper.innerHTML = `<div style="background: white; border-radius: 12px; padding: 12px 16px; box-shadow: 0 1px 4px rgba(0,0,0,0.04); border: 1px solid #e5e7eb; margin-bottom: 12px;">
                <div style="display: flex; align-items: center; gap: 8px;">
                    <div style="width: 32px; height: 32px; border-radius: 50%; background: linear-gradient(135deg, #f472b6, #a855f7); display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 0.75rem;">${data.comment.user.name.charAt(0).toUpperCase()}</div>
                    <div>
                        <p style="font-weight: 600; font-size: 0.85rem; color: #1f2937;">${data.comment.user.name}</p>
                        <p style="font-size: 0.7rem; color: #9ca3af;">baru saja</p>
                    </div>
                </div>
                <p style="margin-top: 8px; color: #374151; font-size: 0.9rem;">${data.comment.comment}</p>
            </div>`;
            list.prepend(wrapper.firstElementChild);
        }
    });
}
</script>
@endsection