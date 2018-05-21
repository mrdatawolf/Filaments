<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.11/js/all.js" integrity="sha384-ImVoB8Er8knetgQakxuBS4G3RSkyD8IZVVQCAnmRJrDwqJFYUE4YOv+DbIofcO9C" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    @yield('prescript')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('style')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <!-- Left Side Of Navbar -->
            <div class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fas fa-bars"></i><span class="caret"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('/brands') }}"><i class="fas fa-trademark"></i> Brands</a>
                    <a class="dropdown-item" href="{{ url('/printers') }}"><i class="fas fa-print"></i> Printers</a>
                    <a class="dropdown-item" href="{{ url('/filaments') }}"><i class="fas fa-circle-notch"></i> Filaments</a>
                    <a class="dropdown-item" href="{{ url('/types') }}"><i class="fas fa-tags"></i> Types</a>
                    <a class="dropdown-item" href="{{ url('/users') }}"><i class="fas fa-users"></i> Users</a>
                    <!--<a class="dropdown-item" href="{{ url('/notes') }}"><i class="fas fa-gavel"></i> Notes</a>
                    <a class="dropdown-item" href="{{ url('/examples') }}"><i class="fas fa-gift"></i> Examples</a>
                    <a class="dropdown-item" href="{{ url('/issues') }}"><i class="fas fa-flag"></i> Issues</a>
                    <a class="dropdown-item" href="{{ url('/remoteDatum') }}"><i class="fas fa-fighter-jet"></i> Remote Data</a>-->
                </div>
            </div>

            <div class="container">
                <a class="navbar-brand" href="{{ url('/filaments') }}">
                    {{ config('app.name', 'Laravel') }}
                </a> ->&nbsp;&nbsp;@yield('pageTitle'):
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user"></i>{{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#"><i class="fas fa-print"></i> My Printers</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-circle-notch"></i> My Filaments</a>
                            
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @if (!empty($success))
        <div class="alert alert-success">
            <ul>
                @foreach ($success->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (!empty($warnings))
        <div class="alert alert-warning">
            <ul>
                @foreach ($warnings->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if ($errors->all())
        
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @yield('postscript')
</body>
</html>
