@props(['artikel' => [], 'kategoriArtikel' => [], 'socialMedia' => []])

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

  <div class="container mx-auto px-4 lg:px-0 relative z-10">
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

    <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">
      <!-- Bagian Artikel Utama -->
      <div class="lg:w-2/3">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          @forelse($artikel->take(2) as $post)
            <!-- Card Artikel dengan desain yang lebih modern -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-xl transition-all duration-300 flex flex-col h-full">
              <!-- Image container dengan efek hover -->
              <div class="relative h-56 overflow-hidden">
                <!-- Badge kategori -->
                @if($post->kategori)
                  <div class="absolute top-4 left-0 z-10">
                    <span class="bg-blue-600 text-white text-xs font-bold px-3 py-1.5 rounded-r-full shadow-md">
                      {{ $post->kategori->title }}
                    </span>
                  </div>
                @endif

                <!-- Overlay gradient pada hover -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10"></div>

                <img
                  src="{{ asset('storage/' . $post->thumbnail) }}"
                  alt="{{ $post->title }}"
                  class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                />

                <!-- Date badge dengan efek yang lebih menarik -->
                <div class="absolute bottom-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full shadow-md flex items-center z-20 transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                  <i class="far fa-calendar-alt text-blue-600 mr-2"></i>
                  <span class="text-gray-800 text-sm font-medium">{{ $post->post_schedule->format('d F Y') }}</span>
                </div>
              </div>

              <!-- Content -->
              <div class="p-6 flex flex-col flex-grow">
                <a href="{{ route('artikel.detail', $post->slug) }}" target="_blank" class="text-xl font-bold text-gray-800 mb-3 line-clamp-2 group-hover:text-blue-700 transition-colors">
                  {{ $post->title }}
                </a>

                <p class="text-gray-600 mb-4 text-sm flex-grow line-clamp-3">
                  {{ $post->preview_description }}
                </p>

                <!-- Read more link dengan efek underline animation -->
                <div class="mt-2">
                  <a href="{{ route('artikel.detail', $post->slug) }}" target="_blank" class="inline-flex items-center text-blue-600 font-semibold group/link relative">
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
          @empty
            <!-- Empty state yang lebih elegan -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-xl transition-all duration-300 flex flex-col h-full">
              <div class="relative h-56 overflow-hidden bg-blue-50">
                <div class="absolute top-4 left-0 z-10">
                  <span class="bg-blue-600 text-white text-xs font-bold px-3 py-1.5 rounded-r-full shadow-md">
                    Tutorial
                  </span>
                </div>

                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10"></div>

                <img
                  src="https://readdy.ai/api/search-image?query=close%20up%20of%20professional%20roofer%20installing%20metal%20roofing%20tiles%2C%20detailed%20view%20of%20roofing%20construction%20process%2C%20worker%20hands%20with%20tools%20fixing%20modern%20roof%20material&width=500&height=300&seq=article1&orientation=landscape"
                  alt="Cara Memilih Atap Terbaik"
                  class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                />

                <div class="absolute bottom-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full shadow-md flex items-center z-20 transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                  <i class="far fa-calendar-alt text-blue-600 mr-2"></i>
                  <span class="text-gray-800 text-sm font-medium">21 April 2025</span>
                </div>
              </div>

              <div class="p-6 flex flex-col flex-grow">
                <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-blue-700 transition-colors">
                  Cara Memilih Atap Terbaik untuk Rumah Anda
                </h3>

                <p class="text-gray-600 mb-4 text-sm flex-grow">
                  Panduan lengkap untuk memilih material atap yang sesuai dengan kebutuhan, anggaran, dan kondisi lingkungan Anda.
                </p>

                <div class="mt-2">
                  <a href="#" class="inline-flex items-center text-blue-600 font-semibold group/link relative">
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

            <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-xl transition-all duration-300 flex flex-col h-full">
              <div class="relative h-56 overflow-hidden bg-blue-50">
                <div class="absolute top-4 left-0 z-10">
                  <span class="bg-blue-600 text-white text-xs font-bold px-3 py-1.5 rounded-r-full shadow-md">
                    Tips
                  </span>
                </div>

                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10"></div>

                <img
                  src="https://readdy.ai/api/search-image?query=roof%20maintenance%20inspection%20with%20professional%20checking%20for%20damage%2C%20worker%20examining%20roof%20tiles%20for%20leaks%20and%20wear%2C%20preventive%20roofing%20maintenance%20service%20in%20action&width=500&height=300&seq=article2&orientation=landscape"
                  alt="Perawatan Atap"
                  class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                />

                <div class="absolute bottom-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full shadow-md flex items-center z-20 transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                  <i class="far fa-calendar-alt text-blue-600 mr-2"></i>
                  <span class="text-gray-800 text-sm font-medium">15 April 2025</span>
                </div>
              </div>

              <div class="p-6 flex flex-col flex-grow">
                <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-blue-700 transition-colors">
                  5 Tips Perawatan Atap agar Tahan Lama
                </h3>

                <p class="text-gray-600 mb-4 text-sm flex-grow">
                  Pelajari cara merawat atap rumah Anda agar tetap dalam kondisi prima dan terhindar dari kerusakan yang tidak diinginkan.
                </p>

                <div class="mt-2">
                  <a href="#" class="inline-flex items-center text-blue-600 font-semibold group/link relative">
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
          @endforelse
        </div>

        <!-- Button dengan styling konsisten -->
        <div class="text-center mt-12">
          <a href="{{ route('artikel.index') }}">
            <button class="group relative overflow-hidden px-8 py-3 rounded-lg font-bold text-white bg-gradient-to-r from-blue-600 to-blue-500 shadow-lg hover:shadow-blue-500/30">
              <span class="relative z-10">Lihat Semua Artikel</span>

              <!-- Button background effect -->
              <span class="absolute inset-0 bg-gradient-to-r from-blue-500 to-cyan-500 transform group-hover:translate-y-0 -translate-y-full transition-transform duration-500 ease-in-out"></span>
              <span class="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-500 transform group-hover:translate-y-full translate-y-0 transition-transform duration-500 ease-in-out"></span>

              <!-- Button shine effect -->
              <span class="absolute inset-0 w-full bg-gradient-to-tr from-transparent via-white/20 to-transparent blur-sm transform group-hover:-translate-x-0 -translate-x-full transition-transform duration-500 ease-in-out"></span>
            </button>
          </a>
        </div>
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

          <form action="{{ route('artikel.index') }}" method="GET" class="relative">
            <div class="relative">
              <input
                type="text"
                name="search"
                placeholder="Cari Artikel..."
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
            @forelse($kategoriArtikel as $kategori)
              <li class="group">
                <a href="{{ route('artikel.index', ['kategori' => $kategori->slug]) }}" class="flex items-center justify-between py-2 px-3 rounded-lg hover:bg-blue-50 transition-all">
                  <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600 mr-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="text-gray-600 group-hover:text-blue-700 transition-colors">{{ $kategori->title }}</span>
                  </div>

                  <!-- Counter badge -->
                  @if(isset($kategori->artikel_count))
                    <span class="bg-gray-100 text-gray-600 group-hover:bg-blue-100 group-hover:text-blue-700 text-xs px-2 py-1 rounded-full transition-colors">
                      {{ $kategori->artikel_count }}
                    </span>
                  @endif
                </a>
              </li>
            @empty
              <li class="p-3 bg-blue-50 rounded-lg text-center">
                <p class="text-gray-500 text-sm">Belum ada kategori</p>
                <p class="text-blue-600 text-xs mt-1">Kategori akan ditampilkan di sini</p>
              </li>
            @endforelse
          </ul>
        </div>

        <!-- Social Media -->
        <div class="bg-white rounded-xl shadow-lg p-6 relative backdrop-blur-sm bg-opacity-90 border border-gray-100">
          <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
            <span class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
              </svg>
            </span>
            Ikuti Kami
          </h3>

          <div class="flex flex-wrap gap-4">
            @forelse($socialMedia as $social)
              <a href="{{ $social->link_platform }}" class="group" target="_blank">
                <div class="relative">
                  <!-- Glow effect -->
                  <div class="absolute -inset-1 rounded-full bg-gradient-to-r from-blue-600 to-cyan-400 opacity-0 group-hover:opacity-70 blur-md transition-all duration-300 group-hover:duration-200"></div>

                  <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-sm border border-gray-200 relative p-2 transform transition-all duration-300 group-hover:scale-110 group-hover:shadow-lg">
                    <img
                      src="{{ asset('storage/' . $social->images->first()->image) }}"
                      alt="{{ $social->platform }}"
                      class="w-full h-full object-contain"
                    >
                  </div>
                </div>
              </a>
            @empty
              <div class="w-full flex flex-wrap gap-4 justify-center">
                <!-- Facebook -->
                <a href="#" class="group">
                  <div class="relative">
                    <div class="absolute -inset-1 rounded-full bg-gradient-to-r from-blue-600 to-blue-400 opacity-0 group-hover:opacity-70 blur-md transition-all duration-300 group-hover:duration-200"></div>
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-sm border border-gray-200 relative transform transition-all duration-300 group-hover:scale-110 group-hover:shadow-lg">
                      <i class="fab fa-facebook-f text-blue-600 text-xl"></i>
                    </div>
                  </div>
                </a>
              </div>
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </div>
</section>