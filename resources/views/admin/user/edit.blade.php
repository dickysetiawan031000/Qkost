@extends('layouts.main')

@section('container')

<main class="content">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div>
                <button class="sidebarCollapseDefault btn p-0 border-0 d-none d-md-block" aria-label="Hamburger Button">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <button data-bs-toggle="offcanvas" data-bs-target=".sidebar" aria-controls="sidebar"
                    aria-label="Hamburger Button" class="sidebarCollapseMobile btn p-0 border-0 d-block d-md-none">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
            <div class="d-flex align-items-center justify-content-end gap-4">
                <img src="/image/admin.png" alt="Photo Profile" class="avatar" />
            </div>
        </div>
    </nav>
    <section class="p-3">
        <header>
            <h3>Edit</h3>
            <p>Edit User</p>
        </header>
        <div class="information d-flex flex-column gap-3">
            <a href="{{ route('admin.user.index') }}" class="item-menu">
                <i class="fa-solid fa-arrow-left-long"></i>
                &nbsp; &nbsp;Back
            </a>
            <form action="{{ route('admin.user.update', $user->id) }}" method="post" class="col-lg-8">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name', $user->name) }}">
                </div>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                        value="{{ old('email', $user->email) }}">
                </div>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

                <div class="mb-3">
                    <label for="pekerjaan" class="form-label">pekerjaan</label>
                    <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan"
                        name="pekerjaan" value="{{ old('pekerjaan', $user->user_profile->pekerjaan) }}">
                </div>
                @error('pekerjaan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

                <div class="mb-3">
                    <label for="no_telp" class="form-label">No Telepon</label>
                    <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp"
                        name="no_telp" value="{{ old('no_telp', $user->user_profile->no_telp) }}">
                </div>
                @error('no_telp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

                <div class="mb-3">
                    <label for="ktp_nik" class="form-label">NIK</label>
                    <input type="text" class="form-control @error('ktp_nik') is-invalid @enderror" id="ktp_nik"
                        name="ktp_nik" value="{{ old('ktp_nik', $user->user_profile->ktp_nik) }}">
                </div>
                @error('ktp_nik')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
</main>
@endsection