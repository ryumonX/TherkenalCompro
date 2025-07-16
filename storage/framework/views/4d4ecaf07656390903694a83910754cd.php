<?php $__env->startSection('content'); ?>
    
    <?php if(session('success')): ?>
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="bg-white shadow rounded-lg">
        
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h1 class="text-lg font-semibold text-gray-800">Pengaturan Breadcrumb</h1>
        </div>

        
        <div class="p-6">
            <form method="POST" action="<?php echo e(route('admin.breadcrumb.update')); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="mb-5">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Breadcrumb</label>
                    <input type="text" name="title" id="title"
                           class="w-full rounded-md border-gray-300 shadow-sm"
                           value="<?php echo e(old('title', $breadcrumb->title)); ?>"
                           placeholder="Judul Breadcrumb">
                    <?php $__errorArgs = ['title'];
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

                <div class="mt-5">
                    <label for="subtitle" class="block text-sm font-medium text-gray-700 mb-1">Subjudul Breadcrumb</label>
                    <input type="text" name="subtitle" id="subtitle"
                           class="w-full rounded-md border-gray-300 shadow-sm"
                           value="<?php echo e(old('subtitle', $breadcrumb->subtitle)); ?>"
                           placeholder="Subjudul Breadcrumb">
                    <?php $__errorArgs = ['subtitle'];
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

                <div class="flex justify-start mt-5">
                    <button type="submit"
                            class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\Documents\cv_berkah_usaha\resources\views/admin/breadcrumb/index.blade.php ENDPATH**/ ?>