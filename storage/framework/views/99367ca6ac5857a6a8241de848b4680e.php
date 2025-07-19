<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['sliders' => [], 'hero' => null, 'heroItems' => []]));

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

foreach (array_filter((['sliders' => [], 'hero' => null, 'heroItems' => []]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<section id="home" class="relative overflow-hidden">
    <div class="swiper main-slider h-[650px] shadow-2xl overflow-hidden relative">
        <div class="swiper-wrapper">
            <?php $__empty_1 = true; $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="swiper-slide group">
                    <div class="w-full h-full relative overflow-hidden">
                        <!-- Animated background overlay -->
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-blue-900/20 via-purple-900/20 to-pink-900/20 opacity-0 group-hover:opacity-100 transition-all duration-1000 z-10">
                        </div>

                        <!-- Dynamic particles effect -->
                        <div class="absolute inset-0 overflow-hidden z-5">
                            <div class="particle particle-1"></div>
                            <div class="particle particle-2"></div>
                            <div class="particle particle-3"></div>
                            <div class="particle particle-4"></div>
                            <div class="particle particle-5"></div>
                        </div>

                        <img src="<?php echo e(asset('storage/' . $slider->image)); ?>" alt="Slider Image"
                            class="w-full h-full object-cover object-center scale-110 group-hover:scale-105 transition-all duration-1000 ease-out filter brightness-90 group-hover:brightness-110" />

                        <!-- Enhanced gradient overlay -->
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent opacity-80 group-hover:opacity-90 transition-all duration-700">
                        </div>
                        <div
                            class="absolute bottom-32 left-20 w-16 h-16 bg-gradient-to-br from-blue-500/30 to-purple-500/30 rounded-lg rotate-45 animate-float opacity-70">
                        </div>

                        
                        <?php if(!empty($slider->title) || !empty($slider->description)): ?>
                            <div class="absolute bottom-16 left-12 z-20 text-white space-y-4 max-w-2xl">
                                <!-- Glassmorphism container -->
                                <div <?php if(!empty($slider->title)): ?> <h2
                                            class="text-4xl md:text-5xl font-extrabold drop-shadow-2xl mb-4 bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent leading-tight">
                                            <?php echo e($slider->title); ?>

                                        </h2> <?php endif; ?>
                                    <?php if(!empty($slider->description)): ?> <p class="text-lg md:text-xl text-gray-100 leading-relaxed opacity-90">
                                            <?php echo e($slider->description); ?>

                                        </p> <?php endif; ?>
                                    </div>
                                </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="swiper-slide">
                    <div
                        class="w-full h-full relative overflow-hidden bg-gradient-to-br from-gray-300 via-gray-200 to-gray-100 flex items-center justify-center">
                        <div class="text-center space-y-4">
                            <div
                                class="w-24 h-24 bg-gray-400 rounded-full flex items-center justify-center mx-auto mb-4 animate-pulse">
                                <svg class="w-12 h-12 text-gray-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <p class="text-gray-600 text-xl font-medium">No slider images available</p>
                            <p class="text-gray-500 text-sm">Upload images to create your slider</p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <!-- Enhanced Pagination -->
        <div class="swiper-pagination !bottom-8 z-30"></div>
        <!-- Progress bar -->
        <div class="absolute bottom-0 left-0 w-full h-1 bg-white/20 z-30">
            <div
                class="swiper-progress h-full bg-gradient-to-r from-blue-500 to-purple-500 transition-all duration-300">
            </div>
        </div>
    </div>

    <!-- Therkenal Hero/Jumbotron Section -->
    <div class="relative bg-gradient-to-br from-green-50 via-white to-green-100 py-20 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <svg class="w-full h-full" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                        <path d="M 10 0 L 0 0 0 10" fill="none" stroke="currentColor" stroke-width="0.5" />
                    </pattern>
                </defs>
                <rect width="100" height="100" fill="url(#grid)" />
            </svg>
        </div>

        <!-- Floating Elements -->
        <div class="absolute top-10 left-10 w-20 h-20 bg-green-200/30 rounded-full animate-float"></div>
        <div class="absolute top-32 right-20 w-16 h-16 bg-green-300/40 rounded-lg rotate-45 animate-float delay-300">
        </div>
        <div class="absolute bottom-20 left-1/4 w-12 h-12 bg-green-400/20 rounded-full animate-float delay-500"></div>
        <div class="absolute bottom-32 right-1/3 w-24 h-24 bg-green-200/25 rounded-full animate-float delay-700"></div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <!-- Content Side -->
                <div class="lg:w-1/2 text-center lg:text-left">
                    <!-- Company Name -->
                    <div class="mb-6">
                        <h1
                            class="text-6xl md:text-7xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-green-600 via-green-500 to-green-400 mb-2 tracking-tight">
                            <?php echo e($hero->title); ?>

                        </h1>
                        <div class="flex items-center justify-center lg:justify-start gap-4 mt-4">
                            <div class="h-1 w-16 bg-gradient-to-r from-green-500 to-green-400 rounded-full"></div>
                            <span class="text-green-600 font-medium text-lg">Digital Agency</span>
                            <div class="h-1 w-16 bg-gradient-to-r from-green-400 to-green-500 rounded-full"></div>
                        </div>
                    </div>

                    <!-- Tagline -->
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6 leading-tight">
                        <?php echo e($hero->subtitle); ?>

                        <span class="text-green-600">Make You Known</span>
                    </h2>

                    <!-- Description -->
                    <p class="text-lg md:text-xl text-gray-600 mb-8 leading-relaxed max-w-xl">
                        We transform your ideas into powerful digital experiences. From stunning websites to innovative
                        marketing strategies,
                        we help your brand stand out in the digital landscape.
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <button
                            class="group relative px-8 py-4 bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-green-600 to-green-700 translate-x-full group-hover:translate-x-0 transition-transform duration-300">
                            </div>
                            <span class="relative z-10 flex items-center gap-2">
                                Get Started
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>

                <!-- Visual Side -->
                <div class="lg:w-1/2 relative">
                    <div class="relative max-w-md mx-auto">
                        <!-- Main Card -->
                        <div
                            class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl p-8 border border-green-100 transform hover:scale-105 transition-all duration-500">
                            <div class="text-center">
                                <div
                                    class="w-24 h-24 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-800 mb-2">Creative Excellence</h3>
                                <p class="text-gray-600">Innovative solutions that drive results</p>
                            </div>
                        </div>

                        <!-- Floating Stats -->
                        <div
                            class="absolute -top-4 -right-4 bg-gradient-to-br from-green-500 to-green-600 text-white rounded-xl p-4 shadow-lg transform rotate-3 hover:rotate-0 transition-transform duration-300">
                            <div class="text-2xl font-bold">100+</div>
                            <div class="text-sm">Projects</div>
                        </div>

                        <div
                            class="absolute -bottom-4 -left-4 bg-white rounded-xl p-4 shadow-lg border border-green-100 transform -rotate-3 hover:rotate-0 transition-transform duration-300">
                            <div class="text-2xl font-bold text-green-600">24/7</div>
                            <div class="text-sm text-gray-600">Support</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?php $__env->startPush('styles'); ?>
    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        @keyframes spin-slow {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-spin-slow {
            animation: spin-slow 8s linear infinite;
        }

        .delay-300 {
            animation-delay: 300ms;
        }

        .delay-500 {
            animation-delay: 500ms;
        }

        .delay-700 {
            animation-delay: 700ms;
        }

        /* Particle effects */
        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            pointer-events: none;
        }

        .particle-1 {
            width: 4px;
            height: 4px;
            top: 20%;
            left: 20%;
            animation: float 3s ease-in-out infinite;
        }

        .particle-2 {
            width: 6px;
            height: 6px;
            top: 60%;
            left: 80%;
            animation: float 4s ease-in-out infinite reverse;
        }

        .particle-3 {
            width: 3px;
            height: 3px;
            top: 80%;
            left: 10%;
            animation: float 5s ease-in-out infinite;
        }

        .particle-4 {
            width: 5px;
            height: 5px;
            top: 10%;
            left: 90%;
            animation: float 3.5s ease-in-out infinite reverse;
        }

        .particle-5 {
            width: 4px;
            height: 4px;
            top: 40%;
            left: 60%;
            animation: float 4.5s ease-in-out infinite;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        // Additional JavaScript for enhanced interactions can be added here
        document.addEventListener('DOMContentLoaded', function() {
            // Example: Add hover effects or additional animations
            const heroButtons = document.querySelectorAll('.hero-items-slider button');

            heroButtons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.05)';
                });

                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1)';
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\lenovo\Documents\TherkenalCompro\resources\views/components/home-components/slider.blade.php ENDPATH**/ ?>