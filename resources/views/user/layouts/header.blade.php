<header class="p-3 mb-3 border-bottom ">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap" />
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                {{-- <li><a href="#" class="nav-link px-2 link-secondary">My Dashboard</a></li> --}}
            </ul>


            <div class="dropdown text-end">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
                    data-bs-toggle="dropdown" aria-expanded="false">

                    {{-- <img
                        src="{{ \App\Models\User::has('user_profile')->whereId(Auth::id())->first() ? asset('avatar/' . auth()->user()->user_profile->avatar) : 'https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar-300x300.jpg' }}"
                        alt="mdo" width="32" height="32" class="rounded-circle"> --}}
                    <img src="{{ \App\Models\User::has('user_profile')->whereId(Auth::id())->first() ? asset('avatar/' . auth()->user()->user_profile->avatar) : 'https://therminic2018.eu/wp-content/uploads/2018/07/dummy-avatar-300x300.jpg' }}"
                        alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="{{ route('user.myprofile.index') }}">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Ubah Password</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        {{-- <a class="dropdown-item" href="#">Logout</a> --}}
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>