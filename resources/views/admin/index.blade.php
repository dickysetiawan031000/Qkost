@extends('layouts.main')

@section('container')

<!-- Main Content -->
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
            <h3>Overview</h3>
            <p>Manage data for growth</p>
        </header>
        <div class="information d-flex flex-column gap-5">
            <div class="row px-1 mb-2 gap-5">
                <div class="col-xl-4 col-12 card debit">
                    <p>Pemasukan</p>
                    <h2>{{ \App\Utilities\Helpers::formatCurrency($total, 'Rp.') }}</h2>
                    <div></div>
                </div>
                <div class="col-xl-4 col-12 card balance">
                    <p>Penyewa</p>
                    <h2>{{ $userCount }}</h2>
                    <div>
                        <a href="{{ route('admin.user.index') }}"> <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="col-xl-4 col-12 card balance">
                    <p>Jenis</p>
                    <h2>{{ $jenisCount }}</h2>
                    <div>
                        <a href="{{ route('admin.jenis-kontrakan.index') }}"> <i
                                class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="col-xl-4 col-12 card balance">
                    <p>Kamar</p>
                    <h2>{{ $kamar }}</h2>
                    <div>
                        <a href="{{ route('admin.kontrakan.index') }}"> <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-4 col-12 card balance">
                    <p>Penyewaan</p>
                    <h2>{{ $ku }}</h2>
                    <div>
                        <a href="{{ route('admin.kontrakan-user.index') }}"> <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-4 col-12 card balance">
                    <p>Tagihan</p>
                    <h2>{{ $tagihan }}</h2>
                    <div>
                        <a href="{{ route('admin.tagihan.index') }}"> <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-4 col-12 card balance">
                    <p>Kontak Kami</p>
                    <h2>{{ $kk }}</h2>
                    <div>
                        <a href="{{ route('admin.kontak-kami.index') }}"> <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection