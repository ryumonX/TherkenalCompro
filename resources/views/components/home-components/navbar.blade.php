<nav id="mainNav" class="fixed top-0 left-0 right-0 bg-white/80 backdrop-blur-md shadow-md z-50 transition-all duration-500">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-3 flex justify-between items-center transition-all duration-500">
        <!-- Logo & Brand -->
        <a href="{{ route('home') }}" class="flex items-center gap-4 group relative z-10">
            @if($configWeb && $configWeb->logo)
                <img src="{{ asset('storage/' . $configWeb->logo) }}"
                     alt="{{ $configWeb->title ?? 'Logo AtapPro' }}"
                     class="h-12 w-auto drop-shadow-sm transition-all duration-300 group-hover:drop-shadow-md" />
            @else
                <div class="flex items-center">
                    <div class="text-blue-600 font-bold text-2xl mr-1">Atap</div>
                    <div class="text-blue-800 font-extrabold text-2xl">Pro</div>
                </div>
            @endif

            <!-- Logo hover effect -->
            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-blue-400 transition-all duration-300 group-hover:w-full"></span>
        </a>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center gap-1 lg:gap-3">
            @php
                $navs = [
                    ['label'=>'Beranda', 'route'=>route('home'), 'active'=>request()->routeIs('home'), 'submenu'=>false],
                    ['label'=>'Tentang Kami', 'route'=>route('tentang-kami'), 'active'=>request()->routeIs('tentang-kami'), 'submenu'=>false],
                    [
                        'label'=>'Produk',
                        'route'=>route('produk.index'),
                        'active'=>request()->routeIs('produk.*'),
                        'submenu'=>false,
                    ],
                    ['label'=>'Artikel', 'route'=>route('artikel.index'), 'active'=>request()->routeIs('artikel.*'), 'submenu'=>false],
                    ['label'=>'Kontak', 'route'=>route('kontak'), 'active'=>request()->routeIs('kontak'), 'submenu'=>false],
                ];
            @endphp

            @foreach($navs as $nav)
                @if($nav['submenu'])
                    <!-- Dropdown Menu -->
                    <div class="relative group/dropdown">
                        <a href="{{ $nav['route'] }}"
                           class="relative flex items-center px-3 py-2 font-medium text-base transition-all duration-300 rounded-lg
                           {{ $nav['active']
                                ? 'text-blue-700 font-bold bg-blue-50/80'
                                : 'text-gray-600 hover:text-blue-600 hover:bg-gray-100/60' }}">
                            <span>{{ $nav['label'] }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 transform transition-transform duration-200 group-hover/dropdown:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>

                            @if($nav['active'])
                                <!-- Animated indicator for active dropdown -->
                                <span class="absolute inset-x-1 bottom-0 h-0.5 bg-gradient-to-r from-blue-400 via-blue-600 to-blue-400 transform origin-left scale-x-100 rounded-full"></span>
                            @endif
                        </a>

                        <!-- Dropdown panel -->
                        <div class="absolute top-full left-0 mt-1 w-56 bg-white rounded-lg shadow-lg border border-gray-100 opacity-0 translate-y-2 pointer-events-none transition-all duration-300 group-hover/dropdown:opacity-100 group-hover/dropdown:translate-y-0 group-hover/dropdown:pointer-events-auto">
                            <div class="py-2 px-3">
                                @foreach($nav['items'] as $item)
                                    <a href="{{ $item['route'] }}" class="block px-3 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 rounded-md transition-colors">
                                        {{ $item['label'] }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Normal Menu Item -->
                    <a href="{{ $nav['route'] }}"
                       class="relative px-3 py-2 font-medium text-base transition-all duration-300 rounded-lg
                       {{ $nav['active']
                            ? 'text-blue-700 font-bold bg-blue-50/80'
                            : 'text-gray-600 hover:text-blue-600 hover:bg-gray-100/60' }}">
                        <span>{{ $nav['label'] }}</span>

                        @if($nav['active'])
                            <!-- Animated indicator for active menu -->
                            <span class="absolute inset-x-1 bottom-0 h-0.5 bg-gradient-to-r from-blue-400 via-blue-600 to-blue-400 transform origin-left scale-x-0 animate-scale-x-100 rounded-full"></span>
                        @endif
                    </a>
                @endif
            @endforeach

            <!-- CTA Button -->
            <a href="{{ route('kontak') }}" class="ml-2 lg:ml-4 px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium rounded-lg shadow-sm hover:shadow-blue-500/20 transition-all duration-300 transform hover:-translate-y-0.5">
                Hubungi Kami
            </a>
        </div>

        <!-- Hamburger Toggle dengan animasi yang lebih baik -->
        <div class="md:hidden">
            <button id="menuToggle"
                class="text-gray-700 focus:outline-none rounded-lg p-2 hover:bg-blue-100 transition-all duration-300"
                aria-label="Menu"
            >
                <div class="w-6 h-5 flex flex-col justify-between items-center">
                    <span class="w-full h-0.5 bg-gray-700 transform transition-all duration-300 origin-left hamburger-line-1"></span>
                    <span class="w-full h-0.5 bg-gray-700 transform transition-all duration-300 hamburger-line-2"></span>
                    <span class="w-full h-0.5 bg-gray-700 transform transition-all duration-300 origin-left hamburger-line-3"></span>
                </div>
            </button>
        </div>
    </div>

    <!-- Mobile Menu yang lebih menarik -->
    <div id="mobileMenu" class="fixed inset-0 top-0 left-0 w-full h-screen bg-gradient-to-br from-blue-600/95 to-blue-800/95 backdrop-blur-md z-50 flex flex-col justify-between transform translate-x-full transition-all duration-500 md:hidden overflow-auto">
        <div class="flex justify-between items-center px-6 py-4 border-b border-white/10">
            <div class="text-white text-2xl font-bold">Menu Navigasi</div>
            <button id="mobileClose" class="text-white hover:text-red-300 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <div class="flex-grow overflow-y-auto py-6 px-6">
            <nav class="flex flex-col space-y-2">
                @foreach($navs as $nav)
                    @if($nav['submenu'])
                        <div class="mobile-dropdown">
                            <button class="mobile-dropdown-toggle w-full flex items-center justify-between text-white text-xl font-bold px-4 py-3 rounded-xl transition-all duration-300 hover:bg-white/10">
                                <span>{{ $nav['label'] }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="mobile-dropdown-content hidden pl-4 mt-2 space-y-2">
                                @foreach($nav['items'] as $item)
                                    <a href="{{ $item['route'] }}" class="block text-white/80 hover:text-white text-lg px-4 py-2 rounded-xl hover:bg-white/10 transition-colors">
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

        <div class="p-6 border-t border-white/10">
            <div class="flex flex-col items-center space-y-4">
                <a href="{{ route('kontak') }}" class="w-full px-6 py-3 bg-white text-blue-700 font-bold rounded-xl text-center shadow-lg transition-all duration-300 hover:bg-blue-50 hover:scale-105">
                    Hubungi Kami
                </a>
                <div class="flex items-center space-x-4 mt-4">
                    @forelse($socialMedia as $social)
                    <a href="{{ $social->link_platform }}" class="text-white hover:text-blue-200 transition-colors">
                        <img src="{{ asset('storage/' . $social->images->first()->image) }}" alt="{{ $social->platform }}" class="w-7 h-7">
                    </a>
                    @empty
                    <a href="#" class="text-white hover:text-blue-200 transition-colors">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Progress Bar untuk scroll position -->
    <div id="scrollProgress" class="h-0.5 bg-gradient-to-r from-blue-400 via-blue-600 to-blue-400 w-0 transition-all duration-300"></div>
</nav>

<!-- Spacing untuk fixed navbar -->
<div class="h-16 md:h-20"></div>

<!-- Inline style untuk animasi -->
<style>
/* Animasi untuk active menu indicator */
@keyframes scale-x-100 {
    0%   { transform: scaleX(0); }
    100% { transform: scaleX(1); }
}
.animate-scale-x-100 {
    animation: scale-x-100 0.5s cubic-bezier(0.4,0,0.2,1) forwards;
}

/* Style untuk hamburger menu active state */
.hamburger-active .hamburger-line-1 {
    transform: rotate(45deg);
}
.hamburger-active .hamburger-line-2 {
    transform: scaleX(0);
    opacity: 0;
}
.hamburger-active .hamburger-line-3 {
    transform: rotate(-45deg);
}

/* Mobile nav styling */
body.menu-open {
    overflow: hidden;
}

/* Fix untuk mobile menu full screen */
#mobileMenu {
    height: 100vh;
    width: 100%;
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
}

@media (max-width: 767px) {
    #mobileMenu.translate-x-0 {
        display: flex !important;
        height: 100vh !important;
    }
}
</style>

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
            mainNav.classList.remove('py-3');
            mainNav.classList.add('shadow-lg');
            mainNav.classList.remove('shadow-md');
            mainNav.classList.add('bg-white/95');
            mainNav.classList.remove('bg-white/80');
        } else {
            mainNav.classList.remove('py-2');
            mainNav.classList.add('py-3');
            mainNav.classList.remove('shadow-lg');
            mainNav.classList.add('shadow-md');
            mainNav.classList.remove('bg-white/95');
            mainNav.classList.add('bg-white/80');
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