<?php $__env->startSection('content'); ?>
    <div class="bg-white shadow rounded-lg">
        
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h1 class="text-lg font-semibold text-gray-800">Tambah Produk Baru</h1>
            <a href="<?php echo e(route('admin.produk.index')); ?>"
               class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded">
                Kembali
            </a>
        </div>

        
        <div class="p-6">
            <form method="POST" action="<?php echo e(route('admin.produk.store')); ?>" enctype="multipart/form-data">
                <?php echo $__env->make('admin.produk.form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\coding\Therkenal\therkenal\resources\views/admin/produk/create.blade.php ENDPATH**/ ?>