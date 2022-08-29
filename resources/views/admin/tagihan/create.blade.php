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
            <h3>Tagihan</h3>
            <p>Tambah Data Tagihan Penyewaan</p>
        </header>
        <div class="information d-flex flex-column gap-3">
            <a href="{{ route('admin.tagihan.index') }}" class="item-menu">
                <i class="fa-solid fa-arrow-left-long"></i>
                &nbsp; &nbsp;Back
            </a>
            <div class="row px-1 mb-2 gap-5">

                <form action="{{ route('admin.tagihan.store') }}" method="post" class="mt-4 col-lg-6">
                    @csrf

                    <div class="mb-3">
                        <label for="user" class="form-label">Kamar</label>
                        <select class="form-select" name="kontrakan_user_id">

                            @foreach ($kontrakan_users as $ku)
                            @if(old('kontrakan_user_id')== $ku->id)

                            <option value="{{ $ku->id }}" selected>{{ $ku->kontrakan->id }}</option>

                            @else
                            <option value="{{ $ku->id }}">{{ $ku->user->name }} - {{
                                $ku->kontrakan->jenis_kontrakan->nama }} -
                                Harga : {{ $ku->harga }}</option>

                            @endif

                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="pembayaran_ke" class="form-label">Tagihan Ke</label>
                        <input type="text" class="form-control" name="pembayaran_ke" id="pembayaran_ke">
                    </div>
                    <div class="mb-3">
                        <label for="user" class="form-label">Tanggal Jatuh Tempo</label>
                        <input class="form-control" type="date" name="jatuh_tempo">
                    </div>

                    {{-- <input type="hidden" name="harga"> --}}
                    {{-- <div class="mb-3">
                        <label for="jenis" class="form-label">Nomor Kamar</label>
                        <select class="form-select" name="kontrakan_id">

                            @foreach ($kontrakans as $kontrakan)
                            <option value="{{ $kontrakan->kontrakan_id }}">{{ $kontrakan->nomor }} - {{
                                $kontrakan->kontrakan->jenis_kontrakan->nama }}</option>
                            @endforeach
                        </select>
                    </div> --}}

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
</main>

@endsection