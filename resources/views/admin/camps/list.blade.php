@extends('layouts.admin')

@section('content')

@if(session('status'))
  <div class="alert alert-primary" role="alert">
    <div class="alert-text"> {{session('status')}}</div>
  </div>
  @endif
  <div class="card mb-4">
    <div class="card-header">
      Campateca
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-head-noborder">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($data as $item)
            <tr>
              <td data-title="ID">{{ $item->id }}</td>
              <td data-title="Nombre">{{ $item->name }}</td>
              <td data-title="Acción">
                <a href="{{ route('admin.camps.edit',$item->id) }}" class="btn btn-info">Editar</a>
                <button type="button" data-id="{{ $item->id }}" class="btn btn-danger delete-camp">Eliminar</a>
              </td>
            </tr>
            @empty
              <tr>
                  <td colspan="4" class="text-center"> No hay ningún campamento creado. </td>
              </tr>
            @endforelse
            </tbody>
          </table>
        </div>
    </div>
  </div>

@endsection