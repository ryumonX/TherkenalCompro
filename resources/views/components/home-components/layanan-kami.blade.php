@props(['bannerLayanan' => null, 'bannerLayananItems' => []])

<section class="min-h-screen bg-white relative overflow-hidden">
    <!-- Creative Background Elements -->
    <div class="absolute inset-0 bg-gradient-to-br from-gray-50 via-white to-gray-50"></div>
    
    <!-- Geometric Shapes -->
    <div class="absolute top-20 right-20 w-72 h-72 bg-gradient-to-br from-blue-100 to-purple-100 rounded-full opacity-20 blur-3xl animate-pulse"></div>
    <div class="absolute bottom-20 left-20 w-96 h-96 bg-gradient-to-tr from-cyan-100 to-blue-100 rounded-full opacity-20 blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
    
    <!-- Grid Pattern -->
    <div class="absolute inset-0 opacity-[0.02]">
        <div class="grid grid-cols-12 gap-4 h-full">
            @for($i = 0; $i < 12; $i++)
                <div class="border-r border-gray-300"></div>
            @endfor
        </div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10 py-20">
        <!-- Header Section -->
        <div class="text-center mb-20">
            <!-- Badge -->
            <div class="inline-flex items-center px-4 py-2 bg-gray-100 rounded-full mb-6 hover:bg-gray-200 transition-colors">
                <div class="w-2 h-2 bg-blue-500 rounded-full mr-3 animate-pulse"></div>
                <span class="text-sm font-medium text-gray-700 uppercase tracking-widest">
                    {{ $bannerLayanan->title ?? 'Our Services' }}
                </span>
            </div>

            <!-- Main Title -->
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-light text-gray-900 mb-6 leading-tight">
                {{ $bannerLayanan->subtitle ?? 'Creative' }}
                <span class="font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                    Solutions
                </span>
            </h1>

            <!-- Description -->
            <div class="max-w-2xl mx-auto text-gray-600 text-lg leading-relaxed mb-8">
                @if($bannerLayanan && $bannerLayanan->description)
                    {!! nl2br(e($bannerLayanan->description)) !!}
                @else
                    <p>We craft digital experiences that transform brands and drive results. Our team combines creativity with technical expertise to deliver outstanding solutions.</p>
                @endif
            </div>
         
        </div>

        <!-- Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            @forelse($bannerLayananItems as $index => $item)
                <div class="group relative bg-white rounded-2xl p-8 hover:shadow-xl transition-all duration-500 hover:-translate-y-2 border border-gray-100">
                    <!-- Number -->
                    <div class="absolute top-6 right-6 text-6xl font-bold text-gray-100 group-hover:text-blue-100 transition-colors">
                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                    </div>

                    <!-- Icon -->
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-50 to-purple-50 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        @if(!empty($item->image_icon))
                            <img src="{{ asset('storage/' . $item->image_icon) }}" alt="{{ $item->title }}" class="w-8 h-8 loading="lazy"">
                        @else
                            <div class="w-8 h-8 bg-blue-500 rounded-lg"></div>
                        @endif
                    </div>

                    <!-- Content -->
                    <h3 class="text-xl font-semibold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">
                        {{ $item->title }}
                    </h3>

                    <p class="text-gray-600 mb-6 leading-relaxed">
                        {{ $item->description ?? '' }}
                    </p>


                    <!-- Hover Border -->
                    <div class="absolute inset-0 border-2 border-blue-500 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
            @empty

                @foreach($services as $index => $service)
                    <div class="group relative bg-white rounded-2xl p-8 hover:shadow-xl transition-all duration-500 hover:-translate-y-2 border border-gray-100">
                        <!-- Number -->
                        <div class="absolute top-6 right-6 text-6xl font-bold text-gray-100 group-hover:text-{{ $service['color'] }}-100 transition-colors">
                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                        </div>

                        <!-- Icon -->
                        <div class="w-16 h-16 bg-gradient-to-br from-{{ $service['color'] }}-50 to-{{ $service['color'] }}-100 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <div class="w-8 h-8 bg-{{ $service['color'] }}-500 rounded-lg"></div>
                        </div>

                        <!-- Content -->
                        <h3 class="text-xl font-semibold text-gray-900 mb-3 group-hover:text-{{ $service['color'] }}-600 transition-colors">
                            {{ $service['title'] }}
                        </h3>

                        <p class="text-gray-600 mb-6 leading-relaxed">
                            {{ $service['description'] }}
                        </p>

                        <!-- Hover Border -->
                        <div class="absolute inset-0 border-2 border-{{ $service['color'] }}-500 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                @endforeach
            @endforelse
        </div>


</section>

<style>
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }

    .animate-float {
        animation: float 6s ease-in-out infinite;
    }

    .animate-float-delayed {
        animation: float 6s ease-in-out infinite;
        animation-delay: 3s;
    }

    /* Custom scrollbar for modern look */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>