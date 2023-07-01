@extends('Main.navbar')
@section('title')
    <title>Subir Foto</title>

    <!-- script -->
    <script>
        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();

            reader.onload = function(){
                var img = document.getElementById("uploadPreview");
                img.src = reader.result;
            }

            reader.readAsDataURL(input.files[0]);
        }
    </script>
@endsection

@section('content')
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="container bg-navbarBG rounded">

        <div class="row">

            <div class="col-7 bg-dark">
                <div class='container-fluid d-flex justify-content-center align-items-center h-100'>
                    <img id="uploadPreview" src="recursos/no-camera.png" alt="Previsualización de imagen" style="max-height: 500px; max-width: 600px">
                </div>
            </div>

            <div class="col-5">
                <div class="container-fluid py-5">

                    <div class='container-fluid' style="height: 13px"></div>
                    <h2 class='text-white mb-4'>Subir Imagen</h2>
                    

                    <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <label for="" class="form-label">Titulo de Imagen</label>
                    <input type="text" name="titulo" placeholder="imagen de gatitos" class="form-control bg-dark text-white mb-3" data-bs-theme="dark">

                    <label for="" class="form-label">Subir archivo</label>
                    <input type="file" name="archivo" accept='image/*' class='form-control  bg-dark mb-4' data-bs-theme="dark" id='uploadImage' onchange="previewImage(event)" accept="image/*">

                    <div class='d-lg-flex justify-content-lg-between mb-2'>
                    <button type="submit" class='btn btn-primary me-2' style="--bs-btn-padding-y: .50rem; --bs-btn-padding-x: 5rem; --bs-btn-font-size: .90rem;"><b>GUARDAR</b></button>
                    <a href="{{route('Home.home')}}" class='btn btn-gray' style="--bs-btn-padding-y: .50rem; --bs-btn-padding-x: 3rem; --bs-btn-font-size: .90rem;"><b>CANCELAR</b></a>
                    </form>

                    
                    
                    </div>
                    <div class='container-fluid' style="height: 25px"></div>
                    
                    


                </div>
            </div>

        </div>

    </div>
    
    

    


    <script src="scripts.js"></script>
@endsection