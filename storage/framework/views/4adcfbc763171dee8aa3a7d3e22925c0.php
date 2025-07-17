<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'variant' => 'default',
    'size' => 'default',
]));

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

foreach (array_filter(([
    'variant' => 'default',
    'size' => 'default',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $base = 'inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0';

    $variants = [
        'default' => 'bg-primary text-primary-foreground shadow hover:bg-primary/90',
        'destructive' => 'bg-destructive text-destructive-foreground shadow-sm hover:bg-destructive/90',
        'outline' => 'border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground',
        'secondary' => 'bg-secondary text-secondary-foreground shadow-sm hover:bg-secondary/80',
        'ghost' => 'hover:bg-accent hover:text-accent-foreground',
        'link' => 'text-primary underline-offset-4 hover:underline',
    ];

    $sizes = [
        'default' => 'h-9 px-4 py-2',
        'sm' => 'h-8 rounded-md px-3 text-xs',
        'lg' => 'h-10 rounded-md px-8',
        'icon' => 'h-9 w-9',
    ];

    $classes = implode(' ', [
        $base,
        $variants[$variant] ?? $variants['default'],
        $sizes[$size] ?? $sizes['default'],
    ]);

    if (!$attributes->has('href') && !$attributes->has('type')) {
        $attributes = $attributes->merge(['type' => 'button']);
    }
?>

<?php if($attributes->has('href')): ?>
    <a <?php echo e($attributes->merge(['class' => $classes])); ?>>
        <?php echo e($slot); ?>

    </a>
<?php else: ?>
    <button <?php echo e($attributes->merge(['class' => $classes])); ?>>
        <?php echo e($slot); ?>

    </button>
<?php endif; ?>
<?php /**PATH C:\Users\lenovo\Documents\TherkenalCompro\resources\views/components/ui/button.blade.php ENDPATH**/ ?>