<?php $__env->startSection('content'); ?>
    
    <?php if(session('success')): ?>
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="bg-white shadow rounded-lg">
        
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h1 class="text-lg font-semibold text-gray-800">Daftar Artikel</h1>
            <a href="<?php echo e(route('admin.artikel.create')); ?>"
               class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                + Tambah Artikel
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
                        placeholder="Cari judul..."
                        class="w-full sm:w-48 px-3 py-2 border rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-400"
                    >
                </div>

                <!-- Category Select -->
                <div class="w-full sm:w-auto">
                    <select
                        name="kategori_artikel_id"
                        class="w-full sm:w-48 px-3 py-2 border rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-400"
                    >
                        <option value="">Semua Kategori</option>
                        <?php $__currentLoopData = $kategoriList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option
                                value="<?php echo e($id); ?>"
                                <?php echo e(request('kategori_artikel_id') == $id ? 'selected' : ''); ?>

                            >
                                <?php echo e($title); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <!-- Filter Button -->
                <div class="w-full sm:w-auto">
                    <button
                        type="submit"
                        class="w-full sm:w-auto px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition duration-150 ease-in-out"
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
                        <th class="px-6 py-3 w-20">Thumbnail</th>
                        <th class="px-6 py-3">Judul</th>
                        <th class="px-4 py-3">Kategori</th>
                        <th class="px-4 py-3">Tayang</th>
                        <th class="px-4 py-3 text-center">Status</th>
                        <th class="px-4 py-3 w-24"></th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    <?php $__empty_1 = true; $__currentLoopData = $artikels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3">
                                <?php if($row->thumbnail): ?>
                                    <img src="<?php echo e(asset('storage/' . $row->thumbnail)); ?>" alt="<?php echo e($row->title); ?>"
                                         class="h-16 w-16 object-cover rounded border border-gray-200">
                                <?php else: ?>
                                    <div class="h-16 w-16 bg-gray-200 flex items-center justify-center rounded">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-3">
                                <div class="font-medium text-gray-900"><?php echo e($row->title); ?></div>
                                <div class="text-xs text-gray-500"><?php echo e($row->slug); ?></div>
                            </td>
                            <td class="px-4 py-3"><?php echo e($row->kategori->title ?? '-'); ?></td>
                            <td class="px-4 py-3"><?php echo e($row->post_schedule->format('d M Y H:i')); ?></td>
                            <td class="px-4 py-3 text-center">
                                <span class="px-2 py-0.5 rounded-full text-xs
                                     <?php echo e($row->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'); ?>">
                                    <?php echo e($row->is_active ? 'Aktif' : 'Draft'); ?>

                                </span>
                            </td>
                            <td class="px-4 py-3 mt-5 flex gap-2">
                                <a href="<?php echo e(route('admin.artikel.edit', $row)); ?>"
                                   class="text-indigo-600 hover:underline">Edit</a>
                                <form method="POST" action="<?php echo e(route('admin.artikel.destroy', $row)); ?>"
                                      onsubmit="return confirm('Hapus artikel ini?')">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada artikel.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        
        <div class="p-4"><?php echo e($artikels->links()); ?></div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\coding\Therkenal\therkenal\resources\views/admin/artikel/index.blade.php ENDPATH**/ ?>