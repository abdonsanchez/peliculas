@extends("plantilla")

@section("principal")

  <ul class="errores" style="color:red">
    {{-- laravel nos da la variable $errors->all() que nos trae los errores que se hallan generado en el formulario --}}
    @foreach ($errors->all() as $error)
      <li>
        {{$error}}
      </li>
    @endforeach
  </ul>

  <form class="" action="/agregarPelicula" method="post">
    {{-- dentro del formulario estamos obligados a escribir la funcion csrf_field() con agregar esta funcion dentro del formulario automaticamente en el html se esta agregando un campo de seguridad, sin esto el formulario no va a andar. --}}
    {{csrf_field()}}
    <div class="">
      <label for="title">Titulo</label>
      {{-- laravel nos da la funcion old() para que no se pierdan los campos ya completados --}}
      <input type="text" name="title" value="{{old("title")}}">
    </div>
    <div class="">
      <label for="rating">Rating</label>
      <input type="text" name="rating" value="{{old("rating")}}">
    </div>
    <div class="">
      <label for="awards">Awards</label>
      <input type="text" name="awards" value="{{old("awards")}}">
    </div>
    <div class="">
      <label for="release_date">Fecha de estreno</label>
      <input type="date" name="release_date" value="{{old("release_date")}}">
    </div>
    <div class="">
      <input type="submit" name="" value="Agregar pelicula">
    </div>
  </form>

@endsection
