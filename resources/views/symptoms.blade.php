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

                            <p class="h6 text-danger">
                                <strong>{{$patient_confirmed}}</strong> @lang('diagnosis.confirmed_label')</p>

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

                <form id='diagnoseform' method="post" action="/create">
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
                            </div>
                        </div>

                        {{--SoreThrought Card--}}
                        <div class="card">
                            <div class="card-header font-weight-bold" data-toggle="collapse"
                                 data-target="#sorethroatcard"> @lang('diagnosis.sorethroat')</div>
                            <div class="collapse show" id="sorethroatcard">

                                <div class="btn-group" data-toggle="buttons">
                                    <img src="images/sore_throat.png" style="margin-right: 5px">
                                    <label class="btn btn-success center form-check-label " data-toggle="collapse"
                                           data-target="#sorethroatcard">
                                        <input class="form-check-input" type="radio" name="sorethroat" id="option1"
                                               autocomplete="off" value="1">
                                        @lang('diagnosis.none')
                                    </label>
                                    <label class="btn btn-warning center form-check-label" data-toggle="collapse"
                                           data-target="#sorethroatcard">
                                        <input class="form-check-input" type="radio" name="sorethroat" id="option2"
                                               autocomplete="off" value="2"> @lang('diagnosis.alittle')
                                    </label>
                                    <label class="btn btn-danger center form-check-label" data-toggle="collapse"
                                           data-target="#sorethroatcard">
                                        <input class="form-check-input" type="radio" name="sorethroat" id="option3"
                                               autocomplete="off" value="3"> @lang('diagnosis.alot')
                                    </label>
                                </div>
                                <span class="text-danger">{{ $errors->first('sorethroat') }}</span>
                            </div>

                        </div>

                        {{--Diarrea Card--}}


                        <div class="card">
                            <div class="card-header font-weight-bold" data-toggle="collapse"
                                 data-target="#diarreacard"> @lang('diagnosis.diarrea')</div>
                            <div class="collapse show" id="diarreacard">

                                <div class="btn-group" data-toggle="buttons">
                                    <img src="images/diarrea.png" style="margin-right: 5px">
                                    <label class="btn btn-success center form-check-label " data-toggle="collapse"
                                           data-target="#diarreacard">
                                        <input class="form-check-input" type="radio" name="diarrea" id="option1"
                                               autocomplete="off" value="1">
                                        @lang('diagnosis.none')
                                    </label>
                                    <label class="btn btn-warning center form-check-label" data-toggle="collapse"
                                           data-target="#diarreacard">
                                        <input class="form-check-input" type="radio" name="diarrea" id="option2"
                                               autocomplete="off" value="2"> @lang('diagnosis.alittle')
                                    </label>
                                    <label class="btn btn-danger center form-check-label" data-toggle="collapse"
                                           data-target="#diarreacard">
                                        <input class="form-check-input" type="radio" name="diarrea" id="option3"
                                               autocomplete="off" value="3"> @lang('diagnosis.alot')
                                    </label>
                                </div>
                                <span class="text-danger">{{ $errors->first('diarrea') }}</span>
                            </div>

                        </div>


                        <span class="text-danger">{{ $errors->first('muscle') }}</span>
                    </div>
                    <div class="modal fade" id="positionModel" tabindex="-1" role="modal" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input id="latitude" type="hidden" name="latitude" value="">
                    <input id="longitude" type="hidden" name="longitude" value="">
                    <input id="position" type="hidden" name="position" value="">
                    <div class="card">
                        <button type="submit" class="btn btn-primary">@lang('views.sendbutton')</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
        @endsection
        @section('scripts')

            <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

            <script>
                document.addEventListener('DOMContentLoaded', (event) => {

                        $('#positionModel').modal('show');

                });
                $(document).ready(function () {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function (position) {
                            document.getElementById("latitude").value = position.coords.latitude;
                            document.getElementById("longitude").value = position.coords.longitude
                        });
                    } else {
                        alert("Sorry, your browser does not support HTML5 geolocation.");
                    }
                    navigator.geolocation.watchPosition(function (position) {

                        },
                        function (error) {
                            if (error.code == error.PERMISSION_DENIED)
                                $.ajax({
                                    url: 'http://api.ipstack.com/check?access_key=fca30bd8e917368bf8bf8eb98ba8144c',
                                    dataType: 'jsonp',
                                    success: function (json) {
                                        document.getElementById("latitude").value = json.latitude;
                                        document.getElementById("longitude").value = json.longitude;
                                        //LOCATION IP == 1;
                                        document.getElementById("position").value = 1;


                                    }
                                });
                        });
                });


            </script>

@stop
