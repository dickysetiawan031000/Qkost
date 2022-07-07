@extends('user.layouts.main')

@section('container')

<h1 class="h2">Hai, {{ auth()->user()->name }} !</h1>
<h5 class="text-danger mt-5 mb-3">Mohon lengkapi data diri berikut ini.</h5>

<form action="{{ route('user.user-profile.store') }}" method="post" class="col-lg-6 " enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="ktp_image" class="form-label">KTP Image</label>
        <input class="form-control @error('ktp_image') is-invalid @enderror" type="file" id="ktp_image"
            name="ktp_image">
    </div>
    @error('ktp_image')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror

    <div class="mb-3">
        <label for="ktp_nik" class="form-label">NIK</label>
        <input type="text" class="form-control @error('ktp_nik') is-invalid @enderror" id="ktp_nik"
            placeholder="Nomor Induk Kependudukan" name="ktp_nik" value="{{ old('ktp_nik') }}">
    </div>
    @error('ktp_nik')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror

    <div class="mb-3">
        <label for="no_telp" class="form-label">Nomor Telepon</label>
        <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp"
            placeholder="Nomor Telepon" name="no_telp" value="{{ old('no_telp') }}">
    </div>
    @error('no_telp')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror

    <div class="mb-3">
        <label for="pekerjaan" class="form-label">Pekerjaan</label>
        <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan"
            placeholder="Pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}">
    </div>
    @error('pekerjaan')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror

    <div class="mb-3">
        <label for="avatar" class="form-label">Avatar</label>
        <input class="form-control @error('avatar') is-invalid @enderror" type="file" id="avatar" name="avatar">
    </div>
    @error('avatar')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror

    <button type="submit" class="btn btn-outline-success mt-4 col-lg-4">Kirim</button>
</form>
@endsection