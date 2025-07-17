<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'as' => 'card',
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
    'as' => 'card',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php switch($as):
    case ('header'): ?>
        <div <?php echo e($attributes->merge(['class' => 'flex flex-col space-y-1.5 p-6'])); ?>>
            <?php echo e($slot); ?>

        </div>
    <?php break; ?>

    <?php case ('title'): ?>
        <h3 <?php echo e($attributes->merge(['class' => 'text-2xl font-semibold leading-none tracking-tight'])); ?>>
            <?php echo e($slot); ?>

        </h3>
    <?php break; ?>

    <?php case ('description'): ?>
        <p <?php echo e($attributes->merge(['class' => 'text-sm text-muted-foreground'])); ?>>
            <?php echo e($slot); ?>

        </p>
    <?php break; ?>

    <?php case ('content'): ?>
        <div <?php echo e($attributes->merge(['class' => 'p-6 pt-0'])); ?>>
            <?php echo e($slot); ?>

        </div>
    <?php break; ?>

    <?php case ('footer'): ?>
        <div <?php echo e($attributes->merge(['class' => 'flex items-center p-6 pt-0'])); ?>>
            <?php echo e($slot); ?>

        </div>
    <?php break; ?>

    <?php default: ?>
        <div <?php echo e($attributes->merge(['class' => 'rounded-lg border bg-card text-card-foreground shadow-sm'])); ?>>
            <?php echo e($slot); ?>

        </div>
<?php endswitch; ?>
<?php /**PATH C:\Users\lenovo\Documents\TherkenalCompro\resources\views/components/ui/card.blade.php ENDPATH**/ ?>