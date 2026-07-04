<div class="bg-white rounded-xl p-3 shadow-sm" id="comment-{{ $comment->id }}">
    <div class="flex items-start justify-between">
        <div class="flex-1">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-full bg-gradient-to-r from-pink-400 to-purple-400 flex items-center justify-center text-white font-bold text-xs">
                    {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                </div>
                <div>
                    <p class="font-semibold text-sm text-gray-800">{{ $comment->user->name }}</p>
                    <p class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <p class="mt-2 text-gray-700 text-sm">{{ $comment->comment }}</p>
            <button onclick="showReplyBox({{ $comment->id }})" class="mt-1 text-xs text-pink-500 hover:text-pink-700 font-semibold">Balas</button>

            <!-- Reply Box -->
            <div id="reply-box-{{ $comment->id }}" class="hidden mt-2 ml-6">
                <textarea id="reply-input-{{ $comment->id }}" rows="2" class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-400 resize-none text-sm" placeholder="Tulis balasan..."></textarea>
                <button onclick="addReply({{ $comment->curahan_id }}, {{ $comment->id }})" class="mt-1 px-3 py-1 bg-pink-500 text-white rounded-lg text-xs font-semibold hover:bg-pink-600">Kirim</button>
                <button onclick="hideReplyBox({{ $comment->id }})" class="mt-1 px-3 py-1 text-gray-500 text-xs">Batal</button>
            </div>

            <!-- Replies -->
            @if($comment->replies->count())
            <div class="mt-3 ml-6 space-y-2 border-l-2 border-pink-200 pl-4">
                @foreach($comment->replies as $reply)
                    @include('curahan.partials.comment', ['comment' => $reply])
                @endforeach
            </div>
            @endif
        </div>
        @if($comment->user_id === Auth::id())
        <button onclick="deleteComment({{ $comment->id }})" class="text-red-400 hover:text-red-600 text-sm">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
        @endif
    </div>
</div>

<script>
function showReplyBox(id) {
    document.getElementById('reply-box-' + id).classList.remove('hidden');
    document.getElementById('reply-input-' + id).focus();
}
function hideReplyBox(id) {
    document.getElementById('reply-box-' + id).classList.add('hidden');
}
function addReply(curahanId, parentId) {
    const input = document.getElementById('reply-input-' + parentId);
    const comment = input.value.trim();
    if (!comment) return;

    fetch(`/curahan/${curahanId}/comment`, {
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Content-Type': 'application/json', 'Accept': 'application/json' },
        body: JSON.stringify({ comment, parent_id: parentId })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            input.value = '';
            hideReplyBox(parentId);
            document.getElementById('comments-count-' + curahanId).textContent = data.comments_count;
            // Reload halaman atau tambahkan secara dinamis (sederhana: reload)
            location.reload();
        }
    });
}
function deleteComment(id) {
    if (!confirm('Hapus komentar ini?')) return;
    fetch(`/comment/${id}`, {
        method: 'DELETE',
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' }
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            document.getElementById('comment-' + id).remove();
            // Update count (optional)
        }
    });
}
</script>