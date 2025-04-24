{{-- resources/views/components/input-error.blade.php --}}
@props(['messages'])
@error($attributes->wire('model') ?? '')
    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
@else
    @foreach ((array) $messages as $msg)
        <p class="mt-1 text-xs text-red-600">{{ $msg }}</p>
    @endforeach
@enderror
