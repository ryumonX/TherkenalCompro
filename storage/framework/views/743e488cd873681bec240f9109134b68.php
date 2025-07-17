<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['keunggulan' => null, 'keunggulanItems' => []]));

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

foreach (array_filter((['keunggulan' => null, 'keunggulanItems' => []]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>


<section class="py-10 relative bg-gradient-to-br from-blue-50 via-white to-cyan-50 overflow-hidden">
  <!-- Elemen dekoratif yang lebih kompleks -->
  <div class="absolute w-[40rem] h-[40rem] bg-gradient-to-r from-blue-300 to-cyan-200 rounded-full mix-blend-multiply filter blur-[100px] opacity-30 -top-[20rem] -right-[20rem]"></div>
  <div class="absolute w-[30rem] h-[30rem] bg-gradient-to-r from-indigo-200 to-purple-200 rounded-full mix-blend-multiply filter blur-[80px] opacity-20 -bottom-[15rem] -left-[15rem]"></div>

  <!-- Geometric shapes sebagai aksen -->
  <div class="absolute top-20 left-[10%] w-12 h-12 border-2 border-blue-200 rounded-lg transform rotate-12 opacity-70"></div>
  <div class="absolute bottom-32 right-[15%] w-24 h-24 border-4 border-cyan-200 rounded-full transform opacity-80"></div>
  <div class="absolute top-1/3 right-[20%] w-16 h-16 bg-gradient-to-r from-blue-100 to-cyan-100 transform rotate-45 opacity-60"></div>

  <!-- Pattern overlay yang lebih menarik -->
  <div class="absolute inset-0 opacity-[0.03] pointer-events-none">
    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
      <defs>
        <pattern id="dotted-pattern" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
          <circle cx="2" cy="2" r="1" fill="currentColor" />
        </pattern>
        <pattern id="grid-pattern" x="10" y="10" width="40" height="40" patternUnits="userSpaceOnUse" patternTransform="rotate(30)">
          <rect width="1" height="40" fill="currentColor" />
          <rect height="1" width="40" fill="currentColor" />
        </pattern>
      </defs>
      <rect width="100%" height="100%" fill="url(#dotted-pattern)" />
      <rect width="100%" height="100%" fill="url(#grid-pattern)" />
    </svg>
  </div>

  <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <!-- Header Section dengan styling yang lebih canggih -->
    <div class="text-center mb-5 relative">
      <!-- Aksen dekoratif di belakang header -->
      <div class="absolute left-1/2 transform -translate-x-1/2 top-0 -mt-6 w-20 h-1.5 bg-gradient-to-r from-transparent via-blue-500 to-transparent rounded-full opacity-60"></div>

      <div class="inline-flex items-center px-4 py-1.5 rounded-full bg-gradient-to-r from-blue-100 to-cyan-100 mb-4 relative">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-500/10 to-cyan-500/10 blur-sm rounded-full"></div>
        <span class="w-2 h-2 rounded-full bg-blue-600 mr-2 animate-pulse"></span>
        <span class="text-sm font-semibold uppercase tracking-wider text-blue-800 relative">
          <?php echo e($keunggulan->title ?? 'Mengapa Memilih Kami'); ?>

        </span>
      </div>

      <!-- Title yang lebih besar dipindahkan ke atas -->
      <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-1">
        <?php echo e($keunggulan->subtitle ?? 'Keunggulan Layanan Kami'); ?>

      </h2>

      <div class="h-1 w-32 bg-gradient-to-r from-blue-600 via-cyan-400 to-blue-600 mx-auto rounded-full mb-6"></div>

      <p class="text-gray-600 max-w-2xl mx-auto text-lg">
        <?php echo e($keunggulan->description ?? 'Kami menawarkan solusi atap terbaik dengan berbagai keunggulan yang menjadikan kami pilihan utama pelanggan.'); ?>

      </p>
    </div>

    <!-- Features Section dengan layout asimetris dan lebih dinamis -->
    <div class="relative">
      <?php if(count($keunggulanItems) > 4): ?>
        <!-- Link CDN Swiper CSS (ditambahkan hanya jika ada lebih dari 4 item) -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

        <div class="swiper keunggulan-swiper">
          <div class="swiper-wrapper">
            <?php $__empty_1 = true; $__currentLoopData = $keunggulanItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <div class="swiper-slide">
                <!-- Card dengan styling glassmorphism dan efek tilt -->
                <div class="group relative <?php echo e($index % 4 == 1 ? 'lg:mt-12' : ($index % 4 == 2 ? 'lg:mt-6' : ($index % 4 == 3 ? 'lg:mt-16' : ''))); ?>">
                  <!-- Glow effect background -->
                  <div class="absolute -inset-1 rounded-xl bg-gradient-to-r from-blue-600 via-cyan-500 to-blue-500 opacity-0 group-hover:opacity-70 blur-xl transition-all duration-1000 group-hover:duration-300 -z-10"></div>

                  <!-- 3D Tilt Effect Container -->
                  <div class="bg-white bg-opacity-80 backdrop-blur-md rounded-xl shadow-lg border border-gray-600/30 p-8 relative z-10
                      transform transition-all duration-300
                      group-hover:-translate-y-2 group-hover:shadow-xl
                      group-hover:shadow-blue-500/20
                      hover:before:opacity-100 before:opacity-0 before:transition-opacity
                      overflow-hidden
                      flex flex-col items-center">

                    <!-- Gradient overlay pada hover -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-50/80 via-white/80 to-cyan-50/80 opacity-0 group-hover:opacity-100 transition-opacity"></div>

                    <!-- Icon/Image Container dengan efek floating -->
                    <div class="mb-8 relative z-10 flex justify-center w-full">
                      <!-- Accent circles -->
                      <div class="absolute top-0 left-1/2 -translate-x-1/2 w-20 h-20 border border-blue-100 rounded-full animate-pulse-slow opacity-0 group-hover:opacity-100 transition-opacity"></div>
                      <div class="absolute top-2 left-1/2 -translate-x-1/2 w-16 h-16 border border-cyan-100 rounded-full animate-pulse-slow animation-delay-300 opacity-0 group-hover:opacity-100 transition-opacity"></div>

                      <!-- Icon circle dengan efek glow -->
                      <div class="relative inline-flex">
                        <!-- Inner glow -->
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-cyan-500 rounded-full opacity-0 group-hover:opacity-30 blur-md transition-opacity duration-500"></div>

                        <!-- Icon background -->
                        <div class="w-20 h-20 bg-gradient-to-br from-white to-blue-50 rounded-full flex items-center justify-center relative border border-white shadow-lg group-hover:shadow-blue-300/30">
                          <?php if(!empty($item->image)): ?>
                            <img src="<?php echo e(asset('storage/' . $item->image)); ?>" alt="<?php echo e($item->title); ?>" class="w-10 h-10 transform group-hover:scale-110 transition-transform">
                          <?php else: ?>
                            <?php
                              $iconClasses = [
                                "fa-medal", "fa-tools", "fa-certificate", "fa-headset",
                                "fa-shield-alt", "fa-heart", "fa-star", "fa-check-circle"
                              ];
                              $iconClass = $iconClasses[$index % count($iconClasses)];

                              $iconColors = [
                                "from-blue-600 to-blue-700",
                                "from-cyan-500 to-cyan-600",
                                "from-indigo-600 to-blue-700",
                                "from-blue-600 to-cyan-600"
                              ];
                              $iconColor = $iconColors[$index % count($iconColors)];
                            ?>
                            <i class="fas <?php echo e($iconClass); ?> text-transparent bg-clip-text bg-gradient-to-br <?php echo e($iconColor); ?> text-2xl transform group-hover:scale-125 transition-transform"></i>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>

                    <!-- Content dengan efek sliding dan text gradient -->
                    <div class="relative z-10">
                      <!-- Number indicator untuk visibilitas urutan -->
                      <div class="absolute -top-3 -right-1 text-5xl font-bold text-blue-50 group-hover:text-blue-100 transition-colors">
                        <?php echo e(sprintf("%02d", $index + 1)); ?>

                      </div>

                      <!-- Title dengan underline animation yang lebih halus -->
                      <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-blue-700 transition-colors relative">
                        <?php echo e($item->title); ?>

                        <span class="absolute -bottom-1 left-0 w-12 h-0.5 bg-gradient-to-r from-blue-600 to-cyan-500 group-hover:w-full transition-all duration-500 ease-out"></span>
                      </h3>

                      <!-- Description dengan efek fade in -->
                      <p class="text-gray-600 group-hover:text-gray-700 transition-colors">
                        <?php echo e($item->subtitle); ?>

                      </p>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <!-- Empty state dengan penanganan yang lebih elegan -->
              <div class="col-span-1 sm:col-span-2 lg:col-span-4 text-center py-16">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-blue-50 rounded-full mb-6">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Data Tidak Tersedia</h3>
                <p class="text-gray-600 max-w-md mx-auto">
                  Saat ini data keunggulan belum tersedia. Silakan tambahkan data melalui panel admin.
                </p>
              </div>
            <?php endif; ?>
          </div>
        </div>

        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <!-- Inisialisasi Swiper -->
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            const swiperKeunggulan = new Swiper('.keunggulan-swiper', {
              slidesPerView: 1,
              spaceBetween: 30,
              loop: true,
              autoplay: {
                delay: 3000,
                disableOnInteraction: false,
              },
              speed: 800,
              breakpoints: {
                640: {
                  slidesPerView: 2,
                  spaceBetween: 20,
                },
                1024: {
                  slidesPerView: 4,
                  spaceBetween: 30,
                },
              }
            });
          });
        </script>
      <?php else: ?>
        <!-- Tampilan normal grid jika item 4 atau kurang -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-16 relative">
          <?php $__empty_1 = true; $__currentLoopData = $keunggulanItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <!-- Card dengan styling glassmorphism dan efek tilt -->
            <div class="group relative <?php echo e($index % 4 == 1 ? 'lg:mt-12' : ($index % 4 == 2 ? 'lg:mt-6' : ($index % 4 == 3 ? 'lg:mt-16' : ''))); ?>">
              <!-- Glow effect background -->
              <div class="absolute -inset-1 rounded-xl bg-gradient-to-r from-blue-600 via-cyan-500 to-blue-500 opacity-0 group-hover:opacity-70 blur-xl transition-all duration-1000 group-hover:duration-300 -z-10"></div>

              <!-- 3D Tilt Effect Container -->
              <div class="bg-white bg-opacity-80 backdrop-blur-md rounded-xl shadow-lg border border-gray-600/30 p-8 relative z-10
                  transform transition-all duration-300
                  group-hover:-translate-y-2 group-hover:shadow-xl
                  group-hover:shadow-blue-500/20
                  hover:before:opacity-100 before:opacity-0 before:transition-opacity
                  overflow-hidden
                  flex flex-col items-center">

                <!-- Gradient overlay pada hover -->
                <div class="absolute inset-0 bg-gradient-to-br from-blue-50/80 via-white/80 to-cyan-50/80 opacity-0 group-hover:opacity-100 transition-opacity"></div>

                <!-- Icon/Image Container dengan efek floating -->
                <div class="mb-8 relative z-10 flex justify-center w-full">
                  <!-- Accent circles -->
                  <div class="absolute top-0 left-1/2 -translate-x-1/2 w-20 h-20 border border-blue-100 rounded-full animate-pulse-slow opacity-0 group-hover:opacity-100 transition-opacity"></div>
                  <div class="absolute top-2 left-1/2 -translate-x-1/2 w-16 h-16 border border-cyan-100 rounded-full animate-pulse-slow animation-delay-300 opacity-0 group-hover:opacity-100 transition-opacity"></div>

                  <!-- Icon circle dengan efek glow -->
                  <div class="relative inline-flex">
                    <!-- Inner glow -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-cyan-500 rounded-full opacity-0 group-hover:opacity-30 blur-md transition-opacity duration-500"></div>

                    <!-- Icon background -->
                    <div class="w-20 h-20 bg-gradient-to-br from-white to-blue-50 rounded-full flex items-center justify-center relative border border-white shadow-lg group-hover:shadow-blue-300/30">
                      <?php if(!empty($item->image)): ?>
                        <img src="<?php echo e(asset('storage/' . $item->image)); ?>" alt="<?php echo e($item->title); ?>" class="w-10 h-10 transform group-hover:scale-110 transition-transform">
                      <?php else: ?>
                        <?php
                          $iconClasses = [
                            "fa-medal", "fa-tools", "fa-certificate", "fa-headset",
                            "fa-shield-alt", "fa-heart", "fa-star", "fa-check-circle"
                          ];
                          $iconClass = $iconClasses[$index % count($iconClasses)];

                          $iconColors = [
                            "from-blue-600 to-blue-700",
                            "from-cyan-500 to-cyan-600",
                            "from-indigo-600 to-blue-700",
                            "from-blue-600 to-cyan-600"
                          ];
                          $iconColor = $iconColors[$index % count($iconColors)];
                        ?>
                        <i class="fas <?php echo e($iconClass); ?> text-transparent bg-clip-text bg-gradient-to-br <?php echo e($iconColor); ?> text-2xl transform group-hover:scale-125 transition-transform"></i>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>

                <!-- Content dengan efek sliding dan text gradient -->
                <div class="relative z-10">
                  <!-- Number indicator untuk visibilitas urutan -->
                  <div class="absolute -top-3 -right-1 text-5xl font-bold text-blue-50 group-hover:text-blue-100 transition-colors">
                    <?php echo e(sprintf("%02d", $index + 1)); ?>

                  </div>

                  <!-- Title dengan underline animation yang lebih halus -->
                  <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-blue-700 transition-colors relative">
                    <?php echo e($item->title); ?>

                    <span class="absolute -bottom-1 left-0 w-12 h-0.5 bg-gradient-to-r from-blue-600 to-cyan-500 group-hover:w-full transition-all duration-500 ease-out"></span>
                  </h3>

                  <!-- Description dengan efek fade in -->
                  <p class="text-gray-600 group-hover:text-gray-700 transition-colors">
                    <?php echo e($item->subtitle); ?>

                  </p>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <!-- Empty state dengan penanganan yang lebih elegan -->
            <div class="col-span-1 sm:col-span-2 lg:col-span-4 text-center py-16">
              <div class="inline-flex items-center justify-center w-20 h-20 bg-blue-50 rounded-full mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <h3 class="text-xl font-bold text-gray-800 mb-2">Data Tidak Tersedia</h3>
              <p class="text-gray-600 max-w-md mx-auto">
                Saat ini data keunggulan belum tersedia. Silakan tambahkan data melalui panel admin.
              </p>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <!-- Connector lines untuk visual yang lebih menarik pada desktop -->
      <div class="hidden lg:block absolute top-36 left-1/4 w-1/2 h-0.5 bg-gradient-to-r from-transparent via-blue-200 to-transparent"></div>
      <div class="hidden lg:block absolute top-72 left-1/4 w-1/2 h-0.5 bg-gradient-to-r from-transparent via-cyan-200 to-transparent"></div>
    </div>
  </div>
</section>

<style>
  .animate-pulse-slow {
    animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
  }
  .animation-delay-300 {
    animation-delay: 300ms;
  }
  @keyframes pulse {
    0%, 100% {
      opacity: 0.5;
    }
    50% {
      opacity: 0.1;
    }
  }
</style><?php /**PATH C:\Users\lenovo\Documents\TherkenalCompro\resources\views/components/home-components/keunggulan.blade.php ENDPATH**/ ?>