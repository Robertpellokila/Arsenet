<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        // Ambil pesanan-pesanan yang terkait dengan pengguna yang login
        $orders = Order::byUserEmail(auth()->user()->email)->get();


        
        // dd($orders);

        // Tampilkan halaman pesanan dengan data pesanan
        return view('pesanan.index', [
            'orders' => $orders
        ]);
    }

    public function show(Order $order)
    {
        // Memuat relasi paket dan user untuk menampilkan data terkait
        $order->load('paket', 'user');
        
        // Mengirim data pesanan ke view
        return view('pesanan.show', compact('order'));
    }

    public function cancel($id)
    {
        // Cari pesanan berdasarkan ID
        $order = Order::findOrFail($id);

        // Periksa apakah pesanan masih bisa dibatalkan
        if ($order->status !== 'pending') {
            return redirect()->route('pesanan-saya')->with('error', 'Pesanan tidak dapat dibatalkan.');
        }

        // Update status pesanan
        $order->status = 'canceled';
        $order->save();

        return redirect()->route('pesanan-saya')->with('sukses', 'Pesanan berhasil dibatalkan.');
    }

    // Metode untuk menghapus pesanan
    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        // Pastikan pesanan sudah dibatalkan
        if ($order->status !== 'canceled') {
            return redirect()->route('pesanan-saya')->with('error', 'Pesanan yang dibatalkan dapat dihapus.');
        }

        // Hapus pesanan
        $order->delete();

        return redirect()->route('pesanan-saya')->with('success', 'Pesanan berhasil dihapus.');
    }
}