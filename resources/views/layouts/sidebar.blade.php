<!-- Nav Sidebar -->
<nav class="sidebar offcanvas-md offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false">
    <div class="d-flex justify-content-end m-3 d-block d-md-none">
        <button aria-label="Close" data-bs-dismiss="offcanvas" data-bs-target=".sidebar" class="btn p-0 border-0 fs-4">
            <i class="fas fa-close"></i>
        </button>
    </div>
    <div class="d-flex justify-content-center mt-5 mb-5">
        <img src="/image/logo.png" alt="Logo" width="100" height="100" />
    </div>
    <div class="pt-2 d-flex flex-column gap-5">
        <div class="menu p-0">
            <p>Daily Use</p>

            @if(auth()->user()->role == '1')

            <a href="{{ route('admin.dashboard.index') }}"
                class="item-menu {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
                <i class="fa-solid fa-chart-line"></i>
                &nbsp; &nbsp;Dashboard
            </a>
            <a href="{{ route('admin.user.index') }}"
                class="item-menu {{ Request::is('admin/user*') ? 'active' : '' }}">
                <i class="fa-solid fa-users"></i>
                &nbsp; &nbsp;Penyewa
            </a>
            <a href="{{ route('admin.jenis-kontrakan.index') }}"
                class="item-menu {{ Request::is('admin/jenis-kontrakan*') ? 'active' : '' }}">
                <i class="fa-solid fa-house"></i>
                &nbsp; &nbsp;Jenis
            </a>
            <a href="{{ route('admin.kontrakan.index') }}"
                class="item-menu {{ Request::is('admin/kontrakan', 'admin/kontrakan/create', 'admin/kontrakan/{id}') ? 'active' : '' }}">
                <i class="fa-solid fa-building"></i>
                &nbsp; &nbsp;Kamar
            </a>
            <a href="{{ route('admin.kontrakan-user.index') }}"
                class="item-menu {{ Request::is('admin/kontrakan-user*') ? 'active' : '' }}">
                <i class="fa-solid fa-building-user"></i>
                &nbsp; &nbsp;Penyewaan
            </a>
            <a href="{{ route('admin.tagihan.index') }}"
                class="item-menu {{ Request::is('admin/tagihan*') ? 'active' : '' }}">
                <i class="fa-solid fa-file-invoice-dollar"></i>
                &nbsp; &nbsp;Tagihan
            </a>
            <a href="{{ route('admin.kontak-kami.index') }}"
                class="item-menu {{ Request::is('admin/kontak-kami*') ? 'active' : '' }}">
                <i class="fa-solid fa-phone"></i>
                &nbsp; &nbsp;Kontak
            </a>
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="item-menu border-0" style="background-color:rgba(0, 0, 0, 0)">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp; &nbsp; Logout</button>
            </form>

            @endif

            @if(auth()->user()->role == '2')
            <a href="{{ route('user.dashboard.index') }}"
                class="item-menu {{ Request::is('user/dashboard*') ? 'active' : '' }}">
                <i class="fa-solid fa-chart-line"></i>
                &nbsp; &nbsp;Dashboard
            </a>
            <a href="{{ route('user.transaksi.index') }}"
                class="item-menu {{ Request::is('user/transaksi*') ? 'active' : '' }}">
                <i class="fa-solid fa-credit-card"></i>
                &nbsp; &nbsp;Transaksi
            </a>
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="item-menu border-0" style="background-color:rgba(0, 0, 0, 0)">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp; &nbsp; Logout</button>
            </form>
            @endif

        </div>
        {{-- <div class="menu">
            <p>Others</p>
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="item-menu border-0" style="background-color:rgba(0, 0, 0, 0)">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp; &nbsp; Logout</button>
            </form>
        </div> --}}
    </div>
</nav>