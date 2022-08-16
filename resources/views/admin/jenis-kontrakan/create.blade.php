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
            <h3>Tambah</h3>
            <p>Tambah Jenis Kontrakan</p>
        </header>
        <div class="information d-flex flex-column">
            <div class="row px-1 gap-3">
                <a href="{{ route('admin.jenis-kontrakan.index') }}" class="item-menu">
                    <i class="fa-solid fa-arrow-left-long"></i>
                    &nbsp; &nbsp;Back
                </a>
                <form action="{{ route('admin.jenis-kontrakan.store') }}" method="post" class="col-lg-8">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Jenis Kontrakan</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="name"
                            name="nama">
                    </div>
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                            name="alamat">
                    </div>

                    @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                            name="harga">
                    </div>
                    @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
</main>

@endsection