{{-- sosial-media --}}

@extends('layouts.app')

@section('content')
    <div class="bg-white shadow rounded-lg">
        {{-- Header --}}
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h1 class="text-lg font-semibold text-gray-800">Tambah Platform Media Sosial</h1>
            <a href="{{ route('admin.sosial-media.index') }}"
               class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded">
                Kembali
            </a>
        </div>

        {{-- Form --}}
        <div class="p-6">
            <form method="POST" action="{{ route('admin.sosial-media.store') }}">
                @csrf

                <div class="space-y-6">
                    {{-- Nama Platform --}}
                    <div>
                        <label for="platform" class="block text-sm font-medium text-gray-700">Nama Platform</label>
                        <input type="text" name="platform" id="platform" value="{{ old('platform') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                               placeholder="contoh: Facebook, Instagram, dll" required>
                        @error('platform')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Link Platform --}}
                    <div>
                        <label for="link_platform" class="block text-sm font-medium text-gray-700">Link Platform</label>
                        <input type="text" name="link_platform" id="link_platform" value="{{ old('link_platform') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                               placeholder="contoh: https://facebook.com/…" required>
                        @error('link_platform')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Slug --}}
                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
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
                               @checked(old('is_active', true))
                               class="rounded border-gray-300">
                        <label for="is_active" class="text-sm text-gray-700">Aktif</label>
                    </div>
                </div>

                {{-- Submit --}}
                <div class="mt-6">
                    <button type="submit"
                            class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                        Simpan Platform
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="mt-6 bg-white shadow rounded-lg p-6">
        <h2 class="text-gray-700 font-medium mb-4">Catatan:</h2>
        <ul class="space-y-2 text-sm text-gray-600 list-disc pl-5">
            <li>Setelah membuat platform, Anda dapat menambahkan ikon di halaman daftar platform.</li>
            <li>Slug harus unik dan hanya boleh berisi huruf kecil, angka, dan tanda hubung (-).</li>
            <li>Platform dapat dinonaktifkan jika tidak ingin ditampilkan di frontend.</li>
        </ul>
    </div>
@endsection

@push('scripts')
<script>
    // Script untuk otomatis mengisi slug berdasarkan nama platform
    document.addEventListener('DOMContentLoaded', function() {
        const platformInput = document.getElementById('platform');
        const slugInput = document.getElementById('slug');

        if (platformInput && slugInput) {
            platformInput.addEventListener('input', function() {
                // Hanya update slug jika belum diisi atau belum dimodifikasi
                if (!slugInput.value || slugInput.value === slugify(platformInput.value.trim())) {
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