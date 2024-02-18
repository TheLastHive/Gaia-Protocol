<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gaia Protocol</title>

    {{-- Rutas css/js --}}
    @vite([
        'resources/css/app.scss',
        'resources/css/app.css', //Bootstrap
        'resources/css/custom.scss',
        'resources/css/custom.css', //CSS Personalizado
        'resources/js/app.js',
    ])

    {{-- Iconos FONTAWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- cdn tailwind --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.4/dist/tailwind.min.css" rel="stylesheet">
    {{-- script crear token modal --}}
    <script defer src="{{ asset('js/createTokenModal.js') }}"></script>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-warning shadow-sm d-flex justify-content-between pe-3">
            <div class="">
                <div class="sidebar2 d-flex">
                    <a><button class="btn rounded-5 btn-secondary">A</button></a>
                    <a><button class="btn rounded-5 btn-secondary ">A</button></a>
                    <a><button class="btn rounded-5 btn-secondary">A</button></a>
                    <a><button class="btn rounded-5 btn-secondary">A</button></a>
                    <a><button class="btn rounded-5 btn-secondary">A</button></a>
                    <a><button class="btn rounded-5 btn-secondary">A</button></a>
                </div>

                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            {{-- @if (Auth::user()->email_verified_at) --}}
                            <div class="dropdown flex-row-reverse">
                                <button class="btn btn-secondary rounded-5" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                    <i class="fa-solid fa-user"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                        </li>
                                </ul>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                {{-- @endif --}}
                            </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="pt-4 ms-2 me-2 d-grid d-sm-flex">
            @yield('general')
        </main>
    </div>

</body>

</html>
