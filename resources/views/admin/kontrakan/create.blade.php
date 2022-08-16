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
            <h3>Kamar</h3>
            <p>Tambah Nomer Kamar</p>
        </header>
        <div class="information d-flex flex-column gap-3">
            <a href="{{ route('admin.kontrakan.index') }}" class="item-menu">
                <i class="fa-solid fa-arrow-left-long"></i>
                &nbsp; &nbsp;Back
            </a>
            <div class="row px-1 mb-2 gap-5">

                <form action="{{ route('admin.kontrakan.store') }}" method="post" class="col-lg-8">
                    @csrf
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis Kamar</label>
                        <select class="form-select" name="jenis_kontrakan_id">

                            @foreach ($jenisKontrakans as $jenis)
                            @if(old('jenis_kontrakan_id')== $jenis->id)

                            <option value="{{ $jenis->id }}" selected>{{ $jenis->nama }}</option>

                            @else
                            <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>

                            @endif

                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="nomor" class="form-label">Nomor Kamar</label>
                        <input type="text" class="form-control" id="nomor" placeholder="nomor kamar" name="nomor">
                    </div>



                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
</main>

@endsection