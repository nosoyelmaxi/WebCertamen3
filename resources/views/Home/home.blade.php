@extends('Main.navbar')
@section('title')
    <title>PhotoHub</title>

@endsection

@section('content')


<div class="galeria" >
    @foreach($imagenes as $id => $imagen)

    @if($imagen->baneada != 1)
        <div class="card img-galeria bg-navbarBG">
            <img src="{{ asset('imgs/' . $imagen->archivo ) }}" class="card-img-top">
            <div class="card-body p-1">
                <div class="row">
                    <div class='col ps-4 py-2'>
                        <b><p class="card-text">{{ $imagen->cuenta_user }}</p></b>
                        <p class="card-text">{{ $imagen->titulo }}</p>
                    </div>
                    <div class="col text-end pt-2">
                            @if (auth()->check() &&  ( (auth()->user()->user == $imagen->cuenta_user ) ||  (auth()->user()->perfil_id == 1)  ) )
                            <div class="dropdown">
                                <button class="btn btn-navbarBG" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                    style="--bs-btn-padding-y: .1rem; --bs-btn-padding-x: .1rem; --bs-btn-font-size: .50rem;">
                                    <span class="material-icons-outlined">
                                    more_vert
                                    </span>
                                </button>

                                <ul class="dropdown-menu">
                                @if (auth()->check() && auth()->user()->perfil_id == 1)
                                        <li><a class="dropdown-item" href="{{route('Admin.banear',$imagen->id)}}">Banear</a></li>
                                @endif
                                @if (auth()->check() && auth()->user()->user == $imagen->cuenta_user)
                                    <li><a class="dropdown-item" href="#" id='eliminar' data-bs-toggle="modal" data-bs-target="#deleteModal{{$imagen->id}}">Eliminar</a></li>
                                @endif

                                </ul>

                            </div>
                            @endif
                       
                    </div>
                </div>
            </div>
        </div>
<!-- Modal -->  
    <div class="modal fade" id="deleteModal{{$imagen->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$imagen->id}}" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" >¿Estás seguro?</h1>
        <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
      </div>
      <div class="modal-body">
        Eliminar esta imagen es irreversible y no podra recuperarse posteriormente.
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-gray" data-bs-dismiss="modal">Cancelar</a>

             <form action="{{route('Artist.delete',$imagen->id)}}" method="POST">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-secondary" >Eliminar</button>
            </form> 

      </div>
    </div>
    </div>
    </div>

    
    @endif


    @endforeach


</div>

</div>
<div class='container-fluid m-3'>
</div>
    

@endsection