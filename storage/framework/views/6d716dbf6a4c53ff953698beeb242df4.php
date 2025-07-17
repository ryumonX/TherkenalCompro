<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['hubungiKami' => null, 'kontak' => null]));

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

foreach (array_filter((['hubungiKami' => null, 'kontak' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>


<section id="kontak" class="relative w-full overflow-hidden" style="aspect-ratio: 2.5/1;">
    <div class="absolute inset-0">
        <?php if($hubungiKami && $hubungiKami->image): ?>
            <img
                src="<?php echo e(asset('storage/' . $hubungiKami->image)); ?>"
                alt="Hubungi Kami"
                class="w-full h-full object-cover"
            />
        <?php else: ?>
            <img
                src="https://readdy.ai/api/search-image?query=professional%20roofing%20team%20working%20on%20large%20residential%20project%2C%20aerial%20view%20of%20construction%20site%20with%20beautiful%20landscape%20background%2C%20workers%20installing%20high%20quality%20roof%20with%20blue%20sky%20and%20mountains&width=1440&height=500&seq=contact-banner&orientation=landscape"
                alt="Hubungi Kami"
                class="w-full h-full object-cover"
            />
        <?php endif; ?>
    </div>
</section>


<?php /**PATH C:\Users\lenovo\Documents\TherkenalCompro\resources\views/components/home-components/hubungi-kami.blade.php ENDPATH**/ ?>