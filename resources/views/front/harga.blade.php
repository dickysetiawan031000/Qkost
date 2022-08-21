<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>QKost</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/pricing.css">

</head>

<body>
    <header class="p-3 mb-3 border-bottom ">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                    <img src="/image/logo.png" alt="Logo" width="40" height="40" />
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/tentang-kami" class="nav-link px-2 link-secondary">Tentang Kami</a></li>
                    <li><a href="{{ route('kontak-kami.create') }}" class="nav-link px-2 link-dark">Kontak Kami</a>
                    <li><a href="/harga" class="nav-link px-2 link-dark">Harga</a></li>
                </ul>


                <div class="dropdown text-end">
                    <a href="/login" class="btn btn-dark" style="background-color: #3844ac">Masuk</a>
                </div>
            </div>
        </div>
    </header>
    <!-- partial:index.partial.html -->
    <div id="generic_price_table">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!--PRICE HEADING START-->
                        <div class="price-heading clearfix">
                            <h1>QKost Price</h1>
                        </div>
                        <!--//PRICE HEADING END-->
                    </div>
                </div>
            </div>
            <div class="container">

                <!--BLOCK ROW START-->
                <div class="row">
                    @foreach($jenisKontrakan as $jenis)

                    <div class="col-md-4">

                        <!--PRICE CONTENT START-->
                        <div class="generic_content clearfix">

                            <!--HEAD PRICE DETAIL START-->
                            <div class="generic_head_price clearfix">

                                <!--HEAD CONTENT START-->
                                <div class="generic_head_content clearfix">

                                    <!--HEAD START-->
                                    <div class="head_bg"></div>
                                    <div class="head">
                                        <span>{{ $jenis->nama }}</span>
                                    </div>
                                    <!--//HEAD END-->

                                </div>
                                <!--//HEAD CONTENT END-->

                                <!--PRICE START-->
                                <div class="generic_price_tag clearfix">
                                    <span class="price">
                                        <span class="currency">{{ \App\Utilities\Helpers::formatCurrency($jenis->harga,
                                            'Rp.') }}</span>

                                        <span class="month">/Bln</span>
                                    </span>
                                </div>
                                <!--//PRICE END-->

                            </div>
                            <!--//HEAD PRICE DETAIL END-->

                            <!--FEATURE LIST START-->
                            {{-- <div class="generic_feature_list">
                                <ul>
                                    <li><span>2GB</span> Bandwidth</li>
                                    <li><span>150GB</span> Storage</li>
                                    <li><span>12</span> Accounts</li>
                                    <li><span>7</span> Host Domain</li>
                                    <li><span>24/7</span> Support</li>
                                </ul>
                            </div> --}}
                            <!--//FEATURE LIST END-->

                            <!--BUTTON START-->
                            <div class="generic_price_btn clearfix">
                                <a class="" href="/login">Sign up</a>
                            </div>
                            <!--//BUTTON END-->

                        </div>
                        <!--//PRICE CONTENT END-->

                    </div>
                    @endforeach

                </div>
                <!--//BLOCK ROW END-->

            </div>
        </section>
    </div>
    <!-- partial -->

</body>

</html>