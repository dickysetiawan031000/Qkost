<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\JenisKontrakan;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('front.home');
    }

    public function about_us()
    {
        return view('front.tentang-kami');
    }
    // public function contact()
    // {
    //     return view('front.kontak-kami');
    // }
    public function price()
    {
        return view('front.harga', [
            'jenisKontrakan' => JenisKontrakan::get()
        ]);
    }
}
