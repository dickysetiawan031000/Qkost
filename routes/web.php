<?php

use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\JenisKontrakanController;
use App\Http\Controllers\admin\KontrakanController as AdminKontrakanController;
use App\Http\Controllers\admin\KontrakanDetailController;
use App\Http\Controllers\admin\KontrakanIsiController;
use App\Http\Controllers\admin\KontrakanUserController;
use App\Http\Controllers\admin\TagihanController;
use App\Http\Controllers\admin\UserController as AdminUserController;
use App\Http\Controllers\front\FrontController;

use App\Http\Controllers\user\auth\UserLoginController;
use App\Http\Controllers\user\auth\UserRegistrationController;
use App\Http\Controllers\user\CheckProfileController;
use App\Http\Controllers\user\DashboardController;
use App\Http\Controllers\user\KontrakanUserController as UserKontrakanUserController;
use App\Http\Controllers\user\TagihanController as UserTagihanController;
use App\Http\Controllers\user\TransaksiController;
use App\Http\Controllers\user\UserProfileController;
use App\Models\KontrakanUser;
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
Route::get('/kontak', [FrontController::class, 'contact'])->name('contact-page');
Route::get('/harga', [FrontController::class, 'price'])->name('price-page');


Route::get('/login', [UserLoginController::class, 'index']);
Route::post('/login', [UserLoginController::class, 'authenticate']);
Route::post('/logout', [UserLoginController::class, 'logout']);
Route::resource('/registrasi', UserRegistrationController::class);

// Route::get('payment/success', [UserKontrakanUserController::class, 'midtransCallback']);
// Route::post('payment/success', [UserKontrakanUserController::class, 'midtransCallback']);

Route::group(['middleware' => ['auth', 'checkRole:2']], function () {
    //User
    Route::prefix('user')->name('user.')->group(function () {
        Route::resource('user-profile', UserProfileController::class);
        Route::resource('/dashboard', DashboardController::class);
        Route::resource('/myprofile', CheckProfileController::class);
        // Route::resource('/tagihan', UserTagihanController::class);
        Route::resource('/kontrakan-user', UserKontrakanUserController::class);
        Route::resource('/transaksi', TransaksiController::class);
        // Route::post('/payment', [TransaksiController::class, 'store'])->name('payment');
        // Route::get('/kontrakan-user/getSnapRedirect/{id}', [UserKontrakanUserController::class, 'getSnapRedirect']);
    });
});

Route::group(['middleware' => ['auth', 'checkRole:1']], function () {
    //Admin
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('/dashboard', AdminDashboardController::class);
        Route::resource('/jenis-kontrakan', JenisKontrakanController::class);
        Route::resource('/user', AdminUserController::class);
        Route::resource('/kontrakan', AdminKontrakanController::class);
        Route::resource('/kontrakan-user', KontrakanUserController::class);
        Route::resource('/kontrakan-detail', KontrakanDetailController::class);
        Route::resource('/kontrakan-isi', KontrakanIsiController::class);
        Route::resource('/tagihan', TagihanController::class);
    });
});





// Route::get('/user/profile', function () {
//     return view('user.profile.index');
// });

// Route::get('/user/data-diri', function () {
//     return view('user.data-diri');
// })->middleware('auth');

// Route::get('/user/index', function () {
//     return view('user.index');
// })->middleware('auth')->name('user-index');

// Route::resource('/dashboard/kontrakan-detail', KontrakanDetailController::class);
// Route::resource('/dashboard/kontrakan', KontrakanController::class);
// Route::resource('/login', LoginController::class, 'authenticate');


// Route::resource('/dashboard', UserProfileController::class);
