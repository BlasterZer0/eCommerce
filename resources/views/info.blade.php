@extends('layouts.app')

@section('content')
<div class="container">

        <div class="text-center">
        <h1>{{$animal->name}}</h1>
        </div>

        <div class="container mt-4">
                <div class="row">
                        <div class="col">
                                <img src="{{ url('images/'.$animal->image) }}" style="height: 500px; width: 500px;" class="img-fluid img-thumbnail" />
                        </div>
                        <div class="col">
                                <div>
                                        <h2>Descripción</h2>

                                        <ul class="list-group">
                                                <li class="list-group-item"><b>Sexo: </b> {{ $animal->gender }}</li>
                                                <li class="list-group-item"><b>Edad: </b> {{ $animal->age }}</li>
                                                <li class="list-group-item"><b>Tamaño: </b> {{ $animal->size }}</li>
                                                <li class="list-group-item"><b>Estado de salud: </b> {{ $animal->health }}</li>
                                                <li class="list-group-item"><b>Personalidad: </b> {{ $animal->personality }}</li>
                                                <li class="list-group-item"><b>Información adicional: </b> {{ $animal->description }}</li>
                                                <li class="list-group-item"><b>Adoptado: </b> {{ $animal->status }}</li>
                                        </ul>
                                        <div class="text-center mt-2">
                                                <a href="" class="btn btn-success">Adoptar</a>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>

        <div class="text-center">
        <a href="{{ route('index') }}" class="btn btn-info mt-5">Volver</a>
        </div>

@endsection