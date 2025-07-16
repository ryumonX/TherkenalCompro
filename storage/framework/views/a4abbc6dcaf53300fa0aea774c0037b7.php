<?php $__env->startSection('content'); ?>
    
    <?php if(session('success')): ?>
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="bg-white shadow rounded-lg">
        
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h1 class="text-lg font-semibold text-gray-800">Kotak Masuk - Pesan Kontak</h1>
        </div>

        
        <div class="px-4 sm:px-6 py-4 border-b">
            <form method="GET" class="flex flex-col sm:flex-row gap-3 sm:items-center">
                <!-- Search Input -->
                <div class="flex-1">
                    <input
                        type="text"
                        name="search"
                        value="<?php echo e(request('search')); ?>"
                        placeholder="Cari nama, email, atau pesan..."
                        class="w-full px-3 py-2 border rounded-lg text-sm
                            focus:ring-2 focus:ring-indigo-200 focus:border-indigo-400
                            transition duration-150 ease-in-out"
                    >
                </div>

                <!-- Filter Controls Container -->
                <div class="flex flex-row gap-3 items-center">
                    <!-- Order Select -->
                    <select
                        name="order"
                        class="w-full sm:w-32 px-3 py-2 border rounded-lg text-sm
                            focus:ring-2 focus:ring-indigo-200 focus:border-indigo-400
                            transition duration-150 ease-in-out"
                    >
                        <option value="newest" <?php echo e(request('order')!='oldest' ? 'selected' : ''); ?>>
                            Terbaru
                        </option>
                        <option value="oldest" <?php echo e(request('order')=='oldest' ? 'selected' : ''); ?>>
                            Terlama
                        </option>
                    </select>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full sm:w-auto px-4 py-2 bg-indigo-600 hover:bg-indigo-700
                            text-white text-sm font-medium rounded-lg
                            transition duration-150 ease-in-out
                            focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Filter
                    </button>
                </div>
            </form>
        </div>

        
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm whitespace-nowrap">
                <thead class="bg-gray-50 ">
                    <tr class="text-left text-gray-600 font-medium">
                        <th class="px-6 py-3">Tanggal</th>
                        <th class="px-6 py-3">Nama</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Pesan</th>
                        <th class="px-4 py-3 w-24"></th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    <?php $__empty_1 = true; $__currentLoopData = $pesan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3"><?php echo e($row->created_at->format('d M Y H:i')); ?></td>
                            <td class="px-6 py-3"><?php echo e($row->nama); ?></td>
                            <td class="px-6 py-3"><?php echo e($row->email); ?></td>
                            <td class="px-6 py-3">
                                <div class="truncate max-w-xs"><?php echo e($row->pesan); ?></div>
                            </td>
                            <td class="px-4 py-3 flex gap-2">
                                <a href="<?php echo e(route('admin.form-kontak.show', $row)); ?>"
                                   class="text-indigo-600 hover:underline">Lihat</a>
                                <form method="POST" action="<?php echo e(route('admin.form-kontak.destroy', $row)); ?>"
                                      onsubmit="return confirm('Hapus pesan ini?')">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada pesan masuk.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        
        <div class="p-4"><?php echo e($pesan->links()); ?></div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\Documents\cv_berkah_usaha\resources\views/admin/form-kontak/index.blade.php ENDPATH**/ ?>