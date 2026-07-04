<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tulis Curahan Hati') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('curahan.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="content" class="block text-gray-700 font-medium mb-2">Ceritakan perasaanmu</label>
                            <textarea id="content" name="content" rows="6" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-pink-500 focus:ring-pink-500" placeholder="Apa yang ingin kamu bagikan hari ini?" required>{{ old('content') }}</textarea>
                            @error('content')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4 flex items-center">
                            <input type="checkbox" id="is_anonymous" name="is_anonymous" value="1" class="rounded border-gray-300 text-pink-500 focus:ring-pink-500">
                            <label for="is_anonymous" class="ml-2 text-gray-700">Posting sebagai Anonim</label>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-6 rounded-full shadow-lg transition">
                                Simpan
                            </button>
                            <a href="{{ route('curahan.index') }}" class="ml-3 bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-6 rounded-full transition">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>