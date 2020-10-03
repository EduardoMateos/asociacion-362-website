@extends('layouts.public')

@section('content')
<div class="container container-page">
    <h1 class="text-center">Documentación</h1>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descarga</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($docs as $key=>$doc)
        <tr>
            <th scope="row">{{ $key }}</th>
            <td>{{ $doc->name }}</td>
            <td>
                <a href="/storage/docs/{{ $doc->slug }}" target="_blank" class="btn btn-success">
                    <i class="fas fa-cloud-download-alt"></i>
                </a>
            </td>
        </tr>
        @empty

        @endforelse
    </tbody>
    </table>
</div>
@endsection
