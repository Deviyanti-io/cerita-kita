@extends('layouts.app')

@section('title', 'Edit Curahan')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">✏️ Edit Curahan</h1>
        <form action="{{ route('curahan.update', $curahan) }}" method="POST">
            @csrf
            @method('PUT')
            <textarea name="content" rows="6" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-400 resize-none" required>{{ $curahan->content }}</textarea>
            <div class="flex items-center gap-3 mt-4">
                <label class="flex items-center gap-2 text-sm text-gray-600">
                    <input type="checkbox" name="is_anonymous" value="1" {{ $curahan->is_anonymous ? 'checked' : '' }} class="rounded border-gray-300 text-pink-500 focus:ring-pink-400">
                    Anonim
                </label>
                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-pink-500 to-purple-500 text-white rounded-full font-semibold hover:opacity-90">Update</button>
                <a href="{{ route('curahan.index') }}" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-full font-semibold hover:bg-gray-300">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection