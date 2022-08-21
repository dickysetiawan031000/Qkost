<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JenisKontrakan;
use App\Models\Kontrakan;
use App\Models\KontrakanDetail;
use App\Models\User;
use Illuminate\Http\Request;

class KontrakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $test = Kontrakan::with('kontrakan_detail')->get();
        // dd($test);
        return view('admin.kontrakan.index', [
            'kontrakans' => Kontrakan::get()
        ]);

        // $data = array(
        //     'kontrakans' => $kontrakan,
        //     'kontrakanDetails' => $kontrakanDetail
        // );

        // $data = Kontrakan::with('kontrakan_detail')->get();
        // return view('admin.kontrakan.index', compact($data));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kontrakan.create', [
            'jenisKontrakans' => JenisKontrakan::all(),
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
            'nomor' => ['required'],
            'jenis_kontrakan_id' => ['required', 'max:255']
        ]);

        $kontrakan = Kontrakan::create($validatedData);

        KontrakanDetail::create([
            'kontrakan_id' => $kontrakan->id,
            'nomor' => $validatedData['nomor'],
            'status' => 'kosong'
        ]);

        return redirect()->route('admin.kontrakan.index')->with('success', 'Data Kontrakan Berhasil di Tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kontrakan $kontrakan)
    {
        return view('admin.kontrakan.show', [
            'kontrakan' => $kontrakan
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
    public function destroy(Kontrakan $kontrakan)
    {
        Kontrakan::destroy($kontrakan->id);

        // $register_patient->testResult ? $register_patient->testResult->delete() : $register_patient->delete();
        $kontrakan->kontrakan_user ? $kontrakan->kontrakan_user->delete() : $kontrakan->delete();

        return redirect()->route('admin.kontrakan.index');
    }
}
