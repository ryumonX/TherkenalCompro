<?php $__env->startSection('content'); ?>
    
    <?php if(session('success')): ?>
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
    <div class="bg-white shadow rounded-lg">
        
        <div class="px-6 py-4 border-b flex items-center justify-between">
            <h1 class="text-lg font-semibold text-gray-800">Kategori Artikel</h1>
        </div>

        
        <div class="px-6 py-4 border-b">
            <form method="GET" class="flex flex-wrap items-center gap-4">
                <input type="text" name="search" value="<?php echo e(request('search')); ?>"
                    placeholder="Cari kategori..." class="px-3 py-2 border rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-400">
                <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg">Cari</button>
            </form>
        </div>

        
        <div class="px-6 py-4 border-b">
            <form action="<?php echo e(route('admin.kategori-artikel.store')); ?>" method="POST" class="flex flex-col sm:flex-row gap-3">
                <?php echo csrf_field(); ?>
                <input name="title" placeholder="Nama kategori..."
                       value="<?php echo e(old('title')); ?>"
                       class="flex-1 border-gray-300 rounded px-3 py-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                <button class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm rounded">
                    Tambah
                </button>
            </form>
            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-xs text-red-600 mt-1"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm whitespace-nowrap">
                <thead class="bg-gray-50">
                <tr class="text-left text-gray-600 font-medium">
                    <th class="px-6 py-3">Nama</th>
                    <th class="px-4 py-3">Slug</th>
                    <th class="px-4 py-3">Jumlah Artikel</th>
                    <th class="px-4 py-3 w-24"></th>
                </tr>
                </thead>
                <tbody class="divide-y">
                <?php $__empty_1 = true; $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-3 font-medium text-gray-800"><?php echo e($row->title); ?></td>
                        <td class="px-4 py-3 text-gray-700"><?php echo e($row->slug); ?></td>
                        <td class="px-4 py-3 text-gray-700"><?php echo e($row->artikels_count); ?></td>
                        <td class="px-4 py-3 flex gap-2">
                            <a href="<?php echo e(route('admin.kategori-artikel.edit', $row)); ?>"
                               class="text-indigo-600 hover:underline">Edit</a>
                            <form method="POST" action="<?php echo e(route('admin.kategori-artikel.destroy', $row)); ?>"
                                  onsubmit="return confirm('Hapus kategori ini?')">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button class="text-red-600 hover:underline">Del</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="4" class="px-6 py-4 text-center text-gray-500">Belum ada kategori.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

        
        <div class="p-4"><?php echo e($kategori->links()); ?></div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\Documents\cv_berkah_usaha\resources\views/admin/kategori-artikel/index.blade.php ENDPATH**/ ?>