import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

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
                            const navButtons = document.querySelectorAll(
                                '.hero-swiper-button-next, .hero-swiper-button-prev');
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
