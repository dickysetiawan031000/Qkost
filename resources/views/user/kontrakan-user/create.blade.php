@extends('user.layouts.main')

@section('container')

<h4 class="mt-4"> Tambah Penyewaan</h4>


<form action="{{ route('user.kontrakan-user.store') }}" method="post" class="mt-4 col-lg-8">
    @csrf

    <h3>Pembayaran Kontrakan</h3>


    <button type="submit" class="btn btn-primary">Bayar</button>
</form>


@endsection