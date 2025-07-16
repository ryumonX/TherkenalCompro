<?php $__env->startSection('content'); ?>
    
    <?php if(session('success')): ?>
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="space-y-6">
        
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-4 border-b">
                <h2 class="text-lg font-semibold text-gray-800">Header Galeri Produk</h2>
            </div>
            <div class="p-6">
                <form method="POST" action="<?php echo e(route('admin.galeri-produk.update')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="grid gap-6 mb-6">
                        
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

                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="description" rows="3"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            ><?php echo e(old('description', $hero->description ?? '')); ?></textarea>
                            <?php $__errorArgs = ['description'];
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

                    <div>
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        
        <div class="bg-white shadow rounded-lg">
            <div class="flex items-center justify-between px-6 py-4 border-b">
                <h2 class="text-lg font-semibold text-gray-800">Foto Galeri Produk</h2>
                <button type="button" onclick="showModal()"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                    + Tambah Foto
                </button>
            </div>

            
            <div class="px-6 py-4 border-b">
                <form method="GET" class="flex flex-wrap items-center gap-4">
                    <input type="text" name="search" value="<?php echo e(request('search')); ?>"
                        placeholder="Cari judul foto..." class="px-3 py-2 border rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-400">
                    <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg">Cari</button>
                </form>
            </div>

            <?php if($galeri->isEmpty()): ?>
                <div class="p-6 text-center text-gray-500">
                    Belum ada foto produk. Silakan tambahkan foto.
                </div>
            <?php else: ?>
                <div class="p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <?php $__currentLoopData = $galeri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="border rounded-lg overflow-hidden">
                            <a href="#" onclick="showImagePreview('<?php echo e(asset('storage/' . $item->image)); ?>', '<?php echo e($item->title); ?>'); return false;">
                                <img src="<?php echo e(asset('storage/' . $item->image)); ?>" alt="<?php echo e($item->title); ?>"
                                     class="w-full h-48 object-cover hover:opacity-90 transition cursor-pointer">
                            </a>
                            <div class="p-3">
                                <h3 class="font-medium text-gray-700 truncate"><?php echo e($item->title); ?></h3>
                                <div class="mt-2 flex gap-2">
                                    <a href="<?php echo e(route('admin.galeri-produk.item.edit', $item)); ?>"
                                       class="text-xs px-2 py-1 bg-gray-100 hover:bg-gray-200 rounded">
                                        Edit
                                    </a>
                                    <form method="POST" action="<?php echo e(route('admin.galeri-produk.item.destroy', $item)); ?>"
                                          onsubmit="return confirm('Hapus foto ini?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit"
                                                class="text-xs px-2 py-1 bg-red-100 hover:bg-red-200 text-red-600 rounded">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    
    <div id="formModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg max-w-md w-full">
            <div class="px-6 py-4 border-b flex justify-between items-center">
                <h3 class="text-lg font-semibold text-gray-800">Tambah Foto Produk</h3>
                <button type="button" onclick="hideModal()" class="text-gray-400 hover:text-gray-600">&times;</button>
            </div>
            <div class="p-6">
                <form method="POST" action="<?php echo e(route('admin.galeri-produk.item.store')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="space-y-4">
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Judul Foto</label>
                            <input type="text" name="title"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Upload Foto</label>
                            <input type="file" name="image" accept="image/*"
                                   class="mt-1 block w-full text-sm border border-gray-300 rounded-md p-2" required>
                            <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF. Maksimal: 5MB <br> Ukuran: 1200 x 760</p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit"
                                class="w-full px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                            Simpan Foto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <div id="image-preview-modal" class="fixed inset-0 bg-black/70 z-50 hidden items-center justify-center">
        <div class="relative max-w-4xl mx-auto p-4">
            <button onclick="closeImagePreview()" class="absolute top-0 right-0 bg-white rounded-full p-2 shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <img id="preview-image" src="" alt="" class="max-h-[80vh] max-w-full object-contain">
            <p id="preview-title" class="mt-2 text-white text-center font-medium"></p>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    function showModal() {
        document.getElementById('formModal').classList.remove('hidden');
        document.getElementById('formModal').classList.add('flex');
    }

    function hideModal() {
        document.getElementById('formModal').classList.remove('flex');
        document.getElementById('formModal').classList.add('hidden');
    }

    function showImagePreview(imageSrc, title) {
        document.getElementById('preview-image').src = imageSrc;
        document.getElementById('preview-title').textContent = title;
        document.getElementById('image-preview-modal').style.display = 'flex';

        // Prevent body scroll when modal is open
        document.body.style.overflow = 'hidden';
    }

    function closeImagePreview() {
        document.getElementById('image-preview-modal').style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    // Close preview when clicking outside the image
    document.getElementById('image-preview-modal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeImagePreview();
        }
    });

    // Close preview with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            if (document.getElementById('image-preview-modal').style.display === 'flex') {
                closeImagePreview();
            }
            if (document.getElementById('formModal').classList.contains('flex')) {
                hideModal();
            }
        }
    });

    // Close modal when clicking outside
    document.getElementById('formModal').addEventListener('click', function(e) {
        if (e.target === this) {
            hideModal();
        }
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\Documents\cv_berkah_usaha\resources\views/admin/galeri-produk/index.blade.php ENDPATH**/ ?>