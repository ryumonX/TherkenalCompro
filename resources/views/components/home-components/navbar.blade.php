<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Therkenal Digital Agency</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        * {
            font-family: 'Inter', sans-serif;
        }

        /* Custom color palette */
        :root {
            --primary-green: #10b981;
            --primary-green-dark: #059669;
            --primary-green-light: #34d399;
            --accent-green: #6ee7b7;
            --soft-green: #d1fae5;
            --gradient-green: linear-gradient(135deg, #10b981 0%, #34d399 100%);
        }

        /* Glassmorphism effect */
        .glass-effect {
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(16, 185, 129, 0.1);
        }

        /* Smooth hover animations */
        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hover-lift:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.15);
        }

        /* Animated underline */
        .animated-underline {
            position: relative;
            overflow: hidden;
        }

        .animated-underline::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--gradient-green);
            transform: translateX(-100%);
            transition: transform 0.3s ease;
            border-radius: 2px;
        }

        .animated-underline:hover::before,
        .animated-underline.active::before {
            transform: translateX(0);
        }

        /* Floating animation */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        .floating {
            animation: float 3s ease-in-out infinite;
        }

        /* Pulse animation for CTA */
        @keyframes pulse-green {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.4);
            }

            50% {
                box-shadow: 0 0 0 10px rgba(16, 185, 129, 0);
            }
        }

        .pulse-green {
            animation: pulse-green 2s infinite;
        }

        /* Mobile menu gradient */
        .mobile-menu-gradient {
            background: linear-gradient(135deg, #10b981 0%, #059669 50%, #047857 100%);
        }

        /* Hamburger animation */
        .hamburger-line {
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .hamburger-active .hamburger-line-1 {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .hamburger-active .hamburger-line-2 {
            opacity: 0;
            transform: scaleX(0);
        }

        .hamburger-active .hamburger-line-3 {
            transform: rotate(-45deg) translate(7px, -6px);
        }

        /* Scroll progress bar */
        .scroll-progress {
            background: var(--gradient-green);
            height: 3px;
            border-radius: 0 0 2px 2px;
            box-shadow: 0 2px 4px rgba(16, 185, 129, 0.3);
        }

        /* Mobile menu body lock */
        body.menu-open {
            overflow: hidden;
        }

        /* Smooth scale animation */
        .scale-animation {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .scale-animation:hover {
            transform: scale(1.05);
        }

        /* Dropdown animations */
        .dropdown-enter {
            opacity: 0;
            transform: translateY(-10px) scale(0.95);
        }

        .dropdown-enter-active {
            opacity: 1;
            transform: translateY(0) scale(1);
            transition: all 0.2s ease-out;
        }

        /* Logo glow effect */
        .logo-glow {
            filter: drop-shadow(0 0 10px rgba(16, 185, 129, 0.3));
        }

        /* Menu item hover effects */
        .menu-item {
            position: relative;
            transition: all 0.3s ease;
        }

        .menu-item:hover {
            color: var(--primary-green);
            transform: translateY(-1px);
        }

        .menu-item.active {
            color: var(--primary-green-dark);
            font-weight: 600;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navigation -->
    <nav id="mainNav" class="fixed top-0 left-0 right-0 glass-effect shadow-lg z-50 transition-all duration-500">
        <div
            class="container mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center transition-all duration-500">
            <!-- Logo & Brand -->
 <a href="#" class="relative inline-block group z-10">
  <div class="relative inline-block transition-transform duration-300 ease-in-out group-hover:-translate-y-1">
    <img
      src="{{ asset('storage/' . $configWeb->logo) }}"
      alt="{{ $configWeb->title ?? 'Therkenal' }}"
      class="h-auto max-h-14 max-w-[150px] object-contain rounded-xl shadow-lg ring-2 ring-emerald-300/40 logo-glow transition-all duration-500"
    />

    <!-- Ping Dot / Accent -->
    <span class="absolute -top-1 -right-1 w-3 h-3 rounded-full bg-emerald-400 animate-ping"></span>
    <span class="absolute -top-1 -right-1 w-3 h-3 rounded-full bg-emerald-500"></span>
  </div>

  <!-- Optional Subtitle -->
  <div class="hidden sm:block mt-2 text-center">
    <div class="text-[11px] font-medium tracking-widest text-emerald-600 uppercase">Digital Agency</div>
  </div>
</a>



            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-1 lg:gap-4">
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center gap-1 lg:gap-4">
                    @php
                        $navs = [
                            [
                                'label' => 'Beranda',
                                'route' => route('home'),
                                'active' => request()->routeIs('home'),
                                'submenu' => false,
                            ],
                            [
                                'label' => 'Tentang Kami',
                                'route' => route('tentang-kami'),
                                'active' => request()->routeIs('tentang-kami'),
                                'submenu' => false,
                            ],
                            [
                                'label' => 'Produk',
                                'route' => route('produk.index'),
                                'active' => request()->routeIs('produk.*'),
                                'submenu' => false,
                            ],
    
                            [
                                'label' => 'Kontak',
                                'route' => route('kontak'),
                                'active' => request()->routeIs('kontak'),
                                'submenu' => false,
                            ],
                        ];
                    @endphp

                    @foreach ($navs as $nav)
                        @if ($nav['submenu'])
                            <!-- Dropdown Menu -->
                            <div class="relative group/dropdown">
                                <a href="{{ $nav['route'] }}"
                                    class="menu-item flex items-center px-4 py-2 font-medium text-base transition-all duration-300 rounded-lg
                   {{ $nav['active'] ? 'text-emerald-700 font-semibold' : 'text-gray-700 hover:text-emerald-600' }}">
                                    <span>{{ $nav['label'] }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 ml-1 transform transition-transform duration-300 group-hover/dropdown:rotate-180"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </a>

                                <!-- Dropdown Items -->
                                <div
                                    class="absolute top-full left-0 mt-2 w-64 bg-white rounded-xl shadow-xl border border-emerald-100 opacity-0 translate-y-2 pointer-events-none transition-all duration-300 group-hover/dropdown:opacity-100 group-hover/dropdown:translate-y-0 group-hover/dropdown:pointer-events-auto">
                                    <div class="py-3 px-2">
                                        @foreach ($nav['items'] as $item)
                                            <a href="{{ $item['route'] }}"
                                                class="block px-4 py-3 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-700 rounded-lg transition-all duration-200 hover-lift">
                                                <div class="font-medium">{{ $item['label'] }}</div>
                                                @if (!empty($item['desc']))
                                                    <div class="text-xs text-gray-500">{{ $item['desc'] }}</div>
                                                @endif
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @else
                            <!-- Normal Menu Item -->
                            <a href="{{ $nav['route'] }}"
                                class="menu-item animated-underline px-4 py-2 font-medium text-base transition-all duration-300 rounded-lg
               {{ $nav['active'] ? 'text-emerald-700 font-semibold active' : 'text-gray-700 hover:text-emerald-600' }}">
                                <span>{{ $nav['label'] }}</span>
                            </a>
                        @endif
                    @endforeach

                    <!-- CTA Button -->
                    <a href="{{ route('kontak') }}"
                        class="ml-4 px-6 py-3 bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-emerald-500/25 transition-all duration-300 transform hover:-translate-y-1 pulse-green scale-animation">
                        <span class="flex items-center gap-2">
                            <i class="fas fa-rocket text-sm"></i>
                            Mulai Proyek
                        </span>
                    </a>
                </div>

            </div>

            <!-- Mobile Menu Toggle -->
            <div class="md:hidden">
                <button id="menuToggle"
                    class="text-gray-700 focus:outline-none rounded-lg p-2 hover:bg-emerald-50 transition-all duration-300 scale-animation"
                    aria-label="Menu">
                    <div class="w-6 h-5 flex flex-col justify-between items-center">
                        <span class="w-full h-0.5 bg-gray-700 hamburger-line hamburger-line-1 rounded-full"></span>
                        <span class="w-full h-0.5 bg-gray-700 hamburger-line hamburger-line-2 rounded-full"></span>
                        <span class="w-full h-0.5 bg-gray-700 hamburger-line hamburger-line-3 rounded-full"></span>
                    </div>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu"
            class="fixed inset-0 top-0 left-0 w-full h-screen mobile-menu-gradient z-50 flex flex-col justify-between transform translate-x-full transition-all duration-500 md:hidden overflow-auto">
            <div class="flex justify-between items-center px-6 py-6 border-b border-white/20">
                <div class="flex items-center gap-3">
                    <div class="text-white text-2xl font-bold">Therkenal</div>
                    <div class="text-emerald-200 text-sm">Digital Agency</div>
                </div>
                <button id="mobileClose" class="text-white hover:text-emerald-200 transition-colors scale-animation">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="flex-grow overflow-y-auto py-8 px-6">
                <nav class="flex flex-col space-y-3">
                    @foreach ($navs as $nav)
                        @if ($nav['submenu'])
                            <div class="mobile-dropdown">
                                <button
                                    class="mobile-dropdown-toggle w-full flex items-center justify-between text-white text-xl font-bold px-4 py-3 rounded-xl transition-all duration-300 hover:bg-white/10">
                                    <span>{{ $nav['label'] }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 transform transition-transform duration-300" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div class="mobile-dropdown-content hidden pl-4 mt-2 space-y-2">
                                    @foreach ($nav['items'] as $item)
                                        <a href="{{ $item['route'] }}"
                                            class="block text-white/80 hover:text-white text-lg px-4 py-2 rounded-xl hover:bg-white/10 transition-colors">
                                            {{ $item['label'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <a href="{{ $nav['route'] }}"
                                class="text-white text-xl font-bold px-4 py-3 rounded-xl transition-all duration-300
               {{ $nav['active'] ? 'bg-white/20 shadow-lg' : 'hover:bg-white/10' }}">
                                {{ $nav['label'] }}
                            </a>
                        @endif
                    @endforeach
                </nav>
            </div>

            <div class="p-6 border-t border-white/20">
                <div class="flex flex-col items-center space-y-4">
                    <a href="{{ route('kontak') }}"
                        class="w-full px-6 py-4 bg-white text-emerald-700 font-bold rounded-xl text-center shadow-lg transition-all duration-300 hover:bg-emerald-50 scale-animation">
                        <span class="flex items-center justify-center gap-2">
                            Hubungi Kami
                        </span>
                    </a>

                    <div class="flex items-center space-x-6 mt-6">
                        <a href="#" class="text-white hover:text-emerald-200 transition-colors scale-animation">
                            <i class="fab fa-instagram text-2xl"></i>
                        </a>
                        <a href="#" class="text-white hover:text-emerald-200 transition-colors scale-animation">
                            <i class="fab fa-linkedin text-2xl"></i>
                        </a>
                        <a href="#" class="text-white hover:text-emerald-200 transition-colors scale-animation">
                            <i class="fab fa-twitter text-2xl"></i>
                        </a>
                        <a href="#" class="text-white hover:text-emerald-200 transition-colors scale-animation">
                            <i class="fab fa-dribbble text-2xl"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Progress Bar -->
        <div id="scrollProgress" class="scroll-progress w-0 transition-all duration-300"></div>
    </nav>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mainNav = document.getElementById('mainNav');
            const menuToggle = document.getElementById('menuToggle');
            const mobileMenu = document.getElementById('mobileMenu');
            const mobileClose = document.getElementById('mobileClose');
            const scrollProgress = document.getElementById('scrollProgress');

            // Toggle Mobile Menu
            function toggleMobileMenu() {
                const isOpen = mobileMenu.classList.contains('translate-x-0');

                if (isOpen) {
                    mobileMenu.classList.add('translate-x-full');
                    mobileMenu.classList.remove('translate-x-0');
                    menuToggle.classList.remove('hamburger-active');
                    document.body.classList.remove('menu-open');
                } else {
                    mobileMenu.classList.add('translate-x-0');
                    mobileMenu.classList.remove('translate-x-full');
                    menuToggle.classList.add('hamburger-active');
                    document.body.classList.add('menu-open');
                }
            }

            // Scroll handler untuk efek navbar dan progress bar
            function handleScroll() {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                const docHeight = Math.max(
                    document.body.scrollHeight,
                    document.body.offsetHeight,
                    document.documentElement.clientHeight,
                    document.documentElement.scrollHeight,
                    document.documentElement.offsetHeight
                ) - window.innerHeight;

                // Update scroll progress bar
                const scrollPercent = (scrollTop / docHeight) * 100;
                scrollProgress.style.width = `${scrollPercent}%`;

                // Navbar scroll effect
                if (scrollTop > 50) {
                    mainNav.classList.add('py-2');
                    mainNav.classList.remove('py-4');
                    mainNav.classList.add('shadow-xl');
                    mainNav.classList.remove('shadow-lg');
                } else {
                    mainNav.classList.remove('py-2');
                    mainNav.classList.add('py-4');
                    mainNav.classList.remove('shadow-xl');
                    mainNav.classList.add('shadow-lg');
                }
            }

            // Setup Mobile Dropdown toggles
            function setupMobileDropdowns() {
                const mobileDropdownToggles = document.querySelectorAll('.mobile-dropdown-toggle');

                mobileDropdownToggles.forEach(toggle => {
                    toggle.addEventListener('click', function() {
                        const dropdown = this.closest('.mobile-dropdown');
                        const dropdownContent = dropdown.querySelector('.mobile-dropdown-content');
                        const arrow = this.querySelector('svg');

                        if (dropdownContent.classList.contains('hidden')) {
                            dropdownContent.classList.remove('hidden');
                            arrow.classList.add('rotate-180');
                        } else {
                            dropdownContent.classList.add('hidden');
                            arrow.classList.remove('rotate-180');
                        }
                    });
                });
            }

            // Event Listeners
            menuToggle.addEventListener('click', toggleMobileMenu);
            mobileClose.addEventListener('click', toggleMobileMenu);
            window.addEventListener('scroll', handleScroll);
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 768 && !mobileMenu.classList.contains('translate-x-full')) {
                    mobileMenu.classList.add('translate-x-full');
                    mobileMenu.classList.remove('translate-x-0');
                    menuToggle.classList.remove('hamburger-active');
                    document.body.classList.remove('menu-open');
                }
            });

            // Initialize
            setupMobileDropdowns();
            handleScroll();
        });
    </script>
