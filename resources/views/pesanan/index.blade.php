<!-- resources/views/pesanan/index.blade.php -->
<x-app-layout>
    @if (session('success'))
    <div id="alert-3"
        class="fixed top-6 left-1/2 transform -translate-x-1/2 z-50 flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-200 dark:bg-gray-800 dark:text-green-400"
        role="alert">
        <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div class="ms-3 text-sm font-medium">
            {{ session('success') }}
        </div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
            data-dismiss-target="#alert-3" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>

    @endif
    <div class="container mx-auto p-6 mt-12">

        {{-- @dd($orders); --}}
        <h2 class="text-2xl text-center font-semibold text-gray-800 dark:text-white mb-10">
            Pesanan Saya
        </h2>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama Paket
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Harga
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created At
                        </th>
                        <th scope="col" class="px-6 text-center py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)

                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $order->paket->nama }}
                        </th>
                        <td class="px-6 py-4">
                            <span class="@if ($order->status === 'canceled') text-white rounded-md bg-red-500 p-1
             @elseif ($order->status === 'active') text-white rounded-md bg-green-500 p-1 @elseif ($order->status === 'completed') text-white rounded-md bg-blue-500 p-1
             @else text-white rounded-md bg-yellow-300 p-1  @endif">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            Rp.{{ number_format($order->total_harga, 0, ',', '.') }} / Bulan
                        </td>
                        <td class="px-6 py-4">
                            {{ $order->created_at->format('F Y') }}
                        </td>
                        <td class="flex px-6 py-4 space-x-2 justify-center">
                            <a href="{{ route('pesanan.show', $order->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat Detail</a>
                            @if ($order->status === 'pending')
                            <form action="{{ route('pesanan.cancel', $order->id) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin membatalkan pesanan ini?')">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                    Cancel
                                </button>
                            </form>
                            @elseif ($order->status === 'canceled')
                            <form action="{{ route('pesanan.delete', $order->id) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                    Hapus
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-xl dark:text-white">
                            Anda belum memiliki pesanan.
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>


</x-app-layout>