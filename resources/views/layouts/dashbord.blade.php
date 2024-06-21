<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @vite('resources/css/app.css')

        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css"  rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-[#AFD3EE] shadow-md">
                <div class="container gap-4">
                    <div class=" flex items-center container">
                        <img src="/image/logo.png" class="img-fluid rounded-3xl w-10" alt="...">

                            <div class="logo text-gray-700 pl-3">Rean Kur</div>

                    </div>


                    {{-- <a href="{{ url('create') }}" class=" text-dark font-serif" style="text-decoration:none">Teacher Registration</a> --}}


                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item py-2">
                                    <a class="nav-link  text-white bg-[#479BE8] hover:bg-blue-600 font-sans rounded-md px-4 py-1 mr-2 w-fit focus:outline no-underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            {{-- @if (Route::has('register'))
                                <li class="nav-item py-2">
                                    <a class="nav-link text-gray-900 bg-[#E2EFF6] hover:bg-blue-600 font-sans rounded-md px-4 py-1 mr-2 w-fit focus:outline no-underline outline-[#479BE8] outline outline-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else

                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}

                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        {{-- @foreach ($teachers as $teacher ) --}}

                                        @if (Route::has('register'))
                                            @if (Auth::user()->teacher)
                                            <div class="dropdown-item d-flex align-items-center flex-wrap text-nowrap">
                                                <a href="{{route('teacher.show', Auth::user()->teacher->id)}}"  class=" mb-2 mb-md-0">
                                                    <img src="img/{{ Auth::user()->teacher->profile }}" alt="" class="w-16">
                                                </a>
                                            </div>
                                            @else
                                            @endif
                                        @else


                                        @endif
                                        {{-- @endforeach --}}
                                        <a class="dropdown-item" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>
                                        <hr>
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
            </nav>

            {{-- side bar --}}
            @include('sidebar.sidebar')
            {{-- content page --}}
            @yield('content')
            <footer>
                <p>Copyright © 2022 Soeng Souy.</p>
            </footer>
        </div>
    </body>
</html>
