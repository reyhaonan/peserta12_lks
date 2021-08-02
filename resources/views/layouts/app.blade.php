<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TechKu</title>

    <!-- Scripts -->
    <link rel="shortcut icon" href="/assets/icon-dark.png" type="image/x-icon">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    @yield('css')
    <!-- Styles -->
    <link href="/app.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">

    <style>
        #particles-js{
            position: fixed;
            z-index: -2;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .searchBar{
            border-bottom: 1px solid #616161;
            padding-bottom: 2px;
            position: relative;
            width: 300px;
        }
        .searchBarInput{
            border: none;
            background: transparent;
            outline: none;
        }
        .searchIcon{
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
</head>
<body style="background-color: #F2F2F2; position:relative;padding-bottom:500px" >
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-theme shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex" href="{{ url('/') }}">
                    <img src="/assets/icon.svg" class="mr-2 my-auto" style="height: 30px" srcset=""><span class="fs-3 my-auto">Techku</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <div class="searchBar ml-lg-2">
                            <form action="/produk" method="get" id="searchForm"></form>
                            <input type="text" form="searchForm" name="search" placeholder="Cari produk" class="searchBarInput text-light">
                            <button type="submit" form="searchForm" class="btn">
                                <i class="fa fa-search searchIcon text-light"></i>
                            </button>
                        </div>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a href="/cart" class="nav-link">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

    </div>
    <div class="footer bg-theme py-3" style="position:absolute;bottom :0;width: 100%">
        <div class="container">
            <div class="row">
                <div class="col d-flex" href="{{ url('/') }}">
                    <img src="/assets/icon.svg" class="mr-2 my-auto" style="height: 40px" srcset=""><span class="fs-2 my-auto text-light">Techku</span>
                </div>
                <div class="col">
                    <span class="text-light fs-4">Sosial Media</span>
                    <br>
                    <a href="#" class="fab fa-twitter text-light"></a>
                    <a href="#" class="fab fa-instagram text-light"></a>
                </div>
                <div class="col">
                    <span class="text-light fs-4">Link lainnya</span>
                    <br>
                    <div>
                        <a href="#" class="text-light">Tentang Kami</a>
                    </div>
                    <div>
                        <a href="#" class="text-light">Terms of Service</a>
                    </div>
                    <div>
                        <a href="#" class="text-light">FAQ</a>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="/particles.js"></script>
    <script>
        particlesJS.load('particles-js', '/particlesjs-config.json', function() {
            console.log('callback - particles.js config loaded');
        });
    </script>
    @yield('js')
</body>
</html>
