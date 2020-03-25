@extends('layouts.app')
@section('content')

<!--The div element for the map -->
<div id="map"></div>
<input type="hidden" id="casefilter" value="2">
<br>
<div class="btn-group" data-toggle="buttons">

    <label class="btn btn-outline-success center form-check-label" >
        <input class="form-check-input" type="radio" name="muscle" id="option1"
               autocomplete="off" value="1" onclick="setFilterValue(1);">
        @lang('views.lowrisk')
    </label>
    <label class="btn btn-outline-warning center form-check-label" >
        <input class="form-check-input" type="radio" name="muscle" id="option2"
               autocomplete="off" value="2" onclick="setFilterValue(2);"> @lang('views.mediumrisk')
    </label>
    <label class="btn btn-outline-danger center form-check-label" >
        <input class="form-check-input" type="radio" name="muscle" id="option3"
               autocomplete="off" value="3"onclick="setFilterValue(3);"> @lang('views.highrisk')
    </label>
</div>
@endsection
@section('scripts')
<script>
    var map;
    var heatmap ;
    function initMap() {

        // The location of Uluru
        var uluru = {lat: {{$latitude}}, lng: {{$longitude}}};
        // The map, centered at Uluru
        map = new google.maps.Map(
            document.getElementById('map'), {
                zoom: 17,
                center: uluru,
                mapTypeId: 'satellite'});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: uluru, map: map});
        initHeatMap();


    }
    function initHeatMap(){


        var mydatapoints = [];
        mydatapoints = @json($dataPoints);
        $mycasefilter=(document.getElementById('casefilter').value);
        var heatMapData = [];
        for (i = 0; i < mydatapoints.length; i++) {
            var tempLat = mydatapoints[i][0];  // was [0]
            var tempLong = mydatapoints[i][1];
            var mystage= mydatapoints[i][2];
            var tempVar = new google.maps.LatLng(tempLat, tempLong);
            if(mystage == $mycasefilter) {
                heatMapData.push(new google.maps.LatLng(tempLat, tempLong, mystage));
            }
        }
        heatmap = new google.maps.visualization.HeatmapLayer({
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
    function setFilterValue(myvalue){
        heatmap.setMap(null)
        document.getElementById('casefilter').value = myvalue;
        initHeatMap();
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key={{ config('app.googlekey') }}&callback=initMap&libraries=visualization">
</script>
@stop
