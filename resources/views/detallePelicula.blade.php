@extends ("plantilla")

@section ("titulo")
Detalle Peliculas
@endsection
@section ("principal")
    <!-- <h1>Usted eligio la pelicula <?=$id ?></h1> -->
    <!-- sintaxis blade -->
    <h1>Usted eligio la pelicula {{$id}}</h1>

@endsection
