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
        <div class="px-6 py-4 border-b">
            <h1 class="text-lg font-semibold text-gray-800">Informasi Kontak</h1>
        </div>

        {{-- Form --}}
        <div class="p-6">
            <form method="POST" action="{{ route('admin.kontak.update') }}">
                @csrf
                @method('PUT')

                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    {{-- No. Telepon --}}
                    <div>
                        <label for="no_telepon" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                        <input type="text" name="no_telepon" id="no_telepon"
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                               value="{{ old('no_telepon', $kontak->no_telepon) }}"
                               placeholder="contoh: +62 812 3456 7890" required>
                        @error('no_telepon')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- No. Whatsapp (Label was Telegram, corrected to Whatsapp based on common usage) --}}
                    <div>
                        <label for="no_telegram" class="block text-sm font-medium text-gray-700 mb-1">Nomor Whatsapp</label>
                        <input type="text" name="no_telegram" id="no_telegram"
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                               value="{{ old('no_telegram', $kontak->no_telegram) }}"
                               placeholder="contoh: +62 812 3456 7890" required>
                        @error('no_telegram')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" id="email"
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                               value="{{ old('email', $kontak->email) }}"
                               placeholder="contoh: info@perusahaan.com" required>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Alamat --}}
                <div class="mb-6">
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap</label>
                    <textarea name="alamat" id="alamat" rows="3"
                                  class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                                  placeholder="Masukkan alamat lengkap" required>{{ old('alamat', $kontak->alamat) }}</textarea>
                    @error('alamat')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Jam Kerja --}}
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700">Jam Kerja</label>
                    <textarea id="editor" name="jam_kerja" class="hidden">{{ old('jam_kerja', $kontak->jam_kerja ?? '') }}</textarea>
                    {{-- Added ID for CKEditor container --}}
                    <div id="editor-container" class="mt-1 min-h-[300px] border border-gray-300 rounded"></div>
                    {{-- Using standard error display --}}
                    @error('jam_kerja')
                         <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Embed Map --}}
                <div class="mb-6">
                    <label for="embed_map" class="block text-sm font-medium text-gray-700 mb-1">Embed Google Maps</label>
                    <textarea name="embed_map" id="embed_map" rows="4"
                                  class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200"
                                  placeholder='Salin kode iframe dari Google Maps dan tempelkan di sini, contoh: <iframe src="https://www.google.com/maps/embed?..." width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>' required>{{ old('embed_map', $kontak->embed_map) }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">Salin kode iframe dari Google Maps dan tempelkan di sini</p>
                    @error('embed_map')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Preview Map --}}
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Preview Map</label>
                    {{-- Added ID for easier JS/CSS targeting and removed min-width as it can cause issues --}}
                    <div id="map-preview-container" class="mt-1 p-2 border rounded-md bg-gray-50 overflow-hidden min-h-[300px]">
                        @if ($kontak->embed_map)
                            {{-- The iframe will be rendered here and targeted by CSS below --}}
                            {!! $kontak->embed_map !!}
                        @else
                            <div class="flex items-center justify-center h-full">
                                <p class="text-gray-400">Preview map akan muncul di sini</p>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Tombol Simpan --}}
                <div class="flex justify-start mt-5">
                    <button type="submit"
                            class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Guide cara mendapatkan embed map --}}
    <div class="mt-6 bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b">
            <h2 class="text-md font-semibold text-gray-800">Cara Mendapatkan Kode Embed Google Maps</h2>
        </div>
        <div class="p-6 text-sm text-gray-600">
            <ol class="list-decimal list-inside space-y-2">
                <li>Buka <a href="https://www.google.com/maps" target="_blank" class="text-indigo-600 hover:underline">Google Maps</a></li>
                <li>Cari lokasi yang ingin ditampilkan</li>
                <li>Klik tombol "Bagikan" (Share)</li>
                <li>Pilih tab "Sematkan peta" (Embed a map)</li>
                {{-- Updated suggested size for better initial fit, though CSS handles responsiveness --}}
                <li>Pilih ukuran yang diinginkan (misalnya "Ukuran sedang" atau biarkan default, CSS akan menyesuaikan)</li>
                <li>Klik "Salin HTML" (Copy HTML)</li>
                <li>Tempelkan kode tersebut di kolom Embed Google Maps di atas</li>
            </ol>
        </div>
    </div>
@endsection

@push('scripts')
{{-- Add CSS here to make the iframe responsive --}}
<style>
#map-preview-container iframe {
    width: 100% !important; /* Force the iframe width to match the container */
    /* height: auto; /* Uncomment this if you want the height to scale proportionally */
}
</style>

<script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script>
<script>
    // Fungsi untuk memperbarui preview map saat input berubah
    document.addEventListener('DOMContentLoaded', function() {
        const mapInput = document.getElementById('embed_map');
        // Target the preview container by its ID
        const mapPreviewContainer = document.getElementById('map-preview-container');

        if (mapInput && mapPreviewContainer) {
            mapInput.addEventListener('input', function() {
                // Update the content of the preview container with the new iframe code
                mapPreviewContainer.innerHTML = this.value;

                // The CSS rule should automatically apply to the new iframe.
                // No need to manually set style here unless further dynamic adjustments are needed.
            });
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        ClassicEditor
            .create(document.querySelector('#editor-container'), {
                toolbar: [ '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'undo', 'redo'],
            })
            .then(editor => {
                // Set initial data
                const textarea = document.querySelector('#editor');
                editor.setData(textarea.value);

                // Update hidden textarea on editor content change
                editor.model.document.on('change:data', () => {
                    textarea.value = editor.getData();
                });
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>
@endpush