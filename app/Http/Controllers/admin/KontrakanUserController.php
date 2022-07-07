<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JenisKontrakan;
use App\Models\Kontrakan;
use App\Models\KontrakanDetail;
use App\Models\KontrakanUser;
use App\Models\User;
use Illuminate\Http\Request;

class KontrakanUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kontrakan-user.index', [
            'kontrakan_user' => KontrakanUser::with('user', 'kontrakan.jenis_kontrakan')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return KontrakanDetail::with('kontrakan.jenis_kontrakan')->get();
        return view('admin.kontrakan-user.create', [
            'users' => User::has('user_profile')->doesntHave('kontrakan_user')->get(),
            'kontrakans' => KontrakanDetail::with('kontrakan.jenis_kontrakan')->whereDoesntHave('kontrakan.kontrakan_user')->get()
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
        $validatedData = $request->validate([
            'user_id' => ['required'],
            'kontrakan_id' => ['required'],
        ]);

        $harga = Kontrakan::query()->with(['jenis_kontrakan' => function ($q) {
            $q->select('id', 'harga');
        }])->whereId($validatedData['kontrakan_id'])->first();

        KontrakanUser::create([
            'kontrakan_id' => $validatedData['kontrakan_id'],
            'user_id' => $validatedData['user_id'],
            'harga' => $harga->jenis_kontrakan->harga
        ]);

        KontrakanDetail::whereKontrakanId($validatedData['kontrakan_id'])->update([
            'status' => 'isi'
        ]);

        return redirect()->route('admin.kontrakan-user.index');
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
