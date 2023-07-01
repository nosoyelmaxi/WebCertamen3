@extends('Main.navbar')

@section('title')
<title>Banear imagen {{$imagen->id}} </title>
@endsection

@section('content')

            <div class="container-fluid mt-5">
                <div class="row justify-content-evenly">
                    <div class="col-9">
                        <div class="card bg-navbarBG text-white">
                            <div class="card-header bg-dark">
                                <h4>Banear Imagen</h4>
                            </div>


                            <div class="card-body bg-navbarBG" >

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('Admin.ban', $imagen->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf


                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Motivo del Baneo</label>
                                        <textarea class="form-control" id="motivo_ban" name="motivo_ban"></textarea>
                                    </div>
                                    <div class="mt-5">
                                        <button type="submit" class="btn btn-secondary text-white">Banear</button>
                                        <a href="{{route('Home.home')}}" class="btn btn-gray text-white">Cancelar</a>
                                    </div>


                                </form>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection