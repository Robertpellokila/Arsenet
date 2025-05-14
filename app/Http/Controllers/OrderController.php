<?php
// app/Http/Controllers/OrderController.php
namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
public function create(Paket $paket)
{
// Menampilkan halaman pemesanan dengan informasi paket
return view('order.create', compact('paket'));
}

public function store(Request $request, Paket $paket)
{
    $request->validate([
        'nama_pelanggan' => 'required|string|max:255',
        'email_pelanggan' => 'required|email|max:255',
        'telepon_pelanggan' => 'required|string|max:15',
        'alamat_pelanggan' => 'required|string|max:255',
    ]);

    // Validasi: Cek apakah user sudah memesan paket ini
    $existingOrder = Order::where('user_id', auth()->id())
        ->where('paket_id', $paket->id)
        ->first();

    if ($existingOrder) {
        return redirect()->back()->with('error', 'Anda sudah memesan paket ini. Silahkan cek halaman pesanan Anda.');
    }

    // Jika belum, buat pesanan baru
    Order::create([
        'nama_pelanggan' => $request->nama_pelanggan,
        'email_pelanggan' => $request->email_pelanggan,
        'telepon_pelanggan' => $request->telepon_pelanggan,
        'alamat_pelanggan' => $request->alamat_pelanggan,
        'paket_id' => $paket->id,
        'user_id' => auth()->id(),
        'status' => 'pending', // status pemesanan
        'total_harga' => $paket->harga,
    ]);

    return redirect()->route('pesanan-saya')->with('success', 'Pesanan berhasil dibuat.');
}

}