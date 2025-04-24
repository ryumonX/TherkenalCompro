{{-- views/layouts/navigation.blade.php --}}

@php
/* -----------------------------------------------------------------
|  Daftar menu sidebar – tinggal tambah/edit di sini saja
|-----------------------------------------------------------------*/
$navGroups = [
    'DASHBOARD' => [
        ['label' => 'Beranda', 'route' => 'dashboard', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />'],
    ],

    'KONTEN BERANDA' => [
        ['label' => 'Slider', 'route' => 'admin.slider.index', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />'],
        ['label' => 'Hero', 'route' => 'admin.hero.index', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />'],
        ['label' => 'Tentang Kami', 'route' => 'admin.tentang-kami.edit', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.878 5 8.75 5m1.372 3h-.985c-.138-.32-.278-.603-.398-.862-.32 2.886-.943 5.586-1.622 8.097C8.014 14.318 6 10.68 6 6c0-2.3'],
        ['label' => 'Layanan', 'route' => 'admin.banner-layanan.index', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />'],
        ['label' => 'Keunggulan', 'route' => 'admin.keunggulan.index', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />'],
        ['label' => 'Banner Hubungi Kami', 'route' => 'admin.hubungi-kami.edit', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />'],
    ],

    'PRODUK & GALERI' => [
        ['label' => 'Produk', 'route' => 'admin.produk.index', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />'],
        ['label' => 'Galeri Produk', 'route' => 'admin.galeri-produk.index', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />'],
    ],

    'ARTIKEL & BLOG' => [
        ['label' => 'Kategori Artikel', 'route' => 'admin.kategori-artikel.index', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />'],
        ['label' => 'Artikel', 'route' => 'admin.artikel.index', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />'],
    ],

    'PENGATURAN' => [
        ['label' => 'Config Web', 'route' => 'admin.config-web.edit', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />'],
        ['label' => 'Breadcrumb', 'route' => 'admin.breadcrumb.edit', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />'],
        ['label' => 'Sosial Media', 'route' => 'admin.sosial-media.index', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />'],
        ['label' => 'Kontak', 'route' => 'admin.kontak.edit', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />'],
        ['label' => 'Inbox Pesan', 'route' => 'admin.form-kontak.index', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />'],
    ],

    'USERS' => [
        ['label' => 'Users', 'route' => 'admin.users.index', 'icon' => '<svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>'],
    ],
];
@endphp

<!-- Sidebar dengan CSS normal (bukan Tailwind utilities) -->
<aside id="sidebar" class="sidebar">
    <!-- Header area with toggle button only -->
    <div class="h-16 border-b border-gray-200 flex items-center justify-between px-4">
        @php
            $configWeb = \App\Models\ConfigWeb::first();
        @endphp

        <div class="sidebar-logo overflow-hidden">
            @if($configWeb && $configWeb->logo)
                <img src="{{ asset('storage/' . $configWeb->logo) }}" alt="Logo Admin" class="h-10 object-contain sidebar-content">
            @else
                <p class="sidebar-content">Admin Panel</p>
            @endif
        </div>

        <button id="sidebar-toggle" class="text-gray-500 hover:text-gray-700 p-2 rounded-lg hover:bg-gray-100 transition-colors duration-200 focus:outline-none">
            <svg id="collapse-icon" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            <svg id="expand-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>

    <!-- Navigation area with dropdown menus -->
    <div class="pb-6 h-[calc(100vh-64px)] overflow-y-auto">
        <nav class="mt-2 px-2">
            @foreach($navGroups as $group => $links)
                <div class="mb-1" x-data="{ open: false }">
                    <!-- Group header with dropdown toggle -->
                    <button
                        @click="open = !open"
                        class="w-full flex items-center justify-between px-3 py-2.5 text-sm font-medium rounded-md transition-all duration-200 group hover:bg-gray-50"
                    >
                        <div class="flex items-center truncate">
                            <!-- Group icon (using the first item's icon) -->
                            <svg class="flex-shrink-0 h-6 w-6 text-gray-500 group-hover:text-gray-600"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                {!! $links[0]['icon'] !!}
                            </svg>

                            <!-- Group name -->
                            <span class="ml-3 sidebar-content">
                                {{ $group }}
                            </span>
                        </div>

                        <!-- Dropdown arrow -->
                        <svg
                            class="flex-shrink-0 h-4 w-4 text-gray-400 sidebar-content"
                            :class="{'transform rotate-90': open}"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>

                    <!-- Dropdown content -->
                    <div
                        x-show="open"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-2"
                        class="mt-1 pl-10 sidebar-content"
                    >
                        <div class="space-y-1 py-1">
                            @foreach($links as $link)
                                @php $active = request()->routeIs($link['route'].'*'); @endphp
                                <a href="{{ route($link['route']) }}"
                                   class="flex items-center px-3 py-1.5 text-sm rounded-md transition-colors duration-150
                                        {{ $active
                                            ? 'bg-blue-50 text-blue-700'
                                            : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}"
                                >
                                    <span class="text-sm mr-2">{{ $link['label'] }}</span>

                                    <!-- Active indicator dot -->
                                    @if($active)
                                        <span class="ml-auto h-1.5 w-1.5 rounded-full bg-blue-600"></span>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </nav>
    </div>
</aside>

<!-- Mobile sidebar backdrop -->
<div id="sidebar-backdrop" class="fixed inset-0 bg-gray-600 bg-opacity-75 z-40 hidden lg:hidden transition-opacity duration-300 ease-in-out"></div>