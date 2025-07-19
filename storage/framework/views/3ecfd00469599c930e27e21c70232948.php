<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['produk' => [], 'limit' => null, 'showViewAllButton' => false, 'title' => 'Produk Kami', 'kontak' => null]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['produk' => [], 'limit' => null, 'showViewAllButton' => false, 'title' => 'Produk Kami', 'kontak' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<section id="produk" class="py-20 bg-gradient-to-b from-white to-gray-50" x-data="{
    openModal: false,
    selectedProduct: {
        title: '',
        description: '',
        image: ''
    }
}">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center px-3 py-1 rounded-full bg-green-100 mb-4">
                <span class="w-2 h-2 rounded-full bg-green-500 mr-2"></span>
                <span class="text-sm font-semibold uppercase tracking-wider text-green-700">Produk Unggulan</span>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Produk Berkualitas Kami</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Temukan berbagai pilihan produk atap berkualitas tinggi yang tahan lama dan cocok untuk berbagai jenis bangunan.
            </p>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__empty_1 = true; $__currentLoopData = $limit ? $produk->take($limit) : $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="bg-white rounded-xl shadow-md overflow-hidden group transition duration-300 hover:shadow-xl relative">
                    <div class="h-64 overflow-hidden relative">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10 flex items-end justify-start p-4">
                            <a href="<?php echo e(route('produk.detail', $item->id)); ?>"
                               @click="
                                selectedProduct = {
                                    title: '<?php echo e($item->title); ?>',
                                    description: `<?php echo addslashes($item->description); ?>`,
                                    image: '<?php echo e(asset('storage/' . $item->image)); ?>'
                                    
                                }
                               "
                               class="absolute inset-0 z-10 flex items-end justify-start p-4 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                    <span class="inline-block bg-white/90 backdrop-blur-sm text-green-700 px-3 py-1 rounded-full text-sm font-semibold cursor-pointer">
                                        Lihat Detail
                                    </span>
                                </div>
                            </a>
                        </div>
                        <img src="<?php echo e(asset('storage/' . $item->image)); ?>" alt="<?php echo e($item->title); ?>"
                             loading="lazy"
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                    </div>

                    <div class="p-6 relative">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">
                            <?php echo e($item->title); ?>

                            <div class="h-0.5 w-12 bg-gradient-to-r from-green-500 to-lime-400 mt-2 group-hover:w-full transition-all duration-300"></div>
                        </h3>
                        <div class="text-gray-600 mb-6 text-sm line-clamp-2 h-18 overflow-hidden">
                            <?php echo $item->description; ?>

                        </div>
                        <a href="https://wa.me/<?php echo e($kontak ? preg_replace('/[^0-9]/', '', $kontak->no_telepon) : '6281234567890'); ?>?text=Halo%2C%20saya%20tertarik%20dengan%20produk%20*<?php echo e(urlencode($item->title)); ?>*%20yang%20ada%20di%20website%20Anda.%20Mohon%20informasi%20lebih%20lanjut.%20Terima%20kasih."
                           target="_blank" class="block w-full">
                            <button class="w-full group relative overflow-hidden px-6 py-3 rounded-lg font-bold text-white bg-gradient-to-r from-green-600 to-green-500 shadow-lg hover:shadow-green-500/30">
                                <span class="relative z-10 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M.057 24l1.687-6.163..."></path>
                                    </svg>
                                    Hubungi Kami
                                </span>
                                <span class="absolute inset-0 bg-gradient-to-r from-green-500 to-lime-400 transform group-hover:translate-y-0 -translate-y-full transition-transform duration-500 ease-in-out"></span>
                                <span class="absolute inset-0 bg-gradient-to-r from-green-600 to-green-500 transform group-hover:translate-y-full translate-y-0 transition-transform duration-500 ease-in-out"></span>
                                <span class="absolute inset-0 w-full bg-gradient-to-tr from-transparent via-white/20 to-transparent blur-sm transform group-hover:-translate-x-0 -translate-x-full transition-transform duration-500 ease-in-out"></span>
                            </button>
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php for($i = 0; $i < 3; $i++): ?>
                    <div class="bg-white rounded-xl shadow-md overflow-hidden group transition duration-300 hover:shadow-xl relative">
                        <?php if($i === 0): ?>
                            <div class="absolute top-4 left-0 bg-gradient-to-r from-green-600 to-green-500 text-white text-xs font-bold px-4 py-1 rounded-r z-10 shadow-md">Terlaris</div>
                        <?php endif; ?>
                        <div class="h-64 overflow-hidden relative">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10 flex items-end justify-start p-4"
                                 @click="
                                    selectedProduct = {
                                        title: 'Atap Metal Premium <?php echo e(['Green', 'Lime', 'Emerald'][$i]); ?>',
                                        description: 'Atap metal berkualitas tinggi...',
                                        image: 'https://via.placeholder.com/400x300'
                                    }
                                 ">
                                <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                    <span class="inline-block bg-white/90 backdrop-blur-sm text-green-700 px-3 py-1 rounded-full text-sm font-semibold cursor-pointer">Lihat Detail</span>
                                </div>
                            </div>
                            <img src="https://via.placeholder.com/400x300"
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                        </div>

                        <div class="p-6 relative">
                            <h3 class="text-xl font-bold text-gray-800 mb-3">
                                Atap Metal Premium <?php echo e(['Green', 'Lime', 'Emerald'][$i]); ?>

                                <div class="h-0.5 w-12 bg-gradient-to-r from-green-500 to-lime-400 mt-2 group-hover:w-full transition-all duration-300"></div>
                            </h3>
                            <p class="text-gray-600 mb-6 text-sm line-clamp-3 h-18 overflow-hidden">
                                Atap metal berkualitas tinggi dengan lapisan anti karat dan tahan terhadap cuaca ekstrem...
                            </p>
                            <a href="https://wa.me/6281234567890" target="_blank" class="block w-full">
                                <button class="w-full group relative overflow-hidden px-6 py-3 rounded-lg font-bold text-white bg-gradient-to-r from-green-600 to-green-500 shadow-lg hover:shadow-green-500/30">
                                    <span class="relative z-10 flex items-center justify-center">Hubungi Kami</span>
                                    <span class="absolute inset-0 bg-gradient-to-r from-green-500 to-lime-400 transform group-hover:translate-y-0 -translate-y-full transition-transform duration-500 ease-in-out"></span>
                                    <span class="absolute inset-0 bg-gradient-to-r from-green-600 to-green-500 transform group-hover:translate-y-full translate-y-0 transition-transform duration-500 ease-in-out"></span>
                                    <span class="absolute inset-0 w-full bg-gradient-to-tr from-transparent via-white/20 to-transparent blur-sm transform group-hover:-translate-x-0 -translate-x-full transition-transform duration-500 ease-in-out"></span>
                                </button>
                            </a>
                        </div>
                    </div>
                <?php endfor; ?>
            <?php endif; ?>
        </div>

        <!-- View All Button -->
        <?php if($showViewAllButton): ?>
            <div class="text-center mt-12">
                <a href="<?php echo e(route('produk.index')); ?>">
                    <button class="group relative overflow-hidden px-8 py-3 rounded-lg font-bold text-white bg-gradient-to-r from-green-600 to-green-500 shadow-lg hover:shadow-green-500/30">
                        <span class="relative z-10">Lihat Semua Produk</span>
                        <span class="absolute inset-0 bg-gradient-to-r from-green-500 to-lime-400 transform group-hover:translate-y-0 -translate-y-full transition-transform duration-500 ease-in-out"></span>
                        <span class="absolute inset-0 bg-gradient-to-r from-green-600 to-green-500 transform group-hover:translate-y-full translate-y-0 transition-transform duration-500 ease-in-out"></span>
                        <span class="absolute inset-0 w-full bg-gradient-to-tr from-transparent via-white/20 to-transparent blur-sm transform group-hover:-translate-x-0 -translate-x-full transition-transform duration-500 ease-in-out"></span>
                    </button>
                </a>
            </div>
        <?php endif; ?>
    </div>

    <!-- Modal & Scrollbar styling tetap -->
    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background-color: #f1f1f1;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background-color: #c0c0c0;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background-color: #a0a0a0;
        }
    </style>
</section>
<?php /**PATH C:\Users\lenovo\Documents\TherkenalCompro\resources\views/components/home-components/product.blade.php ENDPATH**/ ?>