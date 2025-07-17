<div id="floating-buttons" class="fixed bottom-6 right-6 z-40">
    <!-- Container utama -->
    <div class="relative">
        <!-- Tombol utama dengan efek subtil -->
        <button id="toggleFloatingMenu"
                aria-label="Buka menu kontak"
                class="flex items-center justify-center w-14 h-14 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full shadow-lg hover:shadow-indigo-500/40 transition-all duration-300 group">
            <div class="relative flex items-center justify-center w-full h-full overflow-hidden">
                <!-- Ikon yang berputar saat diklik -->
                <i id="buttonIcon" class="fas fa-headset text-white text-xl transition-transform duration-500"></i>

                <!-- Badge notifikasi -->
                <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>

                <!-- Ripple effect -->
                <span class="absolute w-full h-full bg-white/30 rounded-full scale-0 opacity-0 group-hover:scale-100 group-hover:opacity-30 transition-all duration-500"></span>
            </div>
        </button>

        <!-- Panel aksi -->
        <div id="floatingActionsContainer"
             class="absolute bottom-16 right-0 min-w-[280px] bg-white dark:bg-gray-800 rounded-lg shadow-xl border border-gray-100 dark:border-gray-700 p-4 opacity-0 -translate-y-4 pointer-events-none transition-all duration-300">
            <div class="flex flex-col gap-3">
                <!-- Header -->
                <div class="pb-2 mb-2 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300">Hubungi Kami</h3>
                </div>

                <!-- WhatsApp Button with prefilled message -->
                <a href="https://wa.me/<?php echo e($kontak->no_telegram ?? ''); ?>?text=<?php echo e(urlencode("Halo, saya " . (auth()->user()->name ?? 'pengunjung') . ". Saya ingin mengetahui lebih lanjut tentang produk anda")); ?>"
                   target="_blank"
                   class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors group">
                    <div class="flex items-center justify-center w-10 h-10 rounded-full bg-green-500/10 text-green-600 dark:text-green-400">
                        <i class="fab fa-whatsapp text-lg"></i>
                    </div>
                    <div>
                        <span class="block text-sm font-medium text-gray-800 dark:text-gray-200">WhatsApp</span>
                        <span class="block text-xs text-gray-500 dark:text-gray-400 group-hover:text-green-600 dark:group-hover:text-green-400">Balas cepat via chat</span>
                    </div>
                </a>

                <!-- Telepon Button -->
                <a href="tel:<?php echo e($kontak->no_telepon ?? ''); ?>"
                   target="_blank"
                   class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors group">
                    <div class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-500/10 text-blue-600 dark:text-blue-400">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div>
                        <span class="block text-sm font-medium text-gray-800 dark:text-gray-200">Telepon</span>
                        <span class="block text-xs text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-400"><?php echo e($kontak->no_telepon ?? 'Hubungi kami'); ?></span>
                    </div>
                </a>

                <!-- Email Button with subject and body template -->
                <a href="mailto:<?php echo e($kontak->email ?? ''); ?>?subject=<?php echo e(urlencode('Pertanyaan tentang produk dan layanan')); ?>&body=<?php echo e(urlencode("Halo Tim " . config('app.name') . ",%0D%0A%0D%0ASaya " . (auth()->user()->name ?? 'pengunjung') . " ingin mengetahui informasi lebih lanjut mengenai produk Anda.%0D%0A%0D%0ATerima kasih.")); ?>"
                   target="_blank"
                   class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors group">
                    <div class="flex items-center justify-center w-10 h-10 rounded-full bg-red-500/10 text-red-600 dark:text-red-400">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <span class="block text-sm font-medium text-gray-800 dark:text-gray-200">Email</span>
                        <span class="block text-xs text-gray-500 dark:text-gray-400 group-hover:text-red-600 dark:group-hover:text-red-400"><?php echo e($kontak->email ?? 'Kirim email'); ?></span>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <button id="scrollToTopBtn"
            aria-label="Kembali ke atas"
            class="fixed bottom-6 right-24 flex items-center justify-center w-10 h-10 bg-gray-700/90 backdrop-blur-sm rounded-full text-white hover:bg-gray-600 transition-all duration-300 opacity-0 shadow-lg">
        <i class="fas fa-chevron-up text-sm"></i>
    </button>
</div>

<?php $__env->startPush('scripts'); ?>
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
                actionsContainer.classList.remove('opacity-0', '-translate-y-4', 'pointer-events-none');
                actionsContainer.classList.add('opacity-100', 'translate-y-0', 'pointer-events-auto');
                buttonIcon.classList.add('rotate-180');
            } else {
                actionsContainer.classList.remove('opacity-100', 'translate-y-0', 'pointer-events-auto');
                actionsContainer.classList.add('opacity-0', '-translate-y-4', 'pointer-events-none');
                buttonIcon.classList.remove('rotate-180');
            }
        }

        // Event listener untuk tombol toggle
        toggleButton.addEventListener('click', toggleMenu);

        // Menutup panel saat klik di luar
        document.addEventListener('click', function(event) {
            if (isMenuOpen && !toggleButton.contains(event.target) && !actionsContainer.contains(event.target)) {
                toggleMenu();
            }
        });

        // Tampil/sembunyikan tombol scroll to top
        window.addEventListener('scroll', () => {
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
    });
</script>
<?php $__env->stopPush(); ?>




<?php /**PATH D:\coding\Therkenal\therkenal\resources\views/components/home-components/floating-button.blade.php ENDPATH**/ ?>