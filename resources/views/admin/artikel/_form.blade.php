@props(['artikel' => null, 'kategori'])

@csrf
@if($artikel) @method('PUT') @endif

<div class="grid gap-6 sm:grid-cols-2">
    {{-- Kategori --}}
    <div>
        <label class="block text-sm font-medium text-gray-700">Kategori</label>
        <select name="kategori_artikel_id"
                class="mt-1 block w-full border-gray-300 rounded">
            <option value="">-- pilih --</option>
            @foreach($kategori as $id => $kat)
                <option value="{{ $id }}"
                    @selected(old('kategori_artikel_id', $artikel->kategori_artikel_id ?? '') == $id)>
                    {{ $kat }}
                </option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('kategori_artikel_id')" />
    </div>

    {{-- Jadwal --}}
    <div>
        <label class="block text-sm font-medium text-gray-700">Jadwal Tayang</label>
        <input type="datetime-local" name="post_schedule"
            value="{{ old('post_schedule', optional($artikel?->post_schedule)->format('Y-m-d\TH:i')) }}"
            class="mt-1 block w-full border-gray-300 rounded" />
        <x-input-error :messages="$errors->get('post_schedule')" />
    </div>

    {{-- Thumbnail --}}
    <div class="sm:col-span-2">
        <label class="block text-sm font-medium text-gray-700">Thumbnail</label>

        {{-- Preview thumbnail jika ada --}}
        @if($artikel && $artikel->thumbnail)
            <div class="mt-2 mb-3">
                <img src="{{ asset('storage/' . $artikel->thumbnail) }}" alt="{{ $artikel->title }}"
                     class="h-40 object-cover rounded border border-gray-200">
                <p class="text-xs text-gray-500 mt-1">Thumbnail saat ini</p>
            </div>
        @endif

        <input type="file" name="thumbnail" accept="image/*"
               class="mt-1 block w-full text-sm text-gray-500
                      file:mr-4 file:py-2 file:px-4
                      file:rounded file:border-0
                      file:text-sm file:font-semibold
                      file:bg-indigo-50 file:text-indigo-700
                      hover:file:bg-indigo-100" />
        <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF. Maksimal 5MB. <br> Ukuran: 800x420</p>
        <x-input-error :messages="$errors->get('thumbnail')" />
    </div>

    {{-- Judul --}}
    <div class="sm:col-span-2">
        <label class="block text-sm font-medium text-gray-700">Judul</label>
        <input name="title" value="{{ old('title', $artikel->title ?? '') }}"
               class="mt-1 block w-full border-gray-300 rounded" />
        <x-input-error :messages="$errors->get('title')" />
    </div>

    {{-- Preview --}}
    <div class="sm:col-span-2">
        <label class="block text-sm font-medium text-gray-700">Preview (maks 500)</label>
        <textarea name="preview_description" rows="3"
                  class="mt-1 block w-full border-gray-300 rounded">{{ old('preview_description', $artikel->preview_description ?? '') }}</textarea>
        <x-input-error :messages="$errors->get('preview_description')" />
    </div>

    {{-- Description --}}
    <div class="sm:col-span-2">
        <label class="block text-sm font-medium text-gray-700">Konten</label>
        <textarea id="editor" name="description" class="hidden">{{ old('description', $artikel->description ?? '') }}</textarea>

        <x-input-error :messages="$errors->get('description')" />
    </div>

    {{-- Meta --}}
    <div>
        <label class="block text-sm font-medium text-gray-700">Meta Keyword</label>
        <input name="meta_keyword" value="{{ old('meta_keyword', $artikel->meta_keyword ?? '') }}"
               class="mt-1 block w-full border-gray-300 rounded" />
        <p class="mt-1 text-xs text-gray-500">Pisahkan dengan koma</p>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Meta Description</label>
        <input name="meta_description" value="{{ old('meta_description', $artikel->meta_description ?? '') }}"
               class="mt-1 block w-full border-gray-300 rounded" />
    </div>

    {{-- Status --}}
    <div class="flex items-center gap-2">
        <input type="checkbox" name="is_active" value="1" id="aktif"
               @checked(old('is_active', $artikel->is_active ?? true))
               class="rounded border-gray-300">
        <label for="aktif" class="text-sm text-gray-700">Aktif</label>
    </div>
</div>

{{-- Submit --}}
<div class="mt-6">
    <button class="px-4 py-2 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700">
        {{ $artikel ? 'Perbarui' : 'Simpan' }}
    </button>
</div>

@push('styles')
@endpush
@push('scripts')
<script src="https://cdn.ckeditor.com/4.16.2/standard-all/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        CKEDITOR.replace('editor', {
            height: 400,
            // Aktifkan fitur upload gambar
            filebrowserUploadUrl: "{{ route('admin.artikel.upload.image', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
            extraPlugins: 'image2,uploadimage',
            toolbar: [
                { name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
                { name: 'editing', items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
                { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
                { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
                { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },
                { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] }
            ],
            // Konfigurasi dialog gambar
            image2_alignClasses: [ 'image-align-left', 'image-align-center', 'image-align-right' ],
            image2_disableResizer: false
        });

        // Sinkronisasi konten dengan textarea asli
        CKEDITOR.instances.editor.on('change', function() {
            document.getElementById('editor').value = CKEDITOR.instances.editor.getData();
        });
    });
</script>
@endpush
