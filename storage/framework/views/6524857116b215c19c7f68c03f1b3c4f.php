<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['slider' => null]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['slider' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div class="space-y-6">
    
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Slider</label>

        <?php if($slider && $slider->image): ?>
            <div class="mt-2 mb-3">
                <img src="<?php echo e(asset('storage/' . $slider->image)); ?>" alt="Preview Slider"
                     class="max-h-64 rounded-md object-contain border">
                <p class="text-xs text-gray-500 mt-1">Gambar saat ini</p>
            </div>
        <?php endif; ?>

        <input type="file" name="image" id="image" accept="image/*"
               onchange="previewImage(this)"
               class="mt-1 block w-full text-sm border border-gray-300 rounded-md px-3 py-2"
               <?php echo e(!$slider ? 'required' : ''); ?>>
        <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF. Maksimal: 5MB <br> Ukuran: 1200 x 600</p>

        <div id="imagePreview" class="mt-2 <?php echo e(!$slider || !$slider->image ? 'hidden' : ''); ?>">
            <img src="#" alt="Preview" class="max-h-64 rounded-md object-contain border">
            <p class="text-xs text-gray-500 mt-1">Preview gambar baru</p>
        </div>

        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    
    <div class="flex items-center gap-2">
        <input type="checkbox" name="is_active" id="is_active" value="1"
               <?php if(old('is_active', $slider->is_active ?? true)): echo 'checked'; endif; ?>
               class="rounded border-gray-300 text-indigo-600">
        <label for="is_active" class="text-sm text-gray-700">Aktif</label>
    </div>
</div>


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
</script><?php /**PATH C:\Users\lenovo\Documents\cv_berkah_usaha\resources\views/admin/slider/form.blade.php ENDPATH**/ ?>