<?php $__env->startSection('content'); ?>
    
    <?php if(session('success')): ?>
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="bg-white shadow rounded-lg">
        
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h1 class="text-lg font-semibold text-gray-800">Konfigurasi Website</h1>
            <a href="<?php echo e(route('dashboard')); ?>"
               class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded">
                Kembali
            </a>
        </div>

        
        <div class="p-6">
            <form method="POST" action="<?php echo e(route('admin.config-web.update')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                
                <div class="mt-3">
                    <label for="logo" class="block text-sm font-medium text-gray-700 mb-1">Logo Website</label>

                    
                    <?php if($config->logo): ?>
                        <div class="mb-5">
                            <img src="<?php echo e(asset('storage/' . $config->logo)); ?>" alt="Logo Website" class="h-16 object-contain">
                            <p class="text-xs text-gray-500 mt-1">Logo saat ini</p>
                        </div>
                    <?php endif; ?>

                    <input type="file" name="logo" id="logo"
                           class="w-full border border-gray-300 px-3 py-2 rounded-md text-sm">
                    <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF. Maksimal: 5MB <br> Ukuran: 100 x 100</p>

                    <?php $__errorArgs = ['logo'];
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

                
                <div class="mt-3">
                    <label for="favicon" class="block text-sm font-medium text-gray-700 mb-1">Favicon Website</label>

                    
                    <?php if($config->favicon): ?>
                        <div class="mb-5">
                            <img src="<?php echo e(asset('storage/' . $config->favicon)); ?>" alt="Favicon Website" class="h-16 object-contain">
                            <p class="text-xs text-gray-500 mt-1">Favicon saat ini</p>
                        </div>
                    <?php endif; ?>

                    <input type="file" name="favicon" id="favicon"
                           class="w-full border border-gray-300 px-3 py-2 rounded-md text-sm">
                    <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF, ICO, SVG. Ukuran terbaik: 32x32 atau 16x16 pixel. Maksimal: 5MB</p>

                    <?php $__errorArgs = ['favicon'];
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
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Website</label>
                    <input type="text" name="title" id="title"
                           class="w-full rounded-md border-gray-300 shadow-sm"
                           value="<?php echo e(old('title', $config->title)); ?>"
                           placeholder="Masukkan judul website" required>
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
                    <label for="subtitle" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Footer</label>
                    <input type="text" name="subtitle" id="subtitle"
                           class="w-full rounded-md border-gray-300 shadow-sm"
                           value="<?php echo e(old('subtitle', $config->subtitle)); ?>"
                           placeholder="Masukkan subjudul atau tagline website" required>
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

                
                <div class="mt-5">
                    <label for="website_url" class="block text-sm font-medium text-gray-700 mb-1">URL Website</label>
                    <input type="text" name="website_url" id="website_url"
                           class="w-full rounded-md border-gray-300 shadow-sm"
                           value="<?php echo e(old('website_url', $config->website_url)); ?>"
                           placeholder="Masukkan URL website" required>
                    <?php $__errorArgs = ['website_url'];
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
                    <label for="copyright" class="block text-sm font-medium text-gray-700 mb-1">Teks Copyright</label>
                    <input type="text" name="copyright" id="copyright"
                           class="w-full rounded-md border-gray-300 shadow-sm"
                           value="<?php echo e(old('copyright', $config->copyright)); ?>"
                           placeholder="Contoh: © 2025 Nama Perusahaan. Seluruh hak cipta dilindungi." required>
                    <?php $__errorArgs = ['copyright'];
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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\Documents\cv_berkah_usaha\resources\views/admin/config-web/index.blade.php ENDPATH**/ ?>