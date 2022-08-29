<?php

use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\JenisKontrakanController;
use App\Http\Controllers\admin\KontakKamiController as AdminKontakKamiController;
use App\Http\Controllers\admin\KontrakanController as AdminKontrakanController;
use App\Http\Controllers\admin\KontrakanDetailController;
use App\Http\Controllers\admin\KontrakanIsiController;
use App\Http\Controllers\admin\KontrakanUserController;
use App\Http\Controllers\admin\TagihanController;
use App\Http\Controllers\admin\UserController as AdminUserController;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\front\KontakKamiController;
use App\Http\Controllers\user\auth\UserLoginController;
use App\Http\Controllers\user\auth\UserRegistrationController;
use App\Http\Controllers\user\CheckProfileController;
use App\Http\Controllers\user\DashboardController;
use App\Http\Controllers\user\KontrakanUserController as UserKontrakanUserController;
use App\Http\Controllers\user\PasswordController;
use App\Http\Controllers\user\TagihanController as UserTagihanController;
use App\Http\Controllers\user\TransaksiController;
use App\Http\Controllers\user\UserProfileController;
use App\Models\KontrakanUser;
use Database\Factories\TagihanFactory;
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
// dd(User::with('user_profile')->whereId('1')->first());
// dd(JenisKontrakan::with('kontrakan')->whereId('2')->first());
// dd(Kontrakan::with(['kontrakan_detail', 'jenis_kontrakan'])->whereId('2')->first());
// dd(KontrakanDetail::with('kontrakan_isi')->whereId('2')->first());

//Front
Route::get('/', [FrontController::class, 'index'])->name('landing-page');
Route::get('/tentang-kami', [FrontController::class, 'about_us'])->name('about-us-page');
// Route::get('/kontak-kami', [FrontController::class, 'contact'])->name('contact-page');
Route::get('/harga', [FrontController::class, 'price'])->name('price-page');

Route::resource('/kontak-kami', KontakKamiController::class);

Route::get('/login', [UserLoginController::class, 'index']);
Route::post('/login', [UserLoginController::class, 'authenticate']);
Route::post('/logout', [UserLoginController::class, 'logout']);
Route::resource('/registrasi', UserRegistrationController::class);

Route::group(['middleware' => ['auth', 'checkRole:2']], function () {
    //User
    Route::prefix('user')->name('user.')->group(function () {
        Route::resource('/user-profile', UserProfileController::class);
        Route::resource('/dashboard', DashboardController::class);
        Route::resource('/kontrakan-user', UserKontrakanUserController::class);
        Route::resource('/transaksi', TransaksiController::class);
        Route::resource('/password', PasswordController::class);
    });
});

Route::group(['middleware' => ['auth', 'checkRole:1']], function () {
    //Admin
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('/dashboard', AdminDashboardController::class);
        Route::resource('/jenis-kontrakan', JenisKontrakanController::class);
        Route::get('jenis-kontrakan/destroy/{id}', [JenisKontrakanController::class, 'destroy']);
        Route::resource('/user', AdminUserController::class);
        Route::get('user/accepted/{id}', [AdminUserController::class, 'accepted']);
        Route::get('user/rejected/{id}', [AdminUserController::class, 'rejected']);
        Route::resource('/kontrakan', AdminKontrakanController::class);
        Route::get('kontrakan/destroy/{id}', [AdminKontrakanController::class, 'destroy']);
        Route::resource('/kontrakan-user', KontrakanUserController::class);
        Route::resource('/kontrakan-detail', KontrakanDetailController::class);
        Route::resource('/kontrakan-isi', KontrakanIsiController::class);
        Route::resource('/tagihan', TagihanController::class);
        Route::get('tagihan/settlement/{id}', [TagihanController::class, 'settlement']);
        Route::get('tagihan/rejected/{id}', [TagihanController::class, 'rejected']);
        Route::resource('/kontak-kami', AdminKontakKamiController::class);
    });
});
