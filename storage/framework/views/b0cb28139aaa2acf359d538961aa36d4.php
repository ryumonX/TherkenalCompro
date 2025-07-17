<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['artikel' => [], 'kategori' => [], 'artikelTerbaru' => []]));

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

foreach (array_filter((['artikel' => [], 'kategori' => [], 'artikelTerbaru' => []]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<section class="py-20 bg-gradient-to-b from-white to-gray-50 relative overflow-hidden">
  <!-- Elemen dekoratif -->
  <div class="absolute w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20 -top-48 -right-48"></div>
  <div class="absolute w-64 h-64 bg-cyan-100 rounded-full mix-blend-multiply filter blur-2xl opacity-20 bottom-24 -left-32"></div>

  <!-- Pattern overlay -->
  <div class="absolute inset-0 opacity-5 pointer-events-none">
    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
      <pattern id="artikel-pattern" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse" patternContentUnits="userSpaceOnUse">
        <circle id="pattern-circle" cx="20" cy="20" r="1" fill="#4f46e5"></circle>
      </pattern>
      <rect width="100%" height="100%" fill="url(#artikel-pattern)"></rect>
    </svg>
  </div>

  <div class="container mx-auto px-4 lg:px-6 relative z-10">
    <!-- Header Section yang lebih menarik -->
    <div class="text-center mb-12">
        <div class="inline-flex items-center px-3 py-1 rounded-full bg-blue-100 mb-4">
          <span class="w-2 h-2 rounded-full bg-blue-500 mr-2"></span>
          <span class="text-sm font-semibold uppercase tracking-wider text-blue-700">Artikel</span>
        </div>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Informasi dan Artikel Kami</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">
          Temukan berbagai artikel informatif seputar atap untuk membantu Anda membuat keputusan terbaik dalam memilih dan merawat atap.
        </p>
    </div>

    <!-- Filter kategori horizontal -->
    <div class="relative mb-12" id="kategori-container">
      <!-- Kategori non-swiper versi desktop (tampil jika kategori <=10) -->
      <div class="hidden md:flex justify-center gap-2 flex-wrap" id="desktop-kategori-static">
        <a href="<?php echo e(route('artikel.index')); ?>" class="py-2 px-4 rounded-full <?php echo e(!request('kategori') ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700'); ?> font-medium hover:bg-blue-700 hover:text-white transition-all">
          Semua Artikel
        </a>

        <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="<?php echo e(route('artikel.index', ['kategori' => $kat->slug])); ?>" class="py-2 px-4 rounded-full <?php echo e(request('kategori') == $kat->slug ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700'); ?> font-medium hover:bg-blue-700 hover:text-white transition-all">
            <?php echo e($kat->title); ?>

          </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>

      <!-- Kategori non-swiper versi mobile (tampil jika kategori <=4) -->
      <div class="flex md:hidden justify-center gap-2 flex-wrap" id="mobile-kategori-static">
        <a href="<?php echo e(route('artikel.index')); ?>" class="py-2 px-4 rounded-full <?php echo e(!request('kategori') ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700'); ?> font-medium hover:bg-blue-700 hover:text-white transition-all">
          Semua Artikel
        </a>

        <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="<?php echo e(route('artikel.index', ['kategori' => $kat->slug])); ?>" class="py-2 px-4 rounded-full <?php echo e(request('kategori') == $kat->slug ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700'); ?> font-medium hover:bg-blue-700 hover:text-white transition-all">
            <?php echo e($kat->title); ?>

          </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>

      <!-- Swiper container (tampil kondisional) -->
      <div class="swiper kategori-swiper overflow-hidden hidden" id="kategori-swiper">
        <div class="swiper-wrapper">
          <!-- Semua Artikel slide -->
          <div class="swiper-slide w-auto">
            <a href="<?php echo e(route('artikel.index')); ?>" class="py-2 px-4 rounded-full <?php echo e(!request('kategori') ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700'); ?> font-medium hover:bg-blue-700 hover:text-white transition-all inline-block whitespace-nowrap">
              Semua Artikel
            </a>
          </div>

          <!-- Kategori slides -->
          <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="swiper-slide w-auto">
              <a href="<?php echo e(route('artikel.index', ['kategori' => $kat->slug])); ?>" class="py-2 px-4 rounded-full <?php echo e(request('kategori') == $kat->slug ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700'); ?> font-medium hover:bg-blue-700 hover:text-white transition-all inline-block whitespace-nowrap">
                <?php echo e($kat->title); ?>

              </a>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>

      <!-- Navigation buttons (optional) -->
      <div class="hidden absolute top-1/2 -left-4 transform -translate-y-1/2 z-10" id="kategori-nav-prev">
        <button class="kategori-swiper-button-prev w-8 h-8 flex items-center justify-center bg-white rounded-full shadow-md hover:bg-gray-100 focus:outline-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
        </button>
      </div>

      <div class="hidden absolute top-1/2 -right-4 transform -translate-y-1/2 z-10" id="kategori-nav-next">
        <button class="kategori-swiper-button-next w-8 h-8 flex items-center justify-center bg-white rounded-full shadow-md hover:bg-gray-100 focus:outline-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </button>
      </div>
    </div>

    <?php if(request('search')): ?>
    <div class="bg-blue-50 rounded-lg p-4 mb-8 flex items-center justify-between">
      <div class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        <p class="text-blue-700">
          Hasil pencarian untuk: <span class="font-semibold"><?php echo e(request('search')); ?></span>
          (<?php echo e($artikel->total()); ?> artikel ditemukan)
        </p>
      </div>
      <a href="<?php echo e(route('artikel.index')); ?>" class="text-blue-600 hover:text-blue-800 flex items-center text-sm">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
        Reset Pencarian
      </a>
    </div>
    <?php endif; ?>

    <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">
      <!-- Bagian Artikel Utama -->
      <div class="lg:w-2/3">
        <!-- Article Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          <?php $__empty_1 = true; $__currentLoopData = $artikel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <!-- Card Artikel dengan desain yang lebih modern -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-xl transition-all duration-300 flex flex-col h-full">
              <!-- Image container dengan efek hover -->
              <div class="relative h-56 overflow-hidden">
                <!-- Badge kategori -->
                <?php if($post->kategori): ?>
                  <div class="absolute top-4 left-0 z-10">
                    <span class="bg-blue-600 text-white text-xs font-bold px-3 py-1.5 rounded-r-full shadow-md">
                      <?php echo e($post->kategori->title); ?>

                    </span>
                  </div>
                <?php endif; ?>

                <!-- Overlay gradient pada hover -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10"></div>

                <img
                  src="<?php echo e(asset('storage/' . $post->thumbnail)); ?>"
                  alt="<?php echo e($post->title); ?>"
                  class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                />

                <!-- Date badge dengan efek yang lebih menarik -->
                <div class="absolute bottom-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full shadow-md flex items-center z-20 transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                  <i class="far fa-calendar-alt text-blue-600 mr-2"></i>
                  <span class="text-gray-800 text-sm font-medium"><?php echo e($post->post_schedule->format('d F Y')); ?></span>
                </div>
              </div>

              <!-- Content -->
              <div class="p-6 flex flex-col flex-grow">
                <a href="<?php echo e(route('artikel.detail', $post->slug)); ?>" class="text-xl font-bold text-gray-800 mb-3 line-clamp-2 group-hover:text-blue-700 transition-colors">
                  <?php echo e($post->title); ?>

                </a>

                <p class="text-gray-600 mb-4 text-sm flex-grow line-clamp-3">
                  <?php echo e($post->preview_description); ?>

                </p>

                <!-- Read more link dengan efek underline animation -->
                <div class="mt-2">
                  <a href="<?php echo e(route('artikel.detail', $post->slug)); ?>" class="inline-flex items-center text-blue-600 font-semibold group/link relative">
                    <span class="relative z-10">
                      Baca Selengkapnya
                      <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-blue-600 group-hover/link:w-full transition-all duration-300 ease-out"></span>
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 transform group-hover/link:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <!-- Empty state yang lebih menarik -->
            <div class="col-span-2 bg-white rounded-xl shadow-lg p-10 text-center">
              <div class="inline-flex items-center justify-center w-20 h-20 bg-blue-50 rounded-full mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
              </div>
              <h3 class="text-xl font-bold text-gray-800 mb-2">Belum Ada Artikel</h3>
              <p class="text-gray-600 max-w-md mx-auto">
                Saat ini belum ada artikel yang tersedia. Artikel baru akan ditampilkan di sini setelah dipublikasikan.
              </p>

              <!-- Refresh button -->
              <button onclick="window.location.reload()" class="mt-6 inline-flex items-center px-4 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
                Muat Ulang
              </button>
            </div>
          <?php endif; ?>
        </div>

        <!-- Pagination styling yang lebih modern -->
        <?php if(isset($artikel) && !is_array($artikel) && method_exists($artikel, 'hasPages')): ?>
          <div class="mt-12 flex justify-center">
            <div class="pagination">
              <?php echo e($artikel->onEachSide(1)->links()); ?>

            </div>
          </div>
        <?php endif; ?>
      </div>

      <!-- Sidebar yang diperbarui -->
      <div class="lg:w-1/3 space-y-8">
        <!-- Search Box -->
        <div class="bg-white rounded-xl shadow-lg p-6 relative backdrop-blur-sm bg-opacity-90 border border-gray-100">
          <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
            <span class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </span>
            Cari Artikel
          </h3>

          <form action="<?php echo e(route('artikel.index')); ?>" method="GET" class="relative">
            <div class="relative">
              <input
                type="text"
                name="search"
                placeholder="Kata kunci..."
                value="<?php echo e(request('search')); ?>"
                class="w-full bg-gray-50 border border-gray-200 rounded-lg py-3 px-4 pr-12 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm transition-all"
              />

              <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 bg-blue-600 text-white w-8 h-8 rounded-full flex items-center justify-center hover:bg-blue-700 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
              </button>
            </div>
          </form>
        </div>

        <!-- Kategori -->
        <div class="bg-white rounded-xl shadow-lg p-6 relative backdrop-blur-sm bg-opacity-90 border border-gray-100">
          <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
            <span class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
              </svg>
            </span>
            Kategori
          </h3>

          <ul class="space-y-3">
            <?php $__empty_1 = true; $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <li class="group">
                <a href="<?php echo e(route('artikel.index', ['kategori' => $kat->slug])); ?>" class="flex items-center justify-between py-2 px-3 rounded-lg hover:bg-blue-50 transition-all <?php echo e(request('kategori') == $kat->slug ? 'bg-blue-50' : ''); ?>">
                  <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600 mr-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="<?php echo e(request('kategori') == $kat->slug ? 'text-blue-700 font-medium' : 'text-gray-600'); ?> group-hover:text-blue-700 transition-colors"><?php echo e($kat->title); ?></span>
                  </div>

                  <!-- Counter badge -->
                  <span class="<?php echo e(request('kategori') == $kat->slug ? 'bg-blue-200 text-blue-800' : 'bg-gray-100 text-gray-600'); ?> group-hover:bg-blue-200 group-hover:text-blue-800 text-xs px-2 py-1 rounded-full transition-colors">
                    <?php echo e($kat->artikels->count()); ?>

                  </span>
                </a>
              </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <li class="p-3 bg-blue-50 rounded-lg text-center">
                <p class="text-gray-500 text-sm">Belum ada kategori</p>
                <p class="text-blue-600 text-xs mt-1">Kategori akan ditampilkan di sini</p>
              </li>
            <?php endif; ?>
          </ul>
        </div>

        <!-- Artikel Terbaru dengan desain yang lebih menarik -->
        <div class="bg-white rounded-xl shadow-lg p-6 relative backdrop-blur-sm bg-opacity-90 border border-gray-100">
          <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
            <span class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
              </svg>
            </span>
            Artikel Terbaru
          </h3>

          <div class="space-y-6">
            <?php $__empty_1 = true; $__currentLoopData = $artikelTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $recent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <div class="group">
                <a href="<?php echo e(route('artikel.detail', $recent->slug)); ?>" class="flex gap-4 rounded-lg p-2 hover:bg-gray-50 transition-all">
                  <!-- Image dengan border dan effect -->
                  <div class="flex-shrink-0 w-20 h-20 relative overflow-hidden rounded-lg">
                    <!-- Overlay pada hover -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10"></div>

                    <img
                      src="<?php echo e(asset('storage/' . $recent->thumbnail)); ?>"
                      alt="<?php echo e($recent->title); ?>"
                      class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                    />

                    <!-- Numbering badge -->
                    <div class="absolute top-0 left-0 bg-blue-600 text-white text-xs font-bold w-5 h-5 flex items-center justify-center">
                      <?php echo e($index + 1); ?>

                    </div>
                  </div>

                  <div class="flex-grow">
                    <h4 class="font-medium text-gray-800 line-clamp-2 group-hover:text-blue-700 transition-colors">
                      <?php echo e($recent->title); ?>

                    </h4>

                    <div class="flex items-center mt-1 text-sm text-gray-500">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                      </svg>
                      <?php echo e($recent->post_schedule->format('d F Y')); ?>

                    </div>
                  </div>
                </a>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <div class="p-3 bg-blue-50 rounded-lg text-center">
                <p class="text-gray-500 text-sm">Belum ada artikel terbaru</p>
              </div>
            <?php endif; ?>
          </div>

          <!-- Lihat semua artikel button -->
          <div class="mt-6 text-center">
            <a href="<?php echo e(route('artikel.index')); ?>" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-blue-100 text-gray-800 hover:text-blue-700 rounded-lg transition-colors">
              <span>Lihat Semua Artikel</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </a>
          </div>
        </div>

        <!-- Widget Banner Promo -->
        <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-xl shadow-lg p-6 text-white relative overflow-hidden">
          <div class="absolute top-0 right-0 w-40 h-40 bg-white/10 rounded-full -translate-x-20 -translate-y-20 blur-2xl"></div>

          <h3 class="text-xl font-bold mb-4 relative">Butuh Bantuan?</h3>

          <div class="relative">
            <h4 class="text-lg font-semibold mb-2">Konsultasi Gratis</h4>
            <p class="text-blue-100 text-sm mb-4">Dapatkan konsultasi gratis untuk kebutuhan atap rumah atau bangunan Anda dari tim ahli kami.</p>
            <a href="/kontak" class="inline-flex items-center text-white bg-white/20 hover:bg-white/30 px-4 py-2 rounded-lg text-sm font-medium transition-colors">
              Hubungi Kami
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
/* Laravel Pagination Styling */
.pagination {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 0.5rem;
}

.pagination > nav {
  display: flex;
  align-items: center;
  background: white;
  padding: 0.5rem;
  border-radius: 0.5rem;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

.pagination .flex.justify-between.flex-1 {
  display: none; /* Hide text info */
}

.pagination svg {
  width: 1.25rem;
  height: 1.25rem;
}

.pagination .relative.inline-flex.items-center {
  padding: 0.5rem;
  border-radius: 0.375rem;
  transition: all 0.2s;
}

.pagination .relative.inline-flex.items-center:hover {
  background-color: rgba(59, 130, 246, 0.1);
}

.pagination .relative.inline-flex.items-center[aria-current="page"] {
  background-color: rgba(59, 130, 246, 1);
  color: white;
  font-weight: 600;
}

.pagination .relative.inline-flex.items-center[aria-disabled="true"] {
  opacity: 0.5;
  cursor: not-allowed;
}

.pagination span.px-4.py-2 {
  padding: 0.5rem 0.75rem;
}

/* Hover and transition effects */
.pagination a, .pagination button, .pagination span {
  transition: all 0.2s;
}
</style>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const kategoriCount = <?php echo e(count($kategori)); ?> + 1; // +1 untuk "Semua Artikel"
    const isMobile = window.innerWidth < 768;

    const desktopStaticEl = document.getElementById('desktop-kategori-static');
    const mobileStaticEl = document.getElementById('mobile-kategori-static');
    const swiperEl = document.getElementById('kategori-swiper');
    const navPrevEl = document.getElementById('kategori-nav-prev');
    const navNextEl = document.getElementById('kategori-nav-next');

    let swiperInstance = null;

    function setupView() {
      if (isMobile) {
        // Untuk mobile: tampilkan swiper jika kategori > 4
        if (kategoriCount > 4) {
          mobileStaticEl.classList.add('hidden');
          swiperEl.classList.remove('hidden');
          navPrevEl.classList.remove('hidden');
          navNextEl.classList.remove('hidden');
          initSwiper();
        } else {
          mobileStaticEl.classList.remove('hidden');
          swiperEl.classList.add('hidden');
          navPrevEl.classList.add('hidden');
          navNextEl.classList.add('hidden');
        }
        // Untuk mobile, selalu sembunyikan versi desktop
        desktopStaticEl.classList.add('hidden');
      } else {
        // Untuk desktop: tampilkan swiper jika kategori > 10
        if (kategoriCount > 10) {
          desktopStaticEl.classList.add('hidden');
          swiperEl.classList.remove('hidden');
          navPrevEl.classList.remove('hidden');
          navNextEl.classList.remove('hidden');
          initSwiper();
        } else {
          desktopStaticEl.classList.remove('hidden');
          swiperEl.classList.add('hidden');
          navPrevEl.classList.add('hidden');
          navNextEl.classList.add('hidden');
        }
        // Untuk desktop, selalu sembunyikan versi mobile
        mobileStaticEl.classList.add('hidden');
      }
    }

    function initSwiper() {
      // Hanya inisialisasi swiper jika belum ada instance
      if (!swiperInstance) {
        swiperInstance = new Swiper('.kategori-swiper', {
          slidesPerView: 'auto',
          spaceBetween: 8,
          freeMode: true,
          grabCursor: true,
          mousewheel: {
            forceToAxis: true,
          },
          navigation: {
            nextEl: '.kategori-swiper-button-next',
            prevEl: '.kategori-swiper-button-prev',
          }
        });
      }
    }

    // Initial setup
    setupView();

    // Setup ulang saat resize
    window.addEventListener('resize', function() {
      const wasMobile = isMobile;
      isMobile = window.innerWidth < 768;

      // Hanya lakukan setup ulang jika status mobile/desktop berubah
      if (wasMobile !== isMobile) {
        setupView();
      }
    });
  });
</script><?php /**PATH D:\coding\Therkenal\therkenal\resources\views/components/home-components/artikel-list.blade.php ENDPATH**/ ?>