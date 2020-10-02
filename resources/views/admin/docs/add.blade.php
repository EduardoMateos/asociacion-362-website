@extends('layouts.admin')

@section('content')

@if(session('status'))
  <div class="alert alert-primary" role="alert">
    <div class="alert-text"> {{session('status')}}</div>
  </div>
  @endif
  <div class="card mb-4">
    <div class="card-header">
      Añadir Documentación
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.docs.store')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label>Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>
            <div class="form-group {{ $errors->has('doc') ? 'has-error' : '' }}">
                <label for="doc">Documento</label>
                <input type="file" class="form-control-file" name="doc" id="doc">
                <span class="text-danger">{{ $errors->first('doc') }}</span>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </form>
    </div>
  </div>


@endsection