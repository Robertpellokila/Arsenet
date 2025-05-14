<x-app-layout>
    <div class="container mx-auto p-6 mt-12">

        <!-- Tombol Kembali dengan posisi sticky di kiri atas -->
        <a href="{{ route('layanan') }}" class="fixed top-16 left-4 flex items-center justify-center w-12 h-12 bg-blue-600 text-white rounded-3xl shadow-md hover:bg-blue-500 z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5l-7 7 7 7" />
            </svg>
        </a>

        <!-- Konten Halaman -->
        <h1 class="text-3xl font-bold mb-6 text-center">{{ $paket->nama }}</h1>
        <div class="max-w-lg mx-auto">
            <img class="rounded-lg w-full" src="{{ asset('/storage/' . $paket->gambar) }}" alt="{{ $paket->nama }}">
            <div class="p-6">
                <p class="text-xl font-semibold mb-4">Harga: Rp.{{ number_format($paket->harga, 0, ',', '.') }} / Bulan</p>
                <p class="text-gray-500 mb-6">{{ $paket->deskripsi }}</p>
                {{-- <form action="{{ route('pesan', $paket) }}" method="POST"> --}}
                    @csrf
                    <a href="{{ route('order.create', $paket) }}" class="px-6 py-3 bg-blue-600 text-white rounded-md">Pesan Sekarang</a>

                {{-- </form> --}}
            </div>
        </div>
    </div>
</x-app-layout>
