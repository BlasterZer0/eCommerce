@extends('layouts.app')

@section('content')

<div class="container text-center">
    @if (isset($animal))
        <h1>Modificación de solicitud</h1>
    @else
        <h1>Crear nueva solicitud</h1>
    @endif

    @if (isset($animal))
        <form action="{{ route('animal.update', $animal) }}" enctype="multipart/form-data" method="POST">
            @method('PUT')
    @else
        <form action="{{ route('animal.store') }}" enctype="multipart/form-data" method="POST">
    @endif
        
        @csrf

        <div class="row mb-3">
            <label for="name" class="col-md-2 col-form-label text-md-start">{{ __('Nombre') }}</label>
            
            <div class="col-md-10">
                <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ old('name') ?? @$animal->name}}">

                @error('name')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="status" class="col-md-2 col-form-label text-md-start">{{ __('Estado') }}</label>

            <div class="col-md-10">
                <select class="form-control" name="status">
                    @foreach($status as $data)  
                    <option value="{{ $data }}" {{ old("data", @$animal->status) == $data ? "selected" : "" }}>{{ $data }}</option>
                    @endforeach
                </select>

                @error('status')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="age" class="col-md-2 col-form-label text-md-start">{{ __('Edad') }}</label>
            
            <div class="col-md-10">
                <input pattern="([1-9]{1,2}) (mes|meses|año|años)" min="0" max="99" type="text" name="age" class="form-control" placeholder="00 mes|meses|año|años" value="{{ old('age') ?? @$animal->age}}">
                @error('age')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="gender" class="col-md-2 col-form-label text-md-start">{{ __('Sexo') }}</label>
            
            <div class="col-md-10">
                <select class="form-control" name="gender">
                    @foreach($gender as $data)  
                    <option value="{{ $data }}" {{ old("data", @$animal->gender) == $data ? "selected" : "" }}>{{ $data }}</option>
                    @endforeach
                </select>

                @error('gender')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="species" class="col-md-2 col-form-label text-md-start">{{ __('Especie') }}</label>
            
            <div class="col-md-10">
                <select class="form-control" name="species">
                    @foreach($species as $data)  
                    <option value="{{ $data }}" {{ old("data", @$animal->species) == $data ? "selected" : "" }}>{{ $data }}</option>
                    @endforeach
                </select>

                @error('species')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="size" class="col-md-2 col-form-label text-md-start">{{ __('Tamaño') }}</label>
            
            <div class="col-md-10">
                <select class="form-control" name="size">
                    @foreach($size as $data)  
                    <option value="{{ $data }}" {{ old("data", @$animal->size) == $data ? "selected" : "" }}>{{ $data }}</option>
                    @endforeach
                </select>

                @error('size')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="health" class="col-md-2 col-form-label text-md-start">{{ __('Estado de salud') }}</label>
    
            <div class="col-md-10">
                <textarea maxlength="255" type="health" name="health" class="form-control" placeholder="Estado de salud">{{ old('health') ?? @$animal->health}}</textarea>
                @error('health')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="personality" class="col-md-2 col-form-label text-md-start">{{ __('Personalidad') }}</label>
            
            <div class="col-md-10">
                <textarea maxlength="255" type="text" name="personality" class="form-control" placeholder="Personalidad">{{ old('personality') ?? @$animal->personality}}</textarea>
                @error('personality')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="description" class="col-md-2 col-form-label text-md-start">{{ __('Descripción') }}</label>
            
            <div class="col-md-10">
                <textarea maxlength="1000" type="text" name="description" class="form-control" placeholder="Descripción">{{ old('description') ?? @$animal->description}}</textarea>
                @error('description')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="image" class="col-md-2 col-form-label text-md-start">{{ __('Agregar imagen') }}</label>
            
            <div class="col-md-10">
                <input type="file" name="image" class="form-control"></input>
                @error('image')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        @if (isset($animal))
            <button type="submit" class="btn btn-warning">Editar solicitud</button>
        @else
            <button type="submit" class="btn btn-success">Guardar solicitud</button>
        @endif
            <a href="{{ route('animal.index') }}" class="btn btn-info">Volver</a>
    </form>

@endsection