@extends('layouts.public')

@section('content')
<div class="container container-page">
    <div class="text-center">
        <h1>{{$data->name}}</h1>
    </div>
    {!!$data->content!!}
</div>
@endsection
