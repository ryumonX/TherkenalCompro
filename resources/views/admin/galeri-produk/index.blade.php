{{-- galeri-produk --}}

@extends('layouts.app')

@section('content')
    {{-- Flash Message --}}
    @if (session('success'))
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-6">
        {{-- Header Galeri --}}
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-4 border-b">
                <h2 class="text-lg font-semibold text-gray-800">Header Galeri Produk</h2>
            </div>
            <div class="p-6">
                <form method="POST" action="{{ route('admin.galeri-produk.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="grid gap-6 mb-6">
                        {{-- Judul --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Judul</label>
                            <input name="title" value="{{ old('title', $hero->title ?? '') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Subjudul --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Subjudul</label>
                            <input name="subtitle" value="{{ old('subtitle', $hero->subtitle ?? '') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                            @error('subtitle')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Deskripsi --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="description" rows="3"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            >{{ old('description', $hero->description ?? '') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Galeri Foto Produk --}}
        <div class="bg-white shadow rounded-lg">
            <div class="flex items-center justify-between px-6 py-4 border-b">
                <h2 class="text-lg font-semibold text-gray-800">Foto Galeri Produk</h2>
                <button type="button" onclick="showModal()"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                    + Tambah Foto
                </button>
            </div>

            @if($galeri->isEmpty())
                <div class="p-6 text-center text-gray-500">
                    Belum ada foto produk. Silakan tambahkan foto.
                </div>
            @else
                <div class="p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach($galeri as $item)
                        <div class="border rounded-lg overflow-hidden">
                            <a href="#" onclick="showImagePreview('{{ asset('storage/' . $item->image) }}', '{{ $item->title }}'); return false;">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                     class="w-full h-48 object-cover hover:opacity-90 transition cursor-pointer">
                            </a>
                            <div class="p-3">
                                <h3 class="font-medium text-gray-700 truncate">{{ $item->title }}</h3>
                                <div class="mt-2 flex gap-2">
                                    <a href="{{ route('admin.galeri-produk.item.edit', $item) }}"
                                       class="text-xs px-2 py-1 bg-gray-100 hover:bg-gray-200 rounded">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.galeri-produk.item.destroy', $item) }}"
                                          onsubmit="return confirm('Hapus foto ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-xs px-2 py-1 bg-red-100 hover:bg-red-200 text-red-600 rounded">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    {{-- Modal Tambah Foto --}}
    <div id="formModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg max-w-md w-full">
            <div class="px-6 py-4 border-b flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-800">Tambah Foto Produk</h3>
                <button type="button" onclick="hideModal()" class="text-gray-400 hover:text-gray-600">&times;</button>
            </div>
            <div class="p-6">
                <form method="POST" action="{{ route('admin.galeri-produk.item.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="space-y-4">
                        {{-- Judul Foto --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Judul Foto</label>
                            <input type="text" name="title"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        {{-- Upload Foto --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Upload Foto</label>
                            <input type="file" name="image" accept="image/*"
                                   class="mt-1 block w-full text-sm border border-gray-300 rounded-md p-2" required>
                            <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF. Maksimal: 5MB <br> Ukuran: 1200 x 760</p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit"
                                class="w-full px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                            Simpan Foto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Image Preview Modal --}}
    <div id="image-preview-modal" class="fixed inset-0 bg-black/70 z-50 hidden items-center justify-center">
        <div class="relative max-w-4xl mx-auto p-4">
            <button onclick="closeImagePreview()" class="absolute top-0 right-0 bg-white rounded-full p-2 shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <img id="preview-image" src="" alt="" class="max-h-[80vh] max-w-full object-contain">
            <p id="preview-title" class="mt-2 text-white text-center font-medium"></p>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function showModal() {
        document.getElementById('formModal').classList.remove('hidden');
        document.getElementById('formModal').classList.add('flex');
    }

    function hideModal() {
        document.getElementById('formModal').classList.remove('flex');
        document.getElementById('formModal').classList.add('hidden');
    }

    function showImagePreview(imageSrc, title) {
        document.getElementById('preview-image').src = imageSrc;
        document.getElementById('preview-title').textContent = title;
        document.getElementById('image-preview-modal').style.display = 'flex';

        // Prevent body scroll when modal is open
        document.body.style.overflow = 'hidden';
    }

    function closeImagePreview() {
        document.getElementById('image-preview-modal').style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    // Close preview when clicking outside the image
    document.getElementById('image-preview-modal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeImagePreview();
        }
    });

    // Close preview with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            if (document.getElementById('image-preview-modal').style.display === 'flex') {
                closeImagePreview();
            }
            if (document.getElementById('formModal').classList.contains('flex')) {
                hideModal();
            }
        }
    });

    // Close modal when clicking outside
    document.getElementById('formModal').addEventListener('click', function(e) {
        if (e.target === this) {
            hideModal();
        }
    });
</script>
@endpush