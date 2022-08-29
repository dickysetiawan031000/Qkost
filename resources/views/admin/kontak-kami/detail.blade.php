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
            <h3>Detail</h3>
            <p>Detail Kontak Kami</p>
        </header>
        <div class="information d-flex flex-column gap-3">
            <a href="{{ route('admin.kontak-kami.index') }}" class="item-menu">
                <i class="fa-solid fa-arrow-left-long"></i>
                &nbsp; &nbsp;Back
            </a>
            <div class="row px-1 col-lg-8">

                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td>{{ $kontakkamis->nama }}</td>
                        </tr>
                        <tr>
                            <td>No Telepon</td>
                            <td>{{ $kontakkamis->no_telp }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $kontakkamis->email }}</td>
                        </tr>
                        <tr>
                            <td>Subjek</td>
                            <td>{{ $kontakkamis->subjek }}</td>
                        </tr>
                        <tr>
                            <td>Desc</td>
                            <td>{{ $kontakkamis->desc }}</td>
                        </tr>
                        <tr>
                            <td>Dibuat pada</td>
                            <td>{{ $kontakkamis->created_at->diffForHumans() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
@endsection