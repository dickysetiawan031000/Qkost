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
            <h3>Overview</h3>
            <p>Manage data for growth</p>
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

                    <table class="table table-striped table-sm">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Pembayaran Ke</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jatuh Tempo</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($getData as $d)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->pembayaran_ke }}</td>
                                <td>{{ $d->kontrakan_user->harga }}</td>
                                <td>{{ $d->jatuh_tempo }}</td>
                                <td>

                                    @if($d->transaksi_id == null )
                                    <button class="btn btn-success btn-sm" id="pay-button">Pay!</button>

                                    @elseif($d->transaksi->transaction_status == 'settlement')
                                    <a href="{{ route('user.transaksi.show', $d->transaksi->id) }}"
                                        class="btn btn-info btn-sm">
                                        Invoice</a>

                                    @else

                                    <p>Selesaikan Pembayaran</p>

                                    @endif

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <form action="{{ route('user.transaksi.store') }}" id="submit_form" method="POST">
                    @csrf
                    <input type="hidden" name="json" id="json_callback">
                </form>

                <script type="text/javascript">
                    // For example trigger on button clicked, or any time you need
                      var payButton = document.getElementById('pay-button');
                      payButton.addEventListener('click', function () {
                        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                        window.snap.pay('{{ $snapToken }}',{
                            onSuccess: function(result){
                                alert("payment success!"); console.log(result);
                                send_response_to_form(result);
                            },
                            onPending:function(result){
                                alert("waiting your payment!"); console.log(result);
                                send_response_to_form(result);
                            },
                            onError:function(result){
                                alert("payment failed!"); console.log(result);
                                send_response_to_form(result);
                            },
                            onClose:function(result){
                                alert("you closed the pop up without finishing the payment!");
                            }
                        })
                        // customer will be redirected after completing payment pop-up
                      });

                      function send_response_to_form(result){
                        document.getElementById('json_callback').value = JSON.stringify(result);
                        $('#submit_form').submit();
                      }
                </script>

            </div>
        </div>
    </section>
</main>
@endsection