@extends('layouts.app')

@section('content')

<div class="container text-center">
    @if (isset($user))
        <h1>Editar Usuario</h1>
    @else
        <h1>Crear Usuario</h1>
    @endif

    @if (isset($user))
        <form action="{{ route('user.update', $user) }}" method="POST">
            @method('PUT')
    @else
        <form action="{{ route('user.store') }}" method="POST">
    @endif
        
        @csrf

        <div class="row mb-3">
            <label for="name" class="col-md-2 col-form-label text-md-start">{{ __('Nombre') }}</label>
            
            <div class="col-md-10">
                <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ old('name') ?? @$user->name}}">

                @error('name')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="lastname" class="col-md-2 col-form-label text-md-start">{{ __('Apellido') }}</label>
            
            <div class="col-md-10">
                <input type="text" name="lastname" class="form-control" placeholder="Apellido" value="{{ old('lastname') ?? @$user->lastname}}">

                @error('lastname')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="document" class="col-md-2 col-form-label text-md-start">{{ __('Cédula') }}</label>
            
            <div class="col-md-10">
                <input type="text" name="document" class="form-control" placeholder="Cédula" value="{{ old('document') ?? @$user->document}}">

                @error('document')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="phone" class="col-md-2 col-form-label text-md-start">{{ __('Teléfono') }}</label>
            
            <div class="col-md-10">
                <input type="tel" name="phone" class="form-control" placeholder="Teléfono" value="{{ old('phone') ?? @$user->phone}}">
                <!--
                <input type="tel" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" name="phone" class="form-control" placeholder="Teléfono" value="{{ old('phone') ?? @$user->phone}}">
                <small>Formato: 0000-000-0000</small>
                -->
                @error('phone')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="rol" class="col-md-2 col-form-label text-md-start">{{ __('Rol') }}</label>
            
            <div class="col-md-10">
                <select name="rol" class="form-control" value="{{ old('rol') ?? @$user->rol}}">
                    @if (isset($user))
                        @if (@$user->activo == 'admin')
                            <option value="Administrador" selected>Administrador</option>
                            <option value="Usuario">Usuario</option>
                        @else
                            <option value="Administrador" selected>Administrador</option>
                            <option value="Usuario">Usuario</option>
                        @endif
                    @else
                        <option value="Administrador" selected>Administrador</option>
                        <option value="Usuario">Usuario</option>
                    @endif
                </select>

                @error('rol')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-md-2 col-form-label text-md-start">{{ __('Email') }}</label>
            
            <div class="col-md-10">
                <input type="email" name="email" class="form-control" placeholder="Correo electrónico" value="{{ old('email') ?? @$user->email}}">

                @error('email')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        @if (isset($user))
            <button type="submit" class="btn btn-warning">Editar usuario</button>
        @else
            <button type="submit" class="btn btn-success">Guardar usuario</button>
        @endif
            <a href="{{ route('user.index') }}" class="btn btn-info">Volver</a>
    </form>

@endsection