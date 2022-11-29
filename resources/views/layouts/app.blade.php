<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!--Data table-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap5.min.css">

<!-- Font Awersome para fuentes e iconos-->
<script src="https://kit.fontawesome.com/5bb9809fd3.js" crossorigin="anonymous"></script>

    <!--Otros-->
    <title>Pon Mi Canción</title>

    <style>
        *{
            padding: 0;
            margin: 0;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
         body {
            /* Centra y escala el background */
            background: url(images/bgwelcome.jpeg);
            width: 100%;
            height: auto;
            background-repeat: no-repeat;
            background-size: cover;
            
            
            
        }
        /*letras en welcome que aparecen*/
           .ani-font {
	-webkit-animation: ani-font 1.5s cubic-bezier(0.215, 0.610, 0.355, 1.000) both;
	        animation: ani-font 1.5s cubic-bezier(0.215, 0.610, 0.355, 1.000) both;
}

@-webkit-keyframes ani-font {
  0% {
    letter-spacing: -3em;
    opacity: 0;
  }
  40% {
    opacity: 1;
  }
  100% {
    opacity: 3;
  }
}
@keyframes ani-font {
  0% {
    letter-spacing: -3em;
    opacity: 0;
  }
  40% {
    opacity: 1;
  }
  100% {
    opacity: 3;
  }
}
   </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container" >
                <a class="navbar-brand " href="{{ url('/') }}" style="color: #FF6700;">Pon Mi Canción</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto " >
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item" >
                            <a class="nav-link" style="font-weight: bold;" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" style="font-weight: bold;"  href="{{ route('register') }}">{{ __('Regisarse') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap5.min.js"></script>

    <!--Links de las tablas para que funcionen en datatable-->
    <script>
        $('#parties_Table').DataTable();
    </script>
    <script>
        $('#songs_Table').DataTable();
    </script>
    <script>
        $('#users_Table').DataTable();
    </script>
    <script>
        $('#roles_Table').DataTable();
    </script>
    
    
</body>

</html>