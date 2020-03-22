@extends('layouts.app')


@section('title', 'Welcome')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header font-weight-bold">@lang('views.personal_data_anonymous')</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <p class="h5"> @lang('views.personal_data_intro')</p>

                            <p class="h6"><strong>1.</strong> @lang('views.personal_data_warning')</p>

                            <p class="h6"><strong>2</strong> @lang('views.personal_data_statitics')</p>

                            <p class="h6"><strong>3</strong> @lang('views.personal_data_location')</p>

                            <p class="h6">
                                <button type="button" class="btn btn-success center"
                                        onclick="showPosition();">    @lang('views.personal_data_buttom')</button>
                            </p>
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-header font-weight-bold">@lang('views.personal_data_header')</div>
                    <br>
                    <form method="post" action="/userdata" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="titleid" class="col-sm-5 col-form-label">@lang('views.age')</label>
                            <div class="">
                                <input name="age" type="text" class="form-control" id="titleid" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="titleid" class="col-sm-5 col-form-label">@lang('views.riskgroup')</label>
                            <div class="dropdown">
                                <button name='riskgroup' class="btn btn-secondary dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @lang('views.make_a_choice')
                                </button>
                                <div class="dropdown-menu col-sm-9" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">@lang('views.lowrisk')</a>
                                    <a class="dropdown-item" href="#">@lang('views.mediumrisk')</a>
                                    <a class="dropdown-item" href="#">@lang('views.highrisk')</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="releasedateid" class="col-sm-5 col-form-label">@lang('views.confirmed')</label>
                            <div class="col-sm-1">
                                <input name="confirmed" type="checkbox" class="form-control" id="confirmed" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-primary">@lang('views.checkindata')</button>
                            </div>
                        </div>
                    </form>

                    <div class="card-body">
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        function showPosition() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var positionInfo = "Your current position is (" + "Latitude: " + position.coords.latitude + ", " + "Longitude: " + position.coords.longitude + ")";
                    alert(positionInfo);
                });
            } else {
                alert("Sorry, your browser does not support HTML5 geolocation.");
            }
        }
    </script>
@stop