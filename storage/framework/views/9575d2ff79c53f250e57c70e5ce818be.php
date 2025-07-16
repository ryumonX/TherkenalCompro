<?php $__env->startSection('content'); ?>
    
    <?php if(session('success')): ?>
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="bg-white shadow rounded-lg">
        
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h1 class="text-lg font-semibold text-gray-800">Kelola Slider</h1>
            <a href="<?php echo e(route('admin.slider.create')); ?>"
               class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                + Tambah Slider
            </a>
        </div>

        
        <?php if($sliders->isEmpty()): ?>
            <div class="p-8 text-center text-gray-500">
                Belum ada slider. Klik tombol "Tambah Slider" untuk membuat slider baru.
            </div>
        <?php else: ?>
            <div class="p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="border rounded-lg overflow-hidden shadow-sm">
                        <div class="h-48 overflow-hidden">
                            <img src="<?php echo e(asset('storage/' . $slider->image)); ?>"
                                 alt="Slider <?php echo e($loop->iteration); ?>"
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between items-center mb-4">
                                <span class="<?php echo e($slider->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'); ?> px-2 py-1 rounded-full text-xs">
                                    <?php echo e($slider->is_active ? 'Aktif' : 'Nonaktif'); ?>

                                </span>
                                <span class="text-xs text-gray-500">
                                    <?php echo e($slider->created_at->format('d M Y')); ?>

                                </span>
                            </div>
                            <div class="flex justify-end gap-2">
                                <a href="<?php echo e(route('admin.slider.edit', $slider)); ?>"
                                   class="px-3 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded text-sm">
                                    Edit
                                </a>
                                <form method="POST" action="<?php echo e(route('admin.slider.destroy', $slider)); ?>"
                                      onsubmit="return confirm('Yakin ingin menghapus slider ini?')">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button type="submit"
                                            class="px-3 py-1 bg-red-100 hover:bg-red-200 text-red-700 rounded text-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            
            <div class="p-4 border-t">
                <?php echo e($sliders->links()); ?>

            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\Documents\cv_berkah_usaha\resources\views/admin/slider/index.blade.php ENDPATH**/ ?>