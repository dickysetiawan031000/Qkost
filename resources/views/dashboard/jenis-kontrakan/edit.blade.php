@extends('dashboard.layouts.main')

@section('container')

<h4> Edit Jenis Kontrakan</h4>

<form action="{{ route('jenis-kontrakan.update', $jenisKontrakan->id) }}" method="post" class="mt-5">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="name" class="form-label">Nama Jenis Kontrakan</label>
        <input type="text" class="form-control" id="name" name="nama" value="{{ old('nama', $jenisKontrakan->nama) }}">
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat"
            value="{{ old('nama', $jenisKontrakan->alamat) }}">
    </div>
    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control" id="harga" name="harga"
            value="{{ old('nama', $jenisKontrakan->harga) }}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection