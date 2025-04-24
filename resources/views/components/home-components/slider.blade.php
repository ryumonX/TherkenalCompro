@props(['sliders' => [], 'hero' => null, 'heroItems' => []])

<section id="home" class="relative">
    <div class="swiper main-slider h-[600px] shadow-2xl overflow-hidden">
        <div class="swiper-wrapper">
            @forelse($sliders as $slider)
                <div class="swiper-slide group">
                    <div class="w-full h-full relative overflow-hidden">
                        <img
                            src="{{ asset('storage/' . $slider->image) }}"
                            alt="Slider Image"
                            class="w-full h-full object-cover object-center scale-110 group-hover:scale-100 transition-transform duration-700 ease-in-out"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-70 group-hover:opacity-80 transition-opacity duration-700"></div>
                        {{-- Judul/Deskripsi jika ada --}}
                        @if(!empty($slider->title) || !empty($slider->description))
                        <div class="absolute bottom-10 left-10 z-10 text-white space-y-3 backdrop-blur-md bg-black/30 p-6 rounded-xl shadow-lg animate-fadeInUp">
                            @if(!empty($slider->title))
                                <h2 class="text-3xl font-bold drop-shadow-lg">{{ $slider->title }}</h2>
                            @endif
                            @if(!empty($slider->description))
                                <p class="text-lg">{{ $slider->description }}</p>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="swiper-slide">
                    <div class="w-full h-full relative overflow-hidden bg-gray-200 flex items-center justify-center">
                        <p class="text-gray-500 text-xl">No slider images available</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Navigation buttons: custom style & animated -->
        <div class="swiper-button-next after:content-[''] w-12 h-12 bg-white/60 rounded-full flex items-center justify-center shadow-lg hover:bg-white/90 transition-all duration-300 border-2 border-white absolute top-1/2 -translate-y-1/2 right-6 z-20">
            <svg class="w-7 h-7 text-gray-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
            </svg>
        </div>
        <div class="swiper-button-prev after:content-[''] w-12 h-12 bg-white/60 rounded-full flex items-center justify-center shadow-lg hover:bg-white/90 transition-all duration-300 border-2 border-white absolute top-1/2 -translate-y-1/2 left-6 z-20">
            <svg class="w-7 h-7 text-gray-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
            </svg>
        </div>

        <!-- Pagination: custom dots -->
        <div class="swiper-pagination !bottom-6"></div>
    </div>

    <!-- Hero section positioned relative to slider -->
    <div class="container mx-auto px-6 relative -mt-[3.5rem] z-30">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-8 bg-white rounded-xl shadow-xl p-6">
            <!-- Title and Subtitle Section (Left) -->
            <div class="md:w-1/2 text-center">
                @if($hero)
                    <h2 class="text-xl md:text-2xl font-bold text-gray-800 mb-6 text-center">{{ $hero->title }}</h2>
                    <p class="text-md md:text-md text-gray-600 mb-8 text-center">
                        {{ $hero->subtitle }}
                    </p>
                @endif
            </div>

            <!-- Hero Items Section (Right) -->
            <div class="md:w-1/2">
                @if(count($heroItems) > 2)
                    <!-- Hero Items Slider when more than 2 items -->
                    <div class="hero-items-slider relative">
                        <div class="swiper hero-swiper">
                            <div class="swiper-wrapper">
                                @foreach($heroItems as $item)
                                    <div class="swiper-slide">
                                        <div class="bg-blue-400 rounded-xl shadow-lg py-10 flex flex-col items-center">
                                            <h3 class="text-2xl font-bold text-gray-100 mb-1">{{ $item->title }}</h3>
                                            <p class="text-base text-gray-100 text-center">{{ $item->subtitle }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Custom Navigation Buttons -->
                            <div class="hero-swiper-button-next after:content-[''] w-8 h-8 bg-white/60 rounded-full flex items-center justify-center shadow-md hover:bg-white/90 transition-all duration-300 border border-white absolute top-1/2 -translate-y-1/2 right-2 z-10">
                                <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                </svg>
                            </div>
                            <div class="hero-swiper-button-prev after:content-[''] w-8 h-8 bg-white/60 rounded-full flex items-center justify-center shadow-md hover:bg-white/90 transition-all duration-300 border border-white absolute top-1/2 -translate-y-1/2 left-2 z-10">
                                <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Regular grid when 2 or fewer items -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                        @forelse($heroItems as $item)
                            <div class="bg-blue-400 rounded-xl shadow-lg py-10 flex flex-col items-center transition-transform hover:transform hover:scale-105">
                                <h3 class="text-2xl font-bold text-gray-100 mb-1">{{ $item->title }}</h3>
                                <p class="text-base text-gray-100 text-center">{{ $item->subtitle }}</p>
                            </div>
                        @empty
                            <!-- Card 1 - Pengalaman -->
                            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center transition-transform hover:transform hover:scale-105">
                                <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mb-3">
                                    <i class="fas fa-calendar-check text-blue-600 text-xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-800 mb-1">10+</h3>
                                <p class="text-base text-gray-600">Tahun Pengalaman</p>
                            </div>

                            <!-- Card 2 - Proyek -->
                            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center transition-transform hover:transform hover:scale-105">
                                <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mb-3">
                                    <i class="fas fa-tasks text-blue-600 text-xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-800 mb-1">100+</h3>
                                <p class="text-base text-gray-600">Proyek Selesai</p>
                            </div>
                        @endforelse
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
    .swiper-pagination-bullet {
        @apply bg-white w-4 h-4 opacity-70 transition-all;
    }
    .swiper-pagination-bullet-active {
        @apply bg-blue-500 scale-125 shadow-lg opacity-100;
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px);}
        to { opacity: 1; transform: translateY(0);}
    }
    .animate-fadeInUp {
        animation: fadeInUp 1s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Main slider initialization
    const mainSwiper = new Swiper('.main-slider', {
        slidesPerView: 1,
        loop: true,
        effect: 'fade',
        fadeEffect: { crossFade: true },
        speed: 900,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            dynamicBullets: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        parallax: true,
    });

    // Hero items slider initialization (if exists)
    if (document.querySelector('.hero-swiper')) {
        const heroSwiper = new Swiper('.hero-swiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            speed: 600,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.hero-swiper-button-next',
                prevEl: '.hero-swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                }
            }
        });
    }
});
</script>
@endpush