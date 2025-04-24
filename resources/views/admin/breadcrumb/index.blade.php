@extends('layouts.app')

@section('content')
    {{-- Flash --}}
    @if (session('success'))
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-lg">
        {{-- header + actions --}}
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h1 class="text-lg font-semibold text-gray-800">Pengaturan Breadcrumb</h1>
        </div>

        {{-- form --}}
        <div class="p-6">
            <form method="POST" action="{{ route('admin.breadcrumb.update') }}">
                @csrf
                @method('PUT')

                <div class="mb-5">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Breadcrumb</label>
                    <input type="text" name="title" id="title"
                           class="w-full rounded-md border-gray-300 shadow-sm"
                           value="{{ old('title', $breadcrumb->title) }}"
                           placeholder="Judul Breadcrumb">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5">
                    <label for="subtitle" class="block text-sm font-medium text-gray-700 mb-1">Subjudul Breadcrumb</label>
                    <input type="text" name="subtitle" id="subtitle"
                           class="w-full rounded-md border-gray-300 shadow-sm"
                           value="{{ old('subtitle', $breadcrumb->subtitle) }}"
                           placeholder="Subjudul Breadcrumb">
                    @error('subtitle')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-start mt-5">
                    <button type="submit"
                            class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection