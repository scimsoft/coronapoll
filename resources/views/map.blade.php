@extends('layouts.app')
@section('content')

<!--The div element for the map -->

<div id="map"></div>
<input type="hidden" id="casefilter" value="3">
<br>
@guest
<div class="card">
<div class="card-body">
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <p class="h5"> @lang('views.guestwelcomename')</p>

        @lang('views.guestwelcometext')</p>


    </div>

</div>
</div>
@endguest
@if (Auth::check())

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

@endif
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="images/icons/icon-36x36.png">
                <h5 class="modal-title" id="exampleModalLongTitle"><span>    </span>@lang('views.modeltitle')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @lang('views.modaltext')
            </div>
            <div class="modal-footer">
                <a type="button" href="/login"  class="btn btn-primary " >Login</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="map.setZoom({{$maxzoomlevel}});">Close</button>

            </div>
        </div>
    </div>
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
                zoom: {{$zoomlevel}},
                    center: uluru,
                mapTypeId: 'satellite'});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: uluru, map: map});

        google.maps.event.addListener(map, 'zoom_changed', function() {
            if (map.getZoom() > {{$maxzoomlevel}}) {

                $('#myModal').modal('show');

            }

        });



        initHeatMap();


    }

    function initHeatMap(){


        var mydatapoints = [];
        mydatapoints = @json($dataPoints);
        $mycasefilter=(document.getElementById('casefilter').value);
        var heatMapData = [];
        for (i = 0; i < mydatapoints.length; i++) {
            var tempLat = mydatapoints[i][1];  // was [0]
            var tempLong = mydatapoints[i][0];
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
