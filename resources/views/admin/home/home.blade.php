@extends('layouts.admin')

@section('content')

@if(session('status'))
  <div class="alert alert-primary" role="alert">
    <div class="alert-text"> {{session('status')}}</div>
  </div>
  @endif
  <div class="card mb-4">
    <div class="card-header">
      Bienvenid@
    </div>
    <div class="card-body">
      Desde el administrador podras editar la mayoria de paginas de la web.

      Enjoy :)
    </div>
  </div>
@endsection