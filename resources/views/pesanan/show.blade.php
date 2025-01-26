<!-- resources/views/pesanan/show.blade.php -->
<x-app-layout>
    {{-- @dd($order); --}}
    <div class="container mx-auto my-10 p-6 bg-white border rounded-lg shadow">
        <h2 class="text-2xl font-bold text-center mb-6">Tagihan Pembayaran</h2>
    
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Informasi Pesanan -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Informasi Pesanan</h3>
                <div class="overflow-x-auto">
                    <table class="w-full table-auto border-collapse border border-gray-300">
                        <tbody>
                            <tr class="border-b">
                                <th class="text-left py-2 px-4 bg-gray-100 font-medium">Tanggal Pesanan</th>
                                <td class="py-2 px-4">{{ $order->created_at->format('d-m-Y') }}</td>
                            </tr>
                            <tr class="border-b">
                                <th class="text-left py-2 px-4 bg-gray-100 font-medium">Status</th>
                                <td class="py-2 px-4">{{ $order->status }}</td>
                            </tr>
                            <tr class="border-b">
                                <th class="text-left py-2 px-4 bg-gray-100 font-medium">Total</th>
                                <td class="py-2 px-4">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                            </tr>
                            <tr class="border-b">
                                <th class="text-left py-2 px-4 bg-gray-100 font-medium">Nama Pelanggan</th>
                                <td class="py-2 px-4">{{ $order->nama_pelanggan }}</td>
                            </tr>
                            <tr class="border-b">
                                <th class="text-left py-2 px-4 bg-gray-100 font-medium">Email Pelanggan</th>
                                <td class="py-2 px-4">{{ $order->email_pelanggan }}</td>
                            </tr>
                            <tr>
                                <th class="text-left py-2 px-4 bg-gray-100 font-medium">Telepon Pelanggan</th>
                                <td class="py-2 px-4">{{ $order->telepon_pelanggan }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    
            <!-- Informasi Paket -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Informasi Paket</h3>
                <div class="overflow-x-auto">
                    <table class="w-full table-auto border-collapse border border-gray-300">
                        <tbody>
                            <tr class="border-b">
                                <th class="text-left py-2 px-4 bg-gray-100 font-medium">Nama Paket</th>
                                <td class="py-2 px-4">{{ $order->paket->nama }}</td>
                            </tr>
                            <tr class="border-b">
                                <th class="text-left py-2 px-4 bg-gray-100 font-medium">Deskripsi Paket</th>
                                <td class="py-2 px-4">{{ $order->paket->deskripsi }}</td>
                            </tr>
                            <tr>
                                <th class="text-left py-2 px-4 bg-gray-100 font-medium">Harga Paket</th>
                                <td class="py-2 px-4">Rp {{ number_format($order->paket->harga, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
        <!-- Total Tagihan -->
        <div class="mt-6 text-right">
            <h4 class="text-xl font-bold">Total Tagihan: Rp {{ number_format($order->total_harga, 0, ',', '.') }}</h4>
        </div>
    
        <!-- Tombol Kembali -->
        <div class="mt-6 text-center">
            <a href="{{ route('pesanan-saya') }}" 
               class="inline-block px-6 py-3 text-sm font-medium text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Kembali ke Pesanan Saya
            </a>
        </div>
    </div>
    
</x-app-layout>
