@extends('user.layouts.main')

@section('container')

@if(session()->has('success'))

<div class="alert alert-warning alert-dismissible fade show col-lg-6 mt-4" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<h1>Ini Halaman Index</h1>
@endsection