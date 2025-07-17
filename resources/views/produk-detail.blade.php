<body class="font-sans min-h-screen bg-gray-50">
    <div class="h-40"> <!-- tinggi navbar -->
        <header class="w-full bg-white shadow-md z-50 relative">
            <x-home-components.navbar />
        </header>
    </div>

    <x-home-components.floating-button />

    <main class="pt-5">
        <x-home-components.produk-detail :produk="$produk" :produkLainnya="$produkLainnya" />
        <x-home-components.footer />
    </main>

    @stack('scripts')
</body>
