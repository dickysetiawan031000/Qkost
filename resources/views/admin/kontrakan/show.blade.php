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
            <p>Detail Kamar Kost</p>
        </header>
        <div class="information d-flex flex-column gap-3">
            <a href="{{ route('admin.kontrakan.index') }}" class="item-menu">
                <i class="fa-solid fa-arrow-left-long"></i>
                &nbsp; &nbsp;Back
            </a>
            <div class="row px-1">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link border-3 active" id="jenis-kontrakan-tab" data-bs-toggle="tab"
                            data-bs-target="#jenis-kontrakan" type="button" role="tab" aria-controls="jenis-kontrakan"
                            aria-selected="true">Jenis Kontrakan</button>
                        <button class="nav-link text-dark border-3" id="kontrakan-detail-tab" data-bs-toggle="tab"
                            data-bs-target="#kontrakan-detail" type="button" role="tab" aria-controls="kontrakan-detail"
                            aria-selected="false">Kontrakan Detail</button>
                    </div>
                </nav>

                <div class="tab-content col-lg-6" id="nav-tabContent">
                    <div class="tab-pane fade pt-3 show active" id="jenis-kontrakan" role="tabpanel"
                        aria-labelledby="jenis-kontrakan-tab">
                        <div class="row mb-3">
                            <div class="col">
                                <table class="table table-striped">

                                    <tbody>

                                        <tr>
                                            <td>Jenis Kontrakan</td>
                                            <td>{{ $kontrakan->jenis_kontrakan->nama }}</td>

                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>{{ $kontrakan->jenis_kontrakan->alamat }}</td>

                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td class="d-flex">
                                                <p>Rp.</p>{{ $kontrakan->jenis_kontrakan->harga }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



                    <div class="tab-pane fade pt-3" id="kontrakan-detail" role="tabpanel"
                        aria-labelledby="kontrakan-detail-tab">
                        <div class="row mb-3">
                            <div class="col">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Nomor</td>
                                            <td>{{ $kontrakan->kontrakan_detail->nomor }}</td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>{{ $kontrakan->kontrakan_detail->status }}</td>
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