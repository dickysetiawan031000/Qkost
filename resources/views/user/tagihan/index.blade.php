@extends('user.layouts.main')

@section('container')

@if(session()->has('success'))


<div class="alert alert-warning alert-dismissible fade show col-lg-10" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<h4 class="mt-3">Data Tagihan</h4>
<div class="table-responsive col-lg-10 mt-4">

    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Jatuh Tempo</th>
                <th scope="col">Payment Status</th>
                <th scope="col">Harga</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tagihans as $tagihan)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tagihan->jatuh_tempo }}</td>
                <td>{{ $tagihan->payment_status }}</td>
                <td>{{ $tagihan->kontrakan_user->harga }}</td>
                <td>{{ $tagihan->kontrakan_user->nama }}</td>
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