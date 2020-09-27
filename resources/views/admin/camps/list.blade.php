@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Campateca</div>

                <div class="panel-body">
                  <a href="{{ route('admin.camps.add')}}" class="btn btn-success">Añadir Campamento</a>

                  <div id="no-more-tables" style="padding-top:20px">
                      <table class="col-md-12 table-bordered table-striped table-condensed cf">
                      <thead class="cf">
                        <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Acción</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $item)
                        <tr>
                          <td data-title="ID">{{ $item->id }}</td>
                          <td data-title="Nombre">{{ $item->name }}</td>
                          <td data-title="Acción">
                            <a href="{{ route('admin.camps.edit',$item->id) }}" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <button onclick="changeLink({{ $item->id }})" type="button" data-toggle="modal" data-target="#myModal" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
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

    <!-- Modal content-->
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