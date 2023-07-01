<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Links -->
    <link rel="stylesheet" href="{{ asset('css/custom-colors.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
      rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/masonry.css') }}">

    <!-- si -->
    @yield('title')


</head>
<body class="bg-darkBG" data-bs-theme="dark">
    
   
        <!-- linea negra -->
        <div class='container-fluid' style="height: 13px"></div>

        
        <!-- NavBar -->
        <nav class="navbar navbar-expand-lg bg-navbarBG navbar-dark mb-3">
        <div class="container-xl">
            <a class="navbar-brand" href="{{route('Home.home')}}"><img src="{{ asset('recursos/photohub.svg') }}" alt="" style="width: 100px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                

                <li class="nav-item">
                <a class="nav-link" href="{{route('Home.home')}}">Inicio</a>
                </li>

                @if (auth()->check() && auth()->user()->perfil_id == 1) 
                    <li class="nav-item">
                    <a class="nav-link" href="{{route('Admin.gestionCuentas')}}">Gestion</a>
                    <li class="nav-item">
                    <a class="nav-link" href="{{route('Artist.photos',Auth::user()->user)}}">Perfil</a>
                @elseif(auth()->check() && auth()->user()->perfil_id == 2)
                    <li class="nav-item">
                    <a class="nav-link" href="{{route('Artist.photos',Auth::user()->user)}}">Perfil</a>
                @endif

            </ul>

            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                <a href="{{route('Home.subirImg')}}" style="text-decoration: none"><button class="btn btn-gray d-flex"  style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .8rem; --bs-btn-font-size: .75rem; text-decoration:none;"
                type="submit"><span class="material-icons">photo_camera</span> <b class="ms-1 mt-1"> Subir Foto</b>  </button></a>
                </li>
            </ul>
                
            <ul class="navbar-nav ">   
                @auth

                
                
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="material-icons">
                    account_circle
                    </span>
                    </a>
                    <ul class="dropdown-menu bg-navbarBG dropdown-menu-dark text-center dropdown-menu-end">
                        <li><span>{{Auth::user()->nombre}}</span></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('cuentas.logout')}}"><b>Cerrar Sesion</b></a></li>

                    </ul>
                </li>


                @else

                <a href="{{route('RegLog.register')}}" ><button class="btn btn-primary mx-3" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .8rem; --bs-btn-font-size: .75rem;"
                type="submit"><b>Registrarse</b>  </button></a>
                <a href="{{route('RegLog.login')}}" ><button class="btn btn-gray" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .8rem; --bs-btn-font-size: .75rem;"
                type="submit"><b>Iniciar Sesion</b>  </button></a>


                @endauth
            </ul>
            
                
            </div>
        </div>
        </nav>


        <!-- contenido principal -->
        <div class="container-xl">
            @yield('content')
        </div>

   


    <!-- scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>