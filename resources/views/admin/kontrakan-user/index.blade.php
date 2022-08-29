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
        <header class="mb-4">
            <h3>Penyewaan</h3>
            <p>Data Penyewaan Kontrakan</p>
        </header>
        <div class="information d-flex flex-column gap-5">
            <div class="row px-1 mb-2 gap-5">
                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="table-responsive col-lg-10">

                    <a href="{{ route('admin.kontrakan-user.create') }}" class="btn btn-primary mb-3"> <i
                            class="fa-solid fa-circle-plus"></i>&nbsp;Add</a>
                    <table class="table table-striped table-sm" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Penyewa</th>
                                <th scope="col">Jenis Kontrakan</th>
                                <th scope="col">Kamar</th>
                                <th scope="col">Harga</th>
                                {{-- <th scope="col">status</th> --}}
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kontrakan_user as $ku)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ku->user->name }}</td>
                                <td>{{ $ku->kontrakan->jenis_kontrakan->nama ?? '-' }}</td>
                                <td>{{ $ku->kontrakan->kontrakan_detail->nomor ?? '-' }}</td>
                                <td>{{ \App\Utilities\Helpers::formatCurrency($ku->harga, 'Rp.') }}</td>
                                <td>
                                    <a href="{{ route('admin.kontrakan-user.show', $ku->id) }}" class="badge bg-info">
                                        <i class="fa-solid fa-info"></i>
                                    </a>
                                    <a href="{{ route('admin.kontrakan-user.edit', $ku->id) }}"
                                        class="badge bg-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="#" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')

                                        <button class="badge bg-danger border-0"
                                            onclick="return confirm('Are you sure?')"><i
                                                class="fa-solid fa-trash-can"></i></button>
                                    </form>
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