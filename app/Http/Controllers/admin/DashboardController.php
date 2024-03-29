<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JenisKontrakan;
use App\Models\KontakKami;
use App\Models\Kontrakan;
use App\Models\KontrakanUser;
use App\Models\Tagihan;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userCount = User::where('role', 2)->count();
        $jenisCount = JenisKontrakan::count();
        $kk = KontakKami::count();
        $kamar = Kontrakan::count();
        $ku = KontrakanUser::count();
        $tagihan = Tagihan::count();
        $total =  Transaksi::where('transaction_status', 'settlement')->get()->sum('gross_amount');

        return view('admin.index', compact(
            [
                'userCount',
                'jenisCount',
                'total',
                'kamar',
                'ku',
                'tagihan',
                'kk'
            ]
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
