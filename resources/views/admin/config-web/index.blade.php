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
            <h1 class="text-lg font-semibold text-gray-800">Konfigurasi Website</h1>
            <a href="{{ route('dashboard') }}"
               class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded">
                Kembali
            </a>
        </div>

        {{-- Form --}}
        <div class="p-6">
            <form method="POST" action="{{ route('admin.config-web.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Logo --}}
                <div class="mt-3">
                    <label for="logo" class="block text-sm font-medium text-gray-700 mb-1">Logo Website</label>

                    {{-- Preview Logo Jika Ada --}}
                    @if($config->logo)
                        <div class="mb-5">
                            <img src="{{ asset('storage/' . $config->logo) }}" alt="Logo Website" class="h-16 object-contain">
                            <p class="text-xs text-gray-500 mt-1">Logo saat ini</p>
                        </div>
                    @endif

                    <input type="file" name="logo" id="logo"
                           class="w-full border border-gray-300 px-3 py-2 rounded-md text-sm">
                    <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF. Maksimal: 5MB <br> Ukuran: 100 x 100</p>

                    @error('logo')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Favicon --}}
                <div class="mt-3">
                    <label for="favicon" class="block text-sm font-medium text-gray-700 mb-1">Favicon Website</label>

                    {{-- Preview Favicon Jika Ada --}}
                    @if($config->favicon)
                        <div class="mb-5">
                            <img src="{{ asset('storage/' . $config->favicon) }}" alt="Favicon Website" class="h-16 object-contain">
                            <p class="text-xs text-gray-500 mt-1">Favicon saat ini</p>
                        </div>
                    @endif

                    <input type="file" name="favicon" id="favicon"
                           class="w-full border border-gray-300 px-3 py-2 rounded-md text-sm">
                    <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF, ICO, SVG. Ukuran terbaik: 32x32 atau 16x16 pixel. Maksimal: 5MB</p>

                    @error('favicon')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Judul Website --}}
                <div class="mt-5">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Website</label>
                    <input type="text" name="title" id="title"
                           class="w-full rounded-md border-gray-300 shadow-sm"
                           value="{{ old('title', $config->title) }}"
                           placeholder="Masukkan judul website" required>
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Subjudul Website --}}
                <div class="mt-5">
                    <label for="subtitle" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Footer</label>
                    <input type="text" name="subtitle" id="subtitle"
                           class="w-full rounded-md border-gray-300 shadow-sm"
                           value="{{ old('subtitle', $config->subtitle) }}"
                           placeholder="Masukkan subjudul atau tagline website" required>
                    @error('subtitle')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- URL Website --}}
                <div class="mt-5">
                    <label for="website_url" class="block text-sm font-medium text-gray-700 mb-1">URL Website</label>
                    <input type="text" name="website_url" id="website_url"
                           class="w-full rounded-md border-gray-300 shadow-sm"
                           value="{{ old('website_url', $config->website_url) }}"
                           placeholder="Masukkan URL website" required>
                    @error('website_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Copyright --}}
                <div class="mt-5">
                    <label for="copyright" class="block text-sm font-medium text-gray-700 mb-1">Teks Copyright</label>
                    <input type="text" name="copyright" id="copyright"
                           class="w-full rounded-md border-gray-300 shadow-sm"
                           value="{{ old('copyright', $config->copyright) }}"
                           placeholder="Contoh: © 2025 Nama Perusahaan. Seluruh hak cipta dilindungi." required>
                    @error('copyright')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tombol Submit --}}
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