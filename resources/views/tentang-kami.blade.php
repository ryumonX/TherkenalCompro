<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $configWeb->title ?? 'Index' }}</title>
    <link rel="icon" href="{{ asset('storage/' . $configWeb->favicon) }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')

</head>
<body>
    <div class="font-sans min-h-screen bg-gray-50">
        <x-home-components.navbar />
        <x-home-components.floating-button />
        <main class="pt-4">
            <x-home-components.hubungi-kami />
            <x-home-components.breadcrumbs />
            <x-home-components.tentang-kami :tentangKami="$tentangKami" />
            <x-home-components.value />
            <x-home-components.keunggulan :keunggulan="$keunggulan" :keunggulanItems="$keunggulanItems" />
            <x-home-components.footer />
        </main>
    </div>
    @stack('scripts')
</body>
</html>
