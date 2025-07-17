{{-- produk --}}

@props(['produk' => null])

@csrf
@if($produk) @method('PUT') @endif

<div class="space-y-6">
    {{-- Gambar Produk --}}
    <div>
        <label class="block text-sm font-medium text-gray-700">Gambar Produk</label>

        @if($produk && $produk->image)
            <div class="mt-2 mb-3">
                <img src="{{ asset('storage/' . $produk->image) }}" alt="{{ $produk->title }}"
                     class="h-32 object-contain border rounded">
                <p class="text-xs text-gray-500 mt-1">Gambar saat ini</p>
            </div>
        @endif

        <input type="file" name="image" accept="image/*"
               class="mt-1 block w-full text-sm border border-gray-300 rounded-md px-3 py-2"
               {{ !$produk ? 'required' : '' }}>
        <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF. Maksimal: 5MB <br> Ukuran: 1068 x 1068</p>
        <x-input-error :messages="$errors->get('image')" />
    </div>

    {{-- Nama Produk --}}
    <div>
        <label class="block text-sm font-medium text-gray-700">Nama Produk</label>
        <input name="title" value="{{ old('title', $produk->title ?? '') }}"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
        <x-input-error :messages="$errors->get('title')" />
    </div>

    {{-- Harga --}}
    <div>
        <label class="block text-sm font-medium text-gray-700">Harga Produk</label>
        <input type="number" name="price" value="{{ old('price', $produk->price ?? '') }}"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required min="0" />
        <x-input-error :messages="$errors->get('price')" />
    </div>

    {{-- Deskripsi --}}
    <div>
        <label class="block text-sm font-medium text-gray-700">Deskripsi Produk</label>
        <textarea id="editor" name="description" class="mt-1 block w-full border border-gray-300 rounded min-h-[300px]">{{ old('description', $produk->description ?? '') }}</textarea>
        <x-input-error :messages="$errors->get('description')" />
    </div>

    {{-- Status --}}
    <div class="flex items-center gap-2">
        <input type="hidden" name="is_active" value="0">
        <input type="checkbox" name="is_active" value="1" id="is_active"
               @checked(old('is_active', $produk ? $produk->is_active : false))
               class="rounded border-gray-300">
        <label for="is_active" class="text-sm text-gray-700">Aktif</label>
    </div>
</div>

{{-- Submit --}}
<div class="mt-6">
    <button class="px-4 py-2 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700">
        {{ $produk ? 'Perbarui Produk' : 'Simpan Produk' }}
    </button>
</div>

@push('scripts')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inisialisasi CKEditor 4
        CKEDITOR.replace('editor', {
            toolbar: [
                { name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize'] },
                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat'] },
                { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'] },
                { name: 'insert', items: ['Link', 'Unlink'] },
                { name: 'undo', items: ['Undo', 'Redo'] },
            ],
            height: 300,
        });
    });
</script>
@endpush
