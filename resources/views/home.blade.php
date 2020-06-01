@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
                <div id="map" style="height: 600px; width: 1000px"></div>

                <script>
                    var map;
                    var geo;

                    function initMap() {
                        geo = new google.maps.Geocoder();

                        let opt = {
                            lat: 38.0667,
                            lng: 38.0167
                        }
                        const mapOptions = {
                            center: opt,
                            scrollWeel: true,
                            zoom: 7
                        }

                        map = new google.maps.Map(document.getElementById("map"), mapOptions)

                                @foreach($markers as $key => $value)
                        var marker = new google.maps.Marker({
                                position: {
                                    lat: {{ $value->lat }},
                                    lng: {{ $value->lng }}
                                },
                                map: map,
                            });
                        var markerTitle = new google.maps.InfoWindow({
                            content: "{{ $value->id . ', '. $value->lat . ', ' . $value->lng }}"
                        });
                        marker.addListener('click', function () {
                            markerTitle.open(map, marker);
                        });
                        @endforeach
                    }
                </script>
                <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBAHD_HNx_yDBYIa3Xo1625trby7MP7a_M&callback=initMap" async defer></script>
        </div>
    </div>
@endsection
