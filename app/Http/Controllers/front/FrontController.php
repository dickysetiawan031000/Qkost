<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
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
    public function contact()
    {
        return view('front.kontak');
    }
    public function price()
    {
        return view('front.harga');
    }
}
