@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Listado de usuarios</h1>
    <a href="{{ route('user.create') }}" class="btn btn-primary">Crear usuario</a>

    @if (Session::has('mensaje'))
        <div class="alert alert-info my-5">
            {{ Session::get('mensaje') }}
        </div>
    @endif
    
    <div class="py-3">
        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cédula</th>
                    <th>Teléfono</th>
                    <th>Rol</th>
                    <th>Email</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $info)
                <tr>
                    <td> {{ $info->id }} </td>
                    <td> {{ $info->name }} </td>
                    <td> {{ $info->lastname }} </td>
                    <td> {{ $info->document }} </td>
                    <td> {{ $info->phone }} </td>
                    <td> {{ $info->rol }} </td>
                    <td> {{ $info->email }} </td>
                    <td>
                        <a href="{{ route('user.edit', $info) }}" class="btn btn-warning">Editar</a>
                        
                        <form action="{{ route('user.destroy', $info) }}" method="post" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Estás seguro de Eliminar este Cliente')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3"> No hay registros </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

    {{$users->links()}}

</div>

@endsection