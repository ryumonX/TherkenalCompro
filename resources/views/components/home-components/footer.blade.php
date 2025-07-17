@props(['configWeb' => null, 'kontak' => null, 'socialMedia' => [], 'produk' => null, 'artikel' => null, 'footerProduk' => [], 'footerArtikel' => []])

@php
    $displayProduk = $produk ?? $footerProduk;
    $displayArtikel = $artikel ?? $footerArtikel;
@endphp

<footer class="relative pt-10 pb-6 bg-gray-900 text-white overflow-hidden z-30">

  <!-- Pattern overlay -->
  <div class="absolute inset-0 opacity-[0.03] pointer-events-none">
    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
      <pattern id="footer-pattern" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse" patternContentUnits="userSpaceOnUse">
        <circle id="pattern-circle" cx="20" cy="20" r="1" fill="#059669"></circle>
      </pattern>
      <rect width="100%" height="100%" fill="url(#footer-pattern)"></rect>
    </svg>
  </div>

  <!-- Gradient Blobs -->
  <div class="absolute -top-20 -right-20 w-64 h-64 bg-emerald-600 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>
  <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-emerald-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10"></div>

  <div class="container relative z-10 mx-auto px-6">
    <!-- Main Footer -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-12">
      <!-- Company Info -->
      <div class="lg:col-span-4">
        <div class="flex items-center mb-6">
          @if($configWeb && $configWeb->logo)
            <div class="relative bg-white p-2 rounded-lg shadow-lg">
              <img
                src="{{ asset('storage/' . $configWeb->logo) }}"
                alt="{{ $configWeb->title ?? 'Logo AtapPro' }}"
                class="h-10 w-auto"
              />
              <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-emerald-600 rounded-full flex items-center justify-center text-white text-xs font-bold">
                <i class="fas fa-check"></i>
              </div>
            </div>
          @else
            <div class="relative bg-white p-2 rounded-lg shadow-lg">
              <div class="flex items-center">
                <span class="text-emerald-600 font-bold text-2xl">Atap</span>
                <span class="text-emerald-800 font-extrabold text-2xl">Pro</span>
              </div>
              <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-emerald-600 rounded-full flex items-center justify-center text-white text-xs font-bold">
                <i class="fas fa-check"></i>
              </div>
            </div>
            <h2 class="ml-3 text-2xl font-bold text-white">AtapPro</h2>
          @endif
        </div>

        <h2 class="text-lg mb-2 font-bold">{{ $configWeb->title ?? 'AtapPro' }}</h2>
        <p class="text-gray-400 mb-6 leading-relaxed">
          {{ $configWeb->subtitle ?? 'PT Atap Profesional Indonesia adalah perusahaan spesialis atap terkemuka yang menyediakan solusi atap berkualitas tinggi untuk berbagai jenis bangunan sejak 2010.' }}
        </p>
        <div class="text-md">
            Jam Buka:
            <p class="text-gray-400 leading-relaxed ">
                {!! $kontak->jam_kerja ?? 'Jam kerja belum tersedia' !!}
            </p>
        </div>

        <!-- Social Media -->
        <div class="flex flex-wrap gap-3 mb-8 mt-6">
          @forelse($socialMedia as $social)
            <a href="{{ $social->link_platform }}" class="group" target="_blank">
              <div class="relative">
                <!-- Glow effect -->
                <div class="absolute -inset-0.5 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-full opacity-0 group-hover:opacity-100 blur transition-all duration-500"></div>
                <div class="relative bg-gray-800 p-2 rounded-full hover:bg-gray-700 transition-colors duration-300">
                  <img src="{{ asset('storage/' . $social->images->first()->image) }}" alt="{{ $social->platform }}" class="w-5 h-5">
                </div>
              </div>
            </a>
          @empty
            <a href="#" class="bg-gray-800 p-2 rounded-full hover:bg-gray-700 transition-colors duration-300">
              <i class="fab fa-facebook-f w-5 h-5 flex items-center justify-center"></i>
            </a>
            <a href="#" class="bg-gray-800 p-2 rounded-full hover:bg-gray-700 transition-colors duration-300">
              <i class="fab fa-instagram w-5 h-5 flex items-center justify-center"></i>
            </a>
            <a href="#" class="bg-gray-800 p-2 rounded-full hover:bg-gray-700 transition-colors duration-300">
              <i class="fab fa-youtube w-5 h-5 flex items-center justify-center"></i>
            </a>
          @endforelse
        </div>
      </div>

      <!-- Kontak Kami -->
      <div class="lg:col-span-3">
        <h3 class="text-lg font-bold mb-6 relative inline-block">
          Kontak Kami
          <div class="absolute left-0 bottom-0 h-1 w-10 bg-gradient-to-r from-emerald-600 to-emerald-500"></div>
        </h3>
        <ul class="space-y-4">
          <li class="flex items-start group">
            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-800 group-hover:bg-gray-700 transition-colors duration-300 flex items-center justify-center mr-3">
              <i class="fas fa-map-marker-alt text-emerald-500"></i>
            </div>
            <div>
              <h4 class="text-sm font-medium text-emerald-300 mb-1">Alamat</h4>
              <p class="text-sm text-gray-400">{{ $kontak->alamat ?? 'Jl. Raya Industri No. 123, Kawasan Industri Jababeka, Cikarang, Bekasi 17530' }}</p>
            </div>
          </li>
          <li class="flex items-start group">
            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-800 group-hover:bg-gray-700 transition-colors duration-300 flex items-center justify-center mr-3">
              <i class="fas fa-phone-alt text-emerald-500"></i>
            </div>
            <div>
              <h4 class="text-sm font-medium text-emerald-300 mb-1">Telepon</h4>
              <a href="tel:{{ $kontak->no_telepon ?? '+62 21 8765 4321' }}" class="text-sm text-gray-400">{{ $kontak->no_telepon ?? '+62 21 8765 4321' }}</a>
            </div>
          </li>
          <li class="flex items-start group">
            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-800 group-hover:bg-gray-700 transition-colors duration-300 flex items-center justify-center mr-3">
              <i class="fas fa-envelope text-emerald-500"></i>
            </div>
            <div>
              <h4 class="text-sm font-medium text-emerald-300 mb-1">Email</h4>
              <a href="mailto:{{ $kontak->email ?? 'info@atappro.co.id' }}" class="text-sm text-gray-400">{{ $kontak->email ?? 'info@atappro.co.id' }}</a>
            </div>
          </li>
        </ul>
      </div>

      <!-- Produk -->
      <div class="lg:col-span-2">
        <h3 class="text-lg font-bold mb-6 relative inline-block">
          Produk Terbaru
          <div class="absolute left-0 bottom-0 h-1 w-10 bg-gradient-to-r from-emerald-600 to-emerald-500"></div>
        </h3>
        <ul class="space-y-3">
            @forelse($displayProduk->take(5) as $item)
              <li>
                <a href="{{ route('produk.index', $item->id) }}" class="group flex items-center text-gray-400 hover:text-white transition-colors duration-300">
                  <span class="w-1.5 h-1.5 bg-gray-600 rounded-full mr-2.5 group-hover:bg-emerald-500 transition-colors"></span>
                  {{ $item->title }}
                </a>
              </li>
            @empty
              <li>
                <a href="#" class="group flex items-center text-gray-400 hover:text-white transition-colors duration-300">
                  <span class="w-1.5 h-1.5 bg-gray-600 rounded-full mr-2.5 group-hover:bg-emerald-500 transition-colors"></span>
                  Produk
                </a>
              </li>
            @endforelse
        </ul>
      </div>

      <!-- Artikel -->
      <div class="lg:col-span-3">
        <div>
          <h3 class="text-lg font-bold mb-4 relative inline-block">
            Artikel Terbaru
            <div class="absolute left-0 bottom-0 h-1 w-10 bg-gradient-to-r from-emerald-600 to-emerald-500"></div>
          </h3>
          <div class="space-y-4">
            @forelse($displayArtikel->take(3) as $post)
              <a href="{{ route('artikel.detail', $post->slug) }}" class="group flex gap-3 p-2 rounded-lg hover:bg-gray-800 transition-colors duration-300">
                <div class="flex-shrink-0 w-16 h-16 rounded-lg overflow-hidden">
                  <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                </div>
                <div class="flex-grow min-w-0">
                  <h4 class="font-medium text-sm text-white truncate">{{ $post->title }}</h4>
                  <div class="flex items-center mt-1 text-xs text-gray-500">
                    <i class="far fa-calendar-alt mr-1"></i>
                    <span>{{ $post->post_schedule->format('d F Y') }}</span>
                  </div>
                </div>
              </a>
            @empty
              <a href="#" class="group flex gap-3 p-2 rounded-lg hover:bg-gray-800 transition-colors duration-300">
                <div class="flex-shrink-0 w-16 h-16 rounded-lg overflow-hidden">
                  <img src="https://readdy.ai/api/search-image?query=close%20up%20of%20professional%20roofer%20installing%20metal%20roofing%20tiles&width=100&height=100" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                </div>
                <div class="flex-grow min-w-0">
                  <h4 class="font-medium text-sm text-white truncate">Cara Memilih Atap Terbaik untuk Rumah Anda</h4>
                  <div class="flex items-center mt-1 text-xs text-gray-500">
                    <i class="far fa-calendar-alt mr-1"></i>
                    <span>21 April 2025</span>
                  </div>
                </div>
              </a>
            @endforelse
          </div>
        </div>
      </div>
    </div>

    <!-- Copyright -->
    <div class="border-t border-gray-800 mt-8 pt-8">
        <div class="text-gray-500 text-sm justify-center mx-auto w-max">
          {{ $configWeb->copyright ?? '© 2025 Therkenal. Hak Cipta Dilindungi.' }}
        </div>
    </div>
  </div>
</footer>
