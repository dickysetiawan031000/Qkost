@extends('front.layouts.main')

@section('container')

<h3 class="text-center mt-4">Form Registrasi</h3>
<div class="container col-lg-4 mt-4">
    <form action="{{ route('registrasi.store') }}" method="post">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="name" placeholder="Nama Lengkap" name="name">
            <label for="name">Nama Lengkap</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password</label>
        </div>

        <center><button type="submit" class="btn btn-outline-success mt-4 col-lg-4">Register</button></center>
    </form>
</div>
@endsection