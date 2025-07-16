<?php $__env->startSection('content'); ?>
    
    <?php if(session('success')): ?>
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="mb-4 px-4 py-3 bg-red-100 text-red-800 rounded-lg">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <div class="bg-white shadow rounded-lg">
        
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h1 class="text-lg font-semibold text-gray-800">Manajemen Pengguna</h1>
            <a href="<?php echo e(route('admin.users.create')); ?>"
               class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                + Tambah Pengguna
            </a>
        </div>

        
        <div class="px-6 py-4 border-b">
            <form method="GET" class="flex flex-wrap items-center gap-4">
                <input type="text" name="search" value="<?php echo e(request('search')); ?>"
                    placeholder="Cari nama pengguna..."
                    class="px-3 py-2 border rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-400">
                <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg">Cari</button>
            </form>
        </div>

        
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm whitespace-nowrap">
                <thead class="bg-gray-50">
                    <tr class="text-left text-gray-600 font-medium">
                        <th class="px-6 py-3">Nama</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Tanggal Registrasi</th>
                        <th class="px-4 py-3 w-24 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3">
                                <div class="font-medium text-gray-900"><?php echo e($user->name); ?></div>
                            </td>
                            <td class="px-6 py-3 text-gray-500"><?php echo e($user->email); ?></td>
                            <td class="px-6 py-3 text-gray-500"><?php echo e($user->created_at->format('d M Y, H:i')); ?></td>
                            <td class="px-4 py-3 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="<?php echo e(route('admin.users.edit', $user)); ?>"
                                       class="text-indigo-600 hover:text-indigo-900">Edit</a>

                                    <form method="POST" action="<?php echo e(route('admin.users.destroy', $user)); ?>"
                                          onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                        <button class="text-red-600 hover:text-red-900">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                Belum ada data pengguna. Silakan tambahkan pengguna baru.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        
        <div class="p-4">
            <?php echo e($users->appends(request()->query())->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\Documents\cv_berkah_usaha\resources\views/admin/users/index.blade.php ENDPATH**/ ?>