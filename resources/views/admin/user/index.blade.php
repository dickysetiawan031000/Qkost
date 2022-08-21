@extends('layouts.main')

@section('container')

@if(session()->has('success'))

<div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- Main Content -->
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
        <header class="mb-4">
            <h3>Penyewa</h3>
            <p>Data Penyewa</p>
        </header>
        <div class="information d-flex flex-column gap-5">
            <div class="row px-1 mb-2 gap-5">
                @if(session()->has('accept'))
                <div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert">
                    <strong>{{ session('accept') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if(session()->has('allreadyactive'))
                <div class="alert alert-warning alert-dismissible fade show col-lg-10" role="alert">
                    <strong>{{ session('allreadyactive') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if(session()->has('allreadyreject'))
                <div class="alert alert-warning alert-dismissible fade show col-lg-10" role="alert">
                    <strong>{{ session('allreadyreject') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if(session()->has('reject'))
                <div class="alert alert-danger alert-dismissible fade show col-lg-10" role="alert">
                    <strong>{{ session('reject') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="table-responsive col-lg-10">

                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                @if($user->status == 'aktif')
                                <td><span class="badge bg-success">{{ $user->status }}</span></td>
                                @elseif($user->status == 'tidak aktif')
                                <td><span class="badge bg-danger">{{ $user->status }}</span></td>
                                @else
                                <td><span class="badge bg-warning">{{ $user->status }}</span></td>
                                @endif
                                <td>
                                    <a href="{{ url('admin/user/accepted', $user->id) }}"
                                        class="badge bg-success text-white" onclick="return confirm('Are you sure?')"><i
                                            class="fa-solid fa-check"></i></a>

                                    <a href="{{ url('admin/user/rejected', $user->id) }}"
                                        class="badge bg-danger text-white" onclick="return confirm('Are you sure?')"><i
                                            class="fa-solid fa-x"></i></a>
                                    <a href="{{ route('admin.user.show', $user->id) }}" class="badge bg-info">
                                        <i class="fa-solid fa-info"></i>
                                    </a>
                                    <a href="{{ route('admin.user.edit', $user->id) }}" class="badge bg-warning"><i
                                            class="fa-solid fa-pen-to-square"></i></a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection