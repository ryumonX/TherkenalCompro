<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['tentangKami' => null]));

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

foreach (array_filter((['tentangKami' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<section id="tentang" class="py-24 relative overflow-hidden bg-gradient-to-br from-gray-50 to-blue-50">
  <!-- Elemen dekoratif -->
  <div class="absolute top-0 right-0 w-96 h-96 bg-blue-500 opacity-5 rounded-full -translate-y-1/2 translate-x-1/2"></div>
  <div class="absolute bottom-0 left-0 w-72 h-72 bg-blue-500 opacity-5 rounded-full translate-y-1/2 -translate-x-1/4"></div>

  <div class="container mx-auto px-6 relative z-10">
    <div class="flex flex-col md:flex-row md:items-start gap-12 lg:gap-16">
      <!-- Bagian gambar dengan efek yang lebih menarik - pindahkan ke atas dan set self-start -->
      <div class="md:w-1/2 group relative md:self-start">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-cyan-500 rounded-xl transform rotate-3 scale-105 opacity-20 group-hover:opacity-30 group-hover:rotate-2 transition-all duration-500"></div>

        <div class="relative overflow-hidden rounded-xl shadow-2xl border-2 border-white">
          <?php if($tentangKami && $tentangKami->image): ?>
            <img
              src="<?php echo e(asset('storage/' . $tentangKami->image)); ?>"
              alt="<?php echo e($tentangKami->title ?? 'Tim Kami'); ?>"
              class="w-full h-full object-cover object-center group-hover:scale-110 transition-transform duration-700 ease-in-out"
            >
          <?php else: ?>
            <img
              src="https://readdy.ai/api/search-image?query=professional%20Indonesian%20construction%20team%20in%20uniform%20standing%20in%20front%20of%20modern%20building%2C%20diverse%20group%20of%20architects%20and%20engineers%20with%20blueprints%2C%20company%20portrait%20with%20blue%20sky%20background&width=600&height=500&seq=about-us&orientation=landscape"
              alt="Tim AtapPro"
              class="w-full h-full object-cover object-center group-hover:scale-110 transition-transform duration-700 ease-in-out"
            >
          <?php endif; ?>

          <!-- Overlay gradient pada gambar -->
          <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-60"></div>

          <!-- Badge profesional -->
          <div class="absolute bottom-4 right-4 bg-white py-2 px-4 rounded-full shadow-lg flex items-center gap-2 transform group-hover:translate-y-0 translate-y-1 transition-transform duration-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
            <span class="font-semibold text-gray-800">Terpercaya & Berkualitas</span>
          </div>
        </div>

        <!-- Accent line -->
        <div class="hidden md:block h-24 w-2 bg-gradient-to-b from-blue-500 to-cyan-400 absolute -left-6 top-1/4 rounded-full"></div>
      </div>

      <!-- Bagian konten dengan desain yang lebih menarik -->
      <div class="md:w-1/2">
        <div class="relative">
          <!-- Title section -->
          <span class="inline-block text-blue-600 font-semibold uppercase tracking-wider bg-blue-100 py-1 px-3 rounded-lg mb-2">
            <?php echo e($tentangKami->title ?? 'Solusi Atap Terbaik Sejak 2015'); ?>

          </span>

          <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-800 mt-2 mb-8 relative">
            <?php echo e($tentangKami->subtitle); ?>

            <div class="h-1 w-24 bg-gradient-to-r from-blue-600 to-cyan-400 mt-4 rounded-full"></div>
          </h2>

          <!-- Description with better spacing and styling -->
          <?php if($tentangKami && $tentangKami->description): ?>
            <div class="text-gray-600 mb-8 leading-relaxed space-y-4">
              <?php echo $tentangKami->description; ?>

            </div>
          <?php else: ?>
            <div class="space-y-6 mb-10">
              <div class="flex items-start gap-4">
                <span class="flex-shrink-0 p-1 rounded-full bg-blue-100 text-blue-600 mt-1">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                </span>
                <p class="text-gray-600 leading-relaxed">
                  AtapPro adalah perusahaan spesialis atap terkemuka di Indonesia yang telah melayani ribuan pelanggan dengan solusi atap berkualitas tinggi. Dengan pengalaman lebih dari 10 tahun, kami telah membangun reputasi sebagai penyedia layanan atap yang terpercaya dan handal.
                </p>
              </div>

              <div class="flex items-start gap-4">
                <span class="flex-shrink-0 p-1 rounded-full bg-blue-100 text-blue-600 mt-1">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                </span>
                <p class="text-gray-600 leading-relaxed">
                  Kami menawarkan berbagai jenis atap dengan material berkualitas tinggi yang tahan lama, anti bocor, dan mampu bertahan dalam berbagai kondisi cuaca ekstrem. Tim profesional kami siap memberikan solusi terbaik untuk kebutuhan atap Anda.
                </p>
              </div>
            </div>
          <?php endif; ?>

          <!-- Button dengan efek keren -->
          <button onclick="window.location.href='/tentang-kami'" class="group relative overflow-hidden px-8 py-3 rounded-lg font-bold text-white bg-gradient-to-r from-blue-600 to-blue-500 shadow-lg hover:shadow-blue-500/30">
            <span class="relative z-10">Pelajari Lebih Lanjut</span>

            <!-- Button background effect -->
            <span class="absolute inset-0 bg-gradient-to-r from-blue-500 to-cyan-500 transform group-hover:translate-y-0 -translate-y-full transition-transform duration-500 ease-in-out"></span>
            <span class="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-500 transform group-hover:translate-y-full translate-y-0 transition-transform duration-500 ease-in-out"></span>

            <!-- Button shine effect -->
            <span class="absolute inset-0 w-full bg-gradient-to-tr from-transparent via-white/20 to-transparent blur-sm transform group-hover:-translate-x-0 -translate-x-full transition-transform duration-500 ease-in-out"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</section><?php /**PATH C:\Users\lenovo\Documents\cv_berkah_usaha\resources\views/components/home-components/tentang-kami.blade.php ENDPATH**/ ?>