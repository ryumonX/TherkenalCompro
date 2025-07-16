<?php $__env->startSection('content'); ?>
    
    <?php if(session('success')): ?>
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="bg-white shadow rounded-lg">
        
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h1 class="text-lg font-semibold text-gray-800">Daftar Platform Media Sosial</h1>
            <a href="<?php echo e(route('admin.sosial-media.create')); ?>"
               class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                + Tambah Platform
            </a>
        </div>

        
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm whitespace-nowrap">
                <thead class="bg-gray-50">
                    <tr class="text-left text-gray-600 font-medium">
                        <th class="px-6 py-3">Platform</th>
                        <th class="px-6 py-3">Link</th>
                        <th class="px-6 py-3">Slug</th>
                        <th class="px-6 py-3">Ikon</th>
                        <th class="px-4 py-3 text-center">Status</th>
                        <th class="px-4 py-3 w-24 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    <?php $__empty_1 = true; $__currentLoopData = $platforms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $platform): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3">
                                <div class="font-medium text-gray-900"><?php echo e($platform->platform); ?></div>
                            </td>
                            <td class="px-6 py-3 text-gray-500 line-clamp-1"><?php echo e(Str::limit($platform->link_platform, 30)); ?></td>
                            <td class="px-6 py-3 text-gray-500"><?php echo e($platform->slug); ?></td>
                            <td class="px-6 py-3">
                                <div class="flex items-center space-x-2">
                                    <?php if($platform->images->count() > 0): ?>
                                        <div class="relative group">
                                            <img src="<?php echo e(asset('storage/' . $platform->images->first()->image)); ?>"
                                                 alt="<?php echo e($platform->platform); ?> icon"
                                                 class="h-8 w-8 object-contain">
                                            <div class="hidden group-hover:block absolute top-0 right-0 -mt-1 -mr-1">
                                                <form method="POST" action="<?php echo e(route('admin.sosial-media.icon.destroy', $platform->images->first())); ?>"
                                                      onsubmit="return confirm('Yakin ingin menghapus ikon ini?')">
                                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="bg-red-500 text-white rounded-full p-1 text-xs"
                                                            title="Hapus ikon">
                                                        &times;
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <span class="text-gray-400 text-xs">Belum ada ikon</span>

                                        
                                        <form method="POST" action="<?php echo e(route('admin.sosial-media.icon.store', ['id' => $platform->id])); ?>"
                                              enctype="multipart/form-data" class="inline-flex ml-2">
                                            <?php echo csrf_field(); ?>
                                            <input type="file" name="image" onchange="this.form.submit()"
                                                   accept="image/*" class="hidden" id="icon-upload-<?php echo e($platform->id); ?>">
                                            <label for="icon-upload-<?php echo e($platform->id); ?>"
                                                   class="cursor-pointer bg-gray-100 hover:bg-gray-200 p-1 rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M12 4v16m8-8H4" />
                                                </svg>
                                            </label>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <span class="px-2 py-0.5 rounded-full text-xs
                                     <?php echo e($platform->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'); ?>">
                                    <?php echo e($platform->is_active ? 'Aktif' : 'Nonaktif'); ?>

                                </span>
                            </td>
                            <td class="px-4 py-3 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="<?php echo e(route('admin.sosial-media.edit', $platform->id)); ?>"
                                       class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form method="POST" action="<?php echo e(route('admin.sosial-media.destroy', $platform->id)); ?>"
                                          onsubmit="return confirm('Yakin ingin menghapus platform ini? Semua ikon terkait juga akan dihapus.')">
                                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                        <button class="text-red-600 hover:text-red-900">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                Belum ada platform media sosial. Silakan tambahkan platform baru.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        
        <div class="p-4">
            <?php echo e($platforms->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\Documents\cv_berkah_usaha\resources\views/admin/sosial-media/index.blade.php ENDPATH**/ ?>