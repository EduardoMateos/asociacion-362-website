@extends('layouts.admin')

@section('content')
<div class="container">
    <a href="{{ route('admin.pages.add') }}" class="btn btn-primary">Añadir pagina</a>
    Listado de publicaciones
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
            </tr>
        </thead>
        @forelse ($pages as $page)
        <tbody>
            <tr>
            <th scope="row">{{$page->id}}</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
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
