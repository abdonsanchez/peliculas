@extends ("plantilla")

@section ("titulo")
Listado Peliculas
@endsection
@section ("principal")
    <h1>Mis peliculas</h1>
    <ul>
      <!-- sintaxis blade para estructuras de control -->
      <!-- forelse remplaza al "foreach" validando que haya contenido
      en el array, siempre acompaniado de la clausula empty -->
      @forelse ($peliculas as $pelicula)
        <li>
          <p>{{$pelicula["nombre"] }}</p>
          @if($pelicula["rating"] > 7)
          <p>{{ "Exelente" }}</p>
          @else{{"pasable"}}
          @endif
        </li>
        @empty
        <p>No hay peliculas</p>
      @endforelse
    </ul>
@endsection
