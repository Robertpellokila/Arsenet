<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;

class KontakController extends Controller
{

    public function showForm()
    {
        return view('kontak.index');  // Menampilkan form kontak
    }
    public function sendEmail(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Kirim email
        Mail::to('lajaiku3@gmail.com')->send(new ContactMessage($validated));

        return redirect()->route('kontak')->with('success', 'Pesan Anda telah berhasil terkirim!');
    } 
}