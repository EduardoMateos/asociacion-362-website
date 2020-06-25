@extends('layouts.admin')

@section('content')
<div class="container">
    <a href="{{ route('admin.pages.add') }}" class="btn btn-primary">Añadir pagina</a>
    <div class="text-center p-4">
    <h1>Listado de paginas</h1>
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Titulo</th>
            <th scope="col">Url</th>
            <th scope="col"></th>
            </tr>
        </thead>
        @forelse ($pages as $page)
        <tbody>
            <tr>
            <th scope="row">{{$page->id}}</th>
            <td>{{$page->name}}</td>
            <td>{{$page->slug}}</td>
            <td>editar</td>
            </tr>
        </tbody>
        @empty
        <tbody>
            <tr>
                <td colspan="4" class="text-center"> No hay ninguna pagina creada </td>
            </tr>
        </tbody>
        @endforelse
    </table>
</div>
@endsection
