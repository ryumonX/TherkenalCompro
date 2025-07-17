<?php
    $id = $attributes->get('id', 'checkbox-' . \Illuminate\Support\Str::uuid());
?>

<div class="flex items-center">
    <input <?php echo e($attributes->merge([
        'type' => 'checkbox',
        'id' => $id,
        'class' => 'peer sr-only'
    ])); ?>>

    <label
        for="<?php echo e($id); ?>"
        class="flex h-4 w-4 shrink-0 cursor-pointer items-center justify-center rounded-sm border border-primary text-primary-foreground shadow transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring peer-disabled:cursor-not-allowed peer-disabled:opacity-50 peer-checked:bg-primary"
    >
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 hidden peer-checked:block">
            <path d="M20 6 9 17l-5-5"/>
        </svg>
    </label>
</div>
<?php /**PATH C:\Users\lenovo\Documents\TherkenalCompro\resources\views/components/ui/checkbox.blade.php ENDPATH**/ ?>