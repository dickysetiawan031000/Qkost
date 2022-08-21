@extends('front.layouts.main')

@section('container')
<div class="container mt-3">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show col-lg-6" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
        <div class="col-lg-6">
            <form action="{{ route('kontak-kami.store') }}" method="post" class="">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Lengkap">
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="form-label">Nomer Telepon</label>
                    <input type="text" class="form-control" name="no_telp" id="no_telp"
                        placeholder="Masukkan Nomer Telepon">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleFormControlInput1"
                        placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="subjek" class="form-label">Subjek</label>
                    <input type="text" class="form-control" name="subjek" id="subjek" placeholder="Masukkan Subjek">
                </div>
                <div class="mb-5">
                    <label for="desc" class="form-label">Desc</label>
                    <textarea class="form-control" name="desc" id="desc" rows="3"
                        placeholder="Masukkan Desc"></textarea>
                </div>
                <button class="btn text-white" style="background-color: #3844ac">Kirim</button>
            </form>
        </div>
        <div class="col-lg-6 mt-4">
            <div class="card">
                <div class="card-body text-white" style="background-color: #3844ac">
                    <h5 class="card-title mb-4">Contact Us</h5>
                    <p class="card-text"><i class="bi bi-telephone-fill"></i>&nbsp; 082139231750</p>
                    <p class="card-text"><i class="bi bi-envelope"></i>&nbsp; dickysetiawan031000@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
    @endsection