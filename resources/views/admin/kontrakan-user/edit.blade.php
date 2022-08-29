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
            <p>Edit Penyewaan</p>
        </header>
        <div class="information d-flex flex-column gap-3">
            <a href="{{ route('admin.kontrakan-user.index') }}" class="item-menu">
                <i class="fa-solid fa-arrow-left-long"></i>
                &nbsp; &nbsp;Back
            </a>
            <form action="{{ route('admin.kontrakan-user.update', $kontrakanUser->id) }}" method="post"
                class="col-lg-8">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="jenis" class="form-label">Penyewa</label>
                    <select class="form-select" name="user_id">
                        @foreach ($users as $user)
                        <option {{ old('user_id', $kontrakanUser->user_id) == $user->id ? "selected" : ""
                            }} value="{{ $user->id }}">{{ $user->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="jenis" class="form-label">Nomor Kamar</label>
                    <select class="form-select" name="kontrakan_id">
                        @foreach ($kontrakans as $kontrakan)
                        <option {{ old('kontrakan_id', $kontrakanUser->kontrakan_id) == $kontrakan->id ? "selected" : ""
                            }} value="{{ $kontrakan->id }}">{{ $kontrakan->nomor }} - {{ $kontrakan->status }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
</main>
@endsection