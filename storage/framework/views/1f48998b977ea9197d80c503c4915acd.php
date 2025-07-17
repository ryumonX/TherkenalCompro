<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['tentangKami' => null]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['tentangKami' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<section id="tentang"
    class="py-32 relative overflow-hidden bg-gradient-to-br from-emerald-50 via-teal-50 to-green-50 min-h-screen">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <!-- Large floating orbs -->
        <div
            class="absolute -top-40 -right-40 w-96 h-96 bg-gradient-to-br from-emerald-400 to-teal-300 opacity-20 rounded-full animate-pulse blur-3xl">
        </div>
        <div
            class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-tr from-green-400 to-emerald-300 opacity-25 rounded-full animate-bounce blur-2xl">
        </div>

        <!-- Floating geometric shapes -->
        <div
            class="absolute top-1/4 left-1/4 w-24 h-24 bg-gradient-to-br from-emerald-300 to-teal-200 opacity-30 rounded-2xl rotate-12 animate-spin-slow">
        </div>
        <div
            class="absolute bottom-1/3 right-1/3 w-20 h-20 bg-gradient-to-bl from-green-300 to-emerald-200 opacity-35 rounded-full animate-bounce">
        </div>
        <div
            class="absolute top-1/2 right-1/4 w-16 h-16 bg-gradient-to-tr from-teal-300 to-green-200 opacity-40 rotate-45 animate-pulse">
        </div>
        <div
            class="absolute top-1/6 right-1/6 w-12 h-12 bg-gradient-to-br from-emerald-400 to-teal-300 opacity-25 rounded-xl animate-ping">
        </div>

        <!-- Animated dots pattern -->
        <div class="absolute top-0 left-0 w-full h-full">
            <div class="absolute top-20 left-20 w-3 h-3 bg-emerald-400 rounded-full animate-pulse"></div>
            <div class="absolute top-40 left-40 w-2 h-2 bg-teal-400 rounded-full animate-bounce"></div>
            <div class="absolute top-60 left-60 w-4 h-4 bg-green-400 rounded-full animate-ping"></div>
            <div class="absolute bottom-20 right-20 w-3 h-3 bg-emerald-300 rounded-full animate-pulse"></div>
            <div class="absolute bottom-40 right-40 w-2 h-2 bg-teal-300 rounded-full animate-bounce"></div>
        </div>
    </div>

    <!-- Glowing grid background -->
    <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>

    <div class="container mx-auto px-6 relative z-10">
        <!-- Hero Badge -->
        <div class="text-center mb-12 animate-fade-in-up">
            <div
                class="inline-flex items-center gap-3 bg-gradient-to-r from-emerald-100 to-teal-100 backdrop-blur-sm px-6 py-3 rounded-full border-2 border-emerald-200/50 shadow-lg">
                <div class="w-3 h-3 bg-emerald-500 rounded-full animate-pulse"></div>
                <span class="text-emerald-800 font-bold text-sm uppercase tracking-widest">🚀 Creative Agency
                    Therkenal</span>
                <div class="w-3 h-3 bg-teal-500 rounded-full animate-pulse"></div>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row lg:items-start gap-16 xl:gap-20">
            <!-- Enhanced Image Section -->
            <div class="lg:w-1/2 group relative">
                <!-- Multiple layered backgrounds for depth -->
                <div
                    class="absolute inset-0 bg-gradient-to-br from-emerald-600 to-teal-500 rounded-3xl transform rotate-6 scale-110 opacity-20 group-hover:opacity-30 group-hover:rotate-3 transition-all duration-700 blur-xl">
                </div>
                <div
                    class="absolute inset-2 bg-gradient-to-tl from-green-500 to-emerald-400 rounded-3xl transform -rotate-3 scale-105 opacity-15 group-hover:opacity-25 group-hover:-rotate-1 transition-all duration-700 blur-lg">
                </div>
                <div
                    class="absolute inset-4 bg-gradient-to-r from-teal-400 to-green-300 rounded-3xl transform rotate-1 scale-95 opacity-10 group-hover:opacity-20 group-hover:rotate-2 transition-all duration-700 blur-md">
                </div>

                <!-- Main image container -->
                <div
                    class="relative overflow-hidden rounded-3xl shadow-2xl border-4 border-white/80 backdrop-blur-sm group-hover:shadow-emerald-500/20 transition-all duration-700">
                    <?php if($tentangKami && $tentangKami->image): ?>
                        <img src="<?php echo e(asset('storage/' . $tentangKami->image)); ?>"
                            alt="<?php echo e($tentangKami->title ?? 'Tim Therkenal Creative Powerhouse'); ?>"
                            class="w-full h-full object-cover object-center group-hover:scale-110 transition-transform duration-700 ease-in-out">
                    <?php else: ?>
                        <img src="https://readdy.ai/api/search-image?query=dynamic%20creative%20agency%20team%20brainstorming%20in%20colorful%20modern%20office%2C%20diverse%20designers%20with%20laptops%20and%20sticky%20notes%2C%20vibrant%20workspace%20with%20plants%20and%20neon%20lights&width=700&height=600&seq=creative-powerhouse&orientation=landscape"
                            alt="Tim Therkenal Creative Powerhouse"
                            class="w-full h-full object-cover object-center group-hover:scale-110 transition-transform duration-700 ease-in-out">
                    <?php endif; ?>

                    <!-- Dynamic gradient overlay -->
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-emerald-900/60 via-transparent to-green-400/20 opacity-70 group-hover:opacity-50 transition-opacity duration-500">
                    </div>

                    <!-- Animated corner elements -->
                    <div
                        class="absolute top-4 left-4 w-16 h-16 bg-emerald-400/30 rounded-full flex items-center justify-center backdrop-blur-sm animate-pulse">
                        <div class="w-8 h-8 bg-emerald-500 rounded-full animate-ping"></div>
                    </div>

                    <div
                        class="absolute top-4 right-4 w-12 h-12 bg-teal-400/30 rounded-2xl flex items-center justify-center backdrop-blur-sm rotate-45 animate-spin-slow">
                        <div class="w-6 h-6 bg-teal-500 rounded-sm"></div>
                    </div>

                    <div
                        class="absolute bottom-4 right-4 bg-white/95 backdrop-blur-md py-3 px-4 sm:py-4 sm:px-6 rounded-2xl sm:rounded-3xl shadow-2xl flex items-center gap-2 sm:gap-4 transform group-hover:translate-y-0 translate-y-1 group-hover:scale-105 transition-all duration-500 text-xs sm:text-sm">
                        <div
                            class="p-2 sm:p-3 bg-gradient-to-br from-emerald-100 to-teal-100 rounded-xl sm:rounded-2xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 text-emerald-600"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-gray-800 text-xs sm:text-sm">Creative Excellence</p>
                            <p class="text-gray-600 text-[10px] sm:text-xs">Since 2018</p>
                        </div>
                    </div>

                    <!-- Floating stats -->
                    <div
                        class="absolute bottom-4 left-4 bg-emerald-500/90 backdrop-blur-md py-2 px-3 sm:py-3 sm:px-4 rounded-xl sm:rounded-2xl shadow-xl text-white transform group-hover:scale-105 transition-all duration-500 text-center">
                        <p class="font-black text-lg sm:text-2xl">500+</p>
                        <p class="text-[10px] sm:text-xs font-medium opacity-90">Projects Done</p>
                    </div>

                </div>

                <!-- Enhanced accent elements -->
                <div class="hidden lg:block absolute -left-12 top-1/4">
                    <div class="flex flex-col gap-3">
                        <div class="h-12 w-4 bg-gradient-to-b from-emerald-500 to-teal-400 rounded-full animate-pulse">
                        </div>
                        <div class="h-20 w-4 bg-gradient-to-b from-teal-400 to-green-500 rounded-full"></div>
                        <div class="h-8 w-4 bg-gradient-to-b from-green-500 to-emerald-400 rounded-full animate-pulse">
                        </div>
                        <div class="h-16 w-4 bg-gradient-to-b from-emerald-400 to-teal-300 rounded-full"></div>
                    </div>
                </div>

                <!-- Floating elements around image -->
                <div
                    class="absolute -top-8 -right-8 w-20 h-20 bg-gradient-to-br from-emerald-300 to-teal-200 rounded-full opacity-40 animate-bounce">
                </div>
                <div
                    class="absolute -bottom-6 -left-6 w-16 h-16 bg-gradient-to-tr from-green-300 to-emerald-200 rounded-2xl opacity-35 rotate-45 animate-pulse">
                </div>
            </div>

            <!-- Super Enhanced Content Section -->
            <div class="lg:w-1/2">
                <div class="relative">
                    <!-- Dynamic title section -->
                    <div class="relative mb-6 animate-fade-in-up">
                        <h1
                            class="text-4xl md:text-5xl lg:text-6xl font-black text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 via-teal-500 to-green-500 mb-4 leading-tight">
                            <?php echo e($tentangKami->subtitle ?? 'We Create Magic That Converts'); ?>

                        </h1>

                        <!-- Animated underline -->
                        <div
                            class="relative h-3 w-40 bg-gradient-to-r from-emerald-500 via-teal-400 to-green-400 rounded-full overflow-hidden">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-transparent via-white/60 to-transparent animate-slide-right">
                            </div>
                        </div>
                    </div>

                    <!-- Tagline -->
                    <p class="text-xl md:text-2xl text-gray-700 font-medium mb-8 italic">
                        "Transforming Ideas into Extraordinary Brand Experiences"
                    </p>

                    <!-- Enhanced description -->
                    <?php if($tentangKami && $tentangKami->description): ?>
                        <div class="text-gray-700 mb-12 leading-relaxed space-y-6 text-lg">
                            <?php echo $tentangKami->description; ?>

                        </div>
                    <?php else: ?>
                    <?php endif; ?>
                    <div class="space-y-8 mb-12">
                        <!-- Feature 1 -->
                        <div class="flex items-start gap-6 group hover:translate-x-2 transition-transform duration-300">
                            <div
                                class="flex-shrink-0 p-4 rounded-3xl bg-gradient-to-br from-emerald-100 to-teal-100 text-emerald-600 group-hover:scale-110 group-hover:rotate-12 transition-all duration-300 shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-black text-xl text-gray-800 mb-3 flex items-center gap-2">
                                    Unlimited Creative Innovation
                                    <span class="text-emerald-500 animate-pulse">✨</span>
                                </h3>
                                <p class="text-gray-600 leading-relaxed text-base">
                                    Therkenal memadukan kreativitas tanpa batas dan teknologi mutakhir untuk brand yang
                                    berkesan dan kampanye yang viral.
                                </p>
                            </div>
                        </div>

                        <!-- Feature 2 -->
                        <div class="flex items-start gap-6 group hover:translate-x-2 transition-transform duration-300">
                            <div
                                class="flex-shrink-0 p-4 rounded-3xl bg-gradient-to-br from-teal-100 to-green-100 text-teal-600 group-hover:scale-110 group-hover:rotate-12 transition-all duration-300 shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-black text-xl text-gray-800 mb-3 flex items-center gap-2">
                                    Digital Transformation Mastery
                                    <span class="text-teal-500 animate-bounce">🚀</span>
                                </h3>
                                <p class="text-gray-600 leading-relaxed text-base">
                                    Solusi kreatif 360° — dari brand yang ikonik, web cepat kilat, hingga konten yang
                                    bikin berhenti scroll.
                                </p>
                            </div>

                        </div>
                    </div>


                    <!-- Stats Section -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
                        <div
                            class="text-center p-4 bg-gradient-to-br from-emerald-50 to-teal-50 rounded-2xl border border-emerald-100 hover:scale-105 transition-transform duration-300">
                            <div class="text-3xl font-black text-emerald-600 mb-1">500+</div>
                            <div class="text-sm text-gray-600 font-medium">Projects Completed</div>
                        </div>
                        <div
                            class="text-center p-4 bg-gradient-to-br from-teal-50 to-green-50 rounded-2xl border border-teal-100 hover:scale-105 transition-transform duration-300">
                            <div class="text-3xl font-black text-teal-600 mb-1">150+</div>
                            <div class="text-sm text-gray-600 font-medium">Happy Clients</div>
                        </div>
                        <div
                            class="text-center p-4 bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl border border-green-100 hover:scale-105 transition-transform duration-300">
                            <div class="text-3xl font-black text-green-600 mb-1">95%</div>
                            <div class="text-sm text-gray-600 font-medium">Success Rate</div>
                        </div>
                        <div
                            class="text-center p-4 bg-gradient-to-br from-emerald-50 to-teal-50 rounded-2xl border border-emerald-100 hover:scale-105 transition-transform duration-300">
                            <div class="text-3xl font-black text-emerald-600 mb-1">24/7</div>
                            <div class="text-sm text-gray-600 font-medium">Support</div>
                        </div>
                    </div>

                    <!-- Enhanced CTA Section -->
                    <div class="flex flex-col sm:flex-row gap-6">
                        <button onclick="window.location.href='/produk'"
                            class="group relative overflow-hidden px-10 py-5 rounded-3xl font-black text-white bg-gradient-to-r from-emerald-600 via-teal-500 to-green-500 shadow-2xl hover:shadow-emerald-500/40 transform hover:-translate-y-2 hover:scale-105 transition-all duration-300">
                            <span class="relative z-10 flex items-center gap-3 text-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                Explore Our Magic
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 group-hover:translate-x-2 transition-transform duration-300"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </span>

                            <!-- Multi-layered animated background -->
                            <span
                                class="absolute inset-0 bg-gradient-to-r from-teal-500 via-green-500 to-emerald-500 transform group-hover:translate-x-0 -translate-x-full transition-transform duration-500 ease-in-out"></span>
                            <span
                                class="absolute inset-0 bg-gradient-to-r from-emerald-400 via-teal-400 to-green-400 transform group-hover:translate-x-full -translate-x-full transition-transform duration-700 ease-in-out"></span>

                            <!-- Enhanced shine effect -->
                            <span
                                class="absolute inset-0 w-full bg-gradient-to-tr from-transparent via-white/30 to-transparent blur-sm transform group-hover:translate-x-full -translate-x-full transition-transform duration-700 ease-in-out"></span>
                        </button>

                        <button onclick="window.location.href='/contact'"
                            class="group px-10 py-5 rounded-3xl font-black text-emerald-700 bg-white border-3 border-emerald-200 hover:bg-emerald-50 hover:border-emerald-300 hover:scale-105 transition-all duration-300 flex items-center gap-3 shadow-lg hover:shadow-emerald-500/20">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 group-hover:rotate-12 transition-transform duration-300" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            <span class="text-lg">Let's Create Together</span>
                        </button>
                    </div>

                    <!-- Social proof badges -->
                    <div class="mt-12 flex flex-wrap gap-4">
                        <div
                            class="flex items-center gap-2 bg-white/80 backdrop-blur-sm px-4 py-2 rounded-full border border-emerald-100 shadow-sm">
                            <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                            <span class="text-sm font-medium text-gray-700">Creative</span>
                        </div>
                        <div
                            class="flex items-center gap-2 bg-white/80 backdrop-blur-sm px-4 py-2 rounded-full border border-teal-100 shadow-sm">
                            <div class="w-2 h-2 bg-teal-500 rounded-full animate-pulse"></div>
                            <span class="text-sm font-medium text-gray-700">Trusted</span>
                        </div>
                        <div
                            class="flex items-center gap-2 bg-white/80 backdrop-blur-sm px-4 py-2 rounded-full border border-green-100 shadow-sm">
                            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                            <span class="text-sm font-medium text-gray-700">100% Client Satisfaction</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    @keyframes spin-slow {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    @keyframes slide-right {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(100%);
        }
    }

    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-spin-slow {
        animation: spin-slow 8s linear infinite;
    }

    .animate-slide-right {
        animation: slide-right 2s ease-in-out infinite;
    }

    .animate-fade-in-up {
        animation: fade-in-up 0.6s ease-out;
    }

    .bg-grid-pattern {
        background-image: radial-gradient(circle, #10b981 1px, transparent 1px);
        background-size: 20px 20px;
    }
</style>
<?php /**PATH D:\coding\Therkenal\therkenal\resources\views/components/home-components/tentang-kami.blade.php ENDPATH**/ ?>