<nav class="bg-white border-b border-gray-200 px-6 py-3 fixed w-full z-50">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <div class="flex items-center">
            <button id="menu-toggle" class="md:hidden text-gray-600 hover:text-gray-900 focus:outline-none">
                <svg id="menu-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <a href="{{ route('home') }}" class="ml-3">
                <x-application-logo />
            </a>
        </div>
        
        <div id="menu" class="hidden md:flex md:ml-10 space-x-4">
            <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">{{ __('Beranda') }}</x-nav-link>
            <x-nav-link href="{{ route('tentang') }}" :active="request()->routeIs('tentang')">{{ __('Tentang') }}</x-nav-link>
            <x-nav-link href="{{ route('layanan') }}" :active="request()->routeIs('layanan')">{{ __('Pemasangan Baru') }}</x-nav-link>
            @auth
                <x-nav-link href="{{ route('trouble') }}" :active="request()->routeIs('trouble')">{{ __('Trouble') }}</x-nav-link>
                <x-nav-link href="{{ route('pesanan-saya') }}" :active="request()->routeIs('pesanan-saya')">{{ __('Pesanan Saya') }}</x-nav-link>
            @endauth
            <x-nav-link href="{{ route('kontak') }}" :active="request()->routeIs('kontak')">{{ __('Kontak') }}</x-nav-link>
        </div>
        
        <div class="flex items-center md:space-x-6">
            @auth
                @include('layouts.partials.header-right-auth')
            @else
                @include('layouts.partials.header-right-guest')
            @endauth
        </div>
    </div>
    
    <!-- Mobile Sidebar -->
    <div id="mobile-menu" class="fixed top-0 left-0 h-full w-64 bg-white border-r border-gray-200 p-4 shadow-lg transform -translate-x-full transition-transform duration-300 md:hidden flex flex-col space-y-4">
        <button id="close-menu" class="absolute top-4 right-4 text-gray-600 hover:text-gray-900">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">{{ __('Beranda') }}</x-nav-link>
        <x-nav-link href="{{ route('tentang') }}" :active="request()->routeIs('tentang')">{{ __('Tentang') }}</x-nav-link>
        <x-nav-link href="{{ route('layanan') }}" :active="request()->routeIs('layanan')">{{ __('Pemasangan Baru') }}</x-nav-link>
        @auth
            <x-nav-link href="{{ route('trouble') }}" :active="request()->routeIs('trouble')">{{ __('Trouble') }}</x-nav-link>
            <x-nav-link href="{{ route('pesanan-saya') }}" :active="request()->routeIs('pesanan-saya')">{{ __('Pesanan Saya') }}</x-nav-link>
        @endauth
        <x-nav-link href="{{ route('kontak') }}" :active="request()->routeIs('kontak')">{{ __('Kontak') }}</x-nav-link>
    </div>
</nav>

<script>
    document.getElementById('menu-toggle').addEventListener('click', function () {
        let menu = document.getElementById('mobile-menu');
        let menuIcon = document.getElementById('menu-icon');
        let closeIcon = document.getElementById('close-icon');
        menu.classList.toggle('-translate-x-full');
        menuIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    });

    document.getElementById('close-menu').addEventListener('click', function () {
        let menu = document.getElementById('mobile-menu');
        let menuIcon = document.getElementById('menu-icon');
        let closeIcon = document.getElementById('close-icon');
        menu.classList.add('-translate-x-full');
        menuIcon.classList.remove('hidden');
        closeIcon.classList.add('hidden');
    });
</script>
