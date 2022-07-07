@extends('admin.layouts.main')

@section('container')

<h4> Tambah Jenis Kontrakan</h4>


<form action="{{ route('admin.jenis-kontrakan.store') }}" method="post" class="mt-5 col-lg-8">
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
        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">
    </div>

    @error('alamat')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga">
    </div>
    @error('harga')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection