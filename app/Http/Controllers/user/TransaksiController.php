<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\KontrakanUser;
use App\Models\Tagihan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('dashboardMiddleware');
    }
    public function index()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-LvTOzJTkAA6XR9FUR1_n0jUv';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $find = KontrakanUser::where('user_id', auth()->user()->id)->first();
        // dd();
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $find->harga ?? 10000,
            ),
            'customer_details' => array(
                'first_name' => auth()->user()->name,
                'last_name' => '',
                'email' => auth()->user()->email,
                'phone' => auth()->user()->user_profile->no_telp,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // $getData = Tagihan::where('kontrakan_user.user_id', auth()->user()->id)->get();
        $getData = Tagihan::whereHas('kontrakan_user', function ($q) {
            $q->where('user_id', '=', auth()->user()->id);
        })->get();
        return view('user.transaksi.index', compact('snapToken', 'getData'));
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
        $result  = json_decode($request->get('json'));

        // $ku = KontrakanUser::where([
        //     ['user_id', auth()->user()->id],
        //     ['transaksi_id', null],
        // ])->first();

        $tagihan = Tagihan::where('transaksi_id', null)->whereHas('kontrakan_user', function ($q) {
            $q->where('user_id', '=', auth()->user()->id);
        })->first();

        // $tagihan = Tagihan::where([
        //     ['kontrakan_user.user_id', auth()->user()->id],
        //     ['transaksi_id', null],
        // ])->first();

        $transaksi = Transaksi::create([
            'transaction_status' => $result->transaction_status,
            'transaction_id' => $result->transaction_id,
            'order_id' => $result->order_id,
            'gross_amount' => $result->gross_amount,
            'payment_type' => $result->payment_type,
            'payment_code' => isset($result->payment_code) ? $result->payment_code : null,
            'pdf_url' =>  isset($result->pdf_url) ? $result->pdf_url : null
        ]);


        $tagihan->update([
            'transaksi_id' => $transaksi->id
        ]);

        if ($result->transaction_status == 'settlement') {

            return redirect()->route('user.transaksi.index')->with('success', 'Pembayaran telah berhasil !');
        } elseif ($result->transaction_status == 'pending') {

            return redirect()->route('user.transaksi.index')->with('pending', 'Pembayaran di Pending !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {

        return view('user.transaksi.show', [
            'transaksi' => $transaksi,

        ]);
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
