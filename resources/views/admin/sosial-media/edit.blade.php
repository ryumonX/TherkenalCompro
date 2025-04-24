{{-- sosial-media --}}

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
            <h1 class="text-lg font-semibold text-gray-800">Edit Platform Media Sosial</h1>
            <a href="{{ route('admin.sosial-media.index') }}"
               class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded">
                Kembali
            </a>
        </div>

        {{-- Form --}}
        <div class="p-6">
            <form method="POST" action="{{ route('admin.sosial-media.update', $platform->id) }}">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    {{-- Nama Platform --}}
                    <div>
                        <label for="platform" class="block text-sm font-medium text-gray-700">Nama Platform</label>
                        <input type="text" name="platform" id="platform" value="{{ old('platform', $platform->platform) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                               placeholder="contoh: Facebook, Instagram, dll" required>
                        @error('platform')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Link Platform --}}
                    <div>
                        <label for="link_platform" class="block text-sm font-medium text-gray-700">Link Platform</label>
                        <input type="text" name="link_platform" id="link_platform" value="{{ old('link_platform', $platform->link_platform) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                               placeholder="contoh: https://facebook.com/…" required>
                        @error('link_platform')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Slug --}}
                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug', $platform->slug) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                               placeholder="contoh: facebook, instagram (tanpa spasi)" required>
                        <p class="mt-1 text-xs text-gray-500">
                            Digunakan sebagai identifier. Gunakan huruf kecil tanpa spasi dan karakter khusus.
                        </p>
                        @error('slug')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="is_active" id="is_active" value="1"
                               @checked(old('is_active', $platform->is_active))
                               class="rounded border-gray-300">
                        <label for="is_active" class="text-sm text-gray-700">Aktif</label>
                    </div>
                </div>

                {{-- Submit --}}
                <div class="mt-6">
                    <button type="submit"
                            class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                        Perbarui Platform
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Panel Ikon --}}
    <div class="mt-6 bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b">
            <h2 class="text-lg font-semibold text-gray-800">Kelola Ikon</h2>
        </div>

        <div class="p-6">
            <div class="mb-6">
                <h3 class="text-sm font-medium text-gray-700 mb-2">Ikon Saat Ini:</h3>
                <div class="flex flex-wrap gap-4">
                    @if($platform->images->count() > 0)
                        <div class="relative border p-2 rounded-lg">
                            <img src="{{ asset('storage/' . $platform->images->first()->image) }}"
                                 alt="{{ $platform->platform }} icon"
                                 class="h-16 w-16 object-contain">
                            <form method="POST" action="{{ route('admin.sosial-media.icon.destroy', $platform->images->first()) }}"
                                  class="absolute -top-2 -right-2"
                                  onsubmit="return confirm('Yakin ingin menghapus ikon ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white rounded-full p-1 text-xs"
                                        title="Hapus ikon">
                                    &times;
                                </button>
                            </form>
                        </div>
                    @else
                        <p class="text-gray-500">Belum ada ikon untuk platform ini.</p>
                    @endif
                </div>
            </div>

            {{-- Tampilkan form upload hanya jika belum ada ikon --}}
            @if($platform->images->count() == 0)
            <div class="border-t pt-6">
                <h3 class="text-sm font-medium text-gray-700 mb-2">Tambah Ikon:</h3>
                <form method="POST" action="{{ route('admin.sosial-media.icon.store', ['id' => $platform->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="flex items-end gap-4">
                        <div class="flex-1">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Pilih Gambar</label>
                            <input type="file" name="image" id="image" accept="image/*" required
                                   class="mt-1 block w-full text-sm border border-gray-300 rounded-md p-1.5">
                            <p class="mt-1 text-xs text-gray-500">Format: PNG, SVG, JPG. Maks: 5MB</p>
                            @error('image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <button type="submit"
                                    class="mt-5 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                                Upload Ikon
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            @else
            <div class="border-t pt-6">
                <p class="text-sm text-gray-600">
                    Platform sudah memiliki ikon. Hapus ikon saat ini jika ingin menggantinya dengan yang baru.
                </p>
            </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Script untuk otomatis mengisi slug berdasarkan nama platform
    document.addEventListener('DOMContentLoaded', function() {
        const platformInput = document.getElementById('platform');
        const slugInput = document.getElementById('slug');
        const originalSlug = "{{ $platform->slug }}";

        if (platformInput && slugInput) {
            platformInput.addEventListener('input', function() {
                // Hanya update slug jika belum dimodifikasi dari nilai aslinya
                if (slugInput.value === originalSlug) {
                    slugInput.value = slugify(this.value.trim());
                }
            });
        }

        // Fungsi untuk mengubah string menjadi slug
        function slugify(text) {
            return text.toString().toLowerCase()
                .replace(/\s+/g, '-')           // Ganti spasi dengan -
                .replace(/[^\w\-]+/g, '')       // Hapus karakter non-word
                .replace(/\-\-+/g, '-')         // Ganti multiple - dengan single -
                .replace(/^-+/, '')             // Trim - dari awal text
                .replace(/-+$/, '');            // Trim - dari akhir text
        }
    });
</script>
@endpush