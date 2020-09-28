@extends('layouts.public')

@section('content')
<div class="container container-page">
    <h1 class="text-center">¿Donde hemos ido de campamento?</h1>
    <div id="map" style="width:100%; height:500px;"></div>
    <script>
    function initMap() {
        var iconBase = '/images/';
        var myLatLng = {lat: 44.9787965, lng: 3.4480448};

        var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 5,
        center: myLatLng
        });

        @foreach ($data as $item)
        var contentString{{$item->id}} = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">{{$item->name}}</h1>'+
            '<div id="bodyContent">'+
            '{!!$item->description!!}'+
            '<p><a href="{{ route('showCamp',$item->slug)}}">Más información aqui.</a> '+
            '({{$item->date}}).</p>'+
            '</div>'+
            '</div>';
        var infowindow{{$item->id}} = new google.maps.InfoWindow({
        content: contentString{{$item->id}}
        });
        var coord = {lat: {{$item->coorY}}, lng: {{$item->coorZ}}};
        var marker{{$item->id}} = new google.maps.Marker({
        position: coord,
        map: map,
        icon: iconBase + 'tents.png'
        });
        marker{{$item->id}}.addListener('click', function() {
        infowindow{{$item->id}}.open(map, marker{{$item->id}});
        });

        @endforeach
    }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVScC9YFG2I3Ww-I-V2Mty9iQ36x8ocN0&callback=initMap">
    </script>
</div>
@endsection
