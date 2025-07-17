<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?php echo e(asset('storage/' . $configWeb->favicon)); ?>" type="image/x-icon">
    <title><?php echo e($artikel->title); ?> - <?php echo e($configWeb->title ?? 'Website Kami'); ?></title>
    <meta name="description" content="<?php echo e($artikel->meta_description ?? $artikel->preview_description); ?>">
    <meta name="keywords" content="<?php echo e($artikel->meta_keyword); ?>">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

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
            <?php if (isset($component)) { $__componentOriginal84881b363a70b9ef26f552c318dd64fe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal84881b363a70b9ef26f552c318dd64fe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home-components.artikel-detail','data' => ['artikel' => $artikel,'artikelTerkait' => $artikelTerkait]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('home-components.artikel-detail'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['artikel' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($artikel),'artikelTerkait' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($artikelTerkait)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal84881b363a70b9ef26f552c318dd64fe)): ?>
<?php $attributes = $__attributesOriginal84881b363a70b9ef26f552c318dd64fe; ?>
<?php unset($__attributesOriginal84881b363a70b9ef26f552c318dd64fe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal84881b363a70b9ef26f552c318dd64fe)): ?>
<?php $component = $__componentOriginal84881b363a70b9ef26f552c318dd64fe; ?>
<?php unset($__componentOriginal84881b363a70b9ef26f552c318dd64fe); ?>
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
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH D:\coding\Therkenal\therkenal\resources\views/artikel-detail.blade.php ENDPATH**/ ?>