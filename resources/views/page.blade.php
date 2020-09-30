@extends('layouts.public')

@section('content')
<div class="container container-page">
    <div class="text-center">
        <h1>{{$page->name}}</h1>
    </div>
    {!!$page->content!!}
</div>
@endsection
