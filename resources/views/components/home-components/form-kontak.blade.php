@props(['kontak' => null])

<section class="py-20 relative bg-gradient-to-br from-white to-gray-50 overflow-hidden">
  <!-- Elemen dekoratif -->
  <div class="absolute w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30 -top-48 -right-48"></div>
  <div class="absolute w-96 h-96 bg-cyan-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20 bottom-0 -left-48"></div>

  <!-- Pattern overlay -->
  <div class="absolute inset-0 opacity-[0.03]">
    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
      <pattern id="contact-pattern" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
        <circle cx="20" cy="20" r="1" fill="#4f46e5"></circle>
      </pattern>
      <rect width="100%" height="100%" fill="url(#contact-pattern)"></rect>
    </svg>
  </div>

  <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <!-- Section Header yang lebih menarik -->
    <div class="text-center mb-16 max-w-3xl mx-auto">
      <div class="inline-flex items-center px-3 py-1 rounded-full bg-blue-100 mb-4">
        <span class="w-2 h-2 rounded-full bg-blue-600 mr-2 animate-pulse"></span>
        <span class="text-sm font-semibold uppercase tracking-wider text-blue-800">Kontak Kami</span>
      </div>

      <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
        Hubungi Tim Kami
        <div class="h-1 w-24 bg-gradient-to-r from-blue-600 to-cyan-400 mt-4 mx-auto rounded-full"></div>
      </h2>

      <p class="text-gray-600">
        Kami siap membantu Anda dengan solusi atap terbaik. Hubungi kami melalui form di bawah
        atau kunjungi kantor kami untuk konsultasi langsung.
      </p>
    </div>

    <div class="max-w-6xl mx-auto">
      <!-- Card Container -->
      <div class="bg-white rounded-2xl shadow-xl overflow-hidden relative">
        <!-- Shape accent -->
        <div class="absolute top-0 right-0 w-40 h-40 bg-gradient-to-bl from-blue-100 to-cyan-100 rounded-bl-full opacity-50 -z-0"></div>
        <div class="absolute bottom-0 left-0 w-40 h-40 bg-gradient-to-tr from-blue-100 to-cyan-100 rounded-tr-full opacity-50 -z-0"></div>

        <div class="grid grid-cols-1 lg:grid-cols-5 relative z-10">
          <!-- Contact Information & Map -->
          <div class="lg:col-span-2 bg-gradient-to-br from-blue-600 to-blue-700 text-white p-8 lg:p-12 relative overflow-hidden">
            <!-- Decoration elements -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-x-1/3 -translate-y-1/3"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-white/10 rounded-full translate-x-1/3 translate-y-1/3"></div>

            <!-- Heading -->
            <div class="relative mb-12">
              <h3 class="text-2xl font-bold mb-6">Informasi Kontak</h3>
              <p class="text-blue-100 mb-8">
                Anda dapat menghubungi kami melalui kontak di bawah atau mengunjungi kantor kami selama jam kerja.
              </p>
              <div class="h-1 w-20 bg-white/30 rounded-full"></div>
            </div>

            <!-- Contact Details -->
            <div class="space-y-8 relative">
              <!-- Address -->
              <div class="flex items-start group">
                <div class="flex-shrink-0 h-12 w-12 rounded-full bg-white/10 flex items-center justify-center mr-4 group-hover:bg-white/20 transition-colors">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                </div>
                <div>
                  <h4 class="font-semibold text-lg mb-1">Alamat</h4>
                  <p class="text-blue-100">{{ $kontak->alamat ?? 'Alamat belum tersedia' }}</p>
                </div>
              </div>

              <!-- Phone -->
              <div class="flex items-start group">
                <div class="flex-shrink-0 h-12 w-12 rounded-full bg-white/10 flex items-center justify-center mr-4 group-hover:bg-white/20 transition-colors">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                  </svg>
                </div>
                <div>
                  <h4 class="font-semibold text-lg mb-1">Telepon</h4>
                  <p>
                    <a href="tel:{{ $kontak->no_telepon ?? '' }}" class="text-blue-100 hover:text-white transition-colors">
                      {{ $kontak->no_telepon ?? 'Nomor telepon belum tersedia' }}
                    </a>
                  </p>
                </div>
              </div>

              <!-- Email -->
              <div class="flex items-start group">
                <div class="flex-shrink-0 h-12 w-12 rounded-full bg-white/10 flex items-center justify-center mr-4 group-hover:bg-white/20 transition-colors">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg>
                </div>
                <div>
                  <h4 class="font-semibold text-lg mb-1">Email</h4>
                  <p>
                    <a href="mailto:{{ $kontak->email ?? '' }}" class="text-blue-100 hover:text-white transition-colors">
                      {{ $kontak->email ?? 'Email belum tersedia' }}
                    </a>
                  </p>
                </div>
              </div>

              <!-- Business Hours -->
              <div class="flex items-start group">
                <div class="flex-shrink-0 h-12 w-12 rounded-full bg-white/10 flex items-center justify-center mr-4 group-hover:bg-white/20 transition-colors">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                <div>
                  <h4 class="font-semibold text-lg mb-1">Jam Kerja</h4>
                  <p class="text-blue-100">{!! $kontak->jam_kerja ?? 'Jam kerja belum tersedia' !!}</p>
                </div>
              </div>
            </div>

            <!-- Social Media -->
            <div class="mt-12 pt-6 border-t border-white/20 relative">
              <h4 class="font-semibold mb-4">Ikuti Kami</h4>
              <div class="flex space-x-4">
                @forelse($socialMedia as $social)
                    <a href="{{ $social->link_platform }}" class="h-10 w-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-colors">
                        <img src="{{ asset('storage/' . $social->images->first()->image) }}" alt="{{ $social->platform }}" class="w-7 h-7">
                    </a>
                @empty
                    <a href="#" class="h-10 w-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-colors">
                        <i class="fab fa-instagram"></i>
                    </a>
                @endforelse
              </div>
            </div>
          </div>

          <!-- Contact Form -->
          <div class="lg:col-span-3 p-8 lg:p-12">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Kirim Pesan</h3>

            @if(session('success'))
              <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-lg flex items-start" role="alert">
                <div class="flex-shrink-0">
                  <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                  </svg>
                </div>
                <div class="ml-3">
                  <p class="text-sm text-green-700">{{ session('success') }}</p>
                </div>
              </div>
            @endif

            <form action="{{ route('kirim-pesan') }}" method="POST" class="space-y-6">
              @csrf

              <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name Input -->
                <div class="form-group relative">
                  <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                  <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                      </svg>
                    </div>
                    <input
                      type="text"
                      name="nama"
                      id="nama"
                      required
                      class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 hover:bg-white transition-colors"
                      placeholder="Masukkan nama lengkap"
                      value="{{ old('nama') }}"
                    >
                  </div>
                  @error('nama')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                  @enderror
                </div>

                <!-- Email Input -->
                <div class="form-group relative">
                  <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                  <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                      </svg>
                    </div>
                    <input
                      type="email"
                      name="email"
                      id="email"
                      required
                      class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 hover:bg-white transition-colors"
                      placeholder="Masukkan alamat email"
                      value="{{ old('email') }}"
                    >
                  </div>
                  @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <!-- Phone Input -->
              <div class="form-group relative">
                <label for="no_telepon" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                  </div>
                  <input
                    type="tel"
                    name="no_telepon"
                    id="no_telepon"
                    required
                    class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 hover:bg-white transition-colors"
                    placeholder="Masukkan nomor telepon"
                    value="{{ old('no_telepon') }}"
                  >
                </div>
                @error('no_telepon')
                  <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
              </div>

              <!-- Message Input -->
              <div class="form-group relative">
                <label for="pesan" class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                <div class="relative">
                  <div class="absolute top-3 left-3 flex items-start pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                  </div>
                  <textarea
                    name="pesan"
                    id="pesan"
                    rows="5"
                    required
                    class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 hover:bg-white transition-colors"
                    placeholder="Tuliskan pesan Anda di sini"
                  >{{ old('pesan') }}</textarea>
                </div>
                @error('pesan')
                  <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
              </div>

              <!-- Submit Button dengan desain yang lebih bagus -->
              <div>
                <button type="submit" class="group relative overflow-hidden px-8 py-3 rounded-lg font-bold text-white bg-gradient-to-r from-blue-600 to-blue-500 shadow-lg hover:shadow-blue-500/30 w-full">
                  <span class="relative z-10 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                    Kirim Pesan
                  </span>

                  <!-- Button background effect -->
                  <span class="absolute inset-0 bg-gradient-to-r from-blue-500 to-cyan-500 transform group-hover:translate-y-0 -translate-y-full transition-transform duration-500 ease-in-out"></span>
                  <span class="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-500 transform group-hover:translate-y-full translate-y-0 transition-transform duration-500 ease-in-out"></span>

                  <!-- Button shine effect -->
                  <span class="absolute inset-0 w-full bg-gradient-to-tr from-transparent via-white/20 to-transparent blur-sm transform group-hover:-translate-x-0 -translate-x-full transition-transform duration-500 ease-in-out"></span>
                </button>
              </div>

              <!-- Form note -->
              <div class="text-sm text-gray-500 text-center pt-2">
                <p>Kami akan merespons pesan Anda dalam waktu 1x24 jam kerja</p>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Map Section -->
      <div class="mt-12 rounded-2xl overflow-hidden shadow-lg h-[400px]">
        @if(isset($kontak->embed_map) && !empty($kontak->embed_map))
          <div class="w-full h-full">
            {!! $kontak->embed_map !!}
          </div>
        @else
          <div class="w-full h-full bg-gray-100 flex flex-col items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
            </svg>
            <span class="text-gray-400">Peta lokasi belum tersedia</span>
            <p class="text-gray-400 text-sm mt-2">Silakan hubungi kami untuk informasi alamat lengkap</p>
          </div>
        @endif
      </div>
    </div>
  </div>
</section>
