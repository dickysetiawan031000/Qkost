@extends('admin.layouts.main')

@section('container')

<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link text-dark border-0 active" id="penyewa-tab" data-bs-toggle="tab"
            data-bs-target="#penyewa" type="button" role="tab" aria-controls="penyewa"
            aria-selected="true">Penyewa</button>
        <button class="nav-link text-dark border-0" id="jenis-tab" data-bs-toggle="tab" data-bs-target="#jenis"
            type="button" role="tab" aria-controls="jenis" aria-selected="false">Jenis Kontrakan</button>
    </div>
</nav>

<div class="tab-content col-lg-6" id="nav-tabContent">
    <div class="tab-pane fade pt-3 show active" id="penyewa" role="tabpanel" aria-labelledby="penyewa-tab">
        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <table class="table">

                                <tbody>
                                    <tr>
                                        <td>NIK</td>
                                        <td>{{ $kontrakan->user->ktp_nik }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>{{ $kontrakan->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>No Telpon</td>
                                        <td>{{ $kontrakan->user->ktp_nik }}</td>
                                    </tr>
                                    <tr>
                                        <td>Pekerjaan</td>
                                        <td>{{ $kontrakan->user->ktp_nik }}</td>

                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $kontrakan->user->email }}</td>

                                    </tr>
                                    <tr>
                                        <td>Dibuat pada
                                        <td>{{ $kontrakan->user->created_at->diffForHumans() }}</td>

                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>Thornton</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="tab-pane fade pt-3" id="jenis" role="tabpanel" aria-labelledby="jenis-tab">
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
</div>
@endsection