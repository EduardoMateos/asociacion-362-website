@extends('layouts.admin')

@section('content')

@if(session('status'))
  <div class="alert alert-primary" role="alert">
    <div class="alert-text"> {{session('status')}}</div>
  </div>
  @endif
  <div class="card mb-4">
    <div class="card-header">
      Documentación adjunta
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-head-noborder">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre del documento</th>
              <th>Ubicación</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($docs as $item)
            <tr>
              <td data-title="ID">{{ $item->id }}</td>
              <td data-title="Nombre">{{ $item->name }}</td>
              <td data-title="Ubicación">{{ $item->slug }}</td>
              <td data-title="Acción">
                <button type="button" data-toggle="modal" class="btn btn-danger delete-doc" data-id="{{ $item->id }}">Eliminar</a>
              </td>
            </tr>
            @empty
              <tr>
                  <td colspan="4" class="text-center"> No hay ningún documento adjunto. </td>
              </tr>
            @endforelse
            </tbody>
          </table>
        </div>
    </div>
  </div>


@endsection
