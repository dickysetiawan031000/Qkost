@extends('user.layouts.main')

@section('container')

@if(session()->has('success'))

<div class="alert alert-warning alert-dismissible fade show col-lg-6 mt-4" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container mb-5">
    <div class="col-lg-8">
        <h4>Profile</h4>
        <div class=" card col-lg-8">
            <img src="{{ asset('ktp-image/' . auth()->user()->user_profile->ktp_image) }}" class="card-img-top"
                alt="...">
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>NIK</td>
                            <td>{{ auth()->user()->user_profile->ktp_nik }}</td>

                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>{{ auth()->user()->name }}</td>

                        </tr>
                        <tr>
                            <td>No Telpon</td>
                            <td>{{ auth()->user()->user_profile->no_telp }}</td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>{{ auth()->user()->user_profile->pekerjaan }}</td>
                        </tr>
                        <tr>
                            <td>Dibuat Pada</td>
                            <td>{{ auth()->user()->user_profile->created_at->diffForHumans() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection