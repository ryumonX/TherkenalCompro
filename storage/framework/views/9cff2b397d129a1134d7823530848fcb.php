<?php $__env->startSection('content'); ?>
    
    <?php if(session('success')): ?>
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="bg-white shadow rounded-lg">
        
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h1 class="text-lg font-semibold text-gray-800">Daftar Produk</h1>
            <a href="<?php echo e(route('admin.produk.create')); ?>"
               class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                + Tambah Produk
            </a>
        </div>

        
        <div class="px-4 sm:px-6 py-4 border-b">
            <form method="GET" class="space-y-3 sm:space-y-0 sm:flex sm:flex-wrap sm:items-center sm:gap-4">
                <!-- Search Input -->
                <div class="w-full sm:w-auto">
                    <input
                        type="text"
                        name="search"
                        value="<?php echo e(request('search')); ?>"
                        placeholder="Cari nama produk..."
                        class="w-full sm:w-48 px-3 py-2 border rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-400"
                    >
                </div>
                <!-- Search Button -->
                <div class="w-full sm:w-auto">
                    <button
                        type="submit"
                        class="w-full sm:w-auto px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition duration-150 ease-in-out"
                    >
                        Cari
                    </button>
                </div>
            </form>
        </div>
        
        
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm whitespace-nowrap">
                <thead class="bg-gray-50">
                    <tr class="text-left text-gray-600 font-medium">
                        <th class="px-6 py-3">Gambar</th>
                        <th class="px-6 py-3">Nama Produk</th>
                        <th class="px-4 py-3 text-center">Status</th>
                        <th class="px-4 py-3 w-24 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    <?php $__empty_1 = true; $__currentLoopData = $produks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3">
                                <img src="<?php echo e(asset('storage/' . $produk->image)); ?>" alt="<?php echo e($produk->title); ?>"
                                     class="h-16 w-16 object-cover rounded">
                            </td>
                            <td class="px-6 py-3">
                                <div class="font-medium text-gray-900"><?php echo e($produk->title); ?></div>
                                <div class="text-xs text-gray-500 mt-1 line-clamp-1">
                                    <?php echo e(Str::limit(strip_tags($produk->description), 80)); ?>

                                </div>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <span class="px-2 py-0.5 rounded-full text-xs
                                     <?php echo e($produk->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'); ?>">
                                    <?php echo e($produk->is_active ? 'Aktif' : 'Nonaktif'); ?>

                                </span>
                            </td>
                            <td class="px-4 py-3 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="<?php echo e(route('admin.produk.edit', $produk)); ?>"
                                       class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form method="POST" action="<?php echo e(route('admin.produk.destroy', $produk)); ?>"
                                          onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                        <button class="text-red-600 hover:text-red-900">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                Belum ada data produk. Silakan tambahkan produk baru.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        
        <div class="p-4">
            <?php echo e($produks->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\coding\Therkenal\therkenal\resources\views/admin/produk/index.blade.php ENDPATH**/ ?>