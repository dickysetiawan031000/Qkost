@extends('user.layouts.main')

@section('container')

@if(session()->has('success'))
{{-- <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
</div> --}}

<div class="alert alert-warning alert-dismissible fade show col-lg-10" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<h4 class="mt-3">Data Penyewaan</h4>
<div class="table-responsive col-lg-10 mt-4">

    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Penyewa</th>
                <th scope="col">Jenis Kontrakan</th>
                <th scope="col">Harga</th>
                <th scope="col">Jatuh Tempo</th>
                <th scope="col">Payment Status</th>
                {{-- <th scope="col">status</th> --}}
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kontrakanUser as $ku)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ku->user->name }}</td>
                <td>{{ $ku->kontrakan->jenis_kontrakan->nama }}</td>
                <td>{{ \App\Utilities\Helpers::formatCurrency($ku->harga, 'Rp.') }}</td>
                <td>{{ $ku->jatuh_tempo }}</td>
                <td>{{ $ku->payment_status }}</td>
                <td>
                    <a href="{{ url('user/kontrakan-user/getSnapRedirect', $kontrakanUser->id) }} }}"
                        class="btn btn-sm btn-success">
                        Bayar</a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
@endsection