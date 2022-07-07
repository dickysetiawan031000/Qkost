<ul class="list-unstyled ps-0">
    <li class="mb-1">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ">
            <li><a href="{{ route('user.dashboard.index') }}"
                    class="link-dark d-inline-flex text-decoration-none rounded">Dashboard</a></li>
        </ul>
    </li>
    <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
            data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
            Pembayaran
        </button>
        <div class="collapse" id="dashboard-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Overview</a>
            </ul>
        </div>
    </li>

</ul>