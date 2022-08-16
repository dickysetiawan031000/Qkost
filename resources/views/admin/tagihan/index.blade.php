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
        <header class="mb-4">
            <h3>Tagihan</h3>
            <p>Data Tagihan Penyewaan Kontrakan</p>
        </header>
        <div class="information d-flex flex-column gap-5">
            <div class="row px-1 mb-2 gap-5">
                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="table-responsive col-lg-10">

                    <a href="{{ route('admin.tagihan.create') }}" class="btn btn-primary mb-3"> <i
                            class="fa-solid fa-circle-plus"></i>&nbsp;Add</a>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Penyewa</th>
                                <th scope="col">Kamar</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Tagihan Ke</th>
                                <th scope="col">Status</th>
                                <th scope="col">Jatuh Tempo</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tagihans as $tagihan)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tagihan->kontrakan_user->user->name }}</td>
                                <td>{{ $tagihan->kontrakan_user->kontrakan->kontrakan_detail->nomor }}</td>
                                <td>{{ \App\Utilities\Helpers::formatCurrency($tagihan->kontrakan_user->harga, 'Rp.') }}
                                <td class="text-center">{{ $tagihan->pembayaran_ke }}</td>
                                <td>{{ $tagihan->transaksi->transaction_status ?? 'belum dibayar' }} </td>
                                <td>{{ $tagihan->jatuh_tempo }}</td>
                                </td>
                                <td>
                                    <a href="#" class="badge bg-info">
                                        <i class="fa-solid fa-info"></i>
                                    </a>
                                    <form action="#" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')

                                        <button class="badge bg-danger border-0"
                                            onclick="return confirm('Are you sure?')"><i
                                                class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection