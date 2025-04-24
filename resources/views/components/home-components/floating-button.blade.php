<div id="floating-buttons" class="fixed bottom-6 right-6 flex flex-col items-end gap-4 z-50">
    <!-- Tombol Menu Utama -->
    <button id="toggleFloatingMenu" class="flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-600 to-blue-700 rounded-full shadow-xl hover:shadow-blue-500/30 transform hover:scale-105 transition-all duration-300 animate-bounce-gentle">
        <div class="relative">
            <span id="buttonIcon" class="transition-transform duration-300">
                <i class="fas fa-plus text-white text-2xl"></i>
            </span>
            <span class="absolute bottom-0 right-0 -mr-1 -mt-1 w-4 h-4 bg-red-500 rounded-full animate-pulse"></span>
        </div>
    </button>

    <!-- Tombol Actions Container -->
    <div id="floatingActionsContainer" class="flex flex-col gap-3 scale-0 opacity-0 origin-bottom-right transition-all duration-300">
        <!-- WhatsApp Button -->
        <a href="https://wa.me/{{ $kontak->no_telegram ?? '' }}"
           target="_blank"
           class="action-button flex items-center justify-center w-14 h-14 bg-gradient-to-r from-green-500 to-green-600 rounded-full shadow-lg hover:shadow-green-500/30 hover:scale-110 transition-all duration-300 group">
            <div class="relative">
                <i class="fab fa-whatsapp text-white text-2xl"></i>
                <!-- Tooltip dinamis yang menyesuaikan posisi berdasarkan ukuran layar -->
                <div class="absolute right-full mr-3 md:mr-3 md:right-full lg:mr-3 lg:right-full tooltip-text">
                    <span class="block bg-black/75 backdrop-blur-sm text-white text-sm py-2 px-4 rounded-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-300 -translate-x-2 group-hover:translate-x-0 transform shadow-lg">
                        Chat WhatsApp
                    </span>
                </div>
            </div>
        </a>

        <!-- Telepon Button dengan ikon yang benar -->
        <a href="tel:{{ $kontak->no_telepon ?? '' }}"
            target="_blank"
            class="action-button flex items-center justify-center w-14 h-14 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full shadow-lg hover:shadow-blue-500/30 hover:scale-110 transition-all duration-300 group">
            <div class="relative">
                <i class="fas fa-phone-alt text-white text-xl"></i>
                <!-- Tooltip dinamis -->
                <div class="absolute right-full mr-3 md:mr-3 md:right-full lg:mr-3 lg:right-full tooltip-text">
                    <span class="block bg-black/75 backdrop-blur-sm text-white text-sm py-2 px-4 rounded-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-300 -translate-x-2 group-hover:translate-x-0 transform shadow-lg">
                        Hubungi Kami
                    </span>
                </div>
            </div>
        </a>

        <!-- Email Button -->
        <a href="mailto:{{ $kontak->email ?? '' }}"
            target="_blank"
            class="action-button flex items-center justify-center w-14 h-14 bg-gradient-to-r from-red-500 to-red-600 rounded-full shadow-lg hover:shadow-red-500/30 hover:scale-110 transition-all duration-300 group">
            <div class="relative">
                <i class="fas fa-envelope text-white text-xl"></i>
                <!-- Tooltip dinamis -->
                <div class="absolute right-full mr-3 md:mr-3 md:right-full lg:mr-3 lg:right-full tooltip-text">
                    <span class="block bg-black/75 backdrop-blur-sm text-white text-sm py-2 px-4 rounded-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-300 -translate-x-2 group-hover:translate-x-0 transform shadow-lg">
                        Kirim Email
                    </span>
                </div>
            </div>
        </a>

        <!-- Scroll to Top Button -->
        <button id="scrollToTopBtn"
                class="action-button flex items-center justify-center w-14 h-14 bg-gradient-to-r from-gray-700 to-gray-800 rounded-full shadow-lg hover:shadow-gray-700/30 hover:scale-110 transition-all duration-300 group">
            <div class="relative">
                <i class="fas fa-chevron-up text-white text-xl"></i>
                <!-- Tooltip dinamis -->
                <div class="absolute right-full mr-3 md:mr-3 md:right-full lg:mr-3 lg:right-full tooltip-text">
                    <span class="block bg-black/75 backdrop-blur-sm text-white text-sm py-2 px-4 rounded-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-300 -translate-x-2 group-hover:translate-x-0 transform shadow-lg">
                        Kembali ke Atas
                    </span>
                </div>
            </div>
        </button>
    </div>
</div>

<style>
    /* Animasi custom untuk tombol utama */
    @keyframes bounce-gentle {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }
    .animate-bounce-gentle {
        animation: bounce-gentle 2s infinite;
    }

    /* Mobile first approach untuk tooltip */
    @media (max-width: 640px) {
        .tooltip-text {
            right: auto;
            left: 0;
            bottom: 100%;
            margin-right: 0;
            margin-bottom: 0.75rem;
            margin-left: -40px;
        }
    }
</style>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButton = document.getElementById('toggleFloatingMenu');
        const actionsContainer = document.getElementById('floatingActionsContainer');
        const buttonIcon = document.getElementById('buttonIcon');
        const scrollToTopBtn = document.getElementById('scrollToTopBtn');
        let isMenuOpen = false;

        // Fungsi toggle menu
        function toggleMenu() {
            isMenuOpen = !isMenuOpen;

            if (isMenuOpen) {
                actionsContainer.classList.remove('scale-0', 'opacity-0');
                actionsContainer.classList.add('scale-100', 'opacity-100');
                buttonIcon.classList.add('rotate-45');

                // Animasi staggered untuk tombol-tombol action
                document.querySelectorAll('.action-button').forEach((button, index) => {
                    setTimeout(() => {
                        button.classList.add('translate-y-0', 'opacity-100');
                        button.classList.remove('translate-y-4', 'opacity-0');
                    }, 100 * index);
                });

                // Hentikan animasi bounce pada tombol utama
                toggleButton.classList.remove('animate-bounce-gentle');
            } else {
                actionsContainer.classList.remove('scale-100', 'opacity-100');
                actionsContainer.classList.add('scale-0', 'opacity-0');
                buttonIcon.classList.remove('rotate-45');

                // Reset animasi staggered
                document.querySelectorAll('.action-button').forEach(button => {
                    button.classList.remove('translate-y-0', 'opacity-100');
                    button.classList.add('translate-y-4', 'opacity-0');
                });
            }
        }

        // Event listener untuk tombol toggle
        toggleButton.addEventListener('click', toggleMenu);

        // Tampil/sembunyikan tombol scroll to top
        window.addEventListener('scroll', () => {
            const scrollToTopBtn = document.getElementById('scrollToTopBtn');

            if (window.pageYOffset > 300) {
                scrollToTopBtn.classList.remove('opacity-0');
                scrollToTopBtn.classList.add('opacity-100');
            } else {
                scrollToTopBtn.classList.remove('opacity-100');
                scrollToTopBtn.classList.add('opacity-0');
            }
        });

        // Fungsi scroll ke atas
        scrollToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Set initial state
        document.querySelectorAll('.action-button').forEach(button => {
            button.classList.add('translate-y-4', 'opacity-0');
        });
    });
</script>
@endpush