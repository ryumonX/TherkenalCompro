@extends('layouts.app')

@section('content')
    {{-- Flash Message --}}
    @if (session('success'))
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-lg">
        {{-- Header --}}
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h1 class="text-lg font-semibold text-gray-800">Edit Item Hero</h1>
            <a href="{{ route('admin.hero.index') }}"
               class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded">
                Kembali
            </a>
        </div>

        {{-- Form --}}
        <div class="p-6">
            <form method="POST" action="{{ route('admin.hero.item.update', $item) }}">
                @csrf
                @method('PUT')

                <div class="grid gap-6">
                    {{-- Judul --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Judul Item</label>
                        <input type="text" name="title" value="{{ old('title', $item->title) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Subjudul --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Subjudul Item</label>
                        <textarea name="subtitle" rows="3"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ old('subtitle', $item->subtitle) }}</textarea>
                        @error('subtitle')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Submit Button --}}
                    <div class="mt-6">
                        <button type="submit"
                                class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection