@extends('layouts.admin')

@section('content')


  @if(session('status'))
  <div class="alert alert-primary" role="alert">
    <div class="alert-text"> {{session('status')}}</div>
  </div>
  @endif
  <div class="card mb-4">
    <div class="card-header">
      Añadir campamento a la Campateca
    </div>
    <div class="card-body">

    @if(count($errors))
    <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.
      <br/>
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('admin.camps.store',$data->id)}}">
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
        <textarea name="content" cols="30" rows="10" class="form-control">{{ old('contenido', $data->contenido)}}</textarea>
        <span class="text-danger">{{ $errors->first('contenido') }}</span>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-success">Enviar</button>
      </div>
    </form>
    </div>
  </div>

<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        height: 600,
        width: '100%',
        plugins: [
            'image imagetools',
            'code'
        ],
        toolbar1: 'styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code',
        file_picker_types: 'image',
        images_upload_handler: function (blobInfo, success, failure) {
          var xhr, formData;

          xhr = new XMLHttpRequest();
          xhr.withCredentials = false;
          xhr.open('POST', '/admin/camps/image');

          xhr.onload = function() {
              var json;

              if (xhr.status != 200) {
                  failure('HTTP Error: ' + xhr.status);
                  return;
              }

              json = JSON.parse(xhr.responseText);

              if (!json || typeof json.location != 'string') {
                  failure('Invalid JSON: ' + xhr.responseText);
                  return;
              }

              success(json.location);
          };

          formData = new FormData();
          formData.append('file', blobInfo.blob(), blobInfo.filename());
          formData.append('_token', "{{ csrf_token() }}");

          xhr.send(formData);
        }
    

    });
</script>

@endsection
