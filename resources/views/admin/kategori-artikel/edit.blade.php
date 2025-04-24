@extends('layouts.app')

@section('content')
    <div class="bg-white shadow rounded-lg max-w-md">
        <div class="px-6 py-4 border-b">
            <h1 class="text-lg font-semibold text-gray-800">Edit Kategori</h1>
        </div>

        <div class="p-6">
            @if (session('success'))
                <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.kategori-artikel.update', $kategori_artikel) }}" method="POST" class="space-y-4">
                @csrf @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                    <input name="title" value="{{ old('title', $kategori_artikel->title) }}"
                           class="mt-1 block w-full border-gray-300 rounded px-3 py-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                    @error('title')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-3">
                    <button class="px-4 py-2 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700">
                        Simpan
                    </button>
                    <a href="{{ route('admin.kategori-artikel.index') }}"
                       class="px-4 py-2 text-sm rounded border border-gray-300 text-gray-700 hover:bg-gray-50">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
