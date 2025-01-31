<nav class="flex items-center justify-between py-3 px-6 border-b border-gray-100 z-100">
    <div id="nav-left" class="flex items-center">
        <a href="{{ route('home') }}">
            <x-application-logo />
        </a>
        <div class="top-menu ml-10">
            <div class="flex space-x-4">
                <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{ __('Beranda') }}
                </x-nav-link>

                <x-nav-link href="{{ route('tentang') }}" :active="request()->routeIs('tentang')">
                    {{ __('Tentang') }}
                </x-nav-link>

                <x-nav-link href="{{ route('layanan') }}" :active="request()->routeIs('layanan')">
                    {{ __('Pemasangan Baru') }}
                </x-nav-link>

                @auth
                <x-nav-link href="{{ route('trouble') }}" :active="request()->routeIs('trouble')">
                    {{ __('Trouble') }}
                </x-nav-link>
                @endauth

                <x-nav-link href="{{ route('kontak') }}" :active="request()->routeIs('kontak')">
                    {{ __('Kontak') }}
                </x-nav-link>

                @auth
                <x-nav-link href="{{ route('pesanan-saya') }}" :active="request()->routeIs('pesanan-saya')">
                    {{ __('Pesanan Saya') }}
                </x-nav-link>
                @endauth

            </div>
        </div>
    </div>
    <div id="nav-right" class="flex items-center md:space-x-6">
        @auth
        @include('layouts.partials.header-right-auth')
        @else
        @include('layouts.partials.header-right-guest')
        @endauth
    </div>
</nav>