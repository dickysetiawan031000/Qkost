<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>LSP | Training-Project</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sidebars/">

    {{-- Css Bootsraps --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body ">
                        <div class="container">
                            <img src="/image/logo.png" alt="" class="p-2" style="width: 15%">
                            <p class="mt-3 mb-5 text-center" style="font-size: 30px;">Thanks for your purchase</p>
                            <div class="row mx-4">
                                <ul class="list-unstyled">

                                    <li class="text-muted mt-1"><span class="text-black">Invoice</span> {{
                                        $transaksi->order_id }}
                                    </li>
                                    <li class="text-black mt-1">{{ $transaksi->updated_at }}</li>
                                </ul>

                                <hr>
                                <div class="col-xl-3 text-center">
                                    <p>Nama Pembayar</p>

                                </div>
                                <div class="col-xl-5 text-center">
                                    <p>Metode Pembayaran</p>
                                </div>
                                <div class="col-xl-4 text-center">
                                    <p>Jumlah Tagihan</p>

                                </div>
                                <hr>

                                <div class="col-xl-3 text-center">
                                    <p>{{ auth()->user()->name}}</p>
                                </div>
                                <div class="col-xl-5 text-center">
                                    <p>{{ $transaksi->payment_type }}</p>
                                </div>
                                <div class="col-xl-4 text-center">
                                    <p>{{
                                        \App\Utilities\Helpers::formatCurrency($transaksi->gross_amount,
                                        'Rp.')
                                        }}
                                    </p>
                                </div>
                                <hr>
                                <div class="text-end">
                                    <p>Total Amount</p>
                                    <p>{{ \App\Utilities\Helpers::formatCurrency($transaksi->gross_amount, 'Rp.') }}</p>
                                </div>

                            </div>
                            <a href="{{ route('user.transaksi.index') }}" class="text-decoration-none"> <i
                                    class="bi bi-arrow-left"></i> Back to Index</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>