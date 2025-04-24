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
            <h1 class="text-lg font-semibold text-gray-800">Pengaturan Bagian Hubungi Kami</h1>
        </div>

        {{-- Form --}}
        <div class="p-6">
            <form method="POST" action="{{ route('admin.hubungi-kami.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                    {{-- Gambar --}}
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700">Gambar Ilustrasi</label>

                        {{-- Preview gambar jika ada --}}
                        @if($section->image)
                            <div class="mt-2 mb-3">
                                <img src="{{ asset('storage/' . $section->image) }}"
                                     alt="Gambar Hubungi Kami"
                                     class="max-h-40 rounded-md object-cover">
                                <p class="text-xs text-gray-500 mt-1">Gambar saat ini</p>
                            </div>
                        @endif

                        <input type="file" name="image" id="image" accept="image/*"
                               class="mt-1 block w-full text-sm border border-gray-300 rounded-md px-3 py-2">
                        <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF. Ukuran maksimal: 5MB <br> Ukuran 900 x 450</p>
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Tombol Simpan --}}
                <div class="flex justify-start p-5">
                    <button type="submit"
                            class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Preview Section --}}
    <div class="mt-6 p-4 bg-white shadow rounded-lg">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Preview</h2>

        <div class="bg-gray-50 p-4 rounded-md border border-gray-200">
            <div class="grid md:grid-cols-2 gap-6">

                {{-- Gambar --}}
                <div class="flex justify-center items-center">
                    @if($section->image)
                        <img src="{{ asset('storage/' . $section->image) }}"
                             alt="Gambar Hubungi Kami"
                             class="max-h-60 rounded-md object-contain">
                    @else
                        <div class="bg-gray-200 rounded-md h-60 w-full flex items-center justify-center">
                            <span class="text-gray-400">Gambar ilustrasi akan ditampilkan di sini</span>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-4 text-center text-xs text-gray-500">
                <p>Catatan: Preview ini hanya simulasi tampilan. Tampilan asli pada halaman publik dapat berbeda.</p>
            </div>
        </div>
    </div>
@endsection