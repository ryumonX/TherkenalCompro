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
            <h1 class="text-lg font-semibold text-gray-800">Edit Foto Influencer</h1>
            <a href="{{ route('admin.influencers.index') }}"
               class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded">
                Kembali
            </a>
        </div>

        {{-- Form --}}
        <div class="p-6">
            <div class="grid gap-6 md:grid-cols-2">
                {{-- Preview Foto --}}
                <div>
                    <h3 class="text-sm font-medium text-gray-700 mb-2">Foto Saat Ini</h3>
                    <a href="#" onclick="showImagePreview('{{ asset('storage/'.$influencer->image) }}', '{{ $influencer->name }}'); return false;">
                        <img src="{{ asset('storage/'.$influencer->image) }}" alt="{{ $influencer->name }}"
                             class="w-24 h-24 object-contain border rounded hover:border-indigo-500 cursor-pointer">
                    </a>
                    <p class="mt-1 text-xs text-gray-500">Klik gambar untuk melihat ukuran penuh</p>
                </div>

                {{-- Form Edit --}}
                <div>
                    <form method="POST" action="{{ route('admin.influencers.update', $influencer) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="space-y-4">
                            {{-- Nama Influencer --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama Influencer</label>
                                <input type="text" name="name" value="{{ old('name', $influencer->name) }}"
                                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Upload Foto Baru --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Ganti Foto (opsional)</label>
                                <input type="file" name="image" accept="image/*"
                                       class="mt-1 block w-full text-sm border border-gray-300 rounded-md p-2">
                                <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG. Maksimal: 2MB</p>
                                @error('image')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit"
                                    class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                                Perbarui Data
                            </button>
                        </div>
                    </form>
                </div>
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

    @push('scripts')
    <script>
        function showImagePreview(imageSrc, title) {
            document.getElementById('preview-image').src = imageSrc;
            document.getElementById('preview-title').textContent = title;
            document.getElementById('image-preview-modal').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeImagePreview() {
            document.getElementById('image-preview-modal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        document.getElementById('image-preview-modal').addEventListener('click', function(e) {
            if (e.target === this) closeImagePreview();
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && document.getElementById('image-preview-modal').style.display === 'flex') {
                closeImagePreview();
            }
        });
    </script>
    @endpush
@endsection
