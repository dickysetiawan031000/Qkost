<header class="p-3 mb-3 border-bottom ">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <img src="/image/logo.png" alt="Logo" width="40" height="40" />
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/tentang-kami" class="nav-link px-2 link-secondary">Tentang Kami</a></li>
                <li><a href="{{ route('kontak-kami.create') }}" class="nav-link px-2 link-dark">Kontak Kami</a>
                </li>
                <li><a href="/harga" class="nav-link px-2 link-dark">Harga</a></li>
            </ul>


            <div class="dropdown text-end">
                <a href="/login" class="btn btn-dark" style="background-color: #3844ac">Masuk</a>
            </div>
        </div>
    </div>
</header>