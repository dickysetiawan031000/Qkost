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
                <p>Hai, Welcome <b>{{ auth()->user()->name }} !</b></p>
                <img src="{{ \App\Models\User::has('user_profile')->whereId(Auth::id())->first() ? asset('avatar/' . auth()->user()->user_profile->avatar) : 'https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar-300x300.jpg' }}"
                    alt="Photo Profile" class="avatar" />
            </div>
        </div>
    </nav>
    <section class="p-3">
        <header>
            <h3>Hai, {{ auth()->user()->name }} !</h3>
            <p>Mohon lengkapi data diri berikut ini</p>
        </header>
        <div class="information d-flex flex-column gap-5">
            <div class="row px-1 mb-2 gap-5">

                <form action="{{ route('user.user-profile.store') }}" method="post" class="col-lg-6 "
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="ktp_image" class="form-label">KTP Image</label>
                        <img src="img-fluid" alt="" id="ktp_image" style="width: 100%">
                        <input class="form-control mt-4 @error('ktp_image') is-invalid @enderror" type="file"
                            id="ktp_image" name="ktp_image" accept="imagektp/*" onchange="loadFile2(event)">
                    </div>
                    @error('ktp_image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="mb-3">
                        <label for="ktp_nik" class="form-label">NIK</label>
                        <input type="text" class="form-control @error('ktp_nik') is-invalid @enderror" id="ktp_nik"
                            placeholder="Nomor Induk Kependudukan" name="ktp_nik" value="{{ old('ktp_nik') }}">
                    </div>
                    @error('ktp_nik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="mb-3">
                        <label for="no_telp" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp"
                            placeholder="Nomor Telepon" name="no_telp" value="{{ old('no_telp') }}">
                    </div>
                    @error('no_telp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan"
                            placeholder="Pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}">
                    </div>
                    @error('pekerjaan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="mb-3">
                        <label for="avatar" class="form-label">Avatar</label>
                        <img src="img-fluid" alt="" id="avatar" style="width: 160px">
                        <input class="form-control mt-4 @error('avatar') is-invalid @enderror" type="file" id="avatar"
                            name="avatar" accept="image/*" onchange="loadFile(event)">
                    </div>
                    @error('avatar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                    <button type="submit" class="btn btn-outline-success mt-4 col-lg-4">Kirim</button>
                </form>

            </div>
        </div>
    </section>
</main>

<script>
    var loadFile = function(event) {
        var output = document.getElementById('avatar');

        output.style.display = 'block';

        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
        }
    };

    var loadFile2 = function(event) {
    var output = document.getElementById('ktp_image');
    
    output.style.display = 'block';
    
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
    URL.revokeObjectURL(output.src) // free memory
    }
    };
</script>
@endsection