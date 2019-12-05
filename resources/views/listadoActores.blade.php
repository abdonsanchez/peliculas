@extends ("plantilla")

@section ("titulo")
Listado de Actores
@endsection
@section ("principal")
    <h1>Mis actores</h1>
    <ul>
      @forelse ($actores as $actor)
        <li>
          {{-- {{$actor->first_name}} {{$actor->last_name}} --}}
          {{$actor->getNombreCompleto()}}
        </li>
        @empty
        <p>No hay actores</p>
      @endforelse
    </ul>
@endsection
