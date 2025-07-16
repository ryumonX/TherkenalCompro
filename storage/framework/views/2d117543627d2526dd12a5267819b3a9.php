<?php $__env->startSection('content'); ?>
    
    <?php if(session('success')): ?>
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="bg-white shadow rounded-lg">
        
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h1 class="text-lg font-semibold text-gray-800">Pengaturan Bagian Hubungi Kami</h1>
        </div>

        
        <div class="p-6">
            <form method="POST" action="<?php echo e(route('admin.hubungi-kami.update')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                    
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700">Gambar Ilustrasi</label>

                        
                        <?php if($section->image): ?>
                            <div class="mt-2 mb-3">
                                <img src="<?php echo e(asset('storage/' . $section->image)); ?>"
                                     alt="Gambar Hubungi Kami"
                                     class="max-h-40 rounded-md object-cover">
                                <p class="text-xs text-gray-500 mt-1">Gambar saat ini</p>
                            </div>
                        <?php endif; ?>

                        <input type="file" name="image" id="image" accept="image/*"
                               class="mt-1 block w-full text-sm border border-gray-300 rounded-md px-3 py-2">
                        <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF. Ukuran maksimal: 5MB <br> Ukuran 900 x 450</p>
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
                </div>

                
                <div class="flex justify-start p-5">
                    <button type="submit"
                            class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    
    <div class="mt-6 p-4 bg-white shadow rounded-lg">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Preview</h2>

        <div class="bg-gray-50 p-4 rounded-md border border-gray-200">
            <div class="grid md:grid-cols-2 gap-6">

                
                <div class="flex justify-center items-center">
                    <?php if($section->image): ?>
                        <img src="<?php echo e(asset('storage/' . $section->image)); ?>"
                             alt="Gambar Hubungi Kami"
                             class="max-h-60 rounded-md object-contain">
                    <?php else: ?>
                        <div class="bg-gray-200 rounded-md h-60 w-full flex items-center justify-center">
                            <span class="text-gray-400">Gambar ilustrasi akan ditampilkan di sini</span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="mt-4 text-center text-xs text-gray-500">
                <p>Catatan: Preview ini hanya simulasi tampilan. Tampilan asli pada halaman publik dapat berbeda.</p>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\Documents\cv_berkah_usaha\resources\views/admin/hubungi-kami/index.blade.php ENDPATH**/ ?>