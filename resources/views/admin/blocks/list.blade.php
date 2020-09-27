@extends('layouts.admin')

@section('content')

	@if(session('status'))
	<div class="alert alert-primary" role="alert">
		<div class="alert-text"> {{session('status')}}</div>
	</div>
	@endif
	<div class="card mb-4">
		<div class="card-header">
			Listado de Bloques
		</div>
		<div class="card-body">
            Los bloques son elementos genericos en la web como el menu o el footer.
			<div class="table-responsive">
              	<table class="table table-head-noborder">
  					<thead>
  						<tr>
						 	<th>#</th>
  							<th>Nombre</th>
							<th>Acción</th>
  						</tr>
  					</thead>
  					<tbody>
					@forelse ($blocks as $block)
					<tr>
                        <th scope="row">{{$block->id}}</th>
                        <td>{{$block->name}}</td>
                        <td>editar</td>
					</tr>
					@empty
                    <tr>
                        <td colspan="4" class="text-center"> No hay ningún bloque creado. </td>
                    </tr>
					@endforelse
					</tbody>
  				</table>
			</div>
			{{$blocks->links()}}
		</div>
	</div>

@endsection
