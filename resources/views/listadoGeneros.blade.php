@extends('plantilla')

@section("principal")

  <h1>Generos</h1>

  <ul>
    @foreach($generos as $genero)
      <li>
        {{$genero->name}}

      Peliculas:
      <ul>
        @foreach($genero->peliculas as $pelicula)
          <li>
            {{$pelicula->title}}
          </li>
        @endforeach
      </ul>
    </li>
    @endforeach
  </ul>
@endsection
