<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JenisKontrakan;
use Illuminate\Http\Request;

class JenisKontrakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.jenis-kontrakan.index', [
            'jenis' => JenisKontrakan::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jenis-kontrakan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                'nama' => ['required', 'max:255'],
                'alamat' => ['required', 'max:255'],
                'harga' => ['required', 'max:12']
            ]
        );

        JenisKontrakan::create($validateData);

        return redirect()->route('admin.jenis-kontrakan.index')->with('success', 'Jenis Kontrakan telah berhasil ditambahkan !');
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
    public function edit(JenisKontrakan $jenisKontrakan)
    {
        return view('admin.jenis-kontrakan.edit', [
            'jenisKontrakan' => $jenisKontrakan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisKontrakan $jenisKontrakan)
    {
        $rules = [
            'nama' => ['required', 'max:255'],
            'alamat' => ['required', 'max:255'],
            'harga' => ['required', 'max:12']
        ];

        $validateData = $request->validate($rules);
        JenisKontrakan::where('id', $jenisKontrakan->id)
            ->update($validateData);
        return redirect()->route('admin.jenis-kontrakan.index')->with('success', 'Jenis Kontrakan telah berhasil diubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // dd($id);
        $jenis = JenisKontrakan::find($id);
        $jenis->delete();

        // $jenis->kontrakan ? $jenis->kontrakan->delete() : $jenis->delete();

        return redirect()->route('admin.jenis-kontrakan.index');
    }
}
