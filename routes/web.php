<?php

use App\Models\JenisKontrakan;
use App\Models\Kontrakan;
use App\Models\KontrakanDetail;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // dd(User::with('user_profile')->whereId('1')->first());
    // dd(JenisKontrakan::with('kontrakan')->whereId('2')->first());
    // dd(Kontrakan::with(['kontrakan_detail', 'jenis_kontrakan'])->whereId('2')->first());
    dd(KontrakanDetail::with('kontrakan_isi')->whereId('2')->first());
});
