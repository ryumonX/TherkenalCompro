<?php $__env->startSection('content'); ?>
    <div class="bg-white shadow rounded-lg p-6">
        <h1 class="text-lg font-semibold text-gray-800 mb-4">Tambah Artikel</h1>

        
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h1 class="text-lg font-semibold text-gray-800">Edit Produk</h1>
            <a href="<?php echo e(route('admin.produk.index')); ?>"
               class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded">
                Kembali
            </a>
        </div>

        <form action="<?php echo e(route('admin.artikel.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo $__env->make('admin.artikel._form', ['kategori' => $kategori], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\Documents\cv_berkah_usaha\resources\views/admin/artikel/create.blade.php ENDPATH**/ ?>