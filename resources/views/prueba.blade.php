@extends ("plantilla")

@section ("titulo")
Listado de Pruebas
@endsection
@section ("principal")
    <h1>Mis actores</h1>
    <ul>
      @forelse ($actores as $actor)
        <li>
          {{-- {{$actor->first_name}} {{$actor->last_name}} --}}
          {{$actor->puteada}} {{$puteadita}}
        </li>
        @empty
        <p>No hay actores</p>
      @endforelse
    </ul>
    esto es: <?= $actores[53]["first_name"]?>
    {{-- con el metodo link agregamos la navegacion entre paginas (los hipervinculos) y solo esta disponible si trajimos estos actores atra vez del metodo paginate, por el contrario no va a funcionar si lo hicimos atravez del metodo all. --}}
    {{-- {{$actores->links()}} --}}
@endsection
