<?php $__env->startSection('content'); ?>
    <div class="mb-6">
        
        <div class="bg-white rounded-lg p-6 mb-8 shadow-sm border border-gray-100">
            <div class="flex items-center mb-2">
                <span class="text-yellow-400 text-3xl mr-3">👋</span>
                <h1 class="text-2xl font-bold text-gray-800">Selamat datang, <?php echo e(Auth::user()->name); ?>!</h1>
            </div>
            <p class="text-gray-600">Selamat datang di dashboard admin. Silakan kelola konten website Anda dari sini.</p>
        </div>

        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            
            <div class="bg-white rounded-lg p-5 shadow-sm border-l-4 border-blue-500">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-gray-500 text-sm font-medium">Total Produk</h3>
                        <p class="text-2xl font-bold text-gray-800"><?php echo e($totalProduk ?? 0); ?></p>
                    </div>
                    <div class="rounded-full bg-blue-100 p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                </div>
            </div>

            
            <div class="bg-white rounded-lg p-5 shadow-sm border-l-4 border-pink-500">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-gray-500 text-sm font-medium">Galeri Produk</h3>
                        <p class="text-2xl font-bold text-gray-800"><?php echo e($totalGaleri ?? 0); ?></p>
                    </div>
                    <div class="rounded-full bg-pink-100 p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            </div>

            
            <div class="bg-white rounded-lg p-5 shadow-sm border-l-4 border-purple-500">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-gray-500 text-sm font-medium">Kategori Artikel</h3>
                        <p class="text-2xl font-bold text-gray-800"><?php echo e($totalKategori ?? 0); ?></p>
                    </div>
                    <div class="rounded-full bg-purple-100 p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </div>
                </div>
            </div>

            
            <div class="bg-white rounded-lg p-5 shadow-sm border-l-4 border-green-500">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-gray-500 text-sm font-medium">Total Artikel</h3>
                        <p class="text-2xl font-bold text-gray-800"><?php echo e($totalArtikel ?? 0); ?></p>
                    </div>
                    <div class="rounded-full bg-green-100 p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                </div>
            </div>

            
            <div class="bg-white rounded-lg p-5 shadow-sm border-l-4 border-yellow-500">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-gray-500 text-sm font-medium">Pesan Baru</h3>
                        <p class="text-2xl font-bold text-gray-800"><?php echo e($totalPesan ?? 0); ?></p>
                    </div>
                    <div class="rounded-full bg-yellow-100 p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            </div>

            
            <div class="bg-white rounded-lg p-5 shadow-sm border-l-4 border-indigo-500">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-gray-500 text-sm font-medium">Total User</h3>
                        <p class="text-2xl font-bold text-gray-800"><?php echo e($totalUser ?? 0); ?></p>
                    </div>
                    <div class="rounded-full bg-indigo-100 p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
            
            <?php if(isset($adaPesanHariIni) && $adaPesanHariIni): ?>
            <div class="bg-white rounded-lg shadow-sm lg:col-span-2">
                <div class="px-6 py-4 border-b flex items-center justify-between">
                    <h2 class="font-semibold text-gray-800">Pesan Kontak Hari Ini</h2>
                    <a href="<?php echo e(route('admin.form-kontak.index')); ?>" class="text-sm text-indigo-600 hover:text-indigo-900">Lihat Semua</a>
                </div>
                <div class="p-6">
                    <div class="divide-y">
                        <?php $__currentLoopData = $pesanTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pesan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="py-3">
                            <div class="flex justify-between">
                                <h4 class="font-medium text-gray-800"><?php echo e($pesan->nama); ?></h4>
                                <span class="text-xs text-gray-500"><?php echo e($pesan->created_at->format('H:i')); ?></span>
                            </div>
                            <p class="text-sm text-gray-600 truncate"><?php echo e($pesan->pesan); ?></p>
                            <div class="mt-1">
                                <a href="<?php echo e(route('admin.form-kontak.show', $pesan)); ?>" class="text-xs text-indigo-600 hover:underline">Baca pesan</a>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            
            <div class="bg-white rounded-lg shadow-sm <?php echo e(isset($adaPesanHariIni) && $adaPesanHariIni ? '' : 'lg:col-span-3'); ?>">
                <div class="px-6 py-4 border-b">
                    <h2 class="font-semibold text-gray-800">Tautan Cepat</h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 gap-3">
                        <a href="<?php echo e(route('admin.produk.index')); ?>" class="flex flex-col items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            <span class="text-sm text-gray-700">Produk</span>
                        </a>
                        <a href="<?php echo e(route('admin.artikel.index')); ?>" class="flex flex-col items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                            <span class="text-sm text-gray-700">Artikel</span>
                        </a>
                        <a href="<?php echo e(route('admin.slider.index')); ?>" class="flex flex-col items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="text-sm text-gray-700">Slider</span>
                        </a>
                        <a href="<?php echo e(route('admin.form-kontak.index')); ?>" class="flex flex-col items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="text-sm text-gray-700">Pesan</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="bg-white rounded-lg shadow-sm">
                <div class="px-6 py-4 border-b flex items-center justify-between">
                    <h2 class="font-semibold text-gray-800">Artikel Terbaru</h2>
                    <a href="<?php echo e(route('admin.artikel.index')); ?>" class="text-sm text-indigo-600 hover:text-indigo-900">Lihat Semua</a>
                </div>
                <div class="p-6">
                    <?php if(isset($artikelTerbaru) && count($artikelTerbaru) > 0): ?>
                        <div class="space-y-4">
                            <?php $__currentLoopData = $artikelTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artikel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="border-b pb-3 last:border-b-0">
                                    <h4 class="font-medium text-gray-800"><?php echo e($artikel->title); ?></h4>
                                    <p class="text-sm text-gray-500 mt-1"><?php echo e(\Illuminate\Support\Str::limit($artikel->preview_description, 50)); ?></p>
                                    <div class="flex justify-between mt-2 text-xs">
                                        <span class="text-gray-500"><?php echo e($artikel->created_at->format('d M Y')); ?></span>
                                        <a href="<?php echo e(route('admin.artikel.edit', $artikel)); ?>" class="text-indigo-600 hover:underline">Edit</a>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-4 text-gray-500">
                            Belum ada artikel terbaru.
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            
            <div class="bg-white rounded-lg shadow-sm lg:col-span-2">
                <div class="px-6 py-4 border-b">
                    <h2 class="font-semibold text-gray-800">Status Komponen Website</h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        
                        <div class="border rounded-lg p-4">
                            <div class="flex items-center justify-between">
                                <h3 class="font-medium text-gray-800">Config Website</h3>
                                <div class="flex items-center">
                                    <?php if(isset($configWebStatus) && $configWebStatus): ?>
                                        <span class="h-3 w-3 rounded-full bg-green-500 mr-2"></span>
                                        <span class="text-sm text-green-600">Aktif</span>
                                    <?php else: ?>
                                        <span class="h-3 w-3 rounded-full bg-gray-300 mr-2"></span>
                                        <span class="text-sm text-gray-500">Belum diatur</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="mt-3">
                                <a href="<?php echo e(route('admin.config-web.edit')); ?>" class="text-xs text-indigo-600 hover:underline">Kelola</a>
                            </div>
                        </div>

                        
                        <div class="border rounded-lg p-4">
                            <div class="flex items-center justify-between">
                                <h3 class="font-medium text-gray-800">Tentang Kami</h3>
                                <div class="flex items-center">
                                    <?php if(isset($tentangKamiStatus) && $tentangKamiStatus): ?>
                                        <span class="h-3 w-3 rounded-full bg-green-500 mr-2"></span>
                                        <span class="text-sm text-green-600">Aktif</span>
                                    <?php else: ?>
                                        <span class="h-3 w-3 rounded-full bg-gray-300 mr-2"></span>
                                        <span class="text-sm text-gray-500">Belum diatur</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="mt-3">
                                <a href="<?php echo e(route('admin.tentang-kami.edit')); ?>" class="text-xs text-indigo-600 hover:underline">Kelola</a>
                            </div>
                        </div>

                        
                        <div class="border rounded-lg p-4">
                            <div class="flex items-center justify-between">
                                <h3 class="font-medium text-gray-800">Breadcrumb</h3>
                                <div class="flex items-center">
                                    <?php if(isset($breadcrumbStatus) && $breadcrumbStatus): ?>
                                        <span class="h-3 w-3 rounded-full bg-green-500 mr-2"></span>
                                        <span class="text-sm text-green-600">Aktif</span>
                                    <?php else: ?>
                                        <span class="h-3 w-3 rounded-full bg-gray-300 mr-2"></span>
                                        <span class="text-sm text-gray-500">Belum diatur</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="mt-3">
                                <a href="<?php echo e(route('admin.breadcrumb.edit')); ?>" class="text-xs text-indigo-600 hover:underline">Kelola</a>
                            </div>
                        </div>

                        
                        <div class="border rounded-lg p-4">
                            <div class="flex items-center justify-between">
                                <h3 class="font-medium text-gray-800">Kontak</h3>
                                <div class="flex items-center">
                                    <?php if(isset($kontakStatus) && $kontakStatus): ?>
                                        <span class="h-3 w-3 rounded-full bg-green-500 mr-2"></span>
                                        <span class="text-sm text-green-600">Aktif</span>
                                    <?php else: ?>
                                        <span class="h-3 w-3 rounded-full bg-gray-300 mr-2"></span>
                                        <span class="text-sm text-gray-500">Belum diatur</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="mt-3">
                                <a href="<?php echo e(route('admin.kontak.edit')); ?>" class="text-xs text-indigo-600 hover:underline">Kelola</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <div class="bg-white rounded-lg shadow-sm">
                <div class="px-6 py-4 border-b flex items-center justify-between">
                    <h2 class="font-semibold text-gray-800">Produk Terbaru</h2>
                    <a href="<?php echo e(route('admin.produk.index')); ?>" class="text-sm text-indigo-600 hover:text-indigo-900">Lihat Semua</a>
                </div>
                <div class="p-6">
                    <?php if(isset($produkTerbaru) && count($produkTerbaru) > 0): ?>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <?php $__currentLoopData = $produkTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="border rounded-lg overflow-hidden">
                                    <?php if($produk->image): ?>
                                        <img src="<?php echo e(asset('storage/' . $produk->image)); ?>" alt="<?php echo e($produk->title); ?>" class="w-full h-32 object-cover">
                                    <?php else: ?>
                                        <div class="w-full h-32 bg-gray-200 flex items-center justify-center">
                                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                    <?php endif; ?>
                                    <div class="p-3">
                                        <h3 class="font-medium text-gray-800 truncate"><?php echo e($produk->title); ?></h3>
                                        <div class="flex justify-between mt-2 text-xs">
                                            <span class="text-gray-500"><?php echo e($produk->created_at->format('d M Y')); ?></span>
                                            <a href="<?php echo e(route('admin.produk.edit', $produk)); ?>" class="text-indigo-600 hover:underline">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <div class="text-center py-4 text-gray-500">
                            Belum ada produk terbaru.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\lenovo\Documents\cv_berkah_usaha\resources\views/dashboard.blade.php ENDPATH**/ ?>