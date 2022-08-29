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
            <h3>Detail</h3>
            <p>Detail Profile Penyewa</p>
        </header>
        <div class="information d-flex flex-column gap-3">
            <a href="{{ route('admin.user.index') }}" class="item-menu">
                <i class="fa-solid fa-arrow-left-long"></i>
                &nbsp; &nbsp;Back
            </a>
            <div class="row px-1">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link text-dark border-3 active" id="user-tab" data-bs-toggle="tab"
                            data-bs-target="#user" type="button" role="tab" aria-controls="user"
                            aria-selected="true">Penyewa</button>
                        <button class="nav-link text-dark border-3" id="kamar-tab" data-bs-toggle="tab"
                            data-bs-target="#kamar" type="button" role="tab" aria-controls="kamar"
                            aria-selected="false">Kamar</button>
                    </div>
                </nav>

                <div class="tab-content col-lg-6" id="nav-tabContent">
                    <div class="tab-pane fade pt-3 show active" id="user" role="tabpanel" aria-labelledby="user-tab">
                        <div class="row mb-3">
                            <div class="col">

                                <table class="table table-striped">
                                    {{-- <img
                                        src="{{ \App\Models\User::has('user_profile')->whereId(Auth::id())->first() ? asset('avatar/' . auth()->user()->user_profile->avatar) : 'https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar-300x300.jpg' }}"
                                        alt="Photo Profile" class="avatar" /> --}}
                                    <img class="mb-4"
                                        src="{{ \App\Models\User::has('user_profile')->whereId(Auth::id())->first() ? asset('ktp-image/' . $users->user_profile->ktp_image) : 'https://glints.com/id/lowongan/wp-content/uploads/2021/10/watermark.png' }}"
                                        alt="" style="width: 450px; height:250px">
                                    <tbody>
                                        <tr>
                                            <td>NIK</td>
                                            <td>{{ $users->user_profile->ktp_nik ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>{{ $users->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>No Telpon</td>
                                            <td>{{ $users->user_profile->no_telp ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Pekerjaan</td>
                                            <td>{{ $users->user_profile->pekerjaan ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{ $users->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Dibuat pada
                                            <td>{{ '-' ?? $users->created_at->diffForHumans() }} </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>



                    <div class="tab-pane fade pt-3" id="kamar" role="tabpanel" aria-labelledby="kamar-tab">
                        <div class="row mb-3">
                            <div class="col">

                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Jenis Kontrakan</td>
                                            <td>{{ $users->kontrakan_user->kontrakan->jenis_kontrakan->nama ?? 'Belum
                                                melakukan Penyewaan' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>{{ $users->kontrakan_user->kontrakan->jenis_kontrakan->alamat ?? 'Belum
                                                melakukan Penyewaan' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td>{{
                                                \App\Utilities\Helpers::formatCurrency($users->kontrakan_user->harga ??
                                                0,
                                                'Rp.') }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection