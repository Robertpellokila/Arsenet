<x-app-layout>

    <div class="container mx-auto p-6 mt-12">
        <h1 class="text-3xl font-bold mb-6 text-center">Paket Layanan Internet</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($pakets as $paket)
            <div class="max-w-xs rounded-lg border border-gray-200 bg-white shadow-md">
                <a href="{{ route('paket.detail', ['paket' => $paket->id]) }}">
                    <img class="rounded-t-lg" src="{{ asset('/storage/' . $paket->gambar) }}" alt="{{ $paket->nama }}">
                    <div class="p-4">
                        <h5 class="text-lg font-bold">{{ $paket->nama }}</h5>
                        <p class="text-gray-500">{{ $paket->deskripsi }}</p>
                        <p class="text-xl font-semibold mt-2">Rp.{{ number_format($paket->harga, 0, ',', '.') }} / Bulan
                        </p>
                        {{-- <a href="{{ route('paket.detail', ['id' => 1]) }}"
                            class="mt-4 inline-block text-blue-600 hover:underline">Detail Paket</a> --}}
                    </div>
                </a>
            </div>
            @empty
            <div class="col-span-full w-full flex justify-center items-center h-[200px]">
                <p class="text-xl text-red-500 text-center">Belum ada paket layanan internet yang tersedia.</p>
            </div>
            @endforelse
        </div>
    </div>

</x-app-layout>