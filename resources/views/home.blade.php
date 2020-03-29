@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <p class="h5"> @lang('diagnosis.near_you_intro')</p>

                            <p class="h6 text-danger"><strong>{{$patient_confirmed}}</strong> @lang('diagnosis.confirmed_label')</p>

                            <p class="h6 text-danger">
                                <strong>{{$patient_heavy_symptoms}}</strong> @lang('diagnosis.very_suspicious_label')
                            </p>

                            <p class="h6 text-warning">
                                <strong>{{$patient_light_symptoms}}</strong> @lang('diagnosis.little_suspicious_label')
                            </p>

                            <p class="h6 text-success">
                                <strong>{{$patient_no_symptoms}}</strong> @lang('diagnosis.no_suspicous_label')</p>
                        </div>

                    </div>


                </div>

                <form id='diagnoseform' method="post" action="/senddiagnose">
                    @csrf
                    <div class="card">
                        <div class="card-header font-weight-bold" data-toggle="collapse"
                             data-target="#tempraturecard"> @lang('diagnosis.Temperatura')</div>
                        <div class="collapse show" id="tempraturecard">

                            <div class="btn-group" data-toggle="buttons">
                                <img src="images/termo.png" style="margin-right: 5px">
                                <label class="btn btn-success center form-check-label " data-toggle="collapse"
                                       data-target="#tempraturecard">
                                    <input class="form-check-input" type="radio" name="temprature" id="option1"
                                           autocomplete="off" value="1">
                                    @lang('diagnosis.normaltemp')
                                </label>
                                <label class="btn btn-warning center form-check-label" data-toggle="collapse"
                                       data-target="#tempraturecard">
                                    <input class="form-check-input" type="radio" name="temprature" id="option2"
                                           autocomplete="off" value="2"> @lang('diagnosis.fever')
                                </label>
                                <label class="btn btn-danger center form-check-label" data-toggle="collapse"
                                       data-target="#tempraturecard">
                                    <input class="form-check-input" type="radio" name="temprature" id="option3"
                                           autocomplete="off" value="3"> @lang('diagnosis.highfever')
                                </label>


                            </div>
                            <span class="text-danger">{{ $errors->first('temprature') }}</span>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header font-weight-bold" data-toggle="collapse"
                             data-target="#coughcard"> @lang('diagnosis.Cough')</div>
                        <div class="collapse show" id="coughcard">

                            <div class="btn-group" data-toggle="buttons">
                                <img src="images/cough.png" style="margin-right: 5px">
                                <label class="btn btn-success center form-check-label " data-toggle="collapse"
                                       data-target="#coughcard">
                                    <input class="form-check-input" type="radio" name="cough" id="option1"
                                           autocomplete="off" value="1">
                                    @lang('diagnosis.none')
                                </label>
                                <label class="btn btn-warning center form-check-label" data-toggle="collapse"
                                       data-target="#coughcard">
                                    <input class="form-check-input" type="radio" name="cough" id="option2"
                                           autocomplete="off" value="2"> @lang('diagnosis.alittle')
                                </label>
                                <label class="btn btn-danger center form-check-label" data-toggle="collapse"
                                       data-target="#coughcard">
                                    <input class="form-check-input" type="radio" name="cough" id="option3"
                                           autocomplete="off" value="3"> @lang('diagnosis.alot')
                                </label>
                            </div>
                            <span class="text-danger">{{ $errors->first('cough') }}</span>
                        </div>

                    </div>

                    <div class="card">
                        <div class="card-header font-weight-bold" data-toggle="collapse"
                             data-target="#shortbreathcard"> @lang('diagnosis.Shortness of Breath')</div>
                        <div class="collapse show" id="shortbreathcard">

                            <div class="btn-group" data-toggle="buttons">
                                <img src="images/dypnea.png" style="margin-right: 5px">
                                <label class="btn btn-success center form-check-label " data-toggle="collapse"
                                       data-target="#shortbreathcard">
                                    <input class="form-check-input" type="radio" name="breath" id="option1"
                                           autocomplete="off" value="1">
                                    @lang('diagnosis.none')
                                </label>
                                <label class="btn btn-warning center form-check-label" data-toggle="collapse"
                                       data-target="#shortbreathcard">
                                    <input class="form-check-input" type="radio" name="breath" id="option2"
                                           autocomplete="off" value="2"> @lang('diagnosis.alittle')
                                </label>
                                <label class="btn btn-danger center form-check-label" data-toggle="collapse"
                                       data-target="#shortbreathcard">
                                    <input class="form-check-input" type="radio" name="breath" id="option3"
                                           autocomplete="off" value="3"> @lang('diagnosis.alot')
                                </label>
                            </div>
                            <div class="text-danger">{{ $errors->first('breath') }}</div>
                        </div>

                        <div class="card">
                            <div class="card-header font-weight-bold" data-toggle="collapse"
                                 data-target="#musclepaincard"> @lang('diagnosis.Muscle pain')</div>
                            <div class="collapse show full" id="musclepaincard">

                                <div class="btn-group" data-toggle="buttons">
                                    <img src="images/muscle.png" style="margin-right: 5px">
                                    <label class="btn btn-success center form-check-label " data-toggle="collapse"
                                           data-target="#musclepaincard">
                                        <input class="form-check-input" type="radio" name="muscle" id="option1"
                                               autocomplete="off" value="1">
                                        @lang('diagnosis.none')
                                    </label>
                                    <label class="btn btn-warning center form-check-label" data-toggle="collapse"
                                           data-target="#musclepaincard">
                                        <input class="form-check-input" type="radio" name="muscle" id="option2"
                                               autocomplete="off" value="2"> @lang('diagnosis.alittle')
                                    </label>
                                    <label class="btn btn-danger center form-check-label" data-toggle="collapse"
                                           data-target="#musclepaincard">
                                        <input class="form-check-input" type="radio" name="muscle" id="option3"
                                               autocomplete="off" value="3"> @lang('diagnosis.alot')
                                    </label>
                                </div>
                                <span class="text-danger">{{ $errors->first('muscle') }}</span>
                            </div>
                        </div>
                        <input id="latitude" type="hidden" name="latitude" value="">
                        <input id="longitude" type="hidden" name="longitude" value="">
                        <div class="card">
                            <button type="submit" class="btn btn-primary">@lang('views.sendbutton')</button>
                        </div>

                    </div>
            </div>
            </form>
        </div>
    </div>
        @endsection
        @section('scripts')

            <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
            <script>
                $( document ).ready(function() {
                   if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function (position) {
                            document.getElementById("latitude").value = position.coords.latitude;
                            document.getElementById("longitude").value = position.coords.longitude
                        });
                    } else {
                        alert("Sorry, your browser does not support HTML5 geolocation.");
                    }
                    navigator.geolocation.watchPosition(function(position) {

                        },
                        function(error) {
                           if (error.code == error.PERMISSION_DENIED)
                                $.ajax({
                                    url: 'http://api.ipstack.com/check?access_key=fca30bd8e917368bf8bf8eb98ba8144c',
                                    dataType: 'jsonp',
                                    success: function(json) {
                                        document.getElementById("latitude").value = json.latitude;
                                        document.getElementById("longitude").value = json.longitude;

                                    }
                                });
                        });
                });




            </script>

@stop
