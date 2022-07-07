@extends('admin.layouts.main')

@section('container')

<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link text-dark border-0 active" id="jenis-kontrakan-tab" data-bs-toggle="tab"
            data-bs-target="#jenis-kontrakan" type="button" role="tab" aria-controls="jenis-kontrakan"
            aria-selected="true">Jenis Kontrakan</button>
        <button class="nav-link text-dark border-0" id="kontrakan-detail-tab" data-bs-toggle="tab"
            data-bs-target="#kontrakan-detail" type="button" role="tab" aria-controls="kontrakan-detail"
            aria-selected="false">Kontrakan Detail</button>
    </div>
</nav>

<div class="tab-content col-lg-6" id="nav-tabContent">
    <div class="tab-pane fade pt-3 show active" id="jenis-kontrakan" role="tabpanel"
        aria-labelledby="jenis-kontrakan-tab">
        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <table class="table">

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
            </div>
        </div>
    </div>



    <div class="tab-pane fade pt-3" id="kontrakan-detail" role="tabpanel" aria-labelledby="kontrakan-detail-tab">
        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <table class="table">

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
</div>
@endsection