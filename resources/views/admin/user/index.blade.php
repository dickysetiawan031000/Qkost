@extends('admin.layouts.main')

@section('container')

@if(session()->has('success'))

<div class="alert alert-warning alert-dismissible fade show col-lg-10" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="table-responsive col-lg-10">

    {{-- <a href="{{ route('admin.jenis-kontrakan.create') }}" class="btn btn-primary mb-3"> Create New User</a> --}}
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">NIK</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->user_profile->ktp_nik }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('admin.user.edit', $user->id) }}" class="badge bg-warning"><i
                            class="bi bi-pencil-square"></i></a>
                    <a href="{{ route('admin.user.show', $user->id) }}" class="badge bg-info"><i
                            class="bi bi-info-circle"></i></a>

                    {{-- <form action=" {{ route('admin.jenis-kontrakan.destroy', $jenis->id) }} " method="post"
                        class="d-inline">
                        @csrf
                        @method('delete')

                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i
                                class="bi bi-trash2-fill"></i></button>
                    </form> --}}

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection