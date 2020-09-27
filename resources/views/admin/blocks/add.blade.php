@extends('layouts.admin')

@section('content')

	@if(session('status'))
	<div class="alert alert-primary" role="alert">
		<div class="alert-text"> {{session('status')}}</div>
	</div>
	@endif
	<div class="card mb-4">
		<div class="card-header">
			Añadir Bloque
		</div>
		<div class="card-body">

            <form class="mt-2" action="{{route('admin.blocks.store')}}" method="POST">
            @csrf
                <div class="form-group">
                <label for="name">Nombre interno identificativo</label>
                <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group">
                <label for="content">Contenido del bloque</label>
                <textarea class="content" name="content"></textarea>
                </div>

                <div class="text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>

		</div>
	</div>

@endsection
