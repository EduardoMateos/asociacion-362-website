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
                <button type="button" data-toggle="modal" class="btn btn-danger delete-doc">Eliminar</a>
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

@section('js_custom')
<script>
  $(".delete-doc").click(function() {
    Swal.fire({
      title: '¿Estas seguro?',
      text: 'El documento no se podra recuperar',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, eliminalo.',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.value) {
        Swal.fire(
          'Deleted!',
          'Your imaginary file has been deleted.',
          'success'
        )
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire(
          'Cancelled',
          'Your imaginary file is safe :)',
          'error'
        )
      }
    })
  });

</script>
@endsection