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

                <form action="{{ route('user.user-profile.update' , $userProfile->id) }}" method="post"
                    class="col-lg-6 " enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="hidden" name="oldImageKtp" value="{{ $userProfile->ktp_image }}">
                    <input type="hidden" name="oldImageAvatar" value="{{ $userProfile->avatar }}">
                    <div class="mb-3">
                        <label for="ktp_image" class="form-label">Foto KTP</label>

                        @if($userProfile->ktp_image)
                        <img src="{{ asset('ktp-image/' . $userProfile->ktp_image) }}"
                            class="img-preview img-fluid mb-3 col-sm-8 d-block" id="ktpPreview" alt="">
                        @else
                        <img src="" class="img-preview img-fluid mb-3 col-sm-8" id="ktpPreview" alt="">
                        @endif
                        <input type="file" class="form-control" id="ktp_image" name="ktp_image"
                            onchange="previewImage1()">
                    </div>
                    @error('ktp_image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="mb-3">
                        <label for="ktp_nik" class="form-label">NIK</label>
                        <input type="text" class="form-control @error('ktp_nik') is-invalid @enderror" id="ktp_nik"
                            placeholder="Nomor Induk Kependudukan" name="ktp_nik"
                            value="{{ old('ktp_nik', $userProfile->ktp_nik) }}">
                    </div>
                    @error('ktp_nik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            placeholder="Nama Lengkap" name="name" value="{{ old('name', $userProfile->user->name) }}">
                    </div>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                            placeholder="Email" name="email" value="{{ old('email', $userProfile->user->email) }}">
                    </div>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror" id="password"
                            placeholder="password" name="password"
                            value="{{ old('password', $userProfile->user->password) }}">
                    </div>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="mb-3">
                        <label for="no_telp" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp"
                            placeholder="Nomor Telepon" name="no_telp"
                            value="{{ old('no_telp', $userProfile->no_telp) }}">
                    </div>
                    @error('no_telp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan"
                            placeholder="Pekerjaan" name="pekerjaan"
                            value="{{ old('pekerjaan', $userProfile->pekerjaan) }}">
                    </div>
                    @error('pekerjaan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="mb-3">
                        <label for="avatar" class="form-label">Avatar</label>

                        @if($userProfile->avatar)
                        <img src="{{ asset('avatar/' . $userProfile->avatar) }}"
                            class="img-preview img-fluid mb-3 col-sm-6 d-block" id="avatarPreview" alt="">
                        @else
                        <img src="" class="img-preview img-fluid mb-3 col-sm-6" id="avatarPreview" alt="">
                        @endif
                        <input type="file" class="form-control" id="avatar" name="avatar" onchange="previewImage2()">
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

{{-- <script>
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
</script> --}}

<script>
    function previewImage1(){        
        const ktpImage = document.querySelector('#ktp_image');
        const ktpImagePreview = document.querySelector('#ktpPreview');

        ktpImagePreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(ktpImage.files[0]);

        oFReader.onload = function(oFREvent){
            ktpImagePreview.src = oFREvent.target.result;
        }
    }

    function previewImage2(){
        const avatar = document.querySelector('#avatar');
        const avatarPreview = document.querySelector('#avatarPreview');
        
        avatarPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(avatar.files[0]);
        
        oFReader.onload = function(oFREvent){
        avatarPreview.src = oFREvent.target.result;
        }
    }

</script>
@endsection