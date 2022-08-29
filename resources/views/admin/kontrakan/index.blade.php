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
            <h3>Kamar</h3>
            <p>Data Kamar Kost</p>
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

                    <a href="{{ route('admin.kontrakan.create') }}" class="btn btn-primary mb-3"> <i
                            class="fa-solid fa-circle-plus"></i>&nbsp;Add</a>
                    <table class="table table-striped table-sm text-center" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nomor Kontrakan</th>
                                <th scope="col">Jenis Kontrakan</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kontrakans as $kontrakan)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kontrakan->kontrakan_detail->nomor ?? '' }}</td>
                                <td>{{ $kontrakan->jenis_kontrakan->nama ?? '' }}</td>
                                <td>{{ $kontrakan->jenis_kontrakan->harga ?? '' }}</td>

                                @if( $kontrakan->kontrakan_detail->status == 'kosong')
                                <td><span class="badge bg-success">{{ $kontrakan->kontrakan_detail->status }}</span>
                                </td>
                                @elseif($kontrakan->kontrakan_detail->status == 'isi')
                                <td><span class="badge bg-danger">{{ $kontrakan->kontrakan_detail->status }}</span></td>
                                @else
                                <td><span class="badge bg-warning">{{ $kontrakan->kontrakan_detail->status }}</span>
                                </td>
                                @endif
                                {{-- <td>{{ $kontrakan->kontrakan_detail->status }}</td> --}}
                                <td>
                                    <a href="{{ route('admin.kontrakan.edit', $kontrakan->id) }}"
                                        class="badge bg-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{ route('admin.kontrakan.show', $kontrakan->id) }}"
                                        class="badge bg-info"><i class="fa-solid fa-info"></i></a>

                                    <a href="#" class="badge bg-danger border-0 delete" id="delete"
                                        data-id="{{ $kontrakan->id }}"
                                        data-nama="{{ $kontrakan->kontrakan_detail->nomor }}"><i
                                            class="fa-solid fa-trash-can"></i></a>

                                    {{-- <form action=" {{ route('admin.kontrakan.destroy', $kontrakan->id) }} "
                                        method="post" class="d-inline">
                                        @csrf
                                        @method('delete')

                                        <button class="badge bg-danger border-0"
                                            onclick="return confirm('Are you sure?')"><i
                                                class="fa-solid fa-trash-can"></i></button>
                                    </form> --}}
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

@push('js')
<script>
    $('.delete').click(function(){
        var id = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');
         
        swal({
        title: "Apakah anda yakin?",
        text: "Anda akan menghapus data dengan nama "+nama+"!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
        window.location =  "jenis-kontrakan/destroy/"+id+""
        swal("Data berhasil dihapus!", {
        icon: "success",
        });
        } else {
        swal("Data tidak dihapus!");
        }
        });
    });
 
</script>
@endpush