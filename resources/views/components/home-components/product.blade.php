@props(['produk' => [], 'limit' => null, 'showViewAllButton' => false, 'title' => 'Produk Kami', 'kontak' => null])

<!-- Include SwiperJS CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<section id="produk" class="py-20 bg-gradient-to-b from-white to-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center px-3 py-1 rounded-full bg-green-100 mb-4">
                <span class="w-2 h-2 rounded-full bg-green-500 mr-2"></span>
                <span class="text-sm font-semibold uppercase tracking-wider text-green-700">Produk Unggulan</span>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Produk Berkualitas Kami</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Temukan berbagai pilihan layanan jasa produk kami.
            </p>
        </div>

        <!-- Products Swiper -->
        <div class="swiper mySwiper pb-12">
            <div class="swiper-wrapper">
                @forelse($limit ? $produk->take($limit) : $produk as $index => $item)
                    <div class="swiper-slide bg-white rounded-xl shadow-md overflow-hidden group transition duration-300 hover:shadow-xl relative">
                        <div class="h-64 overflow-hidden relative">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10 flex items-end justify-start p-4">
                                <a href="{{ route('produk.detail', $item->id) }}" class="absolute inset-0 z-10 flex items-end justify-start p-4">
                                    <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                        <span class="inline-block bg-white/90 backdrop-blur-sm text-green-700 px-3 py-1 rounded-full text-sm font-semibold cursor-pointer">
                                            Lihat Detail
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                 loading="lazy"
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                        </div>

                        <div class="p-6 relative">
                            <h3 class="text-xl font-bold text-gray-800 mb-3">
                                {{ $item->title }}
                                <div class="h-0.5 w-12 bg-gradient-to-r from-green-500 to-lime-400 mt-2 group-hover:w-full transition-all duration-300"></div>
                            </h3>
                            <div class="text-gray-600 mb-6 text-sm line-clamp-2 h-18 overflow-hidden">
                                {!! $item->description !!}
                            </div>
                            <a href="https://wa.me/{{ $kontak ? preg_replace('/[^0-9]/', '', $kontak->no_telepon) : '6281234567890' }}?text=Halo%2C%20saya%20tertarik%20dengan%20produk%20*{{ urlencode($item->title) }}*%20yang%20ada%20di%20website%20Anda.%20Mohon%20informasi%20lebih%20lanjut.%20Terima%20kasih."
                               target="_blank" class="block w-full">
                                <button class="w-full group relative overflow-hidden px-6 py-3 rounded-lg font-bold text-white bg-gradient-to-r from-green-600 to-green-500 shadow-lg hover:shadow-green-500/30">
                                    <span class="relative z-10 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M.057 24l1.687-6.163..."></path>
                                        </svg>
                                        Hubungi Kami
                                    </span>
                                    <span class="absolute inset-0 bg-gradient-to-r from-green-500 to-lime-400 transform group-hover:translate-y-0 -translate-y-full transition-transform duration-500 ease-in-out"></span>
                                    <span class="absolute inset-0 bg-gradient-to-r from-green-600 to-green-500 transform group-hover:translate-y-full translate-y-0 transition-transform duration-500 ease-in-out"></span>
                                    <span class="absolute inset-0 w-full bg-gradient-to-tr from-transparent via-white/20 to-transparent blur-sm transform group-hover:-translate-x-0 -translate-x-full transition-transform duration-500 ease-in-out"></span>
                                </button>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="swiper-slide">
                        <div class="p-8 text-center text-gray-500">Belum ada produk tersedia</div>
                    </div>
                @endforelse
            </div>

        </div>
        <div class="swiper-pagination mt-10 flex justify-center"></div>

        <!-- View All Button -->
        @if ($showViewAllButton)
            <div class="text-center mt-12">
                <a href="{{ route('produk.index') }}">
                    <button class="group relative overflow-hidden px-8 py-3 rounded-lg font-bold text-white bg-gradient-to-r from-green-600 to-green-500 shadow-lg hover:shadow-green-500/30">
                        <span class="relative z-10">Lihat Semua Produk</span>
                        <span class="absolute inset-0 bg-gradient-to-r from-green-500 to-lime-400 transform group-hover:translate-y-0 -translate-y-full transition-transform duration-500 ease-in-out"></span>
                        <span class="absolute inset-0 bg-gradient-to-r from-green-600 to-green-500 transform group-hover:translate-y-full translate-y-0 transition-transform duration-500 ease-in-out"></span>
                        <span class="absolute inset-0 w-full bg-gradient-to-tr from-transparent via-white/20 to-transparent blur-sm transform group-hover:-translate-x-0 -translate-x-full transition-transform duration-500 ease-in-out"></span>
                    </button>
                </a>
            </div>
        @endif
    </div>

    <!-- Swiper Init -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        lazy: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        }
    });
});
</script>


    <!-- Scrollbar styling -->
    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background-color: #f1f1f1;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background-color: #c0c0c0;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background-color: #a0a0a0;
        }
    </style>
</section>
