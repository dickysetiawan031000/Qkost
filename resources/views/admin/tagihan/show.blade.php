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
            <p>Detail Tagihan</p>
        </header>
        <div class="information d-flex flex-column gap-3">
            <a href="{{ route('admin.tagihan.index') }}" class="item-menu">
                <i class="fa-solid fa-arrow-left-long"></i>
                &nbsp; &nbsp;Back
            </a>
            <div class="row px-1">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link border-3 active" id="kontrakan-user-tab" data-bs-toggle="tab"
                            data-bs-target="#kontrakan-user" type="button" role="tab" aria-controls="kontrakan-user"
                            aria-selected="true">Penyewaan</button>
                        <button class="nav-link text-dark border-3" id="tagihan-tab" data-bs-toggle="tab"
                            data-bs-target="#tagihan" type="button" role="tab" aria-controls="tagihan"
                            aria-selected="false">Tagihan</button>
                    </div>
                </nav>

                <div class="tab-content col-lg-6" id="nav-tabContent">
                    <div class="tab-pane fade pt-3 show active" id="kontrakan-user" role="tabpanel"
                        aria-labelledby="kontrakan-user-tab">
                        <div class="row mb-3">
                            <div class="col">
                                <table class="table table-striped">

                                    <tbody>

                                        <tr>
                                            <td>Kamar</td>
                                            <td>{{ $tagihan->kontrakan_user->kontrakan->jenis_kontrakan->nama ?? '-' }}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>No Kamar</td>
                                            <td>{{ $tagihan->kontrakan_user->kontrakan->kontrakan_detail->nomor ?? '-'
                                                }}</td>

                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>{{ $tagihan->kontrakan_user->kontrakan->jenis_kontrakan->alamat ?? '-'
                                                }}</td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



                    <div class="tab-pane fade pt-3" id="tagihan" role="tabpanel" aria-labelledby="tagihan-tab">
                        <div class="row mb-3">
                            <div class="col">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Tagihan Ke</td>
                                            <td>{{ $tagihan->pembayaran_ke }}</td>

                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td>{{
                                                \App\Utilities\Helpers::formatCurrency( 0 ??
                                                $tagihan->kontrakan_user->harga,
                                                'Rp.') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jatuh Tempo</td>
                                            <td>{{ $tagihan->jatuh_tempo ?? '-' }}</td>

                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>{{ $tagihan->transaksi->transaction_status ?? 'belum dibayar' }}</td>
                                            {{-- @if($tagihan->transaksi->transaction_status == 'settlement')
                                            <td><span class="badge bg-success">{{$tagihan->transaksi->transaction_status
                                                    }}</span>
                                            </td>
                                            @elseif($tagihan->transaksi->transaction_status == 'pending')
                                            <td><span class="badge bg-danger">{{$tagihan->transaksi->transaction_status
                                                    }}</span>
                                            </td>
                                            @else
                                            <td><span class="badge bg-warning">{{$tagihan->transaksi->transaction_status
                                                    }}</span>
                                            </td>
                                            @endif --}}


                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection