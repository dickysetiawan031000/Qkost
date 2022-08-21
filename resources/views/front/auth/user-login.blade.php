<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>QKost</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Raleway:300,600" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/login-codepen.css" />

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="container">
        <section id="formHolder">
            <div class="row">
                <!-- Brand Box -->
                <div class="col-sm-6 brand">
                    <a href="/" class="logo">QKost <span>.</span></a>

                    <div class="heading">
                        @if(session()->has('success'))
                        <h4>{{ session('success') }}</h4>

                        @elseif(session()->has('loginError'))
                        <h4>{{ session('loginError') }}</h4>

                        @elseif(session()->has('menunggu verifikasi'))
                        <h4>{{ session('menunggu verifikasi') }}</h4>

                        @else
                        <h2>Let's Join</h2>
                        @endif

                    </div>


                    {{-- <div class="success-msg">
                        <p>Great! You are one of our members now</p>
                        <a href="#" class="profile">Your Profile</a>
                    </div> --}}
                </div>

                <!-- Form Box -->
                <div class="col-sm-6 form">
                    <!-- Login Form -->
                    <div class="login form-peice switched">

                        <form class="login-form" action="/login" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email Adderss</label>
                                <input type="email" name="email" id="email" required />
                            </div>

                            <div class="form-group">
                                <label for="loginPassword">Password</label>
                                <input type="password" name="password" id="loginPassword" required />
                            </div>

                            <div class="CTA">
                                <button type="submit" class="btn btn-primary">Login</button>
                                {{-- <input type="submit" value="Login" /> --}}
                                <a href="#" class="switch">I'm New</a>
                            </div>
                        </form>
                    </div>
                    <!-- End Login Form -->

                    <!-- Signup Form -->
                    <div class="signup form-peice">
                        <form class="signup-form" action="{{ route('registrasi.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" name="name" id="name" class="name" />
                                <span class="error"></span>
                            </div>

                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" id="email" class="email" />
                                <span class="error"></span>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="pass" />
                                <span class="error"></span>
                            </div>

                            <div class="CTA">
                                <button type="submit" class="btn btn-primary">Register</button>
                                {{-- <input type="submit" value="Signup Now" id="submit" /> --}}
                                <a href="#" class="switch">I have an account</a>
                            </div>
                        </form>
                    </div>
                    <!-- End Signup Form -->
                </div>
            </div>
        </section>


    </div>
    <!-- partial -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="/js/login-codepen.js"></script>
</body>

</html>