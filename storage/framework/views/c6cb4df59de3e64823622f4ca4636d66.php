<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['breadcrumb' => null, 'configWeb' => null, 'socialMedia' => []]));

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

foreach (array_filter((['breadcrumb' => null, 'configWeb' => null, 'socialMedia' => []]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $segments = request()->segments();
    $currentUrl = url('/');
    $breadcrumbModel = $breadcrumb ?? \App\Models\Breadcrumb::first();
?>

<div class="bg-white shadow-sm">
    <!-- Top Bar dengan info kontak dan sosial media -->
    <div class="bg-gradient-to-r from-gray-800 to-gray-900 text-white">
        <div class="container mx-auto py-2 px-4 flex flex-wrap items-center justify-between">
            <!-- Informasi Kontak -->
            <div class="flex items-center space-x-4 text-sm">
                <?php if(isset($kontak->no_telepon) && !empty($kontak->no_telepon)): ?>
                    <a href="tel:<?php echo e($kontak->no_telepon); ?>" class="flex items-center hover:text-blue-300 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <?php echo e($kontak->no_telepon); ?>

                    </a>
                <?php endif; ?>

                <?php if(isset($kontak->email) && !empty($kontak->email)): ?>
                    <a href="mailto:<?php echo e($kontak->email); ?>" class="flex items-center hover:text-blue-300 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <?php echo e($configWeb->email); ?>

                    </a>
                <?php endif; ?>
            </div>

            <!-- Tagline dan Sosial Media -->
            <div class="flex items-center space-x-4 text-sm">
                <!-- Tagline -->
                <p class="hidden md:block text-gray-300">
                    <?php echo e($breadcrumbModel->title ?? 'Mitra terpercaya Anda dalam menyediakan solusi atap bangunan berkualitas'); ?>

                </p>
                <div class="hidden md:block text-gray-300">
                    |
                </div>
                <p class="hidden md:block text-gray-300">
                    <?php echo e($breadcrumbModel->subtitle ?? 'Mitra terpercaya Anda dalam menyediakan solusi atap bangunan berkualitas'); ?>

                </p>

                <!-- Sosial Media Links -->
                <div class="flex items-center space-x-2 ml-4">
                    <?php $__empty_1 = true; $__currentLoopData = $socialMedia ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <a href="<?php echo e($social->link_platform); ?>" target="_blank" class="w-6 h-6 rounded-full bg-gray-700 hover:bg-blue-600 flex items-center justify-center transition-colors">
                            <img src="<?php echo e(asset('storage/' . $social->images->first()->image)); ?>" alt="<?php echo e($social->platform); ?>" class="w-3 h-3 object-contain">
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <a href="#" target="_blank" class="w-6 h-6 rounded-full bg-gray-700 hover:bg-blue-600 flex items-center justify-center transition-colors">
                            <i class="fab fa-facebook-f text-xs"></i>
                        </a>
                        <a href="#" target="_blank" class="w-6 h-6 rounded-full bg-gray-700 hover:bg-blue-600 flex items-center justify-center transition-colors">
                            <i class="fab fa-instagram text-xs"></i>
                        </a>
                        <a href="#" target="_blank" class="w-6 h-6 rounded-full bg-gray-700 hover:bg-blue-600 flex items-center justify-center transition-colors">
                            <i class="fab fa-youtube text-xs"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Breadcrumbs dengan desain yang lebih menarik -->
    <div class="container mx-auto py-3 px-4">
        <div class="flex flex-wrap items-center justify-between">
            <!-- Breadcrumb Path -->
            <nav class="flex items-center space-x-1 text-sm">
                <a href="<?php echo e(url('/')); ?>" class="flex items-center text-gray-500 hover:text-blue-600 transition-all transform hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Beranda</span>
                </a>

                <?php if(count($segments) > 0): ?>
                    <?php $__currentLoopData = $segments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $segment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $currentUrl .= "/$segment";
                            $isLast = $i === count($segments) - 1;
                        ?>

                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>

                        <?php if($isLast): ?>
                            <span class="text-blue-600 font-medium"><?php echo e(ucwords(str_replace('-', ' ', $segment))); ?></span>
                        <?php else: ?>
                            <a href="<?php echo e($currentUrl); ?>" class="text-gray-500 hover:text-blue-600 transition-all transform hover:scale-105">
                                <?php echo e(ucwords(str_replace('-', ' ', $segment))); ?>

                            </a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </nav>

            <!-- Website URL -->
            <a href="<?php echo e($configWeb->website_url ?? 'https://www.atappro.com'); ?>"
               class="text-sm text-blue-600 hover:text-blue-700 transition-colors font-medium flex items-center mt-2 md:mt-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                </svg>
                <?php echo e($configWeb->title ?? 'www.atappro.com'); ?>

            </a>
        </div>
    </div>

    <!-- Accent Line -->
    <div class="h-1 bg-gradient-to-r from-blue-500 to-blue-600"></div>
</div><?php /**PATH D:\coding\Therkenal\therkenal\resources\views/components/home-components/breadcrumbs.blade.php ENDPATH**/ ?>