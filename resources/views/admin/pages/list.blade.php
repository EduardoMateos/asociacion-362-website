@extends('layouts.admin')

@section('content')

	@if(session('status'))
	<div class="alert alert-primary" role="alert">
		<div class="alert-text"> {{session('status')}}</div>
	</div>
	@endif
	<div class="card mb-4">
		<div class="card-header">
			Listado de Paginas
		</div>
		<div class="card-body">
			<div class="table-responsive">
              	<table class="table table-head-noborder">
  					<thead>
  						<tr>
						 	<th>#</th>
  							<th>Titulo</th>
  							<th>Url</th>
							<th>Acción</th>
  						</tr>
  					</thead>
  					<tbody>
					@forelse ($pages as $page)
					<tr>
                        <th scope="row">{{$page->id}}</th>
                        <td>{{$page->name}}</td>
                        <td><a href="{{ route('showpage', $page->slug) }}" target="_blank">{{$page->slug}}</a></td>
                        <td><a href="{{ route('admin.pages.edit',$page->id) }}" class="btn btn-info">Editar</a></td>
					</tr>
					@empty
                    <tr>
                        <td colspan="4" class="text-center"> No hay ninguna pagina creada </td>
                    </tr>
					@endforelse
					</tbody>
  				</table>
			</div>
			{{$pages->links()}}
		</div>
	</div>

@endsection
