<?php

namespace App\Http\Controllers;

use App\Models\Trouble;
use Illuminate\Http\Request;

class TroubleController extends Controller
{
    public function index()
    {
        $troubles = Trouble::byUserEmail(auth()->user()->email)->get();

        return view('trouble.index',[
            'troubles' => $troubles
        ]);
    }

    public function create()
    {
        return view('trouble.create');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'alamat' => 'required',
    //         'deskripsi' => 'required',
    //         'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);

    //     $imageName = time().'.'.$request->foto->extension();  
    //     $request->foto->move(public_path('images'), $imageName);

    //     $trouble = new Trouble;
    //     $trouble->alamat = $request->alamat;
    //     $trouble->deskripsi = $request->deskripsi;
    //     $trouble->foto = $imageName;
    //     $trouble->save();

    //     return redirect()->route('trouble.index')
    //                     ->with('success','Trouble created successfully.');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('foto')) {
            $photoPath = $request->file('foto')->store('troubles', 'public');
        }

        Trouble::create([
            'user_id' => auth()->id(),
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'foto' => $photoPath,
        ]);

        return redirect()->route('trouble')->with('success', 'Laporan berhasil dikirim. Dan akan segera kami proses.');
    }

    public function show(Trouble $trouble)
    {
        $trouble->load('user');

        return view('trouble.show', compact('trouble'));
    }
}