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
            document.getElementById('map'), {
                zoom: 17,
                center: uluru,
                mapTypeId: 'satellite'});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: uluru, map: map});

        $mydatapoints = @json($dataPoints);
        var heatMapData = [];
        for (i = 0; i < $mydatapoints.length; i++) {
            var tempLat = $mydatapoints[i][0];  // was [0]
            var tempLong = $mydatapoints[i][1]; // was [1]
            var tempVar = new google.maps.LatLng(tempLat, tempLong);
            heatMapData.push(new google.maps.LatLng(tempLat, tempLong));
        }
        var heatmap = new google.maps.visualization.HeatmapLayer({
            data: heatMapData
        });
        var gradient = [
            'rgba(0, 255, 255, 0)',
            'rgba(0, 255, 255, 1)',
            'rgba(0, 191, 255, 1)',
            'rgba(0, 127, 255, 1)',
            'rgba(0, 63, 255, 1)',
            'rgba(0, 0, 255, 1)',
            'rgba(0, 0, 223, 1)',
            'rgba(0, 0, 191, 1)',
            'rgba(0, 0, 159, 1)',
            'rgba(0, 0, 127, 1)',
            'rgba(63, 0, 91, 1)',
            'rgba(127, 0, 63, 1)',
            'rgba(191, 0, 31, 1)',
            'rgba(255, 0, 0, 1)'
        ]
        heatmap.set('gradient', heatmap.get('gradient') ? null : gradient);
        heatmap.set('radius', heatmap.get('radius') ? null : 20);
        heatmap.setMap(map);

    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key={{ config('app.googlekey') }}&callback=initMap&libraries=visualization">
</script>
@stop
