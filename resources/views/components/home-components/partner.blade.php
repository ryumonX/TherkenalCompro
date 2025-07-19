@props(['partners'])

@if ($partners->count())
<section class="relative py-16 sm:py-20 md:py-24 lg:py-32 xl:py-40 bg-gradient-to-br from-slate-50 via-emerald-50/30 to-lime-50/40 overflow-hidden">
    <!-- Futuristic Background Layer -->
    <div class="absolute inset-0 z-0">
        <!-- Animated gradient orbs - Mobile optimized -->
        <div class="absolute top-10 sm:top-20 left-5 sm:left-10 w-48 sm:w-64 md:w-72 h-48 sm:h-64 md:h-72 bg-gradient-to-br from-emerald-300/20 to-lime-300/10 rounded-full blur-2xl sm:blur-3xl animate-pulse"></div>
        <div class="absolute bottom-10 sm:bottom-20 right-5 sm:right-10 w-56 sm:w-80 md:w-96 h-56 sm:h-80 md:h-96 bg-gradient-to-br from-mint-300/15 to-emerald-300/20 rounded-full blur-2xl sm:blur-3xl animate-pulse animation-delay-1000"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-48 sm:w-64 md:w-80 h-48 sm:h-64 md:h-80 bg-gradient-to-br from-lime-300/10 to-emerald-300/15 rounded-full blur-2xl sm:blur-3xl animate-pulse animation-delay-2000"></div>

        <!-- Flowing wave pattern -->
        <div class="absolute inset-0 opacity-20 sm:opacity-30">
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-emerald-100/20 to-transparent transform rotate-12 translate-x-full animate-shimmer"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-lime-100/15 to-transparent transform -rotate-12 -translate-x-full animate-shimmer animation-delay-3000"></div>
        </div>

        <!-- Geometric dot matrix - Mobile responsive -->
        <div class="absolute inset-0 opacity-25 sm:opacity-40">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_2px_2px,rgba(34,197,94,0.15)_1px,transparent_0)] bg-[length:32px_32px] sm:bg-[length:48px_48px]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_2px_2px,rgba(74,222,128,0.1)_1px,transparent_0)] bg-[length:24px_24px] sm:bg-[length:32px_32px] transform rotate-45"></div>
        </div>

        <!-- Floating particles - Reduced for mobile -->
        <div class="hidden sm:block absolute top-1/4 left-1/5 w-2 h-2 bg-emerald-400/60 rounded-full animate-float"></div>
        <div class="absolute top-2/3 left-2/3 w-1 h-1 bg-lime-400/80 rounded-full animate-float animation-delay-1500"></div>
        <div class="hidden sm:block absolute top-1/2 right-1/4 w-1.5 h-1.5 bg-mint-400/70 rounded-full animate-float animation-delay-3000"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Gallery of Legends Header -->
        <div class="text-center mb-16 sm:mb-20 md:mb-24">
            <!-- Icon with rotating halo -->
            <div class="relative inline-flex items-center justify-center w-16 sm:w-20 md:w-24 h-16 sm:h-20 md:h-24 mb-6 sm:mb-8 group">
                <div class="absolute inset-0 rounded-full bg-gradient-to-br from-emerald-400 to-lime-400 animate-spin-slow opacity-20 group-hover:opacity-40 transition-opacity duration-500"></div>
                <div class="absolute inset-1 sm:inset-2 rounded-full bg-gradient-to-br from-emerald-500 to-lime-500 shadow-xl sm:shadow-2xl shadow-emerald-500/30 backdrop-blur-sm border border-white/30">
                    <div class="absolute inset-0 rounded-full bg-gradient-to-br from-white/20 to-transparent"></div>
                </div>
                <svg class="w-8 sm:w-10 md:w-12 h-8 sm:h-10 md:h-12 text-white drop-shadow-lg relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>

            <p class="text-xs sm:text-sm font-bold text-emerald-600 uppercase tracking-[0.2em] sm:tracking-[0.3em] mb-4 sm:mb-6 animate-fade-in-up">
                Gallery of Legends
            </p>

            <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-black text-gray-900 leading-[0.9] sm:leading-[0.85] mb-6 sm:mb-8 tracking-tight px-2">
                <span class="inline-block animate-fade-in-up animation-delay-200">Building the future with</span>
                <span class="block text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 via-lime-600 to-emerald-600 bg-[length:200%_100%] animate-gradient-x animate-fade-in-up animation-delay-400">
                    innovation partners
                </span>
            </h2>

            <p class="text-base sm:text-lg md:text-xl lg:text-2xl text-gray-700 max-w-4xl mx-auto font-medium leading-relaxed animate-fade-in-up animation-delay-600 px-4">
                Collaborating with visionary organizations to craft extraordinary digital experiences and push creative boundaries.
            </p>
        </div>

        <!-- Desktop Masonry Gallery -->
        <div class="hidden lg:block mb-16 md:mb-20 lg:mb-24">
            <div class="columns-2 xl:columns-3 2xl:columns-4 gap-6 lg:gap-7">
                @foreach ($partners as $index => $partner)
                    @php $isLegend = $index % 3 === 0; @endphp
                    <div class="break-inside-avoid mb-6 lg:mb-7 group relative" data-aos="fade-up" data-aos-delay="{{ $index * 80 }}">
                        <!-- Legend halo for special partners -->
                        @if($isLegend)
                            <div class="absolute -inset-2 bg-gradient-to-r from-emerald-400 to-lime-400 rounded-2xl lg:rounded-3xl blur-sm opacity-0 group-hover:opacity-30 transition-opacity duration-500 animate-pulse"></div>
                        @endif

                        <!-- Main card with fixed aspect ratio -->
                        <div class="relative border border-emerald-200/50 rounded-xl lg:rounded-2xl shadow-lg lg:shadow-xl shadow-emerald-100/30 transition-all duration-700 hover:scale-[1.02] hover:shadow-xl lg:hover:shadow-2xl hover:shadow-emerald-200/50 hover:border-emerald-300/70 hover:bg-white/80 group bg-white/60 backdrop-blur-sm aspect-[4/3] flex flex-col">

                            <!-- Card Glow -->
                            <div class="absolute inset-0 rounded-xl lg:rounded-2xl bg-gradient-to-br from-emerald-100/20 via-transparent to-lime-100/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-0"></div>

                            <!-- Logo - Full card coverage -->
                            <div class="relative z-10 flex justify-center items-center flex-1 p-6">
                                <img
                                    src="{{ asset('storage/' . $partner->image) }}"
                                    alt="{{ $partner->name ?? 'Partner' }}"
                                    loading="lazy"
                                    class="max-w-full max-h-full object-contain grayscale contrast-90 group-hover:grayscale-0 group-hover:contrast-100 group-hover:scale-105 transition-all duration-700 filter drop-shadow-md"
                                />
                            </div>

                            <!-- Partner Name - Fixed at bottom -->
                            @if($partner->name)
                                <div class="relative z-10 text-center p-4 mt-auto">
                                    <p class="text-sm font-bold text-gray-800 tracking-wide group-hover:text-emerald-700 transition-colors duration-300 mb-2">
                                        {{ $partner->name }}
                                    </p>

                                    @if($isLegend)
                                        <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            <span class="inline-block px-3 py-1 text-xs font-semibold text-emerald-700 bg-emerald-100/80 rounded-full backdrop-blur-sm">Legend Partner</span>
                                        </div>
                                    @endif
                                </div>
                            @endif

                            <!-- Shimmer Overlay -->
                            <div class="absolute inset-0 rounded-xl lg:rounded-2xl bg-gradient-to-r from-transparent via-white/20 to-transparent transform -translate-x-full group-hover:translate-x-full transition-transform duration-1000 ease-out pointer-events-none z-20"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Tablet Gallery Grid -->
        <div class="hidden md:block lg:hidden mb-16 md:mb-20">
            <div class="grid grid-cols-3 gap-6">
                @foreach ($partners as $index => $partner)
                    @php $isLegend = $index % 3 === 0; @endphp
                    <div class="relative group" data-aos="fade-up" data-aos-delay="{{ $index * 60 }}">
                        <!-- Legend halo for tablet -->
                        @if($isLegend)
                            <div class="absolute -inset-1 bg-gradient-to-r from-emerald-400 to-lime-400 rounded-xl blur-sm opacity-0 group-hover:opacity-25 transition-opacity duration-500"></div>
                        @endif

                        <div class="relative border border-emerald-200/50 rounded-xl shadow-lg shadow-emerald-100/30 transition-all duration-500 hover:scale-[1.02] hover:shadow-xl hover:border-emerald-300/70 bg-white/60 backdrop-blur-sm group aspect-[4/3] flex flex-col">
                            <!-- Card inner glow -->
                            <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-emerald-100/20 via-transparent to-lime-100/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                            <!-- Logo - Full card coverage -->
                            <div class="relative flex justify-center items-center flex-1 p-4">
                                <img
                                    src="{{ asset('storage/' . $partner->image) }}"
                                    alt="{{ $partner->name ?? 'Partner' }}"
                                    class="max-w-full max-h-full object-contain grayscale contrast-90 group-hover:grayscale-0 group-hover:contrast-100 group-hover:scale-105 transition-all duration-500 filter drop-shadow-md"
                                />
                            </div>

                            @if($partner->name)
                                <div class="relative z-10 p-3 mt-auto">
                                    <p class="text-center text-sm font-bold text-gray-800 tracking-wide group-hover:text-emerald-700 transition-colors duration-300">{{ $partner->name }}</p>
                                    @if($isLegend)
                                        <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 mt-2 text-center">
                                            <span class="inline-block px-2 py-1 text-xs font-semibold text-emerald-700 bg-emerald-100/80 rounded-full backdrop-blur-sm">Legend</span>
                                        </div>
                                    @endif
                                </div>
                            @endif

                            <!-- Shimmer effect -->
                            <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-transparent via-white/20 to-transparent transform -translate-x-full group-hover:translate-x-full transition-transform duration-700 ease-out"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Mobile Gallery Grid - Fixed Responsive -->
        <div class="md:hidden mb-16">
            <div class="grid grid-cols-2 gap-4">
                @foreach ($partners as $index => $partner)
                    @php
                        $featured = $index % 8 === 0; // Less frequent featured
                        $isLegend = $index % 5 === 0; // Less frequent legend
                    @endphp
                    <div class="relative group {{ $featured ? 'col-span-2' : '' }}" data-aos="fade-up" data-aos-delay="{{ $index * 40 }}">
                        <!-- Legend halo for mobile -->
                        @if($isLegend)
                            <div class="absolute -inset-1 bg-gradient-to-r from-emerald-400 to-lime-400 rounded-xl blur-sm opacity-0 group-hover:opacity-20 transition-opacity duration-500"></div>
                        @endif

                        <!-- Mobile card with aspect ratio -->
                        <div class="relative border border-emerald-200/40 rounded-xl shadow-md shadow-emerald-100/20 transition-all duration-500 hover:scale-[1.02] hover:shadow-lg hover:border-emerald-300/60 bg-white/70 backdrop-blur-sm group aspect-square flex flex-col">
                            <!-- Card inner glow -->
                            <div class="absolute inset-0 rounded-xl bg-gradient-to-br from-emerald-100/20 via-transparent to-lime-100/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                            <!-- Mobile logo - Full card coverage -->
                            <div class="relative flex justify-center items-center flex-1 p-3">
                                <img
                                    src="{{ asset('storage/' . $partner->image) }}"
                                    alt="{{ $partner->name ?? 'Partner' }}"
                                    loading="lazy"
                                    class="max-w-full max-h-full object-contain grayscale contrast-90 group-hover:grayscale-0 group-hover:contrast-100 group-hover:scale-105 transition-all duration-500 filter drop-shadow-sm"
                                />
                            </div>

                            <!-- Show name for featured items -->
                            @if($partner->name && ($featured || $index < 6))
                                <div class="relative z-10 mt-auto p-2">
                                    <p class="text-center text-xs font-semibold text-gray-700 tracking-wide group-hover:text-emerald-700 transition-colors duration-300 line-clamp-1">
                                        {{ $partner->name }}
                                    </p>
                                    @if($isLegend)
                                        <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 mt-1 text-center">
                                            <span class="inline-block px-2 py-0.5 text-xs font-semibold text-emerald-700 bg-emerald-100/80 rounded-full backdrop-blur-sm">★</span>
                                        </div>
                                    @endif
                                </div>
                            @endif

                            <!-- Mobile shimmer effect -->
                            <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-transparent via-white/15 to-transparent transform -translate-x-full group-hover:translate-x-full transition-transform duration-700 ease-out"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Premium Statistics Dashboard - Mobile Optimized -->
        <div class="relative bg-white/70 backdrop-blur-xl rounded-2xl sm:rounded-3xl border border-emerald-200/60 shadow-xl sm:shadow-2xl shadow-emerald-100/50 p-6 sm:p-8 md:p-12 lg:p-16 overflow-hidden group hover:shadow-2xl sm:hover:shadow-3xl hover:shadow-emerald-200/60 transition-all duration-1000" data-aos="fade-up">
            <!-- Animated background elements -->
            <div class="absolute inset-0 bg-gradient-to-br from-emerald-50/50 via-transparent to-lime-50/30 opacity-0 group-hover:opacity-100 transition-opacity duration-1000"></div>
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-emerald-400 via-lime-400 to-emerald-400 bg-[length:200%_100%] animate-gradient-x"></div>

            <!-- Floating particles in stats - Hide on mobile -->
            <div class="hidden sm:block absolute top-8 right-8 w-2 h-2 bg-emerald-400/40 rounded-full animate-float"></div>
            <div class="hidden sm:block absolute bottom-8 left-8 w-1 h-1 bg-lime-400/60 rounded-full animate-float animation-delay-1000"></div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 md:gap-10 lg:gap-12 text-center relative z-10">
                <div class="transform hover:scale-105 sm:hover:scale-110 transition-all duration-700 group/stat cursor-pointer">
                    <div class="relative mb-3 sm:mb-4">
                        <div class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-black text-transparent bg-clip-text bg-gradient-to-br from-emerald-600 to-lime-600 group-hover/stat:from-emerald-500 group-hover/stat:to-lime-500 transition-all duration-500 leading-none">
                            {{ $partners->count() }}+
                        </div>
                        <div class="absolute inset-0 text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-black text-emerald-600/20 blur-lg group-hover/stat:text-emerald-500/30 transition-all duration-500 leading-none">
                            {{ $partners->count() }}+
                        </div>
                    </div>
                    <p class="text-xs sm:text-sm font-bold text-gray-700 uppercase tracking-[0.15em] sm:tracking-[0.2em] group-hover/stat:text-emerald-600 transition-colors duration-300">Global Partners</p>
                </div>

                <div class="transform hover:scale-105 sm:hover:scale-110 transition-all duration-700 group/stat cursor-pointer">
                    <div class="relative mb-3 sm:mb-4">
                        <div class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-black text-transparent bg-clip-text bg-gradient-to-br from-emerald-600 to-lime-600 group-hover/stat:from-emerald-500 group-hover/stat:to-lime-500 transition-all duration-500 leading-none">
                            99.9%
                        </div>
                        <div class="absolute inset-0 text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-black text-emerald-600/20 blur-lg group-hover/stat:text-emerald-500/30 transition-all duration-500 leading-none">
                            99.9%
                        </div>
                    </div>
                    <p class="text-xs sm:text-sm font-bold text-gray-700 uppercase tracking-[0.15em] sm:tracking-[0.2em] group-hover/stat:text-emerald-600 transition-colors duration-300">Success Rate</p>
                </div>

                <div class="transform hover:scale-105 sm:hover:scale-110 transition-all duration-700 group/stat cursor-pointer">
                    <div class="relative mb-3 sm:mb-4">
                        <div class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-black text-transparent bg-clip-text bg-gradient-to-br from-emerald-600 to-lime-600 group-hover/stat:from-emerald-500 group-hover/stat:to-lime-500 transition-all duration-500 leading-none">
                            24/7
                        </div>
                        <div class="absolute inset-0 text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-black text-emerald-600/20 blur-lg group-hover/stat:text-emerald-500/30 transition-all duration-500 leading-none">
                            24/7
                        </div>
                    </div>
                    <p class="text-xs sm:text-sm font-bold text-gray-700 uppercase tracking-[0.15em] sm:tracking-[0.2em] group-hover/stat:text-emerald-600 transition-colors duration-300">Innovation</p>
                </div>

                <div class="transform hover:scale-105 sm:hover:scale-110 transition-all duration-700 group/stat cursor-pointer">
                    <div class="relative mb-3 sm:mb-4">
                        <div class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-black text-transparent bg-clip-text bg-gradient-to-br from-emerald-600 to-lime-600 group-hover/stat:from-emerald-500 group-hover/stat:to-lime-500 transition-all duration-500 leading-none">
                            5.0★
                        </div>
                        <div class="absolute inset-0 text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-black text-emerald-600/20 blur-lg group-hover/stat:text-emerald-500/30 transition-all duration-500 leading-none">
                            5.0★
                        </div>
                    </div>
                    <p class="text-xs sm:text-sm font-bold text-gray-700 uppercase tracking-[0.15em] sm:tracking-[0.2em] group-hover/stat:text-emerald-600 transition-colors duration-300">Elite Rating</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
@keyframes shimmer {
    0% { transform: translateX(-100%) rotate(12deg); }
    100% { transform: translateX(100vw) rotate(12deg); }
}

@keyframes gradient-x {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

@keyframes fade-in-up {
    0% { opacity: 0; transform: translateY(20px); }
    100% { opacity: 1; transform: translateY(0); }
}

@keyframes spin-slow {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.animate-shimmer {
    animation: shimmer 8s infinite linear;
}

.animate-gradient-x {
    animation: gradient-x 6s ease infinite;
}

.animate-float {
    animation: float 3s ease-in-out infinite;
}

.animate-fade-in-up {
    animation: fade-in-up 0.8s ease-out forwards;
}

.animate-spin-slow {
    animation: spin-slow 20s linear infinite;
}

.animation-delay-200 {
    animation-delay: 200ms;
}

.animation-delay-400 {
    animation-delay: 400ms;
}

.animation-delay-600 {
    animation-delay: 600ms;
}

.animation-delay-1000 {
    animation-delay: 1000ms;
}

.animation-delay-1500 {
    animation-delay: 1500ms;
}

.animation-delay-2000 {
    animation-delay: 2000ms;
}

.animation-delay-3000 {
    animation-delay: 3000ms;
}

.line-clamp-1 {
    overflow: hidden;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 1;
}

/* Mobile performance optimizations */
@media (max-width: 768px) {
    .animate-pulse,
    .animate-float {
        animation-duration: 4s;
    }

    .backdrop-blur-xl {
        backdrop-filter: blur(8px);
    }

    .backdrop-blur-sm {
        backdrop-filter: blur(4px);
    }
}
</style>
@endif
