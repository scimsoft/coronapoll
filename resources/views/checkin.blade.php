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

                            </p>
                        </div>

                    </div>
                </div>

                <div class="card " >
                    <div class="card-header font-weight-bold " >@lang('views.personal_data_header')</div>
                    <div class="card-body">
                    <form id='checkindataform' method="post" action="/updateuserdata" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="titleid" class="col-sm-5 col-form-label">@lang('views.agegroup')</label>
                            <div class="btn-group" data-toggle="buttons">

                                <label class="btn btn-outline-info center form-check-label " >
                                    <input class="form-check-input" type="radio" name="agegroup" id="option1"
                                           autocomplete="off" value="1"> @lang('diagnosis.ageunder18')
                                </label>
                                <label class="btn btn-outline-info center form-check-label" >
                                    <input class="form-check-input" type="radio" name="agegroup" id="option2"
                                           autocomplete="off" value="2"> @lang('diagnosis.agebetween18and65')
                                </label>
                                <label class="btn btn-outline-info center form-check-label" >
                                    <input class="form-check-input" type="radio" name="agegroup" id="option3"
                                           autocomplete="off" value="3"> @lang('diagnosis.ageover65')
                                </label>

                            </div>
                            <span class="col-sm-5 col-form-label"></span>
                            <span class="text-danger">{{ $errors->first('agegroup') }}</span>
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
                                <button type="submit" class="btn btn-primary" onmousedown="$('#AllowPositionModal').modal('show');$('#checkindataform').submit();">@lang('views.checkindata')</button>

                                <button type="submit" class="btn btn-primary" onmousedown="$('#AllowPositionModal').modal('show');$('#checkindataform').submit();">@lang('views.skip')</button>
                            </div>
                        </div>
                    </form>


                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="AllowPositionModal" tabindex="-1" role="modal" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <img src="images/icons/icon-36x36.png">
                        <h5 class="modal-title" id="exampleModalLongTitle"><span>    </span>@lang('views.positionmodeltitle')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @lang('views.positionmodaltext')
                    </div>
                    <div class="modal-footer">
                        <a type="button" href="/login"  class="btn btn-primary " data-dismiss="modal" onclick="showPosition();">@lang('views.positionmodalbutton')</a>

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

                });
            } else {
                alert("Sorry, your browser does not support HTML5 geolocation.");
            }
        }
    </script>
@stop