@props(['slider' => null])

<div class="space-y-6">
    {{-- Gambar Slider --}}
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Slider</label>

        @if($slider && $slider->image)
            <div class="mt-2 mb-3">
                <img src="{{ asset('storage/' . $slider->image) }}" alt="Preview Slider"
                     class="max-h-64 rounded-md object-contain border">
                <p class="text-xs text-gray-500 mt-1">Gambar saat ini</p>
            </div>
        @endif

        <input type="file" name="image" id="image" accept="image/*"
               onchange="previewImage(this)"
               class="mt-1 block w-full text-sm border border-gray-300 rounded-md px-3 py-2"
               {{ !$slider ? 'required' : '' }}>
        <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF. Maksimal: 5MB <br> Ukuran: 1200 x 600</p>

        <div id="imagePreview" class="mt-2 {{ !$slider || !$slider->image ? 'hidden' : '' }}">
            <img src="#" alt="Preview" class="max-h-64 rounded-md object-contain border">
            <p class="text-xs text-gray-500 mt-1">Preview gambar baru</p>
        </div>

        @error('image')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Status Aktif --}}
    <div class="flex items-center gap-2">
        <input type="checkbox" name="is_active" id="is_active" value="1"
               @checked(old('is_active', $slider->is_active ?? true))
               class="rounded border-gray-300 text-indigo-600">
        <label for="is_active" class="text-sm text-gray-700">Aktif</label>
    </div>
</div>

{{-- Script untuk preview gambar --}}
<script>
    function previewImage(input) {
        const preview = document.getElementById('imagePreview');
        const previewImg = preview.querySelector('img');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImg.src = e.target.result;
                preview.classList.remove('hidden');
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.classList.add('hidden');
        }
    }
</script>