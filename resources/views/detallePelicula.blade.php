@extends ("plantilla")

@section ("titulo")
Detalle Peliculas
@endsection
@section ("principal")
    <!-- <h1>Usted eligio la pelicula <sacorojo?=$id ?></h1> -->
    <!-- sintaxis blade -->
    <h1>Usted eligio la pelicula "{{$pelicula->title}}"</h1>

@endsection
