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
                <p>Hai, Welcome Back <b>{{ auth()->user()->name }} !</b></p>
                <img src="{{ \App\Models\User::has('user_profile')->whereId(Auth::id())->first() ? asset('avatar/' . auth()->user()->user_profile->avatar) : 'https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar-300x300.jpg' }}"
                    alt="Photo Profile" class="avatar" />
            </div>
        </div>
    </nav>
    <section class="p-3">
        <header>
            <h3>My Profile</h3>
            <p>Detail My Profile</p>
        </header>
        <div class="information d-flex flex-column gap-3">

            <div class="row px-1 col-lg-8">

                <table class="table table-striped">
                    <tbody>
                        <img class="mb-4"
                            src="{{ \App\Models\User::has('user_profile')->whereId(Auth::id())->first() ? asset('ktp-image/' . auth()->user()->user_profile->ktp_image) : 'https://glints.com/id/lowongan/wp-content/uploads/2021/10/watermark.png' }}"
                            alt="" style="width: 450px; height:250px">
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>{{ $user->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td>{{$user->user_profile->ktp_nik ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $user->email ?? '-' }}</td>
                        </tr>

                        <tr>
                            <td>Pekerjaan</td>
                            <td>{{ $user->user_profile->pekerjaan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td>{{$user->user_profile->no_telp ?? '-'}}</td>
                        </tr>
                        <tr>
                            <td>Dibuat pada</td>
                            <td>{{ '-' ?? $user->user_profile->created_at->diffForHumans() }}</td>
                        </tr>
                        <tr>
                            <td style="background-color:white">
                                {{-- <a href="{{ route('user.user-profile.edit',$user->user_profile->id) }}"
                                    class="badge bg-warning"><i class="fa-solid fa-pen-to-square"></i></a> --}}
                                <button class="btn btn-primary"> Ubah Password</button>
                            </td>
                            <td style="background-color:white"></td>
                        </tr>
                    </tbody>


                </table>
            </div>
        </div>
    </section>
</main>
@endsection