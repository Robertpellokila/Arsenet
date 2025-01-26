<?php

namespace App\Http\Controllers;

use App\Models\Fitur;
use App\Models\Pertanyaan;
use App\Models\Servis;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $pertanyaans = Pertanyaan::take(5)->get();
        $fiturs = Fitur::latest()->take(6)->get();
        $servis = Servis::latest()->take(6)->get();
        
        return view('home', [
            'pertanyaans' => $pertanyaans,
            'fiturs' => $fiturs,
            'servis' => $servis,
        ]);
    }
}