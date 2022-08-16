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
            <h3>Penyewaan</h3>
            <p>Tambah Data Penyewaan</p>
        </header>
        <div class="information d-flex flex-column gap-3">
            <a href="{{ route('admin.kontrakan-user.index') }}" class="item-menu">
                <i class="fa-solid fa-arrow-left-long"></i>
                &nbsp; &nbsp;Back
            </a>
            <div class="row px-1 mb-2 gap-5">

                <form action="{{ route('admin.kontrakan-user.store') }}" method="post" class="col-lg-8">
                    @csrf
                    <div class="mb-3">
                        <label for="user" class="form-label">Penyewa</label>
                        <select class="form-select" name="user_id">

                            @foreach ($users as $user)
                            @if(old('user_id')== $user->id)

                            <option value="{{ $user->id }}" selected>{{ $user->name }}</option>

                            @else
                            <option value="{{ $user->id }}">{{ $user->name }}</option>

                            @endif

                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Nomor Kamar</label>
                        <select class="form-select" name="kontrakan_id">

                            @foreach ($kontrakans as $kontrakan)
                            <option value="{{ $kontrakan->kontrakan_id }}">{{ $kontrakan->nomor }} - {{
                                $kontrakan->kontrakan->jenis_kontrakan->nama }} - {{
                                $kontrakan->kontrakan->jenis_kontrakan->harga
                                }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="pembayaran_ke" class="form-label">Tagihan Ke</label>
                        <input type="text" class="form-control" name="pembayaran_ke" id="pembayaran_ke">
                    </div>
                    <div class="mb-3">
                        <label for="jatuh_tempo" class="form-label">Tanggal Tagihan</label>
                        <input type="date" class="form-control" name="jatuh_tempo" id="jatuh_tempo">
                    </div> --}}

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
</main>

@endsection