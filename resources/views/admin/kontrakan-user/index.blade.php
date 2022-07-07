@extends('admin.layouts.main')

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

    <a href="{{ route('admin.kontrakan-user.create') }}" class="btn btn-primary mb-3"> Tambah Penyewaan Baru</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Penyewa</th>
                <th scope="col">Jenis Kontrakan</th>
                <th scope="col">Harga</th>
                {{-- <th scope="col">status</th> --}}
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kontrakan_user as $ku)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ku->user->name }}</td>
                <td>{{ $ku->kontrakan->jenis_kontrakan->nama }}</td>
                <td>{{ \App\Utilities\Helpers::formatCurrency($ku->harga, 'Rp.') }}</td>
                {{-- <td>{{ $kontrakan->kontrakan_detail->status }}</td> --}}
                <td>
                    <a href="#" class="badge bg-info"><i class="bi bi-info-circle"></i></a>
                    <form action="#" method="post" class="d-inline">
                        @csrf
                        @method('delete')

                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i
                                class="bi bi-trash2-fill"></i></button>
                    </form>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
@endsection