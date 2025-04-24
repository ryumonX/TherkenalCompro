{{-- views/layouts/app.blade.php --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $configWeb->title ?? 'Index' }}</title>
    <link rel="icon" href="{{ asset('storage/' . $configWeb->favicon) }}" type="image/x-icon">
    @vite('resources/css/app.css')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
            transition: width 0.3s ease;
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
        }

        .main-content.expanded {
            padding-left: 256px;
        }

        .mobile-sidebar {
            transform: translateX(-100%);
        }

        .mobile-sidebar.open {
            transform: translateX(0);
        }

        @media (max-width: 1024px) {
            .main-content {
                padding-left: 0;
            }
        }
    </style>
</head>
<body class="h-full font-sans antialiased bg-gray-50">
    <div class="min-h-screen">
        <!-- Include the top header component -->
        @include('layouts.top-header')

        <div class="flex h-full">
            <!-- Include the navigation/sidebar component -->
            @include('layouts.navigation')

            <!-- Main Content -->
            <main id="main-content" class="main-content flex-1">
                <!-- Page Content -->
                <div class="p-6">
                    @yield('content')
                    {{ $slot ?? '' }}
                </div>
            </main>
        </div>
    </div>

    @stack('modals')
    @stack('scripts')

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

            // Toggle sidebar on button click
            sidebarToggle?.addEventListener('click', function() {
                sidebar.classList.toggle('expanded');
                mainContent.classList.toggle('expanded');
                collapseIcon.classList.toggle('hidden');
                expandIcon.classList.toggle('hidden');

                // Sesuaikan posisi header title
                adjustHeaderTitle();

                // Save state to localStorage
                localStorage.setItem('sidebar-expanded', sidebar.classList.contains('expanded'));
            });

            // Mobile menu toggle
            mobileMenuButton?.addEventListener('click', function() {
                sidebar.classList.toggle('mobile-sidebar');
                sidebar.classList.toggle('open');
                sidebarBackdrop.classList.toggle('hidden');
            });

            // Close mobile menu when clicking on backdrop
            sidebarBackdrop?.addEventListener('click', function() {
                sidebar.classList.remove('open');
                sidebarBackdrop.classList.add('hidden');
            });

            // User dropdown functionality
            const userMenuButton = document.getElementById('user-menu-button');
            const userDropdown = document.getElementById('user-dropdown');

            if (userMenuButton && userDropdown) {
                userMenuButton.addEventListener('click', function() {
                    // Toggle dropdown
                    if (userDropdown.classList.contains('hidden')) {
                        // Show dropdown
                        userDropdown.classList.remove('hidden');
                        // Force repaint before removing opacity/scale classes for transition to work
                        userDropdown.getBoundingClientRect();
                        userDropdown.classList.remove('opacity-0', 'scale-95');
                        userDropdown.classList.add('opacity-100', 'scale-100');
                    } else {
                        // Hide dropdown
                        userDropdown.classList.remove('opacity-100', 'scale-100');
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
                        userDropdown.classList.remove('opacity-100', 'scale-100');
                        userDropdown.classList.add('opacity-0', 'scale-95');

                        // Wait for transition to finish before hiding
                        setTimeout(() => {
                            userDropdown.classList.add('hidden');
                        }, 200);
                    }
                });
            }

            // Load saved sidebar state on page load
            if (localStorage.getItem('sidebar-expanded') === 'true') {
                sidebar.classList.add('expanded');
                mainContent.classList.add('expanded');
                collapseIcon.classList.remove('hidden');
                expandIcon.classList.add('hidden');
            }

            // Inisialisasi posisi header title saat halaman dimuat
            adjustHeaderTitle();

            // Perbarui posisi saat ukuran window berubah
            window.addEventListener('resize', adjustHeaderTitle);

            // Set page title dynamically (optional)
            const pageTitle = document.title.split(' - ').pop();
            if (headerTitle && pageTitle) {
                headerTitle.textContent = "Dashboard";
            }
        });
    </script>
</body>
</html>
