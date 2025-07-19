<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e($configWeb->title ?? 'Index'); ?></title>
    <link rel="icon" href="<?php echo e(asset('storage/' . $configWeb?->favicon)); ?>" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body>
    <div class="font-sans min-h-screen bg-gray-50">
        <?php if (isset($component)) { $__componentOriginal937ac4e2682e9a846176c46132ee5d73 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal937ac4e2682e9a846176c46132ee5d73 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home-components.navbar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('home-components.navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal937ac4e2682e9a846176c46132ee5d73)): ?>
<?php $attributes = $__attributesOriginal937ac4e2682e9a846176c46132ee5d73; ?>
<?php unset($__attributesOriginal937ac4e2682e9a846176c46132ee5d73); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal937ac4e2682e9a846176c46132ee5d73)): ?>
<?php $component = $__componentOriginal937ac4e2682e9a846176c46132ee5d73; ?>
<?php unset($__componentOriginal937ac4e2682e9a846176c46132ee5d73); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal74aee8ebbe051bb9ffef677d647cc83d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74aee8ebbe051bb9ffef677d647cc83d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home-components.floating-button','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('home-components.floating-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal74aee8ebbe051bb9ffef677d647cc83d)): ?>
<?php $attributes = $__attributesOriginal74aee8ebbe051bb9ffef677d647cc83d; ?>
<?php unset($__attributesOriginal74aee8ebbe051bb9ffef677d647cc83d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal74aee8ebbe051bb9ffef677d647cc83d)): ?>
<?php $component = $__componentOriginal74aee8ebbe051bb9ffef677d647cc83d; ?>
<?php unset($__componentOriginal74aee8ebbe051bb9ffef677d647cc83d); ?>
<?php endif; ?>
        <main class="pt-4">
            <?php if (isset($component)) { $__componentOriginal599ed5bcd420d5636a81146d92ce596d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal599ed5bcd420d5636a81146d92ce596d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home-components.slider','data' => ['sliders' => $sliders,'hero' => $hero,'heroItems' => $heroItems]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('home-components.slider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sliders' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sliders),'hero' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($hero),'heroItems' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($heroItems)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal599ed5bcd420d5636a81146d92ce596d)): ?>
<?php $attributes = $__attributesOriginal599ed5bcd420d5636a81146d92ce596d; ?>
<?php unset($__attributesOriginal599ed5bcd420d5636a81146d92ce596d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal599ed5bcd420d5636a81146d92ce596d)): ?>
<?php $component = $__componentOriginal599ed5bcd420d5636a81146d92ce596d; ?>
<?php unset($__componentOriginal599ed5bcd420d5636a81146d92ce596d); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal2f0747b0954fa0b0f84280ce22856522 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2f0747b0954fa0b0f84280ce22856522 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home-components.tentang-kami','data' => ['tentangKami' => $tentangKami]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('home-components.tentang-kami'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tentangKami' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tentangKami)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2f0747b0954fa0b0f84280ce22856522)): ?>
<?php $attributes = $__attributesOriginal2f0747b0954fa0b0f84280ce22856522; ?>
<?php unset($__attributesOriginal2f0747b0954fa0b0f84280ce22856522); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2f0747b0954fa0b0f84280ce22856522)): ?>
<?php $component = $__componentOriginal2f0747b0954fa0b0f84280ce22856522; ?>
<?php unset($__componentOriginal2f0747b0954fa0b0f84280ce22856522); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal25584d7325543bacc1b329fbdf14b494 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal25584d7325543bacc1b329fbdf14b494 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home-components.layanan-kami','data' => ['bannerLayananItems' => $bannerLayananItems,'bannerLayanan' => $bannerLayanan]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('home-components.layanan-kami'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['bannerLayananItems' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($bannerLayananItems),'bannerLayanan' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($bannerLayanan)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal25584d7325543bacc1b329fbdf14b494)): ?>
<?php $attributes = $__attributesOriginal25584d7325543bacc1b329fbdf14b494; ?>
<?php unset($__attributesOriginal25584d7325543bacc1b329fbdf14b494); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal25584d7325543bacc1b329fbdf14b494)): ?>
<?php $component = $__componentOriginal25584d7325543bacc1b329fbdf14b494; ?>
<?php unset($__componentOriginal25584d7325543bacc1b329fbdf14b494); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal2e762daf493d91da7b30c13113f72823 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2e762daf493d91da7b30c13113f72823 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home-components.partner','data' => ['partners' => $partners]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('home-components.partner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['partners' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($partners)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2e762daf493d91da7b30c13113f72823)): ?>
<?php $attributes = $__attributesOriginal2e762daf493d91da7b30c13113f72823; ?>
<?php unset($__attributesOriginal2e762daf493d91da7b30c13113f72823); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2e762daf493d91da7b30c13113f72823)): ?>
<?php $component = $__componentOriginal2e762daf493d91da7b30c13113f72823; ?>
<?php unset($__componentOriginal2e762daf493d91da7b30c13113f72823); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal768fbb13946e26c08ef2f923ff4c7b52 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal768fbb13946e26c08ef2f923ff4c7b52 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home-components.product','data' => ['produk' => $produk,'limit' => 9,'showViewAllButton' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('home-components.product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['produk' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($produk),'limit' => 9,'showViewAllButton' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal768fbb13946e26c08ef2f923ff4c7b52)): ?>
<?php $attributes = $__attributesOriginal768fbb13946e26c08ef2f923ff4c7b52; ?>
<?php unset($__attributesOriginal768fbb13946e26c08ef2f923ff4c7b52); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal768fbb13946e26c08ef2f923ff4c7b52)): ?>
<?php $component = $__componentOriginal768fbb13946e26c08ef2f923ff4c7b52; ?>
<?php unset($__componentOriginal768fbb13946e26c08ef2f923ff4c7b52); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal8255e691b359b1507d7dfd23bc3271e5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8255e691b359b1507d7dfd23bc3271e5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home-components.keunggulan','data' => ['keunggulan' => $keunggulan,'keunggulanItems' => $keunggulanItems]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('home-components.keunggulan'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['keunggulan' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($keunggulan),'keunggulanItems' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($keunggulanItems)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8255e691b359b1507d7dfd23bc3271e5)): ?>
<?php $attributes = $__attributesOriginal8255e691b359b1507d7dfd23bc3271e5; ?>
<?php unset($__attributesOriginal8255e691b359b1507d7dfd23bc3271e5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8255e691b359b1507d7dfd23bc3271e5)): ?>
<?php $component = $__componentOriginal8255e691b359b1507d7dfd23bc3271e5; ?>
<?php unset($__componentOriginal8255e691b359b1507d7dfd23bc3271e5); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginald80d5313dd38af6085d4fa0b406872d9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald80d5313dd38af6085d4fa0b406872d9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home-components.galeri','data' => ['heroGaleriProduk' => $heroGaleriProduk,'galeriProduk' => $galeriProduk]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('home-components.galeri'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['heroGaleriProduk' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($heroGaleriProduk),'galeriProduk' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($galeriProduk)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald80d5313dd38af6085d4fa0b406872d9)): ?>
<?php $attributes = $__attributesOriginald80d5313dd38af6085d4fa0b406872d9; ?>
<?php unset($__attributesOriginald80d5313dd38af6085d4fa0b406872d9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald80d5313dd38af6085d4fa0b406872d9)): ?>
<?php $component = $__componentOriginald80d5313dd38af6085d4fa0b406872d9; ?>
<?php unset($__componentOriginald80d5313dd38af6085d4fa0b406872d9); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal73a4b8d858b1c66eff035c67788d128b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal73a4b8d858b1c66eff035c67788d128b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home-components.hubungi-kami','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('home-components.hubungi-kami'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal73a4b8d858b1c66eff035c67788d128b)): ?>
<?php $attributes = $__attributesOriginal73a4b8d858b1c66eff035c67788d128b; ?>
<?php unset($__attributesOriginal73a4b8d858b1c66eff035c67788d128b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal73a4b8d858b1c66eff035c67788d128b)): ?>
<?php $component = $__componentOriginal73a4b8d858b1c66eff035c67788d128b; ?>
<?php unset($__componentOriginal73a4b8d858b1c66eff035c67788d128b); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginal1a20d4e4bff316448c9582a4bbb4bb55 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1a20d4e4bff316448c9582a4bbb4bb55 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home-components.artikel-home','data' => ['artikel' => $artikel,'kategoriArtikel' => $kategoriArtikel,'socialMedia' => $socialMedia]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('home-components.artikel-home'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['artikel' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($artikel),'kategoriArtikel' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($kategoriArtikel),'socialMedia' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($socialMedia)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1a20d4e4bff316448c9582a4bbb4bb55)): ?>
<?php $attributes = $__attributesOriginal1a20d4e4bff316448c9582a4bbb4bb55; ?>
<?php unset($__attributesOriginal1a20d4e4bff316448c9582a4bbb4bb55); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1a20d4e4bff316448c9582a4bbb4bb55)): ?>
<?php $component = $__componentOriginal1a20d4e4bff316448c9582a4bbb4bb55; ?>
<?php unset($__componentOriginal1a20d4e4bff316448c9582a4bbb4bb55); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginalf64d7c5078887c9bbaeaec5eae160230 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf64d7c5078887c9bbaeaec5eae160230 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home-components.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('home-components.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf64d7c5078887c9bbaeaec5eae160230)): ?>
<?php $attributes = $__attributesOriginalf64d7c5078887c9bbaeaec5eae160230; ?>
<?php unset($__attributesOriginalf64d7c5078887c9bbaeaec5eae160230); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf64d7c5078887c9bbaeaec5eae160230)): ?>
<?php $component = $__componentOriginalf64d7c5078887c9bbaeaec5eae160230; ?>
<?php unset($__componentOriginalf64d7c5078887c9bbaeaec5eae160230); ?>
<?php endif; ?>
        </main>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH C:\Users\lenovo\Documents\TherkenalCompro\resources\views/index.blade.php ENDPATH**/ ?>