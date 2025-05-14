<x-app-layout>

    <div class="container mx-auto my-10 p-6 bg-white border rounded-lg shadow-md mt-12">
        <h2 class="text-3xl font-extrabold text-center text-blue-600 mb-8">Tagihan Pembayaran</h2>

        <div class="grid mx-auto max-w-xl grid-cols-1 gap-6 border shadow-md">
            <!-- Informasi Paket -->
            <div>
                <h3 class="text-xl font-semibold text-center text-blue-500 mb-4">Informasi Paket</h3>
                <div class="overflow-x-auto">
                    <div class="card shadow-sm border border-gray-200">
                        <table class="table-auto w-full">
                            <tbody>
                                <tr class="bg-gray-50">
                                    <th class="text-left py-2 px-4">Nama Paket</th>
                                    <td class="py-2 px-4">{{ $order->paket->nama }}</td>
                                </tr>
                                <tr class="bg-gray-100">
                                    <th class="text-left py-2 px-4">Deskripsi Paket</th>
                                    <td class="py-2 px-4">{{ $order->paket->deskripsi }}</td>
                                </tr>
                                <tr class="bg-gray-50">
                                    <th class="text-left py-2 px-4">Harga Paket</th>
                                    <td class="py-2 px-4">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Informasi Pesanan -->
            <div>
                <h3 class="text-xl font-semibold text-center text-blue-500 mb-4">Informasi Pesanan</h3>
                <div class="overflow-x-auto">
                    <div class="card shadow-sm border border-gray-200">
                        <table class="table-auto w-full">
                            <tbody>
                                <tr class="bg-gray-50">
                                    <th class="text-left py-2 px-4">Tanggal Pesanan</th>
                                    <td class="py-2 px-4">{{ $order->created_at->format('d-m-Y') }}</td>
                                </tr>
                                <tr class="bg-gray-100">
                                    <th class="text-left py-2 px-4">Status</th>
                                    <td class="py-2 px-4"><span class="@if ($order->status === 'canceled') text-red-800 rounded-md bg-red-300 p-1
                                    @elseif ($order->status === 'completed') text-green-800 rounded-md bg-green-300 p-1  
                                    @else text-yellow-800 rounded-md bg-yellow-300 p-1  @endif">{{ $order->status }}</span></td>
                                </tr>
                                <tr class="bg-gray-50">
                                    <th class="text-left py-2 px-4">Total</th>
                                    <td class="py-2 px-4">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                                </tr>
                                <tr class="bg-gray-100">
                                    <th class="text-left py-2 px-4">Nama Pelanggan</th>
                                    <td class="py-2 px-4">{{ $order->nama_pelanggan }}</td>
                                </tr>
                                <tr class="bg-gray-50">
                                    <th class="text-left py-2 px-4">Email Pelanggan</th>
                                    <td class="py-2 px-4">{{ $order->email_pelanggan }}</td>
                                </tr>
                                <tr class="bg-gray-100">
                                    <th class="text-left py-2 px-4">Telepon Pelanggan</th>
                                    <td class="py-2 px-4">{{ $order->telepon_pelanggan }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>

        <!-- Total Tagihan -->
        <div class="mt-6 text-center">
            <h4 class="text-2xl font-semibold text-blue-600">Total Tagihan: Rp {{ number_format($order->total_harga, 0,
                ',', '.') }}</h4>
        </div>

        <!-- Tombol Kembali dan Pembayaran -->
        <div class="mt-6 flex justify-center gap-4">
            <a href="{{ route('pesanan-saya') }}"
                class="inline-block px-6 py-3 text-sm font-medium text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                Kembali ke Pesanan Saya
            </a>

            <!-- Tombol Pembayaran -->
            @if ($order->status === 'pending')
            <a href="{{ route('payment.process', $order->id) }}"
                class="inline-block px-6 py-3 ml-4 text-sm font-medium text-white bg-orange-600 rounded-lg shadow hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                Tagihan
            </a>
            @endif
        </div>
    </div>



</x-app-layout>