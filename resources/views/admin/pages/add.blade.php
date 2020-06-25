@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="text-center">
     <h2>Añadir publicación</h2>
    </div>
    <form class="mt-2" action="{{route('admin.pages.store')}}" method="POST">
    @csrf
      <div class="form-group">
        <label for="name">Titulo de la pagina</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>


      <div class="form-group">
        <label for="slug">Slug URL</label>
        <input type="text" class="form-control" id="slug" name="slug" required>
      </div>
      

      <div class="form-group">
        <label for="content">Contenido de la pagina</label>
        <textarea class="content" name="content"></textarea>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
    </form>
      
      
    <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
    <script>
        tinymce.init({
            selector:'textarea.content',
            width: 900,
            height: 300
        });
    </script>
</div>
@endsection
