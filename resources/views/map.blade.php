@extends('layouts.app')
@section('content')

<!--The div element for the map -->
<div id="map"></div>
@endsection
@section('scripts')
<script>
    function initMap() {

        // The location of Uluru
        var uluru = {lat: {{$latitude}}, lng: {{$longitude}}};
        // The map, centered at Uluru
        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 17, center: uluru});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: uluru, map: map});
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&callback=initMap">
</script>
@stop
{{ env('APP_NAME') }}