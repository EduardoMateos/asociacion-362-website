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
                <button onclick="changeLink({{ $item->id }})" type="button" data-toggle="modal" data-target="#myModal" class="btn btn-danger">Eliminar</a>
              </td>
            </tr>
            @empty
              <tr>
                  <td colspan="4" class="text-center"> No hay ningún bloque creado. </td>
              </tr>
            @endforelse
            </tbody>
          </table>
        </div>
    </div>
  </div>


<script type="text/javascript">
function changeLink(id) {
  document.getElementById('buttonDelete').href= "/admin/campa/delete/" + id
}
</script>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Borrar</h4>
      </div>
      <div class="modal-body">
        <p>¿Estas seguro que deseas eliminarlo?</p>
      </div>
      <div class="modal-footer">
        <a href="" id="buttonDelete" type="button" class="btn btn-danger">Borrar</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

@endsection