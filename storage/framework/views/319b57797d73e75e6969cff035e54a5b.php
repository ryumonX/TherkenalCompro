

<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e($configWeb?->title ?? 'Index'); ?></title>
    <link rel="icon" href="<?php echo e(asset('storage/' . $configWeb?->favicon)); ?>" type="image/x-icon">
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        /* Fixed custom CSS for sidebar */
        .sidebar {
            width: 70px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 40;
            transition: width 0.3s ease, transform 0.3s ease;
            overflow-y: auto;
            background-color: white;
            border-right: 1px solid #e5e7eb;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }

        .sidebar.expanded {
            width: 256px;
        }

        .sidebar-content {
            opacity: 0;
            display: none;
        }

        .sidebar.expanded .sidebar-content {
            opacity: 1;
            display: inline-block;
        }

        /* Tambahkan style untuk logo sidebar */
        .sidebar-logo {
            max-width: 0;
            transition: max-width 0.3s ease;
        }

        .sidebar.expanded .sidebar-logo {
            max-width: 180px;
        }

        .main-content {
            padding-left: 70px;
            transition: padding-left 0.3s ease;
            width: 100%;
        }

        .main-content.expanded {
            padding-left: 256px;
        }

        /* Mobile sidebar handling */
        @media (max-width: 1023px) {
            .sidebar {
                transform: translateX(-100%);
                z-index: 50;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-content {
                padding-left: 0;
            }

            .main-content.expanded {
                padding-left: 0;
            }
        }

        /* Tambahan untuk table responsif */
        .responsive-table {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        /* Animasi untuk dropdown */
        @keyframes slideDown {
            from { transform: translateY(-10px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .dropdown-animate {
            animation: slideDown 0.2s ease forwards;
        }
    </style>
</head>
<body class="h-full font-sans antialiased bg-gray-50">
    <div class="min-h-screen">
        <!-- Include the top header component -->
        <?php echo $__env->make('layouts.top-header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <div class="flex h-full">
            <!-- Include the navigation/sidebar component -->
            <?php echo $__env->make('layouts.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <!-- Main Content -->
            <main id="main-content" class="main-content flex-1 overflow-hidden">
                <!-- Page Content -->
                <div class="p-4 sm:p-6">
                    <?php echo $__env->yieldContent('content'); ?>
                    <?php echo e($slot ?? ''); ?>

                </div>
            </main>
        </div>
    </div>

    <?php echo $__env->yieldPushContent('modals'); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const collapseIcon = document.getElementById('collapse-icon');
            const expandIcon = document.getElementById('expand-icon');
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const sidebarBackdrop = document.getElementById('sidebar-backdrop');
            const headerTitle = document.getElementById('header-title');

            // Fungsi untuk mengatur posisi header title
            function adjustHeaderTitle() {
                if (window.innerWidth >= 1024) { // Hanya pada layar desktop (lg)
                    if (sidebar.classList.contains('expanded')) {
                        headerTitle.style.marginLeft = '256px'; // 64 * 4 = 256px
                    } else {
                        headerTitle.style.marginLeft = '70px';
                    }
                } else {
                    headerTitle.style.marginLeft = '0';
                }
            }

            // Toggle sidebar on button click (desktop only)
            sidebarToggle?.addEventListener('click', function() {
                sidebar.classList.toggle('expanded');
                mainContent.classList.toggle('expanded');
                collapseIcon.classList.toggle('hidden');
                expandIcon.classList.toggle('hidden');

                // Sesuaikan posisi header title
                adjustHeaderTitle();

                // Save state to localStorage (only for desktop)
                if (window.innerWidth >= 1024) {
                    localStorage.setItem('sidebar-expanded', sidebar.classList.contains('expanded'));
                }
            });

            // Mobile menu toggle
            mobileMenuButton?.addEventListener('click', function() {
                sidebar.classList.toggle('open');
                sidebarBackdrop.classList.toggle('hidden');
                document.body.classList.toggle('overflow-hidden'); // Prevent scrolling when menu is open
            });

            // Close mobile menu when clicking on backdrop
            sidebarBackdrop?.addEventListener('click', function() {
                sidebar.classList.remove('open');
                sidebarBackdrop.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            });

            // User dropdown functionality
            const userMenuButton = document.getElementById('user-menu-button');
            const userDropdown = document.getElementById('user-dropdown');

            if (userMenuButton && userDropdown) {
                userMenuButton.addEventListener('click', function(e) {
                    e.stopPropagation();
                    // Toggle dropdown
                    if (userDropdown.classList.contains('hidden')) {
                        // Show dropdown
                        userDropdown.classList.remove('hidden');
                        // Force repaint before removing opacity/scale classes for transition to work
                        userDropdown.getBoundingClientRect();
                        userDropdown.classList.remove('opacity-0', 'scale-95');
                        userDropdown.classList.add('opacity-100', 'scale-100', 'dropdown-animate');
                    } else {
                        // Hide dropdown
                        userDropdown.classList.remove('opacity-100', 'scale-100', 'dropdown-animate');
                        userDropdown.classList.add('opacity-0', 'scale-95');

                        // Wait for transition to finish before hiding
                        setTimeout(() => {
                            userDropdown.classList.add('hidden');
                        }, 200);
                    }
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', function(event) {
                    if (!userMenuButton.contains(event.target) && !userDropdown.contains(event.target) &&
                        !userDropdown.classList.contains('hidden')) {
                        // Hide dropdown
                        userDropdown.classList.remove('opacity-100', 'scale-100', 'dropdown-animate');
                        userDropdown.classList.add('opacity-0', 'scale-95');

                        // Wait for transition to finish before hiding
                        setTimeout(() => {
                            userDropdown.classList.add('hidden');
                        }, 200);
                    }
                });
            }

            // Load saved sidebar state on page load (desktop only)
            if (window.innerWidth >= 1024 && localStorage.getItem('sidebar-expanded') === 'true') {
                sidebar.classList.add('expanded');
                mainContent.classList.add('expanded');
                collapseIcon.classList.remove('hidden');
                expandIcon.classList.add('hidden');
            }

            // Close the mobile menu when window is resized to desktop
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024) {
                    sidebar.classList.remove('open');
                    sidebarBackdrop.classList.add('hidden');
                    document.body.classList.remove('overflow-hidden');
                }
                adjustHeaderTitle();
            });

            // Inisialisasi posisi header title saat halaman dimuat
            adjustHeaderTitle();

            // Make tables responsive
            const tables = document.querySelectorAll('table');
            tables.forEach(table => {
                const parent = table.parentNode;
                if (!parent.classList.contains('responsive-table') && !parent.classList.contains('overflow-x-auto')) {
                    const wrapper = document.createElement('div');
                    wrapper.classList.add('responsive-table');
                    parent.insertBefore(wrapper, table);
                    wrapper.appendChild(table);
                }
            });

            // Set page title dynamically (optional)
            const pageTitle = document.title.split(' - ').pop();
            if (headerTitle && pageTitle) {
                headerTitle.textContent = pageTitle || "Dashboard";
            }
        });
    </script>
</body>
</html>
<?php /**PATH D:\coding\Therkenal\therkenal\resources\views/layouts/app.blade.php ENDPATH**/ ?>