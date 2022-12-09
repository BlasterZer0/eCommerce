@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Listado de animales</h1>
    <a href="{{ route('animal.create') }}" class="btn btn-primary">Crear solicitud</a>

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
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Raza</th>
                    <th>Tamaño</th>
                    <th>Estado de salud</th>
                    <th>Personalidad</th>
                    <th>Descripción</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($animals as $info)
                <tr>
                    <td> {{ $info->id }} </td>
                    <td><img src="{{ url('images/'.$info->image) }}" style="height: 100px; width: 100px;"></td>
                    <td> {{ $info->name }} </td>
                    <td> {{ $info->status }} </td>
                    <td> {{ $info->age }} </td>
                    <td> {{ $info->gender }} </td>
                    <td> {{ $info->species }} </td>
                    <td> {{ $info->size }} </td>
                    <td> {{ $info->health }} </td>
                    <td> {{ $info->personality }} </td>
                    <td> {{ $info->description }} </td>
                    <td>
                        <a href="{{ route('animal.edit', $info) }}" class="btn btn-warning">Editar</a>
                        
                        <form action="{{ route('animal.destroy', $info) }}" method="post" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Estás seguro de Eliminar este Cliente')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr >
                    <td colspan="15"> No hay registros </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

    {{ $animals->links() }}

</div>

@endsection