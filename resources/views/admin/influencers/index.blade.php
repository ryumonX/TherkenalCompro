@extends('layouts.app')

@section('content')
    {{-- Flash Message --}}
    @if (session('success'))
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-lg">
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h2 class="text-lg font-semibold text-gray-800">Daftar Influencer</h2>
            <button onclick="showModal()"
                class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded text-sm">+ Tambah</button>
        </div>

        @if($influencers->isEmpty())
            <div class="p-6 text-gray-500 text-center">Belum ada influencer ditambahkan.</div>
        @else
            <div class="p-6 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                @foreach($influencers as $item)
                    <div class="border rounded overflow-hidden">
                        <a href="#" onclick="showImagePreview('{{ asset('storage/' . $item->image) }}', '{{ $item->name }}'); return false;">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                 class="w-full h-40 object-cover hover:opacity-90 transition">
                        </a>
                        <div class="p-2">
                            <h3 class="text-sm font-medium text-gray-700 truncate">{{ $item->name }}</h3>
                            <div class="mt-2 flex gap-2">
                                <a href="{{ route('admin.influencers.edit', $item) }}"
                                   class="text-xs px-2 py-1 bg-gray-100 hover:bg-gray-200 rounded">Edit</a>
                                <form method="POST" action="{{ route('admin.influencers.destroy', $item) }}"
                                      onsubmit="return confirm('Yakin hapus influencer ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-xs px-2 py-1 bg-red-100 hover:bg-red-200 text-red-600 rounded">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- Modal Tambah Influencer --}}
    <div id="formModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg max-w-md w-full">
            <div class="px-6 py-4 border-b flex justify-between items-center">
                <h3 class="text-lg font-semibold">Tambah Influencer</h3>
                <button onclick="hideModal()" class="text-gray-500 hover:text-gray-800 text-xl">&times;</button>
            </div>
            <div class="p-6">
                <form method="POST" action="{{ route('admin.influencers.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="space-y-4">
                        {{-- Nama --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" name="name" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Gambar --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Foto</label>
                            <input type="file" name="image" accept="image/*" required
                                class="mt-1 block w-full text-sm border border-gray-300 rounded-md p-2">
                            <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG. Max: 2MB</p>
                            @error('image')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit"
                                class="w-full px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Preview Gambar --}}
    <div id="image-preview-modal" class="fixed inset-0 bg-black/70 z-50 hidden items-center justify-center">
        <div class="relative max-w-4xl mx-auto p-4">
            <button onclick="closeImagePreview()" class="absolute top-0 right-0 bg-white rounded-full p-2 shadow-lg">
                ✕
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

    function showImagePreview(src, title) {
        document.getElementById('preview-image').src = src;
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

    document.getElementById('formModal').addEventListener('click', function(e) {
        if (e.target === this) hideModal();
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeImagePreview();
            hideModal();
        }
    });
</script>
@endpush
