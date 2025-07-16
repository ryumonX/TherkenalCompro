<?php $__env->startSection('content'); ?>
    <div class="bg-white shadow rounded-lg">
        
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h1 class="text-lg font-semibold text-gray-800">Tambah Platform Media Sosial</h1>
            <a href="<?php echo e(route('admin.sosial-media.index')); ?>"
               class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded">
                Kembali
            </a>
        </div>

        
        <div class="p-6">
            <form method="POST" action="<?php echo e(route('admin.sosial-media.store')); ?>">
                <?php echo csrf_field(); ?>

                <div class="space-y-6">
                    
                    <div>
                        <label for="platform" class="block text-sm font-medium text-gray-700">Nama Platform</label>
                        <input type="text" name="platform" id="platform" value="<?php echo e(old('platform')); ?>"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                               placeholder="contoh: Facebook, Instagram, dll" required>
                        <?php $__errorArgs = ['platform'];
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
                        <label for="link_platform" class="block text-sm font-medium text-gray-700">Link Platform</label>
                        <input type="text" name="link_platform" id="link_platform" value="<?php echo e(old('link_platform')); ?>"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                               placeholder="contoh: https://facebook.com/…" required>
                        <?php $__errorArgs = ['link_platform'];
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
                        <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                        <input type="text" name="slug" id="slug" value="<?php echo e(old('slug')); ?>"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                               placeholder="contoh: facebook, instagram (tanpa spasi)" required>
                        <p class="mt-1 text-xs text-gray-500">
                            Digunakan sebagai identifier. Gunakan huruf kecil tanpa spasi dan karakter khusus.
                        </p>
                        <?php $__errorArgs = ['slug'];
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

                    
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="is_active" id="is_active" value="1"
                               <?php if(old('is_active', true)): echo 'checked'; endif; ?>
                               class="rounded border-gray-300">
                        <label for="is_active" class="text-sm text-gray-700">Aktif</label>
                    </div>
                </div>

                
                <div class="mt-6">
                    <button type="submit"
                            class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                        Simpan Platform
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="mt-6 bg-white shadow rounded-lg p-6">
        <h2 class="text-gray-700 font-medium mb-4">Catatan:</h2>
        <ul class="space-y-2 text-sm text-gray-600 list-disc pl-5">
            <li>Setelah membuat platform, Anda dapat menambahkan ikon di halaman daftar platform.</li>
            <li>Slug harus unik dan hanya boleh berisi huruf kecil, angka, dan tanda hubung (-).</li>
            <li>Platform dapat dinonaktifkan jika tidak ingin ditampilkan di frontend.</li>
        </ul>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    // Script untuk otomatis mengisi slug berdasarkan nama platform
    document.addEventListener('DOMContentLoaded', function() {
        const platformInput = document.getElementById('platform');
        const slugInput = document.getElementById('slug');

        if (platformInput && slugInput) {
            platformInput.addEventListener('input', function() {
                // Hanya update slug jika belum diisi atau belum dimodifikasi
                if (!slugInput.value || slugInput.value === slugify(platformInput.value.trim())) {
                    slugInput.value = slugify(this.value.trim());
                }
            });
        }

        // Fungsi untuk mengubah string menjadi slug
        function slugify(text) {
            return text.toString().toLowerCase()
                .replace(/\s+/g, '-')           // Ganti spasi dengan -
                .replace(/[^\w\-]+/g, '')       // Hapus karakter non-word
                .replace(/\-\-+/g, '-')         // Ganti multiple - dengan single -
                .replace(/^-+/, '')             // Trim - dari awal text
                .replace(/-+$/, '');            // Trim - dari akhir text
        }
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\Documents\cv_berkah_usaha\resources\views/admin/sosial-media/create.blade.php ENDPATH**/ ?>