<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['heroGaleriProduk' => null, 'galeriProduk' => []]));

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

foreach (array_filter((['heroGaleriProduk' => null, 'galeriProduk' => []]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>


<section class="py-20 bg-gradient-to-b from-white to-gray-50 relative overflow-hidden">
  <!-- Elemen dekoratif -->
  <div class="absolute w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30 -top-48 -right-48"></div>
  <div class="absolute w-80 h-80 bg-cyan-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30 bottom-0 -left-40"></div>

  <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <!-- Header dengan styling yang lebih menarik -->
    <div class="text-center mb-16">
      <!-- Badge berbentuk pil dengan styling konsisten -->
      <div class="inline-flex items-center px-3 py-1 rounded-full bg-blue-100 mb-4">
        <span class="w-2 h-2 rounded-full bg-blue-600 mr-2"></span>
        <span class="text-sm font-semibold uppercase tracking-wider text-blue-800">
            <?php echo e($heroGaleriProduk->title ?? 'Portofolio Proyek Kami'); ?>

        </span>
      </div>

      <!-- Subtitle (yang sebelumnya title) sekarang jadi subjudul -->
      <h3 class="text-xl md:text-2xl font-semibold text-gray-700 mb-6">
        <?php echo e($heroGaleriProduk->subtitle ?? 'Galeri Proyek Terbaik'); ?>

      </h3>

      <p class="text-gray-600 max-w-3xl mx-auto mb-10">
        <?php echo e($heroGaleriProduk->description ?? 'Lihat hasil pekerjaan kami yang telah memuaskan berbagai klien di seluruh Indonesia.'); ?>

      </p>
    </div>

    <!-- Galeri dengan layout grid -->
    <div class="gallery-container">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php $__empty_1 = true; $__currentLoopData = $galeriProduk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <div class="gallery-item opacity-0 transform translate-y-8 filter-item" data-category="">
            <div class="group relative overflow-hidden rounded-xl shadow-lg transition-all duration-300 hover:shadow-2xl cursor-pointer bg-white lightbox-trigger"
                 data-src="<?php echo e(asset('storage/' . $item->image)); ?>"
                 data-title="<?php echo e($item->title); ?>"
                 data-index="<?php echo e($index); ?>">
              <!-- Image loader overlay -->
              <div class="absolute inset-0 bg-gray-100 z-10 flex items-center justify-center image-loading">
                <div class="w-10 h-10 border-4 border-blue-600 border-t-transparent rounded-full animate-spin"></div>
              </div>

              <!-- Image with advanced hover effects -->
              <div class="overflow-hidden aspect-[4/3]">
                <img
                  src="<?php echo e(asset('storage/' . $item->image)); ?>"
                  alt="<?php echo e($item->title); ?>"
                  class="w-full h-full object-cover object-center transition-all duration-700 group-hover:scale-110 group-hover:brightness-110"
                  onload="this.parentElement.parentElement.classList.add('loaded'); this.parentElement.parentElement.classList.remove('loading');"
                >
              </div>

              <!-- Overlay dengan informasi -->
              <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 p-6 flex flex-col justify-end">
                <h3 class="text-white font-bold text-xl mb-1 transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all delay-150">
                  <?php echo e($item->title); ?>

                </h3>
                <p class="text-gray-200 text-sm transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all delay-200">
                  Klik untuk melihat detail proyek
                </p>
                <a href="<?php echo e(asset('storage/' . $item->image)); ?>" download class="mt-3 inline-flex items-center gap-1 bg-white/20 backdrop-blur-sm text-white text-sm py-1 px-3 rounded-full transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all delay-250 hover:bg-white/30">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                  </svg>
                  Download
                </a>
              </div>

              <!-- Accent corner -->
              <div class="absolute top-0 right-0 w-16 h-16 transform translate-x-8 -translate-y-8 rotate-45 bg-gradient-to-br from-blue-600 to-cyan-400 group-hover:translate-x-0 group-hover:-translate-y-0 transition-transform duration-500 z-5"></div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <!-- No fallback data, just empty state message -->
          <div class="col-span-full text-center py-16">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-blue-50 rounded-full mb-6">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Belum Ada Foto Galeri</h3>
            <p class="text-gray-600 max-w-md mx-auto">
              Saat ini belum ada foto galeri yang ditambahkan. Silakan tambahkan foto melalui panel admin.
            </p>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <!-- View More Button -->
    <div class="text-center mt-14" id="load-more-container" style="display: none;">
      <button id="load-more" class="group relative overflow-hidden px-8 py-3 rounded-lg font-bold text-white bg-gradient-to-r from-blue-600 to-blue-500 shadow-lg hover:shadow-blue-500/30">
        <span class="relative z-10">Lihat Lebih Banyak</span>

        <!-- Button background effect -->
        <span class="absolute inset-0 bg-gradient-to-r from-blue-500 to-cyan-500 transform group-hover:translate-y-0 -translate-y-full transition-transform duration-500 ease-in-out"></span>
        <span class="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-500 transform group-hover:translate-y-full translate-y-0 transition-transform duration-500 ease-in-out"></span>

        <!-- Button shine effect -->
        <span class="absolute inset-0 w-full bg-gradient-to-tr from-transparent via-white/20 to-transparent blur-sm transform group-hover:-translate-x-0 -translate-x-full transition-transform duration-500 ease-in-out"></span>
      </button>
    </div>
  </div>

  
  <div id="lightbox" class="fixed inset-0 bg-black/95 hidden z-50 backdrop-blur-sm transition-opacity duration-300 opacity-0">
    <div class="w-full h-full flex flex-col items-center justify-center p-4 md:p-10 relative">
      <!-- Loading indicator -->
      <div id="lightbox-loader" class="absolute inset-0 flex items-center justify-center bg-black/80 z-20">
        <div class="w-16 h-16 border-4 border-blue-600 border-t-transparent rounded-full animate-spin"></div>
      </div>

      <!-- Image container -->
      <div class="relative w-full max-w-5xl mx-auto h-[75vh] flex items-center justify-center">
        <img id="lightbox-img" src="" alt="" class="max-h-full max-w-full object-contain opacity-0 transition-opacity duration-500">
      </div>

      <!-- Caption area -->
      <div class="w-full max-w-4xl mx-auto mt-4 bg-white/10 backdrop-blur-md rounded-lg p-4 opacity-0 transition-opacity duration-500" id="lightbox-caption-container">
        <div class="flex items-center justify-between">
          <div>
            <h2 id="lightbox-caption" class="text-white text-xl md:text-2xl font-bold"></h2>
            <span id="lightbox-category" class="inline-flex items-center px-3 py-1 rounded-full bg-blue-600 text-white text-xs font-medium mt-2"></span>
          </div>
          <div class="flex items-center gap-4">
            <a id="lightbox-download" href="#" download class="inline-flex items-center gap-1 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
              </svg>
              Download
            </a>
            <div class="text-white text-sm">
              <span id="lightbox-counter"></span>
            </div>
          </div>
        </div>
      </div>

      <!-- Navigation buttons -->
      <button id="prev-btn" class="absolute top-1/2 left-4 md:left-8 -translate-y-1/2 bg-white/10 hover:bg-white/30 backdrop-blur-sm w-10 h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center transition-all">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
      </button>
      <button id="next-btn" class="absolute top-1/2 right-4 md:right-8 -translate-y-1/2 bg-white/10 hover:bg-white/30 backdrop-blur-sm w-10 h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center transition-all">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </button>
      <button id="close-btn" class="absolute top-4 right-4 bg-white/10 hover:bg-white/30 backdrop-blur-sm w-10 h-10 rounded-full flex items-center justify-center transition-all">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </div>
</section>

<?php $__env->startPush('scripts'); ?>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Variables
    const galleryItems = document.querySelectorAll('.gallery-item');
    const filterButtons = document.querySelectorAll('.filter-btn');
    const loadMoreBtn = document.getElementById('load-more');
    const loadMoreContainer = document.getElementById('load-more-container');
    const lightboxTriggers = document.querySelectorAll('.lightbox-trigger');
    const lightboxDownload = document.getElementById('lightbox-download');
    let currentIndex = 0;
    let filteredGallery = [];
    let allImages = [];
    const ITEMS_PER_PAGE = 9; // Meningkatkan ke 9 foto (3x3) untuk tampilan awal

    // Setup gallery items for animation
    galleryItems.forEach((item, index) => {
      setTimeout(() => {
        item.classList.remove('opacity-0', 'translate-y-8');
        item.classList.add('opacity-100', 'translate-y-0', 'transition-all', 'duration-700');
      }, 100 * index);

      // Collect all image data
      const imgElement = item.querySelector('img');
      const lightboxTrigger = item.querySelector('.lightbox-trigger');

      if (lightboxTrigger) {
        const imgSrc = lightboxTrigger.dataset.src;
        const title = lightboxTrigger.dataset.title;
        const category = item.dataset.category || '';

        allImages.push({
          src: imgSrc,
          title: title,
          category: category
        });
      }
    });

    // Make first ITEMS_PER_PAGE items visible, hide rest
    if (galleryItems.length > ITEMS_PER_PAGE) {
      for (let i = ITEMS_PER_PAGE; i < galleryItems.length; i++) {
        galleryItems[i].style.display = 'none';
      }
      loadMoreContainer.style.display = 'block';
    } else {
      // Jika foto kurang dari atau sama dengan ITEMS_PER_PAGE, sembunyikan tombol
      loadMoreContainer.style.display = 'none';
    }

    // Load More functionality
    loadMoreBtn.addEventListener('click', function() {
      let hiddenItems = document.querySelectorAll('.gallery-item[style*="display: none"]');
      const itemsToShow = hiddenItems.length > ITEMS_PER_PAGE ? ITEMS_PER_PAGE : hiddenItems.length;

      // Show next batch of items
      for (let i = 0; i < itemsToShow; i++) {
        hiddenItems[i].style.display = '';
        setTimeout(() => {
          hiddenItems[i].classList.remove('opacity-0', 'translate-y-8');
          hiddenItems[i].classList.add('opacity-100', 'translate-y-0');
        }, 100 * i);
      }

      // Hide button if all items are displayed
      if (document.querySelectorAll('.gallery-item[style*="display: none"]').length === 0) {
        loadMoreContainer.style.display = 'none';
      }
    });

    // Lightbox functionality
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxCaption = document.getElementById('lightbox-caption');
    const lightboxCategory = document.getElementById('lightbox-category');
    const lightboxCounter = document.getElementById('lightbox-counter');
    const lightboxLoader = document.getElementById('lightbox-loader');
    const lightboxCaptionContainer = document.getElementById('lightbox-caption-container');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const closeBtn = document.getElementById('close-btn');

    // Add click handlers to all lightbox triggers
    lightboxTriggers.forEach(trigger => {
      trigger.addEventListener('click', function() {
        const imgSrc = this.dataset.src;
        const title = this.dataset.title;
        const index = parseInt(this.dataset.index) || 0;
        const category = this.parentElement.dataset.category || '';

        openLightbox(imgSrc, title, category, index);
      });
    });

    function openLightbox(imgSrc, caption = '', category = '', index) {
      currentIndex = index;

      // Reset and show loader
      lightboxLoader.style.display = 'flex';
      lightboxImg.style.opacity = '0';
      lightboxCaptionContainer.style.opacity = '0';

      // Set image source and load event
      lightboxImg.src = imgSrc;
      lightboxDownload.href = imgSrc; // Set download link
      lightboxImg.onload = function() {
        setTimeout(() => {
          lightboxLoader.style.display = 'none';
          lightboxImg.style.opacity = '1';
          lightboxCaptionContainer.style.opacity = '1';
        }, 300);
      };

      // Set caption and other info
      lightboxCaption.textContent = caption;
      lightboxCategory.textContent = category || 'Galeri';
      lightboxCounter.textContent = `${index + 1} / ${allImages.length}`;

      // Show lightbox
      lightbox.classList.remove('hidden');
      lightbox.style.display = 'block';
      setTimeout(() => {
        lightbox.style.opacity = '1';
      }, 10);

      document.body.style.overflow = 'hidden';

      // Update filteredGallery based on current filter
      filteredGallery = [...allImages];

      // Check if navigation buttons should be visible
      if (filteredGallery.length <= 1) {
        prevBtn.style.display = 'none';
        nextBtn.style.display = 'none';
      } else {
        prevBtn.style.display = 'flex';
        nextBtn.style.display = 'flex';
      }
    }

    function closeLightbox() {
      lightbox.style.opacity = '0';
      setTimeout(() => {
        lightbox.style.display = 'none';
        lightbox.classList.add('hidden');
        document.body.style.overflow = 'auto';
      }, 300);
    }

    // Navigate to previous image
    prevBtn.addEventListener('click', function() {
      if (filteredGallery.length <= 1) return;

      let prevIndex = currentIndex - 1;
      if (prevIndex < 0) prevIndex = filteredGallery.length - 1;

      const prevImg = filteredGallery[prevIndex];
      openLightbox(prevImg.src, prevImg.title, prevImg.category, prevIndex);
    });

    // Navigate to next image
    nextBtn.addEventListener('click', function() {
      if (filteredGallery.length <= 1) return;

      let nextIndex = currentIndex + 1;
      if (nextIndex >= filteredGallery.length) nextIndex = 0;

      const nextImg = filteredGallery[nextIndex];
      openLightbox(nextImg.src, nextImg.title, nextImg.category, nextIndex);
    });

    // Close lightbox events
    closeBtn.addEventListener('click', closeLightbox);

    lightbox.addEventListener('click', function(e) {
      if (e.target === lightbox) {
        closeLightbox();
      }
    });

    document.addEventListener('keydown', function(e) {
      if (lightbox.style.display === 'block') {
        if (e.key === 'Escape') {
          closeLightbox();
        } else if (e.key === 'ArrowLeft') {
          prevBtn.click();
        } else if (e.key === 'ArrowRight') {
          nextBtn.click();
        }
      }
    });

    // Fix for image loading indicator
    document.querySelectorAll('.gallery-item img').forEach(img => {
      if (img.complete) {
        img.parentElement.parentElement.classList.add('loaded');
        img.parentElement.parentElement.classList.remove('loading');
      }
    });
  });
</script>

<style>
  .filter-btn.active {
    @apply bg-blue-600 text-white;
  }

  .gallery-item {
    transition: opacity 0.5s ease, transform 0.5s ease;
  }

  .loading .image-loading {
    display: flex;
  }

  .loaded .image-loading {
    display: none;
  }
</style>
<?php $__env->stopPush(); ?><?php /**PATH C:\Users\lenovo\Documents\company_profile\resources\views/components/home-components/galeri.blade.php ENDPATH**/ ?>