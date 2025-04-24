@props(['hubungiKami' => null, 'kontak' => null])

{{-- Banner Hubungi Kami --}}
<section id="kontak" class="relative w-full overflow-hidden" style="aspect-ratio: 2.5/1;">
    <div class="absolute inset-0">
        @if($hubungiKami && $hubungiKami->image)
            <img
                src="{{ asset('storage/' . $hubungiKami->image) }}"
                alt="Hubungi Kami"
                class="w-full h-full object-cover"
            />
        @else
            <img
                src="https://readdy.ai/api/search-image?query=professional%20roofing%20team%20working%20on%20large%20residential%20project%2C%20aerial%20view%20of%20construction%20site%20with%20beautiful%20landscape%20background%2C%20workers%20installing%20high%20quality%20roof%20with%20blue%20sky%20and%20mountains&width=1440&height=500&seq=contact-banner&orientation=landscape"
                alt="Hubungi Kami"
                class="w-full h-full object-cover"
            />
        @endif
    </div>
</section>


