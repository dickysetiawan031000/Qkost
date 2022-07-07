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

<h4 class="mt-3">Data Kontrakan Detail</h4>
<div class="table-responsive col-lg-10 mt-4">

    {{-- <a href="{{ route('admin.kontrakan.create') }}" class="btn btn-primary mb-3"> Create New Kontrakan</a> --}}
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kontrakan ID</th>
                <th scope="col">Nomor</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kontrakanDetails as $kd)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $kd->kontrakan_id }}</td>
                <td>{{ $kd->nomor }}</td>
                <td>{{ $kd->status }}</td>
                {{-- <td>{{ $kontrakan->kontrakan_detail->status }}</td> --}}
                {{-- <td>
                    <a href="{{ route('admin.kontrakan.show', $kontrakan->id) }}" class="badge bg-info"><i
                            class="bi bi-info-circle"></i></a>
                    <form action=" {{ route('admin.kontrakan.destroy', $kontrakan->id) }} " method="post"
                        class="d-inline">
                        @csrf
                        @method('delete')

                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i
                                class="bi bi-trash2-fill"></i></button>
                    </form>
                </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection