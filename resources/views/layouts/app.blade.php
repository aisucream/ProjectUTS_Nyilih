<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Nyilih-Telo</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand mb-0 h1"><i class="bi bi-ui-radios-grid me-2"></i> Nyilih
                Telo</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav ms-auto ">
                    <!-- Authentication Links -->
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
                        <hr class="d-lg-none text-white-50">
                        <ul class="navbar-nav flex-row flex-wrap">

                            <li class="nav-item col-2 col-md-auto"><a href="{{ route('home') }}"
                                    class="nav-link active">Home</a></li>
                            <li class="nav-item col-2 col-md-auto"><a href="{{ route('barang') }}"
                                    class="nav-link">Barang</a></li>
                            <li class="nav-item col-2 col-md-auto"><a href="{{ route('pinjam.index') }}"
                                    class="nav-link">Riwayat
                                    Transaksi</a>
                            </li>

                            @if (Auth::user()->level == 'admin')
                                <li class="nav-item col-2 col-md-auto"><a href="{{ route('report.index') }}"
                                        class="nav-link">Laporan</a>
                                </li>
                            @endif
                        </ul>

                        <ul class="navbar-nav">
                            <li class="nav-item dropdown ">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle mx-5 " href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>


                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('report.create') }}">
                                        Report
                                    </a>
                                    <hr class="dropdown-divider">
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
                        </ul>


                    @endguest
                </ul>
            </div>
        </div>
    </nav>


    <main class="py-4">
        @yield('content')
    </main>
    </div>

    @include('sweetalert::alert')

</body>

</html>
