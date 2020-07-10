@extends('layouts.public')

@section('content')
<div class="container-page">
    <h1>{{$page->name}}</h1>
    {!!$page->content!!}
</div>
@endsection
