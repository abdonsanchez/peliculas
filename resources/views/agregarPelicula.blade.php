@extends("plantilla")

@section("principal")

  <form class="" action="/agregarPelicula" method="post">
    {{-- dentro del formulario estamos obligados a escribir la funcion csrf_field() con agregar esta funcion dentro del formulario automaticamente en el html se esta agregando un campo de seguridad, sin esto el formulario no va a andar. --}}
    {{csrf_field()}}
    <div class="">
      <label for="title">Titulo</label>
      <input type="text" name="title" value="">
    </div>
    <div class="">
      <label for="rating">Rating</label>
      <input type="text" name="rating" value="">
    </div>
    <div class="">
      <label for="awards">Awards</label>
      <input type="text" name="awards" value="">
    </div>
    <div class="">
      <label for="release_date">Fecha de estreno</label>
      <input type="date" name="release_date" value="">
    </div>
    <div class="">
      <input type="submit" name="" value="Agregar pelicula">
    </div>
  </form>

@endsection
