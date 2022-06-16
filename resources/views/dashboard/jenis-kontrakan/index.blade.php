@extends('dashboard.layouts.main')

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

<div class="table-responsive col-lg-10">

    <a href="/dashboard/jenis-kontrakan/create" class="btn btn-primary mb-3"> Create New Jenis</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Jenis Kontrakan</th>
                <th scope="col">Alamat</th>
                <th scope="col">Harga</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jenis as $jenis)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $jenis->nama }}</td>
                <td>{{ $jenis->alamat }}</td>
                <td>{{ $jenis->harga }}</td>
                <td>
                    <a href="{{ route('jenis-kontrakan.edit', $jenis->id) }}" class="badge bg-warning"><i
                            class="bi bi-pencil-square"></i></a>

                    <form action=" {{ route('jenis-kontrakan.destroy', $jenis->id) }} " method="post" class="d-inline">
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