@extends('dashboard.layouts.main')

@section('container')

<h4> Tambah Jenis Kontrakan</h4>




<form action="/dashboard/jenis-kontrakan" method="post" class="mt-5 col-lg-8">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nama Jenis Kontrakan</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="name" name="nama">
    </div>
    @error('nama')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror

    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat">
    </div>
    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control" id="harga" name="harga">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection