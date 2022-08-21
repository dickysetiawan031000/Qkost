<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\KontrakanUser;
use App\Models\Tagihan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tagihan.index', [
            'tagihans' => Tagihan::get(),
        ]);
    }

    public function settlement($id)
    {
        $tagihan = Tagihan::has('transaksi')->where('id', $id)->first();
        // dd($tagihan);

        if ($tagihan->transaksi->transaction_status == 'pending' || $tagihan->transaksi_id == null) {
            Transaksi::where('id', $id)->update(['transaction_status' => 'settlement']);
            return redirect()->route('admin.tagihan.index')->with('accepted', 'Transaksi Status berhasil diubah menjadi Settlement!');
        } else if ($tagihan->transaksi->transaction_status == 'settlement') {
            return redirect()->route('admin.tagihan.index')->with('allreadyactive', 'Transaksi Status sudah settlement!');
        }
    }

    public function rejected($id)
    {
        $tagihan = Tagihan::has('transaksi')->where('id', $id)->first();
        // dd($tagihan);

        if ($tagihan->transaksi->transaction_status == 'settlement') {
            Transaksi::where('id', $id)->update(['transaction_status' => 'pending']);
            return redirect()->route('admin.tagihan.index')->with('reject', 'Transaksi Status berhasil diubah menjadi Pending!');
        } else if ($tagihan->transaksi->transaction_status == 'pending') {
            return redirect()->route('admin.tagihan.index')->with('allreadyactive', 'Transaksi Status sudah Pending!');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tagihan.create', [
            'kontrakan_users' => KontrakanUser::with('kontrakan', 'user')->get()
            // 'tagihans' => Tagihan::with('kontrakan_user')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'kontrakan_user_id' => ['required'],
            'pembayaran_ke' => ['required'],
            'jatuh_tempo' => ['required'],
        ]);
        Tagihan::create($validateData);
        return redirect()->route('admin.tagihan.index')->with('success', 'Tagihan telah berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tagihan $tagihan)
    {
        return view('admin.tagihan.show', [
            'tagihan' => $tagihan
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
