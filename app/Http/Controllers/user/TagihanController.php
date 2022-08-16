<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\KontrakanUser;
use App\Models\Tagihan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $harga = Kontrakan::query()->with(['jenis_kontrakan' => function ($q) {
        //     $q->select('id', 'harga');
        // }])->whereId($validatedData['kontrakan_id'])->first();

        $iduser = KontrakanUser::query()->with(['user' => function ($q) {
            $q->select('id', 'user_id');
        }])->whereId('kontrakan_user_id')->first();

        //coba



        $id = KontrakanUser::select('user_id');
        // $id2 = KontrakanUser::select('user_id')->get();
        $id2 = KontrakanUser::with('tagihan')->get();
        // dd($id2);


        return view('user.tagihan.index', [
            'tagihans' => Tagihan::where('id', Auth::user()->id)->get()
        ]);
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
    public function show(Transaksi $transaksi)
    {
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
