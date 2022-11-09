<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Posyandu Laccori - Login Admin</title>
    <!-- Simple bar CSS -->

    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/feather.css') }}">
    <!-- Date Range Picker CSS -->
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/app-light.css') }}" id="lightTheme">
</head>

<body class="light ">
    <div class="wrapper vh-100">
        <div class="row align-items-center h-100">

            <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" action="{{ route('login.check') }}"
                method="post">
                @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal!</strong> {{ session()->get('error') }} <button
                        type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @endif

                @csrf
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center mb-3" href="{{ route('login') }}">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="" style="width: 150px">
                </a>
                <h1 class="h4 mb-3">Login User</h1>
                <div class="form-group">
                    <label for="no_kk" class="sr-only">Nomor Induk Penduduk</label>
                    <input type="text" id="no_kk" class="form-control form-control-lg" placeholder="No KK"
                        required="" autofocus="" name="no_kk">
                </div>
                <div class="form-group">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" id="password" class="form-control form-control-lg" placeholder="Password"
                        required="" name="password">
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                <p class="mt-5 mb-3 text-muted">© {{ date('Y') }}</p>
            </form>
        </div>
    </div>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>

</body>

</html>
</body>

</html>
