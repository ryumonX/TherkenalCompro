@props(['keunggulan' => null, 'keunggulanItems' => []])

{{-- Keunggulan Section dengan design seperti testimonial --}}
<section class="py-16 relative overflow-hidden">
  <!-- Container hijau terang untuk membungkus semua -->
  <div class="bg-gradient-to-br from-emerald-400 via-green-400 to-teal-500 min-h-full relative shadow-2xl">
    <!-- Decorative elements pada container hijau -->
    <div class="absolute inset-0 bg-gradient-to-r from-emerald-300/20 via-transparent to-green-300/20"></div>
    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-white/30 to-transparent"></div>
    <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-white/20 to-transparent"></div>
    
    <!-- Inner container dengan background pattern -->
    <div class="bg-gradient-to-br from-white via-green-50/30 to-emerald-50/50 relative m-6 lg:m-8 rounded-2xl lg:rounded-3xl shadow-xl overflow-hidden backdrop-blur-sm">
      <!-- Subtle pattern overlay -->
      <div class="absolute inset-0 opacity-[0.02] pointer-events-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
          <defs>
            <pattern id="grid-pattern" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
              <circle cx="20" cy="20" r="1" fill="currentColor" class="text-emerald-400" />
            </pattern>
          </defs>
          <rect width="100%" height="100%" fill="url(#grid-pattern)" />
        </svg>
      </div>

      <!-- Background decorative elements -->
      <div class="absolute w-[35rem] h-[35rem] bg-gradient-to-r from-emerald-200/40 to-green-200/40 rounded-full mix-blend-multiply filter blur-[120px] opacity-40 -top-[15rem] -right-[15rem]"></div>
      <div class="absolute w-[25rem] h-[25rem] bg-gradient-to-r from-teal-200/30 to-lime-200/30 rounded-full mix-blend-multiply filter blur-[100px] opacity-30 -bottom-[12rem] -left-[12rem]"></div>

      <div class="container mx-auto px-6 sm:px-8 lg:px-12 relative z-10 py-12 lg:py-16">
        <!-- Main content -->
        <div class="flex flex-col lg:flex-row items-start lg:items-center gap-12 lg:gap-20">
          <!-- Left content section -->
          <div class="lg:w-2/5 space-y-8">
            <!-- Header dengan styling konsisten -->
            <div class="space-y-6">
              <!-- Pink dot indicator dengan animation -->
              <div class="flex items-center space-x-3">
                <div class="relative">
                  <div class="w-3 h-3 bg-pink-500 rounded-full animate-pulse"></div>
                  <div class="absolute inset-0 w-3 h-3 bg-pink-300 rounded-full animate-ping"></div>
                </div>
                <span class="text-sm font-semibold text-gray-700 uppercase tracking-wider">
                  {{ $keunggulan->title ?? 'Mengapa Memilih Kami' }}
                </span>
              </div>

              <!-- Title dengan gradient -->
              <h2 class="text-3xl lg:text-4xl font-bold leading-tight">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-emerald-700 to-green-600">
                  {{ $keunggulan->subtitle ?? 'Keunggulan Layanan Kami' }}
                </span>
              </h2>

              <!-- Decorative line -->
              <div class="w-24 h-1 bg-gradient-to-r from-emerald-500 to-green-500 rounded-full"></div>
            </div>

            <!-- Main description dengan styling yang lebih baik -->
            <div class="space-y-4">
              <p class="text-gray-600 text-lg leading-relaxed font-medium">
                {{ $keunggulan->description ?? 'Kami menawarkan solusi atap terbaik dengan berbagai keunggulan yang menjadikan kami pilihan utama pelanggan.' }}
              </p>
              
              <!-- Additional info -->
              <div class="flex items-center space-x-4 text-sm text-gray-500">
                <div class="flex items-center space-x-1">
                  <div class="w-2 h-2 bg-emerald-400 rounded-full"></div>
                  <span>Kualitas Terjamin</span>
                </div>
                <div class="flex items-center space-x-1">
                  <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                  <span>Pelayanan 24/7</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Right side - Large testimonial-style card -->
          <div class="lg:w-3/5 relative">
            @if(count($keunggulanItems) > 0)
              @php $currentItem = $keunggulanItems[0]; @endphp
              
              <!-- Large quote mark dengan styling konsisten -->
              <div class="absolute -top-6 -left-6 text-8xl text-emerald-100 font-serif leading-none z-0 select-none">
                "
              </div>

              <!-- Main card dengan styling yang lebih konsisten -->
              <div class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-xl border border-white/50 p-8 lg:p-12 relative z-10 hover:shadow-2xl transition-all duration-500 group">
                <!-- Gradient border effect -->
                <div class="absolute inset-0 bg-gradient-to-r from-emerald-500/10 via-green-500/10 to-emerald-500/10 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <!-- Content -->
                <div class="relative z-10">
                  <!-- Main title/quote -->
                  <h3 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-6 leading-tight">
                    {{ $currentItem->title ?? 'Kualitas layanan kami adalah yang terdepan.' }}
                  </h3>

                  <!-- Description -->
                  <p class="text-gray-600 text-lg mb-8 leading-relaxed">
                    {{ $currentItem->subtitle ?? 'Solusi terbaik dengan kualitas premium dan pelayanan yang memuaskan setiap pelanggan.' }}
                  </p>

                  <!-- Rating and customer info -->
                  <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                      <!-- Customer avatar -->
                      <div class="flex-shrink-0 relative">
                        @if(!empty($currentItem->image))
                          <img src="{{ asset('storage/' . $currentItem->image) }}" alt="Customer" class="w-14 h-14 rounded-full object-cover border-2 border-white shadow-lg">
                        @else
                          <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-green-600 rounded-full flex items-center justify-center border-2 border-white shadow-lg">
                            <i class="fas fa-user text-white text-xl"></i>
                          </div>
                        @endif
                        <!-- Online indicator -->
                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-emerald-500 rounded-full border-2 border-white"></div>
                      </div>

                      <!-- Rating and name -->
                      <div>
                        <div class="flex items-center space-x-2 mb-1">
                          <span class="text-lg font-bold text-gray-900">5.0/5</span>
                          <div class="flex space-x-1">
                            @for($i = 1; $i <= 5; $i++)
                              <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                              </svg>
                            @endfor
                          </div>
                        </div>
                        <p class="text-sm font-medium text-gray-600">Pelanggan Terpercaya</p>
                      </div>
                    </div>

                    <!-- Trust badge -->
                    <div class="hidden sm:flex items-center space-x-2 bg-emerald-50 px-3 py-2 rounded-full">
                      <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                      <span class="text-xs font-semibold text-emerald-700">Verified</span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Navigation arrows dengan styling konsisten -->
              @if(count($keunggulanItems) > 1)
                <div class="flex items-center justify-center space-x-4 mt-8">
                  <button class="testimonial-prev w-12 h-12 bg-white/90 backdrop-blur-sm rounded-full shadow-lg border border-white/50 flex items-center justify-center hover:bg-emerald-50 hover:border-emerald-200 transition-all duration-300 group">
                    <svg class="w-5 h-5 text-gray-600 group-hover:text-emerald-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                  </button>
                  
                  <!-- Dots indicator -->
                  <div class="flex space-x-2">
                    @foreach($keunggulanItems as $index => $item)
                      <button class="testimonial-dot w-3 h-3 rounded-full transition-all duration-300 {{ $index === 0 ? 'bg-emerald-500' : 'bg-gray-300 hover:bg-gray-400' }}" data-index="{{ $index }}"></button>
                    @endforeach
                  </div>
                  
                  <button class="testimonial-next w-12 h-12 bg-white/90 backdrop-blur-sm rounded-full shadow-lg border border-white/50 flex items-center justify-center hover:bg-emerald-50 hover:border-emerald-200 transition-all duration-300 group">
                    <svg class="w-5 h-5 text-gray-600 group-hover:text-emerald-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                  </button>
                </div>
              @endif

              <!-- Progress bar -->
              @if(count($keunggulanItems) > 1)
                <div class="mt-6 bg-gray-200 rounded-full h-1 overflow-hidden">
                  <div class="testimonial-progress bg-gradient-to-r from-emerald-500 to-green-500 h-1 rounded-full transition-all duration-500 ease-out" style="width: {{ 100 / count($keunggulanItems) }}%"></div>
                </div>
              @endif

              <!-- Hidden data for other items -->
              <div class="hidden" id="keunggulan-data">
                @foreach($keunggulanItems as $index => $item)
                  <div class="keunggulan-item" data-index="{{ $index }}">
                    <div class="title">{{ $item->title }}</div>
                    <div class="subtitle">{{ $item->subtitle }}</div>
                    <div class="image">{{ !empty($item->image) ? asset('storage/' . $item->image) : '' }}</div>
                  </div>
                @endforeach
              </div>
            @else
              <!-- Empty state dengan styling konsisten -->
              <div class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-xl border border-white/50 p-8 lg:p-12 text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-emerald-100 to-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Data Tidak Tersedia</h3>
                <p class="text-gray-600">
                  Saat ini data keunggulan belum tersedia. Silakan tambahkan data melalui panel admin.
                </p>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- JavaScript untuk navigasi yang lebih smooth -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  const keunggulanItems = document.querySelectorAll('.keunggulan-item');
  const prevBtn = document.querySelector('.testimonial-prev');
  const nextBtn = document.querySelector('.testimonial-next');
  const dots = document.querySelectorAll('.testimonial-dot');
  const progressBar = document.querySelector('.testimonial-progress');
  
  if (keunggulanItems.length > 1) {
    let currentIndex = 0;
    let autoRotateInterval;
    
    function updateContent(index) {
      const item = keunggulanItems[index];
      const title = item.querySelector('.title').textContent;
      const subtitle = item.querySelector('.subtitle').textContent;
      const imageSrc = item.querySelector('.image').textContent;
      
      // Update main card content dengan animasi
      const mainCard = document.querySelector('.lg\\:w-3\\/5 .bg-white\\/95');
      const titleElement = mainCard.querySelector('h3');
      const subtitleElement = mainCard.querySelector('p');
      const avatarContainer = mainCard.querySelector('.flex-shrink-0');
      
      // Fade out
      mainCard.style.opacity = '0.7';
      
      setTimeout(() => {
        titleElement.textContent = title;
        subtitleElement.textContent = subtitle;
        
        // Update avatar
        if (imageSrc) {
          avatarContainer.innerHTML = `
            <img src="${imageSrc}" alt="Customer" class="w-14 h-14 rounded-full object-cover border-2 border-white shadow-lg">
            <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-emerald-500 rounded-full border-2 border-white"></div>
          `;
        } else {
          avatarContainer.innerHTML = `
            <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-green-600 rounded-full flex items-center justify-center border-2 border-white shadow-lg">
              <i class="fas fa-user text-white text-xl"></i>
            </div>
            <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-emerald-500 rounded-full border-2 border-white"></div>
          `;
        }
        
        // Fade in
        mainCard.style.opacity = '1';
      }, 200);
      
      // Update dots
      dots.forEach((dot, i) => {
        dot.classList.toggle('bg-emerald-500', i === index);
        dot.classList.toggle('bg-gray-300', i !== index);
      });
      
      // Update progress bar
      if (progressBar) {
        progressBar.style.width = `${((index + 1) / keunggulanItems.length) * 100}%`;
      }
    }
    
    function startAutoRotate() {
      autoRotateInterval = setInterval(() => {
        currentIndex = (currentIndex + 1) % keunggulanItems.length;
        updateContent(currentIndex);
      }, 5000);
    }
    
    function stopAutoRotate() {
      clearInterval(autoRotateInterval);
    }
    
    // Event listeners
    if (prevBtn) {
      prevBtn.addEventListener('click', function() {
        stopAutoRotate();
        currentIndex = (currentIndex - 1 + keunggulanItems.length) % keunggulanItems.length;
        updateContent(currentIndex);
        startAutoRotate();
      });
    }
    
    if (nextBtn) {
      nextBtn.addEventListener('click', function() {
        stopAutoRotate();
        currentIndex = (currentIndex + 1) % keunggulanItems.length;
        updateContent(currentIndex);
        startAutoRotate();
      });
    }
    
    // Dot navigation
    dots.forEach((dot, index) => {
      dot.addEventListener('click', function() {
        stopAutoRotate();
        currentIndex = index;
        updateContent(currentIndex);
        startAutoRotate();
      });
    });
    
    // Start auto-rotate
    startAutoRotate();
    
    // Pause on hover
    const section = document.querySelector('section');
    section.addEventListener('mouseenter', stopAutoRotate);
    section.addEventListener('mouseleave', startAutoRotate);
  }
});
</script>

<!-- Additional CSS untuk animasi yang lebih halus -->
<style>
  .testimonial-progress {
    transition: width 0.5s ease-out;
  }
  
  .testimonial-dot {
    cursor: pointer;
  }
  
  .testimonial-dot:hover {
    transform: scale(1.2);
  }
  
  .group:hover .testimonial-progress {
    animation: pulse 2s infinite;
  }
  
  @keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.7; }
  }
  
  /* Smooth transitions */
  * {
    transition: all 0.3s ease;
  }
</style>