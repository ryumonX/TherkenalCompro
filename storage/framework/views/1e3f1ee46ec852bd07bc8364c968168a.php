<?php $__env->startSection('content'); ?>
    
    <?php if(session('success')): ?>
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="space-y-6">
        
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-4 border-b">
                <h2 class="text-lg font-semibold text-gray-800">Pengaturan Teks Hero</h2>
            </div>
            <div class="p-6">
                <form method="POST" action="<?php echo e(route('admin.hero.update')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('POST'); ?>

                    <div class="grid gap-6 sm:grid-cols-2">
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Judul</label>
                            <input name="title" value="<?php echo e(old('title', $hero->title ?? '')); ?>"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                            <?php $__errorArgs = ['title'];
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

                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Subjudul</label>
                            <input name="subtitle" value="<?php echo e(old('subtitle', $hero->subtitle ?? '')); ?>"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                            <?php $__errorArgs = ['subtitle'];
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

                    <div class="mt-6">
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                            Simpan Pengaturan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        
        <div class="bg-white shadow rounded-lg">
            <div class="flex items-center justify-between px-6 py-4 border-b">
                <h2 class="text-lg font-semibold text-gray-800">Item Hero</h2>
                <button type="button" onclick="showModal()"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                    + Tambah Item
                </button>
            </div>

            
            <div class="overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Judul
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Subjudul
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php $__empty_1 = true; $__currentLoopData = $heroItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr data-id="<?php echo e($item->id); ?>" class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900"><?php echo e($item->title); ?></div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500 line-clamp-2"><?php echo e($item->subtitle); ?></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex gap-3 justify-end">
                                        <a href="<?php echo e(route('admin.hero.item.edit', $item)); ?>"
                                           class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form method="POST" action="<?php echo e(route('admin.hero.item.destroy', $item)); ?>"
                                              onsubmit="return confirm('Yakin ingin menghapus item ini?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button class="text-red-600 hover:text-red-900">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                                    Belum ada item hero. Silakan tambahkan item baru.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
    <div id="formModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50 items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg max-w-md w-full mx-auto">
            <div class="px-6 py-4 border-b flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-800">Tambah Item Hero</h3>
                <button type="button" onclick="hideModal()" class="text-gray-400 hover:text-gray-600 text-xl">&times;</button>
            </div>
            <div class="p-6">
                <form method="POST" action="<?php echo e(route('admin.hero.item.store')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="space-y-4">
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Judul Item</label>
                            <input type="text" name="title"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Subjudul Item</label>
                            <textarea name="subtitle" rows="2"
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit"
                                class="w-full px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                            Simpan Item
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Modal functions
        window.showModal = function() {
            const modal = document.getElementById('formModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        window.hideModal = function() {
            const modal = document.getElementById('formModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }


    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\Documents\cv_berkah_usaha\resources\views/admin/hero/index.blade.php ENDPATH**/ ?>