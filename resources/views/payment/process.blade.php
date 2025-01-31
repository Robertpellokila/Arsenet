<x-app-layout>
    {{-- @dd($order); --}}
    <div class="container mx-auto my-10 p-6 bg-white border rounded-lg shadow-lg max-w-3xl">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-semibold text-gray-900">Nota Pembayaran</h2>
            <p class="text-lg text-gray-600">Pesanan: {{ $order->paket->nama }}</p>
        </div>

        <div class="space-y-4">
            <!-- Detail Pesanan -->
            <div>
                <img src="{{  asset('/storage/' . $order->paket->gambar) }}" alt="">
            </div>
            <div class="flex justify-between">
                <span class="font-medium text-gray-700">Nama Paket</span>
                <span class="text-gray-900">{{ $order->paket->nama }}</span>
            </div>
            
            <hr>
            <div class="flex justify-between">
                <span class="font-medium text-gray-700">Deskripsi Paket</span>
                <div class="text-gray-900 max-w-xs">
                    <p class="line-clamp-1 text-right">{{ $order->paket->deskripsi }}</p>
                </div>
            </div>
            <hr>
            <div class="flex justify-between">
                <span class="font-medium text-gray-700">Total Pembayaran</span>
                <span class="text-xl font-semibold text-blue-600">{{ number_format($order->total_harga, 0, ',', '.') }} IDR</span>
            </div>
        </div>

        <div class="mt-8 text-center" id="payment-button-container">
            <a href="{{ route('pesanan.show', $order->id) }}"
                class="inline-block px-6 py-3 text-sm font-medium text-white bg-gray-600 rounded-lg shadow hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition">
                Kembali ke Pesanan Saya
            </a>
            <button id="pay-button" 
                class="mt-4 inline-block px-6 py-3 text-sm font-medium text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                Bayar Sekarang
            </button>
        </div>
    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script>
        document.getElementById('pay-button').addEventListener('click', function () {
            snap.pay('{{ $snapToken }}');
        });
    </script>
</x-app-layout>
