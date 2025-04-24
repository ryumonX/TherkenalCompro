@props(['artikel', 'kategoriArtikel' => [],'artikelTerkait' => [], 'artikelTerbaru' => []])

@php
// Dynamically load kategoriArtikel if not provided
if (empty($kategoriArtikel)) {
    $kategoriArtikel = \App\Models\KategoriArtikel::whereHas('artikels', function($q) {
        $q->active()->scheduled();
    })->get();
}

// Dynamically load artikelTerbaru if not provided
if (empty($artikelTerbaru)) {
    $artikelTerbaru = \App\Models\Artikel::getLatest(4);
}
@endphp

<section class="py-16 bg-gradient-to-b from-white to-gray-50 relative overflow-hidden">
  <!-- Elemen dekoratif -->
  <div class="absolute top-0 left-0 w-full h-64 bg-gradient-to-r from-blue-50 to-cyan-50 -z-10"></div>
  <div class="absolute w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20 -top-48 -right-48"></div>

  <!-- Progress bar -->
  <div id="reading-progress-bar" class="fixed top-0 left-0 h-1 bg-gradient-to-r from-blue-600 to-cyan-400 z-50" style="width: 0%"></div>

  <div class="container mx-auto px-4 lg:px-0 relative z-10">


    <!-- Article Header -->
    <header class="mb-16 px-4 lg:px-10">
      <!-- Breadcrumb yang lebih modern -->
      <nav class="flex items-center text-sm text-gray-500 mb-8 bg-white py-2 px-4 rounded-lg shadow-sm">
        <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
          </svg>
          Beranda
        </a>
        <div class="mx-2 text-gray-400">/</div>
        <a href="{{ route('artikel.index') }}" class="hover:text-blue-600 transition-colors">Artikel</a>
        <div class="mx-2 text-gray-400">/</div>
        <span class="text-gray-900 font-medium truncate max-w-[200px] sm:max-w-xs">{{ $artikel->title }}</span>
      </nav>

      <!-- Category & Date -->
      <div class="flex flex-wrap items-center gap-4 mb-6">
        @if($artikel->kategori)
        <a href="{{ route('artikel.index', ['kategori' => $artikel->kategori->slug]) }}" class="group">
          <span class="inline-flex items-center px-3 py-1.5 bg-blue-100 text-blue-700 rounded-full text-sm font-medium group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
            </svg>
            {{ $artikel->kategori->title }}
          </span>
        </a>
        @endif

        <time class="text-gray-500 text-sm flex items-center bg-gray-100 px-3 py-1.5 rounded-full">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
          {{ $artikel->post_schedule->format('d F Y') }}
        </time>
      </div>

      <!-- Title -->
      <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 leading-tight mb-8">
        {{ $artikel->title }}
      </h1>

      <!-- Preview Description -->
      <p class="text-xl text-gray-600 leading-relaxed border-l-4 border-blue-500 pl-4 py-2 bg-blue-50 rounded-r-lg italic">
        {{ $artikel->preview_description }}
      </p>
    </header>

    <!-- Main Layout Structure -->
    <div class="flex flex-col-reverse lg:flex-row">
      <!-- Left Content Column -->
      <div class="w-full lg:w-[calc(100%-20rem)] lg:pr-10">

        <!-- Featured Image -->
        <div class="mb-10 ml-0 md:ml-12 max-w-5xl rounded-2xl overflow-hidden shadow-xl relative">
          <img
            src="{{ asset('storage/' . $artikel->thumbnail) }}"
            alt="{{ $artikel->title }}"
            class="w-full h-full object-cover"
          >
          <!-- Image overlay gradient -->
          <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>

          <!-- Image caption -->
          <div class="absolute bottom-0 left-0 right-0 p-4 text-white text-sm">
            <div class="flex justify-between items-end">
              <p>{{ $artikel->title }}</p>
              <span class="bg-black/50 px-2 py-1 rounded text-xs backdrop-blur-sm">{{ $configWeb->title ?? 'Foto' }}</span>
            </div>
          </div>
        </div>

        <!-- Floating Share Button - Versi Sederhana -->
        <div class="hidden md:flex flex-col gap-3 fixed left-8 top-1/3 z-20 bg-white rounded-full shadow-lg p-3">
            <button id="copy-link-button" class="group relative" title="Salin Link" data-tooltip="Salin Link">
              <div class="absolute -inset-1 bg-gradient-to-r from-blue-200 to-cyan-400 rounded-full opacity-0 group-hover:opacity-70 blur-sm transition-all duration-300"></div>
              <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center relative shadow-sm hover:shadow-md transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                </svg>
              </div>
            </button>
        </div>

        <!-- Notifikasi copy sukses - awalnya tersembunyi -->
        <div id="copy-notification" class="fixed bottom-6 left-1/2 transform -translate-x-1/2 bg-black/80 text-white px-4 py-2 rounded-lg opacity-0 transition-opacity duration-300 flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
          Link berhasil disalin!
        </div>

        <!-- Article Content Container -->
        <div class="bg-white rounded-2xl shadow-lg ml-4 p-6 sm:p-10 mb-16 relative">
          <!-- Article Content -->
          <article class="prose prose-lg sm:prose-xl max-w-none article-content">
            {!! $artikel->description !!}
          </article>

          <!-- Tags -->
          @if($artikel->meta_keyword)
          <div class="mt-12 pt-6 border-t border-gray-100">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
              </svg>
              Tags
            </h3>
            <div class="flex flex-wrap gap-2">
              @foreach(explode(',', $artikel->meta_keyword) as $tag)
              <p class="px-3 py-1.5 bg-gray-100 text-gray-600 rounded-full text-sm hover:bg-blue-100 hover:text-blue-700 transition-colors">
                {{ trim($tag) }}
              </p>
              @endforeach
            </div>
          </div>
          @endif

          <!-- Mobile Share Button - Versi Sederhana -->
          <div class="mt-12 pt-6 border-t border-gray-100 md:hidden">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
              </svg>
              Bagikan Artikel
            </h3>
            <div class="flex gap-4">
              <button id="copy-link-button-mobile" class="w-10 h-10 rounded-full bg-blue-500 text-white flex items-center justify-center hover:bg-blue-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                </svg>
              </button>
            </div>
          </div>
        </div>

        <!-- Related Articles -->
        @if(count($artikelTerkait) > 0)
        <div class="mb-16 ml-0 lg:ml-8">
          <div class="flex items-center justify-between mb-8">
            <h3 class="text-2xl font-bold text-gray-900 flex items-center">
              <span class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
              </span>
              Artikel Terkait
            </h3>

            <a href="{{ route('artikel.index') }}" class="text-blue-600 font-medium flex items-center hover:text-blue-800 transition-colors">
              Lihat Semua Artikel
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </a>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($artikelTerkait as $terkait)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-xl transition-all duration-300 h-full flex flex-col">
              <div class="relative h-48 overflow-hidden">
                <!-- Badge kategori -->
                @if($terkait->kategori)
                  <div class="absolute top-4 left-0 z-10">
                    <span class="bg-blue-600 text-white text-xs font-bold px-3 py-1.5 rounded-r-full shadow-md">
                      {{ $terkait->kategori->title }}
                    </span>
                  </div>
                @endif

                <!-- Overlay gradient pada hover -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10"></div>

                <img
                  src="{{ asset('storage/' . $terkait->thumbnail) }}"
                  alt="{{ $terkait->title }}"
                  class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                >

                <!-- Date badge -->
                <div class="absolute bottom-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full shadow-md flex items-center z-20 transform translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                  <span class="text-gray-800 text-sm font-medium">{{ $terkait->post_schedule->format('d F Y') }}</span>
                </div>
              </div>

              <div class="p-6 flex flex-col flex-grow">
                <h4 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2 group-hover:text-blue-700 transition-colors">
                  <a href="{{ route('artikel.detail', $terkait->slug) }}" class="hover:text-blue-600">
                    {{ $terkait->title }}
                  </a>
                </h4>

                <p class="text-gray-600 text-sm line-clamp-3 flex-grow">
                  {{ $terkait->preview_description }}
                </p>

                <div class="mt-4">
                  <a href="{{ route('artikel.detail', $terkait->slug) }}" class="inline-flex items-center text-blue-600 font-semibold group/link relative">
                    <span class="relative z-10">
                      Baca Artikel
                      <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-blue-600 group-hover/link:w-full transition-all duration-300 ease-out"></span>
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 transform group-hover/link:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                  </a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        @endif
      </div>

      <!-- Right Sidebar -->
      <div class="w-full lg:w-96 pr-10 space-y-8 mb-10 lg:mb-0 lg:sticky lg:top-24 lg:self-start">
        <!-- Pencarian -->
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
                placeholder="Kata kunci..."
                value="{{ request('search') }}"
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
            @forelse($kategoriArtikel as $kat)
              <li class="group">
                <a href="{{ route('artikel.index', ['kategori' => $kat->slug]) }}" class="flex items-center justify-between py-2 px-3 rounded-lg hover:bg-blue-50 transition-all {{ request('kategori') == $kat->slug ? 'bg-blue-50' : '' }}">
                  <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600 mr-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="{{ request('kategori') == $kat->slug ? 'text-blue-700 font-medium' : 'text-gray-600' }} group-hover:text-blue-700 transition-colors">{{ $kat->title }}</span>
                  </div>

                  <!-- Counter badge -->
                  <span class="{{ request('kategori') == $kat->slug ? 'bg-blue-200 text-blue-800' : 'bg-gray-100 text-gray-600' }} group-hover:bg-blue-200 group-hover:text-blue-800 text-xs px-2 py-1 rounded-full transition-colors">
                    {{ $kat->artikels->count() }}
                  </span>
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
            @forelse($artikelTerbaru as $index => $recent)
              <div class="group">
                <a href="{{ route('artikel.detail', $recent->slug) }}" class="flex gap-4 rounded-lg p-2 hover:bg-gray-50 transition-all">
                  <!-- Image dengan border dan effect -->
                  <div class="flex-shrink-0 w-20 h-20 relative overflow-hidden rounded-lg">
                    <!-- Overlay pada hover -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10"></div>

                    <img
                      src="{{ asset('storage/' . $recent->thumbnail) }}"
                      alt="{{ $recent->title }}"
                      class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                    />

                    <!-- Numbering badge -->
                    <div class="absolute top-0 left-0 bg-blue-600 text-white text-xs font-bold w-5 h-5 flex items-center justify-center">
                      {{ $index + 1 }}
                    </div>
                  </div>

                  <div class="flex-grow">
                    <h4 class="font-medium text-gray-800 line-clamp-2 group-hover:text-blue-700 transition-colors">
                      {{ $recent->title }}
                    </h4>

                    <div class="flex items-center mt-1 text-sm text-gray-500">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                      </svg>
                      {{ $recent->post_schedule->format('d F Y') }}
                    </div>
                  </div>
                </a>
              </div>
            @empty
              <div class="p-3 bg-blue-50 rounded-lg text-center">
                <p class="text-gray-500 text-sm">Belum ada artikel terbaru</p>
              </div>
            @endforelse
          </div>

          <!-- Lihat semua artikel button -->
          <div class="mt-6 text-center">
            <a href="{{ route('artikel.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-blue-100 text-gray-800 hover:text-blue-700 rounded-lg transition-colors">
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
            @if(isset($kontak) && $kontak)
              <a href="{{ route('kontak') }}" class="inline-flex items-center text-white bg-white/20 hover:bg-white/30 px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                Hubungi Kami
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </a>
            @else
              <a href="{{ route('kontak') }}" class="inline-flex items-center text-white bg-white/20 hover:bg-white/30 px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                Hubungi Kami
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
/* Custom CSS untuk artikel */

  /* Tooltip styling */
  [data-tooltip]::after {
    content: attr(data-tooltip);
    display: none;
    position: absolute;
    left: 120%;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 0.75rem;
    white-space: nowrap;
    z-index: 30;
  }

  [data-tooltip]:hover::after {
    display: block;
  }

.article-content h2 {
  @apply text-2xl font-bold text-gray-800 mt-10 mb-6 border-l-4 border-blue-500 pl-4;
}

.article-content h3 {
  @apply text-xl font-bold text-gray-800 mt-8 mb-4;
}

.article-content p {
  @apply my-6 leading-relaxed;
}

.article-content ul {
  @apply list-disc list-outside pl-6 my-6 space-y-2;
}

.article-content ol {
  @apply list-decimal list-outside pl-6 my-6 space-y-2;
}

.article-content blockquote {
  @apply border-l-4 border-blue-300 bg-blue-50 px-5 py-4 my-8 rounded-r-lg italic text-gray-700;
}

.article-content img {
  @apply rounded-lg shadow-md my-8;
}

.article-content a {
  @apply text-blue-600 hover:text-blue-800 underline font-medium;
}

/* Styling untuk table */
.article-content table {
  @apply min-w-full my-8 border border-gray-200 rounded-lg overflow-hidden;
}

.article-content table th {
  @apply bg-gray-100 px-4 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider border-b;
}

.article-content table td {
  @apply px-4 py-3 border-b border-gray-200 text-sm;
}

/* Animasi untuk progress bar */
@keyframes fadeInDown {
  from {
    opacity: 0;
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-fadeInDown {
  animation: fadeInDown 0.5s ease-out;
}
</style>

<script>
  // Kalkulasi waktu baca
  document.addEventListener('DOMContentLoaded', function() {
    // Hitung waktu baca
    const content = document.querySelector('.article-content');
    if (content) {
      const text = content.textContent;
      const wpm = 225; // kata per menit rata-rata
      const words = text.trim().split(/\s+/).length;
      const readingTime = Math.ceil(words / wpm);

      // Jika ada elemen dengan id reading-time, update teksnya
      const readingTimeElement = document.getElementById('reading-time');
      if (readingTimeElement) {
        readingTimeElement.textContent = `${readingTime} menit membaca`;
      }
    }

    // Progress bar
    const progressBar = document.getElementById('reading-progress-bar');
    if (progressBar) {
      const totalHeight = document.body.scrollHeight - window.innerHeight;

      window.addEventListener('scroll', () => {
        const progress = (window.scrollY / totalHeight) * 100;
        progressBar.style.width = `${progress}%`;
      });
    }

    // Sticky header on scroll
    const header = document.querySelector('header');
    if (header) {
      let lastScrollY = window.scrollY;

      window.addEventListener('scroll', () => {
        if (lastScrollY < window.scrollY) {
          header.classList.add('animate-fadeInDown');
        } else {
          header.classList.remove('animate-fadeInDown');
        }
        lastScrollY = window.scrollY;
      });
    }

    // Highlight active share button when clicked
    const shareButtons = document.querySelectorAll('.share-button');
    shareButtons.forEach(button => {
      button.addEventListener('click', function() {
        this.classList.add('clicked');
        setTimeout(() => {
          this.classList.remove('clicked');
        }, 300);
      });
    });

    // Fungsi untuk menyalin link artikel ke clipboard
    function copyArticleLink() {
      // Mendapatkan URL halaman saat ini
      const currentUrl = window.location.href;

      // Menyalin ke clipboard
      navigator.clipboard.writeText(currentUrl).then(function() {
        // Menampilkan notifikasi sukses
        const notification = document.getElementById('copy-notification');
        notification.classList.remove('opacity-0');
        notification.classList.add('opacity-100');

        // Otomatis menyembunyikan notifikasi setelah 3 detik
        setTimeout(function() {
          notification.classList.remove('opacity-100');
          notification.classList.add('opacity-0');
        }, 3000);
      }).catch(function(err) {
        console.error('Tidak dapat menyalin link: ', err);
        alert('Tidak dapat menyalin link artikel');
      });
    }

    // Menambahkan event listener ke tombol copy
    const copyButton = document.getElementById('copy-link-button');
    if (copyButton) {
      copyButton.addEventListener('click', copyArticleLink);
    }

    // Menambahkan event listener ke tombol copy mobile
    const copyButtonMobile = document.getElementById('copy-link-button-mobile');
    if (copyButtonMobile) {
      copyButtonMobile.addEventListener('click', copyArticleLink);
    }
  });
</script>
