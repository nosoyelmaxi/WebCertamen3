@extends('Main.navbar')
@section('title')
    <title>Gestionar Cuentas</title>
@endsection

@section('content')
    
    <div class="row">

        <div class="col-7">
            <table class="table table striped table-bordered table-hover">
                <thead class="table-dark ">
                    <tr>
                        <th class='bg-navbarBG'>N°</th>
                        <th class='bg-navbarBG'>Nombre</th>
                        <th class='bg-navbarBG'>Apellido</th>
                        <th class='bg-navbarBG'>Tipo</th>
                        <th class='bg-navbarBG'>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cuentas as $num=>$cuentas)
                    <tr>
                        <td class='bg-dark'>{{ $num+1 }}</td>
                        <td class='bg-dark'>{{ $cuentas->nombre }}</td>
                        <td class='bg-dark'>{{ $cuentas->apellido }}</td>

                        @if($cuentas->perfil_id == 1)
                        <td class='bg-dark'>Admin</td>
                        @else
                        <td class='bg-dark'>Usuario</td>
                        @endif
                        
                        @if($cuentas->user == Auth::user()->user)
                        <td class='bg-dark'>
                            <div class='d-flex justify-content-evenly'>
                                <a href="" class='btn btn-primary' style="--bs-btn-padding-y: .1rem; --bs-btn-padding-x: .1rem; --bs-btn-font-size: .25rem;">
                                <span class="material-icons-outlined">autorenew</span></a>
                                <a href="#" class='btn btn-gray' style="--bs-btn-padding-y: .1rem; --bs-btn-padding-x: .1rem; --bs-btn-font-size: .25rem;">
                                <span class="material-icons-outlined text-black">delete</span></a>
                            </div>
                        </td>
                        @else
                        <td class='bg-dark'>
                            <div class='d-flex justify-content-evenly'>
                                <a href="" class='btn btn-primary' style="--bs-btn-padding-y: .1rem; --bs-btn-padding-x: .1rem; --bs-btn-font-size: .25rem;">
                                <span class="material-icons-outlined">autorenew</span></a>
                                <a href="" class='btn btn-secondary' style="--bs-btn-padding-y: .1rem; --bs-btn-padding-x: .1rem; --bs-btn-font-size: .25rem;">
                                <span class="material-icons-outlined text-black">delete</span></a>
                            </div>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- card -->
        <div class='col-5'>
            <div class="card">
                <div class="card-header bg-navbarBG">
                    <h5>Registrar Usuario</h5>
                </div>
                <div class="card-body bg-dark">

                @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form method="POST" action="{{route('cuentas.storeAdmin')}}">
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
                            
                            <div class="mt-4 mb-1 d-grid">
                                <button type="submit" class="btn btn-primary "><b>Registrar</b></button>
                            </div>

                          
                        </form>

                </div>
            </div>
        </div>

    </div>

@endsection