@extends('admin.layouts.main')

@section('container')

<h4 class="mt-4"> Tambah Penyewaan</h4>


<form action="{{ route('admin.kontrakan-user.store') }}" method="post" class="mt-4 col-lg-8">
    @csrf
    <div class="mb-3">
        <label for="user" class="form-label">Penyewa</label>
        <select class="form-select" name="user_id">

            @foreach ($users as $user)
            @if(old('user_id')== $user->id)

            <option value="{{ $user->id }}" selected>{{ $user->name }}</option>

            @else
            <option value="{{ $user->id }}">{{ $user->name }}</option>

            @endif

            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="jenis" class="form-label">Nomor Kamar</label>
        <select class="form-select" name="kontrakan_id">

            @foreach ($kontrakans as $kontrakan)
            <option value="{{ $kontrakan->kontrakan_id }}">{{ $kontrakan->nomor }} - {{
                $kontrakan->kontrakan->jenis_kontrakan->nama }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection