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
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/20 via-purple-900/20 to-pink-900/20 opacity-0 group-hover:opacity-100 transition-all duration-1000 z-10"></div>

                        <!-- Dynamic particles effect -->
                        <div class="absolute inset-0 overflow-hidden z-5">
                            <div class="particle particle-1"></div>
                            <div class="particle particle-2"></div>
                            <div class="particle particle-3"></div>
                            <div class="particle particle-4"></div>
                            <div class="particle particle-5"></div>
                        </div>

                        <img
                            src="<?php echo e(asset('storage/' . $slider->image)); ?>"
                            alt="Slider Image"
                            class="w-full h-full object-cover object-center scale-110 group-hover:scale-105 transition-all duration-1000 ease-out filter brightness-90 group-hover:brightness-110"
                        />

                        <!-- Enhanced gradient overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent opacity-80 group-hover:opacity-90 transition-all duration-700"></div>

                        <!-- Animated geometric shapes -->
                        <div class="absolute top-20 right-20 w-32 h-32 border-2 border-white/20 rounded-full animate-pulse-slow opacity-60"></div>
                        <div class="absolute bottom-32 left-20 w-16 h-16 bg-gradient-to-br from-blue-500/30 to-purple-500/30 rounded-lg rotate-45 animate-float opacity-70"></div>

                        
                        <?php if(!empty($slider->title) || !empty($slider->description)): ?>
                        <div class="absolute bottom-16 left-12 z-20 text-white space-y-4 max-w-2xl">
                            <!-- Glassmorphism container -->
                            <div class="backdrop-blur-xl bg-white/10 border border-white/20 p-8 rounded-2xl shadow-2xl transform translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-800 ease-out">
                                <?php if(!empty($slider->title)): ?>
                                    <h2 class="text-4xl md:text-5xl font-extrabold drop-shadow-2xl mb-4 bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent leading-tight">
                                        <?php echo e($slider->title); ?>

                                    </h2>
                                <?php endif; ?>
                                <?php if(!empty($slider->description)): ?>
                                    <p class="text-lg md:text-xl text-gray-100 leading-relaxed opacity-90">
                                        <?php echo e($slider->description); ?>

                                    </p>
                                <?php endif; ?>

                                <!-- Interactive CTA button -->

                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="swiper-slide">
                    <div class="w-full h-full relative overflow-hidden bg-gradient-to-br from-gray-300 via-gray-200 to-gray-100 flex items-center justify-center">
                        <div class="text-center space-y-4">
                            <div class="w-24 h-24 bg-gray-400 rounded-full flex items-center justify-center mx-auto mb-4 animate-pulse">
                                <svg class="w-12 h-12 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
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
            <div class="swiper-progress h-full bg-gradient-to-r from-blue-500 to-purple-500 transition-all duration-300"></div>
        </div>
    </div>

    <!-- Enhanced Hero section -->
    <div class="container mx-auto px-6 relative -mt-16 z-40">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-8 bg-white/95 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/20 p-8 transform hover:scale-[1.02] transition-all duration-500">
            <!-- Enhanced Title and Subtitle Section -->
            <div class="md:w-1/2 text-center space-y-4">
                <?php if($hero): ?>
                    <div class="relative">
                        <h2 class="text-2xl md:text-3xl font-bold bg-gradient-to-r from-gray-800 via-blue-600 to-purple-600 bg-clip-text text-transparent mb-4 leading-tight">
                            <?php echo e($hero->title); ?>

                        </h2>
                        <div class="absolute -top-2 -left-2 w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full opacity-20 animate-pulse"></div>
                    </div>
                    <p class="text-md md:text-lg text-gray-600 leading-relaxed relative">
                        <?php echo e($hero->subtitle); ?>

                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-16 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full"></div>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Enhanced Hero Items Section -->
            <div class="md:w-1/2">
                <?php if(count($heroItems) > 2): ?>
                    <!-- Enhanced Hero Items Slider -->
                    <div class="hero-items-slider relative">
                        <div class="swiper hero-swiper overflow-hidden rounded-2xl">
                            <div class="swiper-wrapper">
                                <?php $__currentLoopData = $heroItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="swiper-slide">
                                        <div class="relative overflow-hidden bg-gradient-to-br from-blue-500 via-blue-600 to-purple-600 rounded-2xl shadow-xl py-12 px-6 flex flex-col items-center group/item transform hover:scale-105 transition-all duration-300">
                                            <!-- Animated background pattern -->
                                            <div class="absolute inset-0 opacity-10">
                                                <div class="absolute top-4 right-4 w-16 h-16 border-2 border-white rounded-full animate-spin-slow"></div>
                                                <div class="absolute bottom-4 left-4 w-12 h-12 bg-white/20 rounded-lg rotate-45 animate-float"></div>
                                            </div>

                                            <div class="relative z-10">
                                                <h3 class="text-2xl md:text-3xl font-bold text-white mb-2 group-hover/item:scale-110 transition-transform duration-300">
                                                    <?php echo e($item->title); ?>

                                                </h3>
                                                <p class="text-base md:text-lg text-blue-100 text-center leading-relaxed">
                                                    <?php echo e($item->subtitle); ?>

                                                </p>
                                            </div>

                                            <!-- Hover effect overlay -->
                                            <div class="absolute inset-0 bg-gradient-to-br from-purple-600/50 to-pink-600/50 opacity-0 group-hover/item:opacity-100 transition-all duration-300 rounded-2xl"></div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <!-- Enhanced Custom Navigation Buttons -->

                            <div class="hero-swiper-button-prev after:content-[''] w-10 h-10 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center shadow-lg hover:bg-white/30 hover:scale-110 transition-all duration-300 border border-white/30 absolute top-1/2 -translate-y-1/2 left-3 z-20">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <!-- Enhanced Regular grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <?php $__empty_1 = true; $__currentLoopData = $heroItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="relative overflow-hidden bg-gradient-to-br from-blue-500 via-blue-600 to-purple-600 rounded-2xl shadow-xl py-12 px-6 flex flex-col items-center group/item transform hover:scale-105 hover:rotate-1 transition-all duration-300">
                                <!-- Animated background -->
                                <div class="absolute inset-0 opacity-10">
                                    <div class="absolute top-4 right-4 w-12 h-12 border-2 border-white rounded-full animate-pulse"></div>
                                    <div class="absolute bottom-4 left-4 w-8 h-8 bg-white/20 rounded-lg rotate-45 animate-float"></div>
                                </div>

                                <div class="relative z-10">
                                    <h3 class="text-2xl md:text-3xl font-bold text-white mb-2 group-hover/item:scale-110 transition-transform duration-300">
                                        <?php echo e($item->title); ?>

                                    </h3>
                                    <p class="text-base md:text-lg text-blue-100 text-center">
                                        <?php echo e($item->subtitle); ?>

                                    </p>
                                </div>

                                <!-- Hover effect -->
                                <div class="absolute inset-0 bg-gradient-to-br from-purple-600/50 to-pink-600/50 opacity-0 group-hover/item:opacity-100 transition-all duration-300 rounded-2xl"></div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <!-- Enhanced Default Cards -->
                            <div class="relative overflow-hidden bg-white rounded-2xl shadow-xl border border-gray-100 p-8 flex flex-col items-center group/card transform hover:scale-105 hover:-rotate-1 transition-all duration-300">
                                <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-purple-50 opacity-0 group-hover/card:opacity-100 transition-opacity duration-300"></div>

                                <div class="relative z-10">
                                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-500 rounded-2xl flex items-center justify-center mb-4 transform group-hover/card:scale-110 group-hover/card:rotate-12 transition-all duration-300 shadow-lg">
                                        <i class="fas fa-calendar-check text-white text-2xl"></i>
                                    </div>
                                    <h3 class="text-3xl font-bold bg-gradient-to-r from-gray-800 to-blue-600 bg-clip-text text-transparent mb-2">10+</h3>
                                    <p class="text-gray-600 font-medium">Tahun Pengalaman</p>
                                </div>

                                <!-- Decorative elements -->
                                <div class="absolute top-4 right-4 w-8 h-8 bg-blue-100 rounded-full opacity-50 animate-pulse"></div>
                            </div>

                            <div class="relative overflow-hidden bg-white rounded-2xl shadow-xl border border-gray-100 p-8 flex flex-col items-center group/card transform hover:scale-105 hover:rotate-1 transition-all duration-300">
                                <div class="absolute inset-0 bg-gradient-to-br from-purple-50 to-pink-50 opacity-0 group-hover/card:opacity-100 transition-opacity duration-300"></div>

                                <div class="relative z-10">
                                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mb-4 transform group-hover/card:scale-110 group-hover/card:rotate-12 transition-all duration-300 shadow-lg">
                                        <i class="fas fa-tasks text-white text-2xl"></i>
                                    </div>
                                    <h3 class="text-3xl font-bold bg-gradient-to-r from-gray-800 to-purple-600 bg-clip-text text-transparent mb-2">100+</h3>
                                    <p class="text-gray-600 font-medium">Proyek Selesai</p>
                                </div>

                                <!-- Decorative elements -->
                                <div class="absolute top-4 right-4 w-8 h-8 bg-purple-100 rounded-full opacity-50 animate-pulse"></div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php $__env->startPush('styles'); ?>
<style>
    /* Enhanced pagination styles */
    .swiper-pagination-bullet {
        @apply w-3 h-3 bg-white/60 opacity-80 transition-all duration-300 mx-1;
        border-radius: 50%;
        position: relative;
        overflow: hidden;
    }

    .swiper-pagination-bullet-active {
        @apply bg-white scale-125 shadow-lg opacity-100;
        background: linear-gradient(45deg, #3b82f6, #8b5cf6);
    }

    .swiper-pagination-bullet::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 0;
        height: 0;
        background: linear-gradient(45deg, #3b82f6, #8b5cf6);
        border-radius: 50%;
        transition: all 0.3s ease;
    }

    .swiper-pagination-bullet:hover::before {
        width: 100%;
        height: 100%;
    }

    /* Progress bar animation */
    .swiper-progress {
        width: 0%;
        transition: width 0.1s ease;
    }

    /* Floating particles */
    .particle {
        position: absolute;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        pointer-events: none;
        animation: float 6s ease-in-out infinite;
    }

    .particle-1 { width: 8px; height: 8px; top: 20%; left: 10%; animation-delay: 0s; }
    .particle-2 { width: 12px; height: 12px; top: 60%; left: 80%; animation-delay: 2s; }
    .particle-3 { width: 6px; height: 6px; top: 80%; left: 20%; animation-delay: 4s; }
    .particle-4 { width: 10px; height: 10px; top: 30%; left: 70%; animation-delay: 1s; }
    .particle-5 { width: 14px; height: 14px; top: 70%; left: 50%; animation-delay: 3s; }

    /* Custom animations */
    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.7; }
        50% { transform: translateY(-20px) rotate(180deg); opacity: 1; }
    }

    @keyframes pulse-slow {
        0%, 100% { transform: scale(1); opacity: 0.6; }
        50% { transform: scale(1.05); opacity: 0.8; }
    }

    @keyframes spin-slow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .animate-float { animation: float 4s ease-in-out infinite; }
    .animate-pulse-slow { animation: pulse-slow 3s ease-in-out infinite; }
    .animate-spin-slow { animation: spin-slow 8s linear infinite; }

    /* Glassmorphism enhancements */
    .backdrop-blur-xl {
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
    }

    /* Custom scrollbar for better UX */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb {
        background: linear-gradient(45deg, #3b82f6, #8b5cf6);
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(45deg, #2563eb, #7c3aed);
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced main slider with progress bar
    const mainSwiper = new Swiper('.main-slider', {
        slidesPerView: 1,
        loop: true,
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        speed: 1000,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            dynamicBullets: true,
        },
        parallax: true,

        // Progress bar functionality
        on: {
            init: function() {
                updateProgressBar(this);
            },
            autoplayTimeLeft: function(swiper, time, progress) {
                const progressBar = document.querySelector('.swiper-progress');
                if (progressBar) {
                    progressBar.style.width = (1 - progress) * 100 + '%';
                }
            },
            slideChange: function() {
                updateProgressBar(this);
            }
        }
    });

    function updateProgressBar(swiper) {
        const progressBar = document.querySelector('.swiper-progress');
        if (progressBar) {
            progressBar.style.width = '0%';
            setTimeout(() => {
                progressBar.style.width = '100%';
            }, 100);
        }
    }

    // Enhanced hero items slider
    if (document.querySelector('.hero-swiper')) {
        const heroSwiper = new Swiper('.hero-swiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            speed: 700,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                }
            },
            effect: 'slide',
            grabCursor: true,

            // Add smooth transitions
            on: {
                slideChange: function() {
                    // Add subtle shake effect to navigation buttons
                    const navButtons = document.querySelectorAll('.hero-swiper-button-next, .hero-swiper-button-prev');
                    navButtons.forEach(btn => {
                        btn.style.animation = 'none';
                        setTimeout(() => {
                            btn.style.animation = 'float 0.3s ease-in-out';
                        }, 10);
                    });
                }
            }
        });
    }

    // Add interactive cursor effect
    const slider = document.querySelector('.main-slider');
    if (slider) {
        slider.addEventListener('mousemove', function(e) {
            const particles = document.querySelectorAll('.particle');
            particles.forEach((particle, index) => {
                const speed = (index + 1) * 0.02;
                const x = (e.clientX - slider.offsetLeft) * speed;
                const y = (e.clientY - slider.offsetTop) * speed;

                particle.style.transform = `translate(${x}px, ${y}px)`;
            });
        });
    }

    // Add smooth reveal animations for hero section
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    });

    // Observe hero section elements
    const heroElements = document.querySelectorAll('.md\\:w-1\\/2 > div, .hero-items-slider, .grid > div');
    heroElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'all 0.6s ease-out';
        observer.observe(el);
    });

    // Enhanced keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft') {
            mainSwiper.slidePrev();
        } else if (e.key === 'ArrowRight') {
            mainSwiper.slideNext();
        }
    });

    // Add touch gesture support for mobile
    let touchStartX = 0;
    let touchEndX = 0;

    slider?.addEventListener('touchstart', function(e) {
        touchStartX = e.changedTouches[0].screenX;
    });

    slider?.addEventListener('touchend', function(e) {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    });

    function handleSwipe() {
        const swipeThreshold = 50;
        const diff = touchStartX - touchEndX;

        if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0) {
                mainSwiper.slideNext();
            } else {
                mainSwiper.slidePrev();
            }
        }
    }
});
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\coding\Therkenal\therkenal\resources\views/components/home-components/slider.blade.php ENDPATH**/ ?>