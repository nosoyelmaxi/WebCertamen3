<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Links -->
    <link rel="stylesheet" href="{{ asset('css/custom-colors.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
      rel="stylesheet">
    <title>Registrarse</title>


</head>
<body class="bg-darkBG" data-bs-theme="dark">
    
   
        <!-- linea negra -->
        <div class='container-fluid' style="height: 13px"></div>

        
        <!-- NavBar -->
        <nav class="navbar navbar-expand-lg bg-navbarBG navbar-dark">
        <div class="container-xl">
            <a class="navbar-brand" href="{{route('Home.home')}}"><img src="recursos/photohub.svg" alt="" style="width: 100px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                

                <li class="nav-item">
                <a class="nav-link" href="{{route('Home.home')}}">Inicio</a>
                </li>
                

            </ul>

        </div>
        </nav>

        <div class="container-fluid mt-5">
        <div class="row justify-content-evenly">
            <div class="col-6">
                <div class="card bg-darkBG text-white shadow mb-5">
                    <div class="card-header bg-dark">
                        <h4>Ingrese sus datos</h4>
                    </div>
                    <div class="card-body bg-navbarBG">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form method="POST" action="{{route('cuentas.store')}}">
                        @csrf
                            <div class="mb-3">
                                <label for="exampleInputText1" class="form-label text-white">Nombre de usuario</label>
                                <input type="text" class="form-control bg-dark text-white" id="user" name="user">
                            </div>
                             <div class="mb-3">
                                <label for="exampleInputPassword" class="form-label text-white">Contraseña</label>
                                <input type="password" class="form-control bg-dark text-white" id="password" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword" class="form-label text-white">Repetir contraseña</label>
                                <input type="password" class="form-control bg-dark text-white"  id="password2" name="password2">
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="exampleInputText" class="form-label text-white">Nombre</label>
                                    <input type="text" aria-label="Nombre" class="form-control bg-dark text-white" id="nombre" name="nombre">
                                </div>
                                <div class="col">
                                    <label for="exampleInputText" class="form-label text-white">Apellido</label>
                                    <input type="text" aria-label="Apellido" class="form-control bg-dark text-white" id="apellido" name="apellido">
                                </div>
                            </div>
                            
                            <div class="mt-4 mb-1">
                                <button type="submit" class="btn btn-primary "><b>Registrarse</b></button>
                                <a href="{{route('Home.home')}}" class="btn btn-gray text-white">Cancelar</a>
                            </div>

                            <a href="{{route('RegLog.login')}}" ><small>¿ya tienes una cuenta? Inicia Sesión</small></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


   

    <!-- scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>

