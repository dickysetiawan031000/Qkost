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
                        <label for="ktp_nik" class="form-label">Password Lama</label>
                        <input type="text" class="form-control @error('ktp_nik') is-invalid @enderror" id="ktp_nik"
                            placeholder="Nomor Induk Kependudukan" name="ktp_nik" value="{{ old('ktp_nik') }}">
                    </div>
                    @error('ktp_nik')
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


                    <button type="submit" class="btn btn-outline-success mt-4 col-lg-4">Kirim</button>
                </form>

            </div>
        </div>
    </section>
</main>

<script>
    // function previewImage(){
    //     const ktpImage = document.querySelector('#ktp_image');
    //     const ktpImagePreview = document.querySelector('.img-preview');
        
    //     ktpImagePreview.style.display = 'block';

    //     const oFReader = new FileReader();
    //     oFReader.readAsDataURL(ktpImage.files[0]);

    //     oFReader.onload = function(oFREvent){
    //         ktpImagePreview.src = oFREvent.target.result;
    //     }
    // }

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