@props(['partners'])

@if ($partners->count())
    <div class="text-center mt-20">
        <p class="text-gray-500 text-sm uppercase tracking-widest mb-4">Trusted by industry leaders</p>
        <div class="flex justify-center items-center flex-wrap gap-8 opacity-60">
            @foreach ($partners as $partner)
                <div class="w-24 h-10 flex items-center justify-center">
                    <img src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->name ?? 'Partner' }}"
                        class="h-full object-contain grayscale hover:grayscale-0 transition duration-300" loading="lazy">
                </div>
            @endforeach
        </div>
    </div>
@endif
