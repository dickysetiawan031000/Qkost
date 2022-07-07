<ul class="list-unstyled ps-0">
    <li class="mb-1">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ">
            <li><a href="{{ route('admin.dashboard.index') }}"
                    class="link-dark d-inline-flex text-decoration-none rounded">Dashboard</a></li>
        </ul>
    </li>
    <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
            data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
            Kontrakan
        </button>
        <div class="collapse show" id="home-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="{{ route('admin.user.index') }}"
                        class="link-dark d-inline-flex text-decoration-none rounded">Penyewa</a>
                </li>
                <li><a href="{{ route('admin.jenis-kontrakan.index') }}"
                        class="link-dark d-inline-flex text-decoration-none rounded {{ Request::is('admin/jenis-kontrakan*') ? 'active' : '' }}">Jenis</a>
                </li>
                <li><a href="{{ route('admin.kontrakan.index') }}"
                        class="link-dark d-inline-flex text-decoration-none rounded">Kamar</a>
                </li>
                <li><a href="{{ route('admin.kontrakan-user.index') }}"
                        class="link-dark d-inline-flex text-decoration-none rounded">Penyewaan</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
            data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
            Pembayaran
        </button>
        <div class="collapse" id="dashboard-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Overview</a>
                </li>
            </ul>
        </div>
    </li>

</ul>