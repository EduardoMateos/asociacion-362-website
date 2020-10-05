@extends('layouts.admin')

@section('content')

	@if(session('status'))
	<div class="alert alert-primary" role="alert">
		<div class="alert-text"> {{session('status')}}</div>
	</div>
	@endif
	<div class="card mb-4">
		<div class="card-header">
			Editar pagina #{{$data->id}}
		</div>
		<div class="card-body">

        <form class="mt-2" action="{{route('admin.pages.store', $data->id)}}" method="POST">
        @csrf
            <div class="form-group">
            <label for="name">Titulo de la pagina</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ old('name', $data->name) }}">
            </div>


            <div class="form-group">
            <label for="slug">Slug URL</label>
            <input type="text" class="form-control" id="slug" name="slug" required value="{{ old('slug', $data->slug) }}">
            </div>
            

            <div class="form-group">
            <label for="content">Contenido de la pagina</label>
            <textarea class="content" name="content">{{ old('content', $data->content)  }}</textarea>
            </div>

            <div class="text-center">
            <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
        <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
        <script>
            tinymce.init({
                selector:'textarea.content',
                plugins: [
                    'image imagetools',
                    'code'
                ],
                toolbar1: 'styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code',
                width: '100%',
                height: 600
            });
        </script>

		</div>
	</div>

@endsection
