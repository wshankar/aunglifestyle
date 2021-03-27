<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Aung Lifestyle</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('logo.png')}}" height="35" alt="Aung Lifestyle">
                    Lifestyle Medicine
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home')}}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ url('/rec')}}">Daily Record</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ url('/inv')}}">Blood Tests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/med')}}">Medication</a>
                          </li>
                      </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="https://m.facebook.com/LifestyleMedicineMyanmar/" target="_blank"><i class="fa fa-facebook-square fa-2x mr-2"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.youtube.com/channel/UC1cBNWX0-6q654q97LilHBQ" target="_blank"><i class="fa fa-youtube-square fa-2x mr-3"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="https://m.facebook.com/LifestyleMedicineMyanmar/" target="_blank"><i class="fa fa-facebook-square fa-2x mr-2"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.youtube.com/channel/UC1cBNWX0-6q654q97LilHBQ" target="_blank"><i class="fa fa-youtube fa-2x mr-3"></i></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="{{asset('default.png')}}" height="30" class="rounded-circle" alt="Profile Picture"> {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @can('doctor', auth()->user())
                                   
                                    <a class="dropdown-item" href="{{ route('doctor.create') }}">Doctor Comment</a>
                                        
                                    @endcan                                    
                                    <a class="dropdown-item" href="{{ route('profile.index') }}">{{ auth()->user()-> name}} ၏ နေရာ</a>

                                    <a class="dropdown-item" href="{{ route('promise.create') }}">ကတိပြုစာ</a>

                                    <a class="dropdown-item" href="{{ route('feedback.create') }}">အကြံပြုစာ</a>

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
</body>
</html>
