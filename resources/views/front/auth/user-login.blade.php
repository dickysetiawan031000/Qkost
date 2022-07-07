@extends('front.layouts.main')

@section('container')



<div class="container col-lg-4 mt-4">

    @if(session()->has('success'))

    <div class="alert alert-warning alert-dismissible fade show col-lg-12 mt-4" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <h3 class="text-center mt-4">Form Login</h3>

    <form action="/login" method="post">
        @csrf
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password</label>
        </div>

        <center><button type="submit" class="btn btn-outline-success mt-4 col-lg-4">Login</button></center>
    </form>
</div>
@endsection