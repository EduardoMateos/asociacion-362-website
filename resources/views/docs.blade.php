@extends('layouts.public')

@section('content')
<div class="container container-page">
    <h1 class="text-center">Documentación</h1>
    Aquí podras encontrar toda la documentación necesaria a rellenar.
    <table class="table mt-2">
    <tbody>
        @forelse ($docs as $key=>$doc)
        <tr>
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
