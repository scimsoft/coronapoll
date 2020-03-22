@extends('layouts.app')

<h3>My Google Maps Demo</h3>
<!--The div element for the map -->
<div id="map"></div>
@section('scripts')
<script>
    function initMap() {
        // The location of Uluru
        var uluru = {lat: -25.344, lng: 131.036};
        // The map, centered at Uluru
        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 4, center: uluru});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: uluru, map: map});
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcj0RnwEZYQEmTP6wa6nUf769IDaoEGGI&callback=initMap">
</script>
@stop