@props(['bannerLayanan' => null, 'bannerLayananItems' => []])

<section class="py-16 md:py-20 lg:py-24 bg-gradient-to-r from-blue-600 to-blue-800 relative overflow-hidden">
    <!-- Background Pattern dengan efek parallax -->
    <div class="absolute inset-0 opacity-10 transform hover:scale-105 transition-transform duration-1000">
        <img
            src="{{ asset('images/banner-layanankami.jpg') }}"
            alt="Background Pattern"
            class="w-full h-full object-cover"
        >
    </div>

    <!-- Elemen dekoratif -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full -translate-y-1/2"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-white opacity-5 rounded-full translate-y-1/3"></div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-10 lg:gap-16">
            <!-- Bagian Kiri - Konten Deskriptif -->
            <div class="lg:w-2/5 text-white">
                <!-- Badge untuk highlight -->
                <div class="inline-flex items-center px-3 py-1 rounded-full bg-white/20 backdrop-blur-sm mb-4">
                    <span class="w-2 h-2 rounded-full bg-cyan-300 mr-2 animate-pulse"></span>
                    <span class="text-sm font-semibold uppercase tracking-wider text-cyan-50"> {{ $bannerLayanan->title ?? 'Solusi Atap Premium untuk Setiap Kebutuhan' }}</span>
                </div>

                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mt-2 mb-6 leading-tight">
                    {{ $bannerLayanan->subtitle ?? 'Solusi Atap Premium untuk Setiap Kebutuhan' }}
                    <div class="h-1 w-24 bg-gradient-to-r from-cyan-300 to-white/70 mt-4 rounded-full"></div>
                </h2>

                <div class="mb-8 leading-relaxed text-blue-100">
                    @if($bannerLayanan && $bannerLayanan->description)
                        {!! nl2br(e($bannerLayanan->description)) !!}
                    @else
                        <p class="mb-4">
                            Kami menyediakan berbagai layanan atap berkualitas tinggi untuk memenuhi kebutuhan Anda.
                            Dari pemasangan atap baru, perbaikan, hingga perawatan rutin, tim profesional kami siap
                            memberikan hasil terbaik dengan standar kualitas tertinggi.
                        </p>
                    @endif
                </div>

                <!-- Button dengan efek keren -->
                <button onclick="window.location.href='/tentang-kami'" class="group relative overflow-hidden px-8 py-3 rounded-lg font-bold text-white bg-gradient-to-r from-blue-500 to-blue-500 shadow-lg hover:shadow-blue-500/30">
                    <span class="relative z-10">Pelajari Lebih Lanjut</span>

                    <!-- Button background effect -->
                    <span class="absolute inset-0 bg-gradient-to-r from-blue-500 to-cyan-500 transform group-hover:translate-y-0 -translate-y-full transition-transform duration-500 ease-in-out"></span>
                    <span class="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-500 transform group-hover:translate-y-full translate-y-0 transition-transform duration-500 ease-in-out"></span>

                    <!-- Button shine effect -->
                    <span class="absolute inset-0 w-full bg-gradient-to-tr from-transparent via-white/20 to-transparent blur-sm transform group-hover:-translate-x-0 -translate-x-full transition-transform duration-500 ease-in-out"></span>
                </button>
            </div>

            <!-- Bagian Kanan - Kartu Layanan dengan slider untuk > 3 item atau grid untuk <= 3 item -->
            <div class="lg:w-3/5 w-full">
                @php
                    $useSlider = (count($bannerLayananItems) > 3) || (empty($bannerLayananItems) && count($layananItems ?? []) > 3);
                @endphp

                @if($useSlider)
                    <!-- Swiper container -->
                    <div class="swiper-layanan-container overflow-hidden">
                        <div class="swiper-wrapper">
                            @forelse($bannerLayananItems as $index => $item)
                                <div class="swiper-slide px-2">
                                    <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl group relative
                                        {{ $index % 3 == 1 ? 'sm:translate-y-8' : '' }}"
                                    >
                                        <!-- Icon dengan efek glow -->
                                        <div class="relative">
                                            <div class="absolute  bg-gradient-to-r from-cyan-400 to-blue-500 rounded-full blur-lg opacity-0 group-hover:opacity-70 transition-opacity duration-500"></div>
                                            <div class="w-16 h-16 bg-gradient-to-br from-blue-50 to-blue-100 rounded-full flex items-center justify-center mb-4 mx-auto mt-6 relative">
                                                @if(!empty($item->image_icon))
                                                    <img src="{{ asset('storage/' . $item->image_icon) }}" alt="{{ $item->title }}" class="w-8 h-8">
                                                @else
                                                    <i class="fas fa-check text-blue-600 text-2xl"></i>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Content dengan efek hover -->
                                        <div class="p-6 pt-2">
                                            <h3 class="text-lg font-bold text-gray-800 mb-3 text-center group-hover:text-blue-600 transition-colors">
                                                {{ $item->title }}
                                            </h3>

                                            <p class="text-gray-600 text-center text-sm mb-4">
                                                {{ $item->description ?? '' }}
                                            </p>
                                        </div>

                                        <!-- Border bottom accent -->
                                        <div class="h-1 w-full bg-gradient-to-r from-blue-500 to-cyan-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                                    </div>
                                </div>
                            @empty
                                <!-- Kartu dinamis tanpa hardcoded data -->
                                @php
                                    $layananItems = [
                                        [
                                            'icon' => 'fas fa-shield-alt',
                                            'title' => 'Bahan Kokoh',
                                            'description' => 'Material berkualitas tinggi yang tahan terhadap beban berat dan kondisi cuaca ekstrem.'
                                        ],
                                        [
                                            'icon' => 'fas fa-tint-slash',
                                            'title' => 'Anti Bocor',
                                            'description' => 'Sistem pemasangan khusus yang menjamin atap Anda bebas dari kebocoran.'
                                        ],
                                        [
                                            'icon' => 'fas fa-clock',
                                            'title' => 'Tahan Lama',
                                            'description' => 'Dirancang untuk bertahan hingga puluhan tahun dengan perawatan minimal.'
                                        ],
                                        [
                                            'icon' => 'fas fa-bolt',
                                            'title' => 'Anti Petir',
                                            'description' => 'Dilengkapi dengan sistem anti petir yang melindungi bangunan dari sambaran listrik.'
                                        ],
                                        [
                                            'icon' => 'fas fa-sun',
                                            'title' => 'Insulasi Suhu',
                                            'description' => 'Menjaga suhu ruangan tetap nyaman dengan menghalangi panas berlebih dari sinar matahari.'
                                        ]
                                    ];
                                @endphp

                                @foreach($layananItems as $index => $service)
                                    <div class="swiper-slide px-2">
                                        <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl group relative">
                                            <!-- Icon dengan efek glow -->
                                            <div class="relative">

                                                <div class="w-16 h-16 bg-gradient-to-br from-blue-50 to-blue-100 rounded-full flex items-center justify-center mb-4 mx-auto mt-6 relative">
                                                    <i class="{{ $service['icon'] }} text-blue-600 text-2xl"></i>
                                                </div>
                                            </div>

                                            <!-- Content dengan efek hover -->
                                            <div class="p-6 pt-2">
                                                <h3 class="text-lg font-bold text-gray-800 mb-3 text-center group-hover:text-blue-600 transition-colors">
                                                    {{ $service['title'] }}
                                                </h3>

                                                <p class="text-gray-600 text-center text-sm mb-4">
                                                    {{ $service['description'] }}
                                                </p>

                                                <div class="flex justify-center">
                                                    <a href="#" class="text-blue-600 text-sm font-semibold inline-flex items-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 hover:underline">
                                                        Selengkapnya
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>

                                            <!-- Border bottom accent -->
                                            <div class="h-1 w-full bg-gradient-to-r from-blue-500 to-cyan-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforelse
                        </div>
                    </div>
                @else
                    <!-- Standard Grid for <= 3 items -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                        @forelse($bannerLayananItems as $index => $item)
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl group relative
                                {{ $index % 3 == 1 ? 'sm:translate-y-8' : '' }}"
                            >
                                <!-- Icon dengan efek glow -->
                                <div class="relative">
                                    
                                    <div class="w-16 h-16 bg-gradient-to-br from-blue-50 to-blue-100 rounded-full flex items-center justify-center mb-4 mx-auto mt-6 relative">
                                        @if(!empty($item->image_icon))
                                            <img src="{{ asset('storage/' . $item->image_icon) }}" alt="{{ $item->title }}" class="w-8 h-8">
                                        @else
                                            <i class="fas fa-check text-blue-600 text-2xl"></i>
                                        @endif
                                    </div>
                                </div>

                                <!-- Content dengan efek hover -->
                                <div class="p-6 pt-2">
                                    <h3 class="text-lg font-bold text-gray-800 mb-3 text-center group-hover:text-blue-600 transition-colors">
                                        {{ $item->title }}
                                    </h3>

                                    <p class="text-gray-600 text-center text-sm mb-4">
                                        {{ $item->description ?? '' }}
                                    </p>
                                </div>

                                <!-- Border bottom accent -->
                                <div class="h-1 w-full bg-gradient-to-r from-blue-500 to-cyan-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                            </div>
                        @empty
                            <!-- Kartu dinamis tanpa hardcoded data -->
                            @php
                                $layananItems = [
                                    [
                                        'icon' => 'fas fa-shield-alt',
                                        'title' => 'Bahan Kokoh',
                                        'description' => 'Material berkualitas tinggi yang tahan terhadap beban berat dan kondisi cuaca ekstrem.'
                                    ],
                                    [
                                        'icon' => 'fas fa-tint-slash',
                                        'title' => 'Anti Bocor',
                                        'description' => 'Sistem pemasangan khusus yang menjamin atap Anda bebas dari kebocoran.'
                                    ],
                                    [
                                        'icon' => 'fas fa-clock',
                                        'title' => 'Tahan Lama',
                                        'description' => 'Dirancang untuk bertahan hingga puluhan tahun dengan perawatan minimal.'
                                    ]
                                ];
                            @endphp

                            @foreach($layananItems as $index => $service)
                                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl group relative
                                    {{ $index % 3 == 1 ? 'sm:translate-y-8' : '' }}"
                                >
                                    <!-- Icon dengan efek glow -->
                                    <div class="relative">

                                        <div class="w-16 h-16 bg-gradient-to-br from-blue-50 to-blue-100 rounded-full flex items-center justify-center mb-4 mx-auto mt-6 relative">
                                            <i class="{{ $service['icon'] }} text-blue-600 text-2xl"></i>
                                        </div>
                                    </div>

                                    <!-- Content dengan efek hover -->
                                    <div class="p-6 pt-2">
                                        <h3 class="text-lg font-bold text-gray-800 mb-3 text-center group-hover:text-blue-600 transition-colors">
                                            {{ $service['title'] }}
                                        </h3>

                                        <p class="text-gray-600 text-center text-sm mb-4">
                                            {{ $service['description'] }}
                                        </p>

                                        <div class="flex justify-center">
                                            <a href="#" class="text-blue-600 text-sm font-semibold inline-flex items-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 hover:underline">
                                                Selengkapnya
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Border bottom accent -->
                                    <div class="h-1 w-full bg-gradient-to-r from-blue-500 to-cyan-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                                </div>
                            @endforeach
                        @endforelse
                    </div>
                @endif
            </div>
        </div>
    </div>

    @if(isset($useSlider) && $useSlider)
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.swiper-layanan-container', {
                slidesPerView: 1,
                spaceBetween: 10,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                loop: true,
                speed: 800,
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 24,
                    }
                },
                on: {
                    init: function () {
                        // Menerapkan efek escalonated pada slide tengah
                        setTimeout(() => {
                            const activeIndex = this.activeIndex;
                            const slides = document.querySelectorAll('.swiper-layanan-container .swiper-slide');
                            slides.forEach((slide, index) => {
                                if ((index - activeIndex) % 3 === 1 || (index - activeIndex) % 3 === -2) {
                                    slide.querySelector('.bg-white').classList.add('sm:translate-y-8');
                                } else {
                                    slide.querySelector('.bg-white').classList.remove('sm:translate-y-8');
                                }
                            });
                        }, 100);
                    },
                    slideChangeTransitionEnd: function () {
                        // Memperbarui efek escalonated saat slide berubah
                        const activeIndex = this.activeIndex;
                        const slides = document.querySelectorAll('.swiper-layanan-container .swiper-slide');
                        slides.forEach((slide, index) => {
                            if ((index - activeIndex) % 3 === 1 || (index - activeIndex) % 3 === -2) {
                                slide.querySelector('.bg-white').classList.add('sm:translate-y-8');
                            } else {
                                slide.querySelector('.bg-white').classList.remove('sm:translate-y-8');
                            }
                        });
                    }
                }
            });
        });
    </script>
    @endif
</section>