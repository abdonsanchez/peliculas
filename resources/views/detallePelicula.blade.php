@extends ("plantilla")

@section ("titulo")
Detalle Peliculas
@endsection
@section ("principal")
    <!-- <h1>Usted eligio la pelicula <sacorojo?=$id ?></h1> -->
    <!-- sintaxis blade -->
    <h1>Usted eligio la pelicula "{{$pelicula->title}}"</h1>

    {{-- en la consola ejecutamos el comando php artisan storage:link, para que nos cree en public la carpeta storage donde hace una copia de las imagenes --}}
    <div class="">
      {{-- traemos la foto de la siguiente manera: en el atributo src escribimos "/storage/{{$pelicula->poster}}" --}}
      <img src="/storage/{{$pelicula->poster}}" alt="">
    </div>

    <form class="" action="/borrarPelicula" method="post">
      {{csrf_field()}}
      <input type="hidden" name="id" value="{{$pelicula->id}}">
      <input type="submit" name="" value="Borrar Pelicula">
    </form>

@endsection
