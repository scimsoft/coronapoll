@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <p class="h5"> @lang('diagnosis.near_you_intro')</p>

                            <p class="h6"><strong>{{$patient_confirmed}}</strong> @lang('diagnosis.confirmed_label')</p>

                            <p class="h6"><strong>{{$patient_heavy_symptoms}}</strong> @lang('diagnosis.very_suspicious_label')</p>

                            <p class="h6"><strong>{{$patient_light_symptoms}}</strong> @lang('diagnosis.little_suspicious_label')</p>

                            <p class="h6"><strong>{{$patient_no_symptoms}}</strong> @lang('diagnosis.no_suspicous_label')</p>
                            </div>

                    </div>

                </div>


                <div class="card">
                    <div class="card-header font-weight-bold" data-toggle="collapse" data-target="#tempraturecard"> @lang('diagnosis.Temperatura'):</div>
                    <div class="collapse show" id="tempraturecard">
                    <div class="btn-group" data-toggle="buttons">
                        <img src="images/termo.png" style="margin-right: 5px">
                        <label class="btn btn-success center form-check-label " data-toggle="collapse" data-target="#tempraturecard">
                            <input class="form-check-input" type="radio" name="options" id="option1" autocomplete="off">
                            @lang('diagnosis.normaltemp')
                        </label>
                        <label class="btn btn-warning center form-check-label" data-toggle="collapse" data-target="#tempraturecard">
                            <input class="form-check-input" type="radio" name="options" id="option2"
                                   autocomplete="off"> @lang('diagnosis.fever')
                        </label>
                        <label class="btn btn-danger center form-check-label" data-toggle="collapse" data-target="#tempraturecard">
                            <input class="form-check-input" type="radio" name="options" id="option3"
                                   autocomplete="off"> @lang('diagnosis.highfever')
                        </label>
                    </div>
                </div>
                </div>
                <div class="card">
                    <div class="card-header font-weight-bold" data-toggle="collapse" data-target="#coughcard"> @lang('diagnosis.Cough'):</div>
                    <div class="collapse show" id="coughcard">
                    <div class="btn-group" data-toggle="buttons">
                        <img src="images/cough.png" style="margin-right: 5px">
                        <label class="btn btn-success center form-check-label " data-toggle="collapse" data-target="#coughcard">
                            <input class="form-check-input" type="radio" name="options" id="option1" autocomplete="off">
                            @lang('diagnosis.none')
                        </label>
                        <label class="btn btn-warning center form-check-label" data-toggle="collapse" data-target="#coughcard">
                            <input class="form-check-input" type="radio" name="options" id="option2"
                                   autocomplete="off"> @lang('diagnosis.alittle')
                        </label>
                        <label class="btn btn-danger center form-check-label" data-toggle="collapse" data-target="#coughcard">
                            <input class="form-check-input" type="radio" name="options" id="option3"
                                   autocomplete="off"> @lang('diagnosis.alot')
                        </label>
                    </div>
                </div>
                </div>

                <div class="card">
                    <div class="card-header font-weight-bold" data-toggle="collapse" data-target="#shortbreathcard"> @lang('diagnosis.Shortness of Breath'):</div>
                    <div class="collapse show" id="shortbreathcard">
                    <div class="btn-group" data-toggle="buttons">
                        <img src="images/dypnea.png" style="margin-right: 5px">
                        <label class="btn btn-success center form-check-label " data-toggle="collapse" data-target="#shortbreathcard">
                            <input class="form-check-input" type="radio" name="options" id="option1" autocomplete="off">
                            @lang('diagnosis.none')
                        </label>
                        <label class="btn btn-warning center form-check-label" data-toggle="collapse" data-target="#shortbreathcard">
                            <input class="form-check-input" type="radio" name="options" id="option2"
                                   autocomplete="off"> @lang('diagnosis.alittle')
                        </label>
                        <label class="btn btn-danger center form-check-label" data-toggle="collapse" data-target="#shortbreathcard">
                            <input class="form-check-input" type="radio" name="options" id="option3"
                                   autocomplete="off"> @lang('diagnosis.alot')
                        </label>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header font-weight-bold" data-toggle="collapse" data-target="#musclepaincard"> @lang('diagnosis.Muscle pain'):</div>
                    <div class="collapse show" id="musclepaincard">
                    <div class="btn-group" data-toggle="buttons">
                        <img src="images/muscle.png" style="margin-right: 5px">
                        <label class="btn btn-success center form-check-label " data-toggle="collapse" data-target="#musclepaincard">
                            <input class="form-check-input" type="radio" name="options" id="option1" autocomplete="off">
                            @lang('diagnosis.none')
                        </label>
                        <label class="btn btn-warning center form-check-label" data-toggle="collapse" data-target="#musclepaincard">
                            <input class="form-check-input" type="radio" name="options" id="option2"
                                   autocomplete="off"> @lang('diagnosis.alittle')
                        </label>
                        <label class="btn btn-danger center form-check-label" data-toggle="collapse" data-target="#musclepaincard">
                            <input class="form-check-input" type="radio" name="options" id="option3"
                                   autocomplete="off"> @lang('diagnosis.alot')
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
