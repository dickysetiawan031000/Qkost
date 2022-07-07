@extends('admin.layouts.main')

@section('container')

@if(session()->has('success'))

<div class="alert alert-warning alert-dismissible fade show col-lg-6 mt-4" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


<div class="container">
    <div class="row">
        <div class="card col-lg-4" style="width: 25%">
            <div class="card-body">
                <h5 class="card-title">Total User</h5>
                <h3 class="card-text"> {{ $userCount }}</h3>
                <p class="text-end"><a href="{{ route('admin.user.index') }}" class=""><i
                            class="bi bi-arrow-right"></i></a>
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card col-lg-4" style="width: 25%">
            <div class="card-body">
                <h5 class="card-title">Jenis Kontrakan</h5>
                <h3 class="card-text"> {{ $jenisCount }}</h3>
                <p class="text-end"><a href="{{ route('admin.jenis-kontrakan.index') }}" class=""><i
                            class="bi bi-arrow-right"></i></a>
                </p>
            </div>
        </div>
    </div>
</div>
</div>

@endsection