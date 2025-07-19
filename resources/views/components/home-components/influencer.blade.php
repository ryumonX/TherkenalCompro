@props(['influencer'])

@if ($influencer->count())
<section class="py-24 bg-gradient-to-b from-emerald-50 via-white to-emerald-100 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10 pointer-events-none">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_1px_1px,_#34d399_1px,_transparent_1px)] bg-[length:24px_24px]"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Header -->
        <div class="text-center mb-20">
            <div class="inline-flex items-center px-5 py-2 bg-gradient-to-r from-emerald-600 to-teal-500 rounded-full mb-8 shadow-md animate-fade-in-up">
                <div class="w-2 h-2 bg-white rounded-full mr-3 animate-ping"></div>
                <span class="text-xs sm:text-sm font-semibold text-white tracking-wider uppercase">KOL & INFLUENCER</span>
            </div>

            <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-light text-slate-900 mb-6 tracking-tight leading-tight">
                Kolaborasi <span class="font-bold bg-gradient-to-r from-emerald-600 to-emerald-800 bg-clip-text text-transparent">Bersama Kami</span>
            </h2>

            <div class="w-24 h-1 bg-gradient-to-r from-transparent via-emerald-400 to-transparent mx-auto mb-6 rounded-full"></div>

            <p class="text-base sm:text-lg text-slate-600 max-w-xl mx-auto leading-relaxed font-light">
                KOL dan Influencer profesional yang telah bekerja sama dengan kami dalam berbagai proyek dan kampanye brand.
            </p>
        </div>

        <!-- Influencer Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 sm:gap-8">
            @foreach ($influencer as $index => $item)
            <div class="group relative transform hover:-translate-y-2 transition duration-500 ease-in-out hover:shadow-2xl">
                <!-- Card -->
                <div class="bg-white rounded-3xl border border-slate-100 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 relative">
                    <!-- Image -->
                    <div class="relative aspect-[3/4] overflow-hidden">
                        <img
                            src="{{ asset('storage/' . $item->image) }}"
                            alt="{{ $item->name }}"
                            class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110"
                            loading="lazy"
                        >
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-500"></div>

                        <!-- Badge -->
                        <div class="absolute top-4 right-4 transform opacity-0 group-hover:opacity-100 group-hover:translate-x-0 transition duration-500 translate-x-4">
                            <div class="bg-white/90 backdrop-blur-md rounded-full p-2 shadow-lg ring-1 ring-emerald-400">
                                <svg class="w-5 h-5 text-emerald-600 animate-bounce" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066...z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-4 sm:p-6">
                        <h3 class="text-base sm:text-xl font-bold text-slate-800 mb-2 transition group-hover:text-emerald-700 duration-300">
                            {{ $item->name }}
                        </h3>
                        <div class="w-10 sm:w-12 h-1 bg-emerald-200 group-hover:bg-emerald-400 transition-all duration-300 mb-2 rounded-full"></div>
                    </div>
                </div>

                <!-- Accent Dot -->
                <div class="absolute -top-1 -right-1 w-3 h-3 bg-emerald-400 rounded-full opacity-0 group-hover:opacity-100 transition duration-700 animate-pulse"></div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
