<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $galleries = Gallery::latest()->take(6)->get();

        return view('tentang.index',[
            'galeries' => $galleries,
        ]);
    }
}