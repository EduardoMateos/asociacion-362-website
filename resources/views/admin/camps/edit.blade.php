@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Añadir campamento a la Campateca</div>

                <div class="panel-body">
                  <form method="POST" action="{{ route('storeeditcampa',$data->id)}}">
                     {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                      <label>Nombre</label>
                      <input type="text" name="name" class="form-control" value="{{ old('name', $data->name) }}">
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                      <label>Año:</label>
                      <input type="text" id="datepicker" name="date" class="form-control" value="{{ old('date', $data->date) }}">
                      <span class="text-danger">{{ $errors->first('date') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                      <label>URL: (Si por ejemplo pones "Zelhof" a este campamento se accedera a traves de la URL: "www.scouts362.es/campamentos/zellhof")</label>
                      <input type="text" name="slug" class="form-control" value="{{ old('slug', $data->slug) }}">
                      <span class="text-danger">{{ $errors->first('slug') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('coorY') ? 'has-error' : '' }}">
                      <label>Coordenada Latitud del sitio:</label>
                      <input type="text" name="coorY" class="form-control" value="{{ old('coorY', $data->coorY) }}">
                      <span class="text-danger">{{ $errors->first('coorY') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('coorZ') ? 'has-error' : '' }}">
                      <label>Coordenada Longitud del sitio:</label>
                      <input type="text" name="coorZ" class="form-control" value="{{ old('coorZ', $data->coorZ) }}">
                      <span class="text-danger">{{ $errors->first('coorZ') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                      <label>Descripción corta (menos de 255 caracteres)</label>
                      <input type="text" name="description" class="form-control" value="{{ old('description', $data->description) }}">
                      <span class="text-danger">{{ $errors->first('description') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('contenido') ? 'has-error' : '' }}">
                      <label>Contenido largo</label>
                      <textarea name="contenido" cols="30" rows="10" class="form-control">{{ old('contenido', $data->contenido)}}</textarea>
                      <span class="text-danger">{{ $errors->first('contenido') }}</span>
                    </div>
                    <div align="center">
                     <button type="submit" class="btn btn-success">Enviar</button>
                   </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('mceImageUpload::upload_form')

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
$().ready(function () {
tinymce.init({
    selector: 'textarea',
    height: 300,
    theme: 'modern',
    plugins: [
        'image imagetools'
    ],
    toolbar1: 'styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    relative_urls: false,
    file_browser_callback: function(field_name, url, type, win) {
        // trigger file upload form
        if (type == 'image') $('#formUpload input').click();
    }
});

});
</script>
@endsection
