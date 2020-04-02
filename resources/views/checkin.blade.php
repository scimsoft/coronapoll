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

                <div class="card " >
                    <div class="card-header font-weight-bold " >@lang('views.personal_data_header')</div>
                    <div class="card-body">
                    <form method="post" action="/updateuserdata" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="titleid" class="col-sm-5 col-form-label">@lang('views.age')</label>
                            <div class="">
                                <input name="age" type="text" class="form-control col-sm-5 " id="titleid" placeholder="">
                                <span class="text-danger">{{ $errors->first('age') }}</span>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="titleid" class="col-sm-5 col-form-label">@lang('views.riskgroup')</label>
                            <div class="btn-group" data-toggle="buttons">

                                <label class="btn btn-success center form-check-label " >
                                    <input class="form-check-input" type="radio" name="riskgroup" id="option1"
                                           autocomplete="off" value="1">
                                    @lang('diagnosis.none')
                                </label>
                                <label class="btn btn-warning center form-check-label" >
                                    <input class="form-check-input" type="radio" name="riskgroup" id="option2"
                                           autocomplete="off" value="2"> @lang('diagnosis.alittle')
                                </label>
                                <label class="btn btn-danger center form-check-label" >
                                    <input class="form-check-input" type="radio" name="riskgroup" id="option3"
                                           autocomplete="off" value="3"> @lang('diagnosis.alot')
                                </label>

                            </div>
                            <span class="col-sm-5 col-form-label"></span>
                            <span class="text-danger">{{ $errors->first('riskgroup') }}</span>
                        </div>
                        {{--<div class="form-group row">--}}
                            {{--<label for="releasedateid" class="col-sm-5 col-form-label">@lang('views.confirmed')</label>--}}
                            {{--<div class="col-sm-1">--}}
                                {{--<input name="confirmed" type="checkbox" class="form-control" id="confirmed" >--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <!-- Default switch -->
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitches" name="confirmed">
                            <label class="custom-control-label" for="customSwitches">@lang('views.confirmed')</label>
                        </div>
<br>
                        <div class="form-group row ">
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-primary">@lang('views.checkindata')</button>
                            </div>
                        </div>
                    </form>


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