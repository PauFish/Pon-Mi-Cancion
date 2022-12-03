 <!-- Por motivos de ciberseguridad el admin no importara los Layauts ni el content -->
<!doctype html>
<html>

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
        * {
            padding: 0;
            margin: 0;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        body {
            /* Centra y escala el background */
            background-image: url("images/bgboss.jpeg");
            width: auto;
            height: auto;
            background-repeat: no-repeat;
            background-size: cover;
        }

        nav {
            background: black;
        }

        .nav-link {
            color: white;
            font-weight: bold;
        }

        .nav-link:hover {
            color: #FF6700;
        }
    </style>
</head>

<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand " style="color: white;">Pon Mi Canción</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                    </ul>
                    <ul class="navbar-nav ms-auto ">
                         <!-- seguridad y muestra el estado de la sesion -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" style="font-weight: bold;" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" style="font-weight: bold;" href="{{ route('register') }}">{{ __('Regisarse') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}
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
    </div>
    <div class="container" style="margin-top:20px">
        <div class="row ">
            <div class="col-md-15">
                <div class="card">
                    <div class="card-header text-danger">Hola ADMIN
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <div class="card-header text-danger">
                            <p>Administrador de Fiestas</p>
                        </div>
                        <div class="parties_container">
                            <br>
                            <div class="card">
                                <div class="card-body ">
                                    <!-- Create -->
                                    <a href="{{ url('/parties/create') }}" class="btn  btn-success" style="margin:10px" title="Añadir fiesta">Añadir Fiestas</a>
                                    <table id="parties_Table" class="table table-striped" style="color: #FF6700">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Fiesta</th>
                                                <th>Cartel</th>
                                                <th>Editar</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                        <!--le pasamos la variable en la que se almaceno todas las parties en PartyController
                                        y cada vez que entre lo almacena en $party -->
                                        <tbody>
                                            @php
                                            $parties=\App\Models\Party::all();
                                            @endphp
                                            @foreach($parties as $party)
                                            <tr>
                                                <td>{{$party->id}}</td>
                                                <td>{{$party->name}}</td>
                                                <td><img  src="{{asset($party->photo)}}" style="width:15vw" alt="foto de la fiesta" ></td>
                                                <!-- editar fiestas-->
                                                <td><a href="/parties/{{$party->id}}/edit" class="btn btn-info">Editar Fiesta</a></td>
                                                <!-- eliminar fiestas-->
                                                <td>
                                                    <form action="{{route('parties.destroy',$party->id)}}" method='POST'>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit">Eliminar Fiesta</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-15">
                        <div class="card">
                            <div class="card-header text-danger">
                                <p>Administrador de Canciones</p>
                            </div>
                            <div class="card-body">
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                                @endif
                                <div class="songs_container">
                                    <br>
                                    <div class="card">
                                        <div class="card-body">
                                            @php
                                            $songs=\App\Models\Song::all();
                                            @endphp
                                            <!-- Create -->
                                            <div>
                                                <a href="{{ url('/songs/create') }}" class="btn btn-success" style="margin:10px" title="Añadir Cancion">Añadir Canción</a>
                                            </div>
                                            <div class="songs_container">
                                                <br>
                                                <table id="songs_Table" class="table table-striped" style="color: #FF6700">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Cancion</th>
                                                            <th>Artista</th>
                                                            <th>Votos</th>
                                                            <th>Votar</th>
                                                            <th>Editar</th>
                                                            <th>Eliminar</th>
                                                        </tr>
                                                    </thead>
                                                    <!--le pasamos la variable en la que se almaceno todas las Songs en SongController
                                                    y cada vez que entre lo almacena en $song -->
                                                    @foreach($songs as $song)
                                                    <tr>
                                                        <td>{{$song->id}}</td>
                                                        <td>{{$song->title}}</td>
                                                        <td>{{$song->artist}}</td>
                                                        <td>{{$song->vote}}</td>
                                                        <!-- Vota Canciones-->
                                                        <td><a href="{{route('songs.show',$song->id)}}" type="button" class="btn btn-primary">VOTAR</a></td>
                                                        <!-- editar Canciones-->
                                                        <td><a href="/songs/{{$song->id}}/edit" class="btn btn-info">Editar Canción</a></td>
                                                        <!-- eliminar Canciones-->
                                                        <td>
                                                            <form action="{{route('songs.destroy',$song->id)}}" method='POST'>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger" type="submit">Eliminar Canción</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    <tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class=" row justify-content-center">
                            <div class="col-md-15">
                                <div class="card">
                                    <div class="card-header text-danger">Administrador Usuarios</div>
                                    <div class="card-body">
                                        @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                        @endif
                                        <div class="songs_container">
                                            <br>
                                            <div class="card">
                                                <div class="ysers_container">
                                                    <table id="users_Table" class="table table-striped" style="color: #FF6700">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Nombre</th>
                                                                <th>Email</th>
                                                                <th>Teléfono</th>
                                                                <th>Tipo</th>
                                                                <th>Role</th>
                                                                <th>Editar</th>
                                                            </tr>
                                                        </thead>
                                                         <!-- necesario para el foreach -->
                                                        @php
                                                        $users=\App\Models\User::all();
                                                        @endphp
                                                        @foreach($users as $user)
                                                        <tr>
                                                            <td>{{$user->id}}</td>
                                                            <td>{{$user->name}}</td>
                                                            <td>{{$user->email}}</td>
                                                            <td>{{$user->phone}}</td>
                                                            <td>{{$user->type}}</td>
                                                            <td>{{$user->role_id}}</td>
                                                            <!-- editar Role-->
                                                            <td><a href="/users/{{$user->id}}/edit" class="btn btn-info">Editar Role</a></td>
                                                        </tr>
                                                        @endforeach
                                                        <tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card" style="margin-top:20px">
                                            <div class="card-header text-danger">
                                                <p>Administrador de Roles</p>
                                            </div>
                                            <div class="card-body">
                                                <div class="roles_container">
                                                    <!-- Create -->
                                                    <a href="{{ url('/roles/create') }}" class="btn btn-success" title="Añadir Role">Añadir Role</a>
                                                    <div class="card-body">
                                                    </div>
                                                    <table id="roles_Table" class="table table-striped" style="color: #FF6700">
                                                        <thead>
                                                            <tr>
                                                                <th>id</th>
                                                                <th>Nombre</th>
                                                                <th>Role</th>
                                                            </tr>
                                                        </thead>
                                                        @php
                                                        $roles=\App\Models\Role::all();
                                                        @endphp
                                                        <!--le pasamos la variable en la que se almaceno todas las Role en RoleController
                                                                 y cada vez que entre lo almacena en $song -->
                                                        @foreach($roles as $role)
                                                        <tr>
                                                            <td>{{$role->id}}</td>
                                                            <td>{{$role->name}}</td>
                                                            <td>{{$role->role}}</td>
                                                        </tr>
                                                        @endforeach
                                                        <tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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