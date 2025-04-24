{{-- keunggulan --}}

@extends('layouts.app')

@section('content')
    {{-- Flash Message --}}
    @if (session('success'))
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-6">
        {{-- Bagian Intro/Header Keunggulan --}}
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-4 border-b">
                <h2 class="text-lg font-semibold text-gray-800">Pengaturan Intro Keunggulan</h2>
            </div>
            <div class="p-6">
                <form method="POST" action="{{ route('admin.keunggulan.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="grid gap-6">
                        {{-- Judul --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Judul</label>
                            <input name="title" value="{{ old('title', $keunggulan->title ?? '') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Subjudul --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Subjudul</label>
                            <input name="subtitle" value="{{ old('subtitle', $keunggulan->subtitle ?? '') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                            @error('subtitle')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Deskripsi --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="description" rows="4"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required
                            >{{ old('description', $keunggulan->description ?? '') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                            Simpan Pengaturan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Daftar Item Keunggulan --}}
        <div class="bg-white shadow rounded-lg">
            <div class="flex items-center justify-between px-6 py-4 border-b">
                <h2 class="text-lg font-semibold text-gray-800">Item Keunggulan</h2>
                <button type="button" onclick="showModal()"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                    + Tambah Item
                </button>
            </div>

            {{-- Grid Item --}}
            @if($items->isEmpty())
                <div class="p-6 text-center text-gray-500">
                    Belum ada item keunggulan. Silakan tambahkan item baru.
                </div>
            @else
                <div class="p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach($items as $item)
                        <div class="border rounded-lg overflow-hidden shadow-sm">
                            @if($item->image)
                                <div class="h-40 overflow-hidden cursor-pointer"
                                     onclick="showImagePreview('{{ asset('storage/' . $item->image) }}', '{{ $item->title }}')">
                                    <img src="{{ asset('storage/' . $item->image) }}"
                                         alt="{{ $item->title }}"
                                         class="w-full h-48 object-cover hover:opacity-90 transition">
                                </div>
                            @else
                                <div class="h-40 bg-gray-100 flex items-center justify-center">
                                    <span class="text-gray-400">Tidak ada gambar</span>
                                </div>
                            @endif

                            <div class="p-4">
                                <h3 class="font-medium text-gray-800">{{ $item->title }}</h3>
                                <p class="mt-1 text-sm text-gray-600 line-clamp-2">{{ $item->subtitle }}</p>

                                <div class="mt-4 flex justify-end space-x-2">
                                    <a href="{{ route('admin.keunggulan.item.edit', $item) }}"
                                       class="px-3 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded text-sm">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.keunggulan.item.destroy', $item) }}"
                                          onsubmit="return confirm('Yakin ingin menghapus item ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="px-3 py-1 bg-red-100 hover:bg-red-200 text-red-700 rounded text-sm">
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

    {{-- Modal Tambah Item --}}
    <div id="formModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg max-w-md w-full">
            <div class="px-6 py-4 border-b flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-800">Tambah Item Keunggulan</h3>
                <button type="button" onclick="hideModal()" class="text-gray-400 hover:text-gray-600">&times;</button>
            </div>
            <div class="p-6">
                <form method="POST" action="{{ route('admin.keunggulan.item.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="space-y-4">
                        {{-- Judul Item --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Judul</label>
                            <input type="text" name="title"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        {{-- Subjudul/Deskripsi Item --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="subtitle" rows="3"
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                        </div>

                        {{-- Upload Gambar --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Gambar (opsional)</label>
                            <input type="file" name="image" accept="image/*"
                                   class="mt-1 block w-full text-sm border border-gray-300 rounded-md p-2">
                            <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF. Maksimal: 5MB <br> Ukuran: 512px <br> Referensi flaticon.com</p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit"
                                class="w-full px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                            Simpan Item
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