<?php

namespace App\Http\Controllers;

use App\Models\JenisKontrakan;
use Illuminate\Http\Request;

use App\Http\Requests\StoreJenisKontrakanRequest;
use App\Http\Requests\UpdateJenisKontrakanRequest;

class JenisKontrakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.jenis-kontrakan.index', [
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
        return view('dashboard.jenis-kontrakan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJenisKontrakanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validateData = $request->validate(
            [
                'nama' => ['required', 'max:255'],
                'alamat' => ['required', 'max:255'],
                'harga' => ['required', 'max:12']
            ]
        );

        JenisKontrakan::create($validateData);

        // dd($request);
        return redirect('/dashboard/jenis-kontrakan')->with('success', 'Jenis Kontrakan telah berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisKontrakan  $jenisKontrakan
     * @return \Illuminate\Http\Response
     */
    public function show(JenisKontrakan $jenisKontrakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisKontrakan  $jenisKontrakan
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisKontrakan $jenisKontrakan)
    {
        return view('dashboard.jenis-kontrakan.edit', [
            'jenisKontrakan' => $jenisKontrakan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJenisKontrakanRequest  $request
     * @param  \App\Models\JenisKontrakan  $jenisKontrakan
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
        return redirect('/dashboard/jenis-kontrakan')->with('success', 'Jenis Kontrakan telah berhasil diubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisKontrakan  $jenisKontrakan
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisKontrakan $jenisKontrakan)
    {
        JenisKontrakan::destroy($jenisKontrakan->id);
        return redirect('/dashboard/jenis-kontrakan');
    }
}
