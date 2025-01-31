<?php

namespace App\Http\Controllers;

use App\Models\Trouble;
use Illuminate\Http\Request;

class TroubleController extends Controller
{
    public function index()
    {
        return view('trouble.index');
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
            'address' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('reports', 'public');
        }

        Trouble::create([
            'address' => $request->address,
            'description' => $request->description,
            'photo' => $photoPath,
        ]);

        return redirect()->route('trouble.index')->with('success', 'Laporan berhasil dikirim.');
    }
}