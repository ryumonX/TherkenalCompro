<?php $__env->startSection('content'); ?>
    
    <?php if(session('success')): ?>
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
    <div class="bg-white shadow rounded-lg mb-8">
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h1 class="text-lg font-semibold text-gray-800">Banner Layanan</h1>
        </div>

        <div class="p-6">
            <form action="<?php echo e(route('admin.banner-layanan.update')); ?>" method="POST" class="space-y-4">
                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>

                <div class="grid gap-6 sm:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Judul</label>
                        <input name="title" value="<?php echo e(old('title', $banner->title)); ?>"
                               class="mt-1 block w-full border-gray-300 rounded shadow-sm" />
                        <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('title')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('title'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Sub Judul</label>
                        <input name="subtitle" value="<?php echo e(old('subtitle', $banner->subtitle)); ?>"
                               class="mt-1 block w-full border-gray-300 rounded shadow-sm" />
                        <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('subtitle')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('subtitle'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="description" rows="3"
                                  class="mt-1 block w-full border-gray-300 rounded shadow-sm"><?php echo e(old('description', $banner->description)); ?></textarea>
                        <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('description')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('description'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                    </div>
                </div>

                <button class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm rounded">
                    Simpan
                </button>
            </form>
        </div>
    </div>

    
    <div class="bg-white shadow rounded-lg">
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h1 class="text-lg font-semibold text-gray-800">Item Layanan</h1>
            <label for="add-item" class="cursor-pointer px-4 py-2 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700">
                + Tambah Item
            </label>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm whitespace-nowrap">
                <thead class="bg-gray-50">
                    <tr class="text-left text-gray-600 font-medium">
                        <th class="px-6 py-3 w-12">Icon</th>
                        <th class="px-6 py-3">Judul</th>
                        <th class="px-6 py-3">Deskripsi</th>
                        <th class="px-4 py-3 w-24"></th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3">
                                <a href="#" onclick="showImagePreview('<?php echo e(asset('storage/'.$item->image_icon)); ?>', '<?php echo e($item->title); ?>'); return false;">
                                    <img src="<?php echo e(asset('storage/'.$item->image_icon)); ?>"
                                         alt="icon" class=" object-contain border rounded hover:border-indigo-500 cursor-pointer">
                                </a>
                            </td>
                            <td class="px-6 py-3">
                                <div class="font-medium text-gray-900"><?php echo e($item->title); ?></div>
                            </td>
                            <td class="px-6 py-3">
                                <div class="font-normal text-gray-900"><?php echo e(\Illuminate\Support\Str::limit($item->description, 40, '...')); ?></div>
                            </td>
                            <td class="px-4 py-3 flex gap-2">
                                <a href="<?php echo e(route('admin.banner-layanan.item.edit', $item)); ?>"
                                   class="text-indigo-600 hover:underline">Edit</a>
                                <form method="POST" action="<?php echo e(route('admin.banner-layanan.item.destroy', $item)); ?>"
                                      onsubmit="return confirm('Hapus item ini?')">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500">Belum ada item layanan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    
    <input type="checkbox" id="add-item" class="hidden peer" />
    <div class="fixed inset-0 bg-black/40 z-40 hidden peer-checked:block"></div>
    <div class="fixed inset-0 items-center justify-center z-50 hidden peer-checked:flex">
        <div class="bg-white rounded-lg w-full max-w-md p-6 shadow">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Tambah Item Layanan</h3>

            <form action="<?php echo e(route('admin.banner-layanan.item.store')); ?>" method="POST" enctype="multipart/form-data" class="space-y-4">
                <?php echo csrf_field(); ?>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Judul</label>
                    <input name="title" class="mt-1 block w-full border-gray-300 rounded"/>
                    <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('title')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('title'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <input name="description" class="mt-1 block w-full border-gray-300 rounded"/>
                    <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('description')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('description'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Icon (png/svg, maks 5 MB) <br> Ukuran: 512px <br> Referensi flaticon.com</label>
                    <input type="file" name="image_icon" accept="image/*"
                           class="mt-1 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4
                                  file:rounded file:border-0 file:bg-indigo-600 file:text-white
                                  hover:file:bg-indigo-700"/>
                    <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('image_icon')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('image_icon'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                </div>

                <div class="flex gap-3">
                    <button class="px-4 py-2 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700">
                        Simpan
                    </button>
                    <label for="add-item"
                           class="cursor-pointer px-4 py-2 text-sm rounded border border-gray-300 text-gray-700 hover:bg-gray-50">
                        Batal
                    </label>
                </div>
            </form>
        </div>
    </div>

    
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
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
        if (e.key === 'Escape' && document.getElementById('image-preview-modal').style.display === 'flex') {
            closeImagePreview();
        }
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\Documents\cv_berkah_usaha\resources\views/admin/bannerlayanan/index.blade.php ENDPATH**/ ?>