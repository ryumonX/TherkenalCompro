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

<section
  id="produk"
  class="py-20 bg-gradient-to-b from-white to-gray-50"
  x-data="{
    openModal: false,
    selectedProduct: {
      title: '',
      description: '',
      image: ''
    }
  }"
>
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Section Header -->
    <div class="text-center mb-12">
      <div class="inline-flex items-center px-3 py-1 rounded-full bg-blue-100 mb-4">
        <span class="w-2 h-2 rounded-full bg-blue-500 mr-2"></span>
        <span class="text-sm font-semibold uppercase tracking-wider text-blue-700">Produk Unggulan</span>
      </div>
      <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Produk Berkualitas Kami</h2>
      <p class="text-gray-600 max-w-2xl mx-auto">
        Temukan berbagai pilihan produk atap berkualitas tinggi yang tahan lama dan cocok untuk berbagai jenis bangunan.
      </p>
    </div>

    <!-- Products Grid - Exactly 3 products per row on desktop -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php $__empty_1 = true; $__currentLoopData = $limit ? $produk->take($limit) : $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="bg-white rounded-xl shadow-md overflow-hidden group transition duration-300 hover:shadow-xl relative">

          <!-- Image Container with Overlay -->
          <div class="h-64 overflow-hidden relative">
            <div
              class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10 flex items-end justify-start p-4"
              @click="
                openModal = true;
                selectedProduct = {
                  title: '<?php echo e($item->title); ?>',
                  description: `<?php echo addslashes($item->description); ?>`,
                  image: '<?php echo e(asset('storage/' . $item->image)); ?>'
                }
              "
            >
              <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                <span class="inline-block bg-white/90 backdrop-blur-sm text-blue-700 px-3 py-1 rounded-full text-sm font-semibold cursor-pointer">
                  Lihat Detail
                </span>
              </div>
            </div>

            <img
              src="<?php echo e(asset('storage/' . $item->image)); ?>"
              alt="<?php echo e($item->title); ?>"
              class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
            />
          </div>

          <!-- Content -->
          <div class="p-6 relative">
            <!-- Product Title with bottom accent line -->
            <h3 class="text-xl font-bold text-gray-800 mb-3">
              <?php echo e($item->title); ?>

              <div class="h-0.5 w-12 bg-gradient-to-r from-blue-500 to-cyan-400 mt-2 group-hover:w-full transition-all duration-300"></div>
            </h3>

            <!-- Description with height limit -->
            <div class="text-gray-600 mb-6 text-sm line-clamp-2 h-18 overflow-hidden">
              <?php echo $item->description; ?>

            </div>

            <!-- Button with consistent styling -->
            <a href="https://wa.me/<?php echo e($kontak ? preg_replace('/[^0-9]/', '', $kontak->no_telepon) : '6281234567890'); ?>?text=Halo%2C%20saya%20tertarik%20dengan%20produk%20*<?php echo e(urlencode($item->title)); ?>*%20yang%20ada%20di%20website%20Anda.%20Mohon%20informasi%20lebih%20lanjut.%20Terima%20kasih."
               target="_blank"
               class="block w-full">
              <button class="w-full group relative overflow-hidden px-6 py-3 rounded-lg font-bold text-white bg-gradient-to-r from-blue-600 to-blue-500 shadow-lg hover:shadow-blue-500/30">
                <span class="relative z-10 flex items-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                  </svg>
                  Hubungi Kami
                </span>

                <!-- Button background effect -->
                <span class="absolute inset-0 bg-gradient-to-r from-blue-500 to-cyan-500 transform group-hover:translate-y-0 -translate-y-full transition-transform duration-500 ease-in-out"></span>
                <span class="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-500 transform group-hover:translate-y-full translate-y-0 transition-transform duration-500 ease-in-out"></span>

                <!-- Button shine effect -->
                <span class="absolute inset-0 w-full bg-gradient-to-tr from-transparent via-white/20 to-transparent blur-sm transform group-hover:-translate-x-0 -translate-x-full transition-transform duration-500 ease-in-out"></span>
              </button>
            </a>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php for($i = 0; $i < 3; $i++): ?>
          <div class="bg-white rounded-xl shadow-md overflow-hidden group transition duration-300 hover:shadow-xl relative">
            <!-- Fallback product items dengan styling yang konsisten -->
            <?php if($i === 0): ?>
              <div class="absolute top-4 left-0 bg-gradient-to-r from-blue-600 to-blue-500 text-white text-xs font-bold px-4 py-1 rounded-r z-10 shadow-md">
                Terlaris
              </div>
            <?php endif; ?>

            <!-- Image Container with Overlay -->
            <div class="h-64 overflow-hidden relative">
              <div
                class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10 flex items-end justify-start p-4"
                @click="
                  openModal = true;
                  selectedProduct = {
                    title: 'Atap Metal Premium <?php echo e(['Blue', 'Red', 'Green'][$i]); ?>',
                    description: 'Atap metal berkualitas tinggi dengan lapisan anti karat dan tahan terhadap cuaca ekstrem. Cocok untuk berbagai jenis bangunan dan mudah dalam pemasangan.',
                    image: 'https://readdy.ai/api/search-image?query=high%20quality%20metal%20roofing%20tiles%20in%20<?php echo e(['blue', 'red', 'green'][$i]); ?>%20color%2C%20detailed%20texture%20of%20modern%20roofing%20material%20against%20white%20background%2C%20professional%20product%20photography%20of%20construction%20materials&width=400&height=300&seq=product<?php echo e($i+1); ?>&orientation=landscape'
                  }
                "
              >
                <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                  <span class="inline-block bg-white/90 backdrop-blur-sm text-blue-700 px-3 py-1 rounded-full text-sm font-semibold cursor-pointer">
                    Lihat Detail
                  </span>
                </div>
              </div>

              <img
                src="https://readdy.ai/api/search-image?query=high%20quality%20metal%20roofing%20tiles%20in%20<?php echo e(['blue', 'red', 'green'][$i]); ?>%20color%2C%20detailed%20texture%20of%20modern%20roofing%20material%20against%20white%20background%2C%20professional%20product%20photography%20of%20construction%20materials&width=400&height=300&seq=product<?php echo e($i+1); ?>&orientation=landscape"
                alt="Atap Metal Premium <?php echo e($i+1); ?>"
                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
              />
            </div>

            <!-- Content -->
            <div class="p-6 relative">
              <h3 class="text-xl font-bold text-gray-800 mb-3">
                Atap Metal Premium <?php echo e(['Blue', 'Red', 'Green'][$i]); ?>

                <div class="h-0.5 w-12 bg-gradient-to-r from-blue-500 to-cyan-400 mt-2 group-hover:w-full transition-all duration-300"></div>
              </h3>

              <p class="text-gray-600 mb-6 text-sm line-clamp-3 h-18 overflow-hidden">
                Atap metal berkualitas tinggi dengan lapisan anti karat dan tahan terhadap cuaca ekstrem. Cocok untuk berbagai jenis bangunan dan mudah dalam pemasangan.
              </p>

              <!-- Button dengan styling yang konsisten -->
              <a href="https://wa.me/<?php echo e($kontak ? preg_replace('/[^0-9]/', '', $kontak->no_telepon) : '6281234567890'); ?>?text=Halo%2C%20saya%20tertarik%20dengan%20produk%20*<?php echo e(urlencode('Atap Metal Premium ' . ['Blue', 'Red', 'Green'][$i])); ?>*%20yang%20ada%20di%20website%20Anda.%20Mohon%20informasi%20lebih%20lanjut.%20Terima%20kasih."
                 target="_blank"
                 class="block w-full">
                <button class="w-full group relative overflow-hidden px-6 py-3 rounded-lg font-bold text-white bg-gradient-to-r from-blue-600 to-blue-blue shadow-lg hover:shadow-blue-500/30">
                  <span class="relative z-10 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                    </svg>
                    Hubungi Kami
                  </span>

                <!-- Button background effect -->
                <span class="absolute inset-0 bg-gradient-to-r from-blue-500 to-cyan-500 transform group-hover:translate-y-0 -translate-y-full transition-transform duration-500 ease-in-out"></span>
                <span class="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-500 transform group-hover:translate-y-full translate-y-0 transition-transform duration-500 ease-in-out"></span>

                  <!-- Button shine effect -->
                  <span class="absolute inset-0 w-full bg-gradient-to-tr from-transparent via-white/20 to-transparent blur-sm transform group-hover:-translate-x-0 -translate-x-full transition-transform duration-500 ease-in-out"></span>
                </button>
              </a>
            </div>
          </div>
        <?php endfor; ?>
      <?php endif; ?>
    </div>

    <!-- View All Button with consistent styling -->
    <?php if($showViewAllButton): ?>
    <div class="text-center mt-12">
      <a href="<?php echo e(route('produk.index')); ?>">
        <button class="group relative overflow-hidden px-8 py-3 rounded-lg font-bold text-white bg-gradient-to-r from-blue-600 to-blue-500 shadow-lg hover:shadow-blue-500/30">
          <span class="relative z-10">Lihat Semua Produk</span>

          <!-- Button background effect -->
          <span class="absolute inset-0 bg-gradient-to-r from-blue-500 to-cyan-500 transform group-hover:translate-y-0 -translate-y-full transition-transform duration-500 ease-in-out"></span>
          <span class="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-500 transform group-hover:translate-y-full translate-y-0 transition-transform duration-500 ease-in-out"></span>

          <!-- Button shine effect -->
          <span class="absolute inset-0 w-full bg-gradient-to-tr from-transparent via-white/20 to-transparent blur-sm transform group-hover:-translate-x-0 -translate-x-full transition-transform duration-500 ease-in-out"></span>
        </button>
      </a>
    </div>
    <?php endif; ?>
  </div>

  <!-- Product Detail Modal -->
  <div
    class="fixed inset-0 z-50 overflow-y-auto"
    x-show="openModal"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    style="display: none;"
  >
    <!-- Modal Backdrop -->
    <div class="fixed inset-0 bg-black/70" @click="openModal = false"></div>

    <!-- Modal Content -->
    <div class="flex items-center justify-center min-h-screen px-4 py-8 text-center sm:p-0">
      <div
        class="relative inline-block w-full max-w-3xl overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl sm:rounded-2xl"
        x-show="openModal"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-95"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-95"
      >
        <!-- Close Button -->
        <button
          @click="openModal = false"
          class="absolute right-4 top-4 z-50 p-2 text-gray-600 hover:text-gray-900 focus:outline-none bg-white/80 backdrop-blur-sm rounded-full shadow hover:shadow-md transition-all"
        >
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>

        <div class="flex flex-col lg:flex-row max-h-[90vh]">
          <!-- Product Image -->
          <div class="w-full lg:w-1/2 h-64 lg:h-auto">
            <img
              :src="selectedProduct.image"
              :alt="selectedProduct.title"
              class="w-full h-full object-cover object-center"
            />
          </div>

          <!-- Product Details -->
          <div class="w-full lg:w-1/2 p-6 lg:p-8 flex flex-col max-h-[90vh] lg:max-h-none">
            <div class="inline-flex w-max items-center px-3 py-1 rounded-full bg-blue-100 mb-4">
              <span class="w-2 h-2 rounded-full bg-blue-500 mr-2"></span>
              <span class="text-sm font-semibold uppercase tracking-wider text-blue-700">Detail Produk</span>
            </div>

            <h3 class="text-2xl font-bold text-gray-800 mb-4" x-text="selectedProduct.title"></h3>
            <div class="h-1 w-16 bg-gradient-to-r from-blue-500 to-cyan-400 mb-6"></div>

            <!-- Scrollable description container -->
            <div class="overflow-y-auto flex-1 mb-6 pr-2 custom-scrollbar">
              <div class="prose prose-blue max-w-none text-gray-600 h-[6rem]" x-html="selectedProduct.description"></div>
            </div>

            <!-- CTA Button with consistent styling -->
            <a :href="`https://wa.me/<?php echo e($kontak ? preg_replace('/[^0-9]/', '', $kontak->no_telepon) : '6281234567890'); ?>?text=Halo%2C%20saya%20tertarik%20dengan%20produk%20*${selectedProduct.title}*%20yang%20ada%20di%20website%20Anda.%20Mohon%20informasi%20lebih%20lanjut.%20Terima%20kasih.`"
               target="_blank"
               class="block w-full">
              <button class="w-full group relative overflow-hidden px-6 py-3 rounded-lg font-bold text-white bg-gradient-to-r from-blue-600 to-blue-500 shadow-lg hover:shadow-blue-500/30">
                <span class="relative z-10 flex items-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                  </svg>
                  Hubungi Kami
                </span>

                <!-- Button background effect -->
                <span class="absolute inset-0 bg-gradient-to-r from-blue-500 to-blue-400 transform group-hover:translate-y-0 -translate-y-full transition-transform duration-500 ease-in-out"></span>
                <span class="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-500 transform group-hover:translate-y-full translate-y-0 transition-transform duration-500 ease-in-out"></span>

                <!-- Button shine effect -->
                <span class="absolute inset-0 w-full bg-gradient-to-tr from-transparent via-white/20 to-transparent blur-sm transform group-hover:-translate-x-0 -translate-x-full transition-transform duration-500 ease-in-out"></span>
              </button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

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
</section><?php /**PATH C:\Users\lenovo\Documents\TherkenalCompro\resources\views/components/home-components/product.blade.php ENDPATH**/ ?>