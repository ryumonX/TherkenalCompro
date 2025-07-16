<?php $__env->startSection('content'); ?>
    
    <?php if(session('success')): ?>
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="bg-white shadow rounded-lg">
        
        <div class="px-6 py-4 border-b">
            <h1 class="text-lg font-semibold text-gray-800">Pengaturan Tentang Kami</h1>
        </div>

        
        <div class="p-6">
            <form method="POST" action="<?php echo e(route('admin.tentang-kami.update')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="space-y-6">
                    
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700">Gambar</label>

                        <?php if($tentangKami->image): ?>
                            <div class="mt-2 mb-3">
                                <img src="<?php echo e(asset('storage/' . $tentangKami->image)); ?>" alt="Gambar Tentang Kami"
                                     class="max-h-64 object-contain border rounded">
                                <p class="text-xs text-gray-500 mt-1">Gambar saat ini</p>
                            </div>
                        <?php endif; ?>

                        <input type="file" name="image" id="image" accept="image/*"
                               onchange="previewImage(this)"
                               class="mt-1 block w-full text-sm border border-gray-300 rounded-md px-3 py-2">
                        <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, GIF. Maksimal: 5MB <br> Ukuran: 700 x 800</p>

                        <div id="imagePreview" class="mt-2 hidden">
                            <img src="#" alt="Preview" class="max-h-64 object-contain border rounded">
                            <p class="text-xs text-gray-500 mt-1">Preview gambar baru</p>
                        </div>

                        <?php $__errorArgs = ['image'];
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
                        <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="title" id="title" value="<?php echo e(old('title', $tentangKami->title)); ?>"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
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
                        <label for="subtitle" class="block text-sm font-medium text-gray-700">Sub Judul</label>
                        <input type="text" name="subtitle" id="subtitle" value="<?php echo e(old('subtitle', $tentangKami->subtitle)); ?>"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
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
                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea id="editor" name="description" class="mt-1 block w-full border border-gray-300 rounded min-h-[400px]"><?php echo e(old('description', $tentangKami->description)); ?></textarea>
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

                
                <div class="mt-6">
                    <button type="submit"
                            class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    
    <div class="mt-6 bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b">
            <h2 class="text-lg font-semibold text-gray-800">Preview Konten</h2>
        </div>

        <div class="p-6">
            <div class="prose max-w-none">
                <h2 class="text-2xl font-bold text-gray-800" id="preview-title"><?php echo e($tentangKami->title); ?></h2>
                <h2 class="text-2xl font-bold text-gray-800" id="preview-subtitle"><?php echo e($tentangKami->subtitle); ?></h2>
                <div id="preview-content" class="mt-4">
                    <?php echo $tentangKami->description; ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    // Preview gambar yang diupload
    function previewImage(input) {
        const preview = document.getElementById('imagePreview');
        const previewImg = preview.querySelector('img');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImg.src = e.target.result;
                preview.classList.remove('hidden');
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.classList.add('hidden');
        }
    }

    // Inisialisasi CKEditor 4
    document.addEventListener('DOMContentLoaded', function() {
        // Editor untuk deskripsi
        CKEDITOR.replace('editor', {
            toolbar: [
                { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat'] },
                { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'] },
                { name: 'insert', items: ['Link', 'Unlink'] },
                { name: 'undo', items: ['Undo', 'Redo'] },
            ],
            height: 400, // Atur tinggi editor
        });

        // Update preview
        const titleInput = document.getElementById('title');
        const subtitleInput = document.getElementById('subtitle');
        const previewTitle = document.getElementById('preview-title');
        const previewSubtitle = document.getElementById('preview-subtitle');
        const previewContent = document.getElementById('preview-content');

        titleInput.addEventListener('input', function() {
            previewTitle.textContent = this.value;
        });

        subtitleInput.addEventListener('input', function() {
            previewSubtitle.textContent = this.value;
        });

        CKEDITOR.instances.editor.on('change', function() {
            previewContent.innerHTML = CKEDITOR.instances.editor.getData();
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\Documents\cv_berkah_usaha\resources\views/admin/tentangkami/index.blade.php ENDPATH**/ ?>