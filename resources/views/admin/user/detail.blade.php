@extends('admin.layouts.main')

@section('container')

<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link text-dark border-0 active" id="user-tab" data-bs-toggle="tab" data-bs-target="#user"
            type="button" role="tab" aria-controls="user" aria-selected="true">Penyewa</button>
        <button class="nav-link text-dark border-0" id="kamar-tab" data-bs-toggle="tab" data-bs-target="#kamar"
            type="button" role="tab" aria-controls="kamar" aria-selected="false">Kamar</button>
    </div>
</nav>

<div class="tab-content col-lg-6" id="nav-tabContent">
    <div class="tab-pane fade pt-3 show active" id="user" role="tabpanel" aria-labelledby="user-tab">
        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <table class="table">
                                <img src="{{ asset('ktp-image/' . $users->user_profile->ktp_image) }}" alt=""
                                    style="width: 450px; height:250px">
                                <tbody>

                                    <tr>
                                        <td>NIK</td>
                                        <td>{{ $users->user_profile->ktp_nik }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>{{ $users->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>No Telpon</td>
                                        <td>{{ $users->user_profile->no_telp }}</td>
                                    </tr>
                                    <tr>
                                        <td>Pekerjaan</td>
                                        <td>{{ $users->user_profile->pekerjaan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $users->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Dibuat pada
                                        <td>{{ $users->created_at->diffForHumans() }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="tab-pane fade pt-3" id="kamar" role="tabpanel" aria-labelledby="kamar-tab">
        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <table class="table">

                                <tbody>
                                    <tr>
                                        <td>Jenis Kontrakan</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>

                                    </tr>
                                    <tr>
                                        <td>Harga</td>
                                        <td class="d-flex">
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