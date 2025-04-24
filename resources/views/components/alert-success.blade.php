@props(['class'=>''])

<div {{ $attributes->merge(['class'=>"mb-4 p-4 bg-green-100 text-green-800 rounded $class"]) }}>
    {{ $slot }}
</div>
