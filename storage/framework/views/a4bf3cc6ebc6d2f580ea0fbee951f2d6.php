

<!-- Top Header dengan pure Tailwind CSS -->
<header class="sticky top-0 right-0 left-0 z-30 bg-white border-b border-gray-200 shadow-sm">
    <div class="flex items-center justify-between h-16 px-4 lg:px-6">
        <!-- Left section with mobile menu button and title -->
        <div class="flex items-center">
            <!-- Mobile menu button -->
            <button id="mobile-menu-button" class="p-2 mr-2 text-gray-600 rounded-md hover:bg-gray-100 lg:hidden focus:outline-none focus:ring-2 focus:ring-gray-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <!-- Page title - transisi akan ditangani oleh JavaScript -->
            <h1 id="header-title" class="text-base font-medium text-gray-800 transition-all duration-300 truncate max-w-[200px] sm:max-w-full">
                Dashboard
            </h1>
        </div>

        <!-- Right section with user profile -->
        <div class="relative">
            <button id="user-menu-button" class="flex items-center group focus:outline-none">
                <div class="flex-col items-end mr-2 hidden sm:flex">
                    <span class="text-sm font-medium text-gray-700 truncate max-w-[120px]"><?php echo e(Auth::user()->name ?? 'Admin'); ?></span>
                    <span class="text-xs text-gray-500">Administrator</span>
                </div>
                <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-semibold">
                    <?php echo e(Auth::user()->name ? substr(Auth::user()->name, 0, 1) : 'A'); ?>

                </div>
                <svg class="w-5 h-5 text-gray-400 group-hover:text-gray-500 ml-1 sm:ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>

            <!-- User dropdown menu -->
            <div id="user-dropdown" class="absolute right-0 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden transform scale-95 opacity-0 transition-all duration-200 ease-in-out z-50">
                <a href="<?php echo e(route('profile.edit')); ?>" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors duration-150">
                    <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span>Profil</span>
                </a>
                <div class="border-t border-gray-100 my-1"></div>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors duration-150">
                        <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</header><?php /**PATH C:\Users\lenovo\Documents\cv_berkah_usaha\resources\views/layouts/top-header.blade.php ENDPATH**/ ?>