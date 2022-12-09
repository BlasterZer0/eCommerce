@extends('layouts.app')

@section('content')
<div class="container text-center">
  <h1>Conoce sus historias y adopta</h1>

  <!--Main layout-->
  <main class="my-5">
    <div class="container">
      <!--Section: Content-->
      <section class="text-center">
        <div class="row">
          @forelse ($animals as $info)
          <div class="col-lg-3 col-md-12 mb-4">
            <div class="card">
              <div class="bg-image">
                <!--style="width: 18rem;"-->
                <img src="{{ url('images/'.$info->image) }}" style="height: 300px; width: 300px;" class="img-fluid img-thumbnail" />
              </div>
              <div class="card-body">
                <h5 class="card-title">{{ $info->name }}</h5>
                <a href="{{ route('info', $info->id) }}" class="btn btn-primary">Más información</a>
              </div>
            </div>
          </div>
            @empty
            <tr >
              <td colspan="15"> No hay registros </td>
            </tr>
            @endforelse
        </div>
        {{ $animals->links() }}
      </section>
    </div>
  </main>
  <!--Main layout-->
</div>
@endsection