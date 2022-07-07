@extends('admin.layouts.main')

@section('container')

<h4 class="mt-4"> Tambah Kontrakan</h4>


<form action="{{ route('admin.kontrakan.store') }}" method="post" class="mt-4 col-lg-8">
    @csrf
    <div class="mb-3">
        <label for="jenis" class="form-label">Jenis Kamar</label>
        <select class="form-select" name="jenis_kontrakan_id">

            @foreach ($jenisKontrakans as $jenis)
            @if(old('jenis_kontrakan_id')== $jenis->id)

            <option value="{{ $jenis->id }}" selected>{{ $jenis->nama }}</option>

            @else
            <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>

            @endif

            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="nomor" class="form-label">Nomor Kamar</label>
        <input type="text" class="form-control" id="nomor" placeholder="nomor kamar" name="nomor">
    </div>



    <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection