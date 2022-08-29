@extends('layouts.main')

@section('container')

<main class="content">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div>
                <button class="sidebarCollapseDefault btn p-0 border-0 d-none d-md-block" aria-label="Hamburger Button">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <button data-bs-toggle="offcanvas" data-bs-target=".sidebar" aria-controls="sidebar"
                    aria-label="Hamburger Button" class="sidebarCollapseMobile btn p-0 border-0 d-block d-md-none">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
            <div class="d-flex align-items-center justify-content-end gap-4">
                <img src="/image/admin.png" alt="Photo Profile" class="avatar" />
            </div>
        </div>
    </nav>
    <section class="p-3">
        <header>
            <h3>Edit</h3>
            <p>Edit Kontrakan</p>
        </header>
        <div class="information d-flex flex-column gap-3">
            <a href="{{ route('admin.kontrakan.index') }}" class="item-menu">
                <i class="fa-solid fa-arrow-left-long"></i>
                &nbsp; &nbsp;Back
            </a>
            <form action="{{ route('admin.kontrakan.update', $kontrakan->id) }}" method="post" class="col-lg-8">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="jenis" class="form-label">Jenis Kamar {{ $kontrakan->jenis_kontrakan_id }}</label>
                    <select class="form-select" name="jenis_kontrakan_id">
                        {{-- <option value="">Pilih Kontrakan</option> --}}
                        @foreach ($jenis_kontrakan as $k)
                        <option {{ old('jenis_kontrakan_id', $kontrakan->jenis_kontrakan_id) == $k->id ? "selected" : ""
                            }} value="{{ $k->id }}">{{ $k->nama }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nomor" class="form-label">Nomor Kamar</label>
                    <input type="text" class="form-control" id="nomor" placeholder="nomor kamar" name="nomor"
                        value="{{ old('nomor', $kontrakan->kontrakan_detail->nomor) }}">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
</main>
@endsection