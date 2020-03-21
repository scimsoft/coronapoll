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
                        Near you we found:
                        <br>
                        {{$patient_confirmed}} patients with confirmed covad-19 diagnosis
                        <br>
                        {{$patient_heavy_symptoms}} patients with a lot of symptoms
                        <br>
                        {{$patient_light_symptoms}} patients with little symptoms
                        <br>
                        {{$patient_no_symptoms}} patients without symptoms

                    </div>

                </div>
                <div class="card">
                    <div class="card-header font-weight-bold"></div>
                    <div class="card-header font-weight-bolder h2 "> @lang('diagnosis.Auto Test')</div>
                    &nbsp;
                </div>

                <div class="card">
                    <div class="card-header font-weight-bold"> @lang('diagnosis.Temperatura'):</div>
                    <div class="btn-group" data-toggle="buttons">
                        <img src="images/termo.png" style="margin-right: 15px">
                        <label class="btn btn-success center form-check-label ">
                            <input class="form-check-input" type="radio" name="options" id="option1" autocomplete="off">
                            @lang('diagnosis.normaltemp')
                        </label>
                        <label class="btn btn-warning center form-check-label">
                            <input class="form-check-input" type="radio" name="options" id="option2"
                                   autocomplete="off"> @lang('diagnosis.fever')
                        </label>
                        <label class="btn btn-danger center form-check-label">
                            <input class="form-check-input" type="radio" name="options" id="option3"
                                   autocomplete="off"> @lang('diagnosis.highfever')
                        </label>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header font-weight-bold"> @lang('diagnosis.Cough'):</div>
                    <div class="btn-group" data-toggle="buttons">
                        <img src="images/cough.png" style="margin-right: 15px">
                        <label class="btn btn-success center form-check-label ">
                            <input class="form-check-input" type="radio" name="options" id="option1" autocomplete="off">
                            @lang('diagnosis.none')
                        </label>
                        <label class="btn btn-warning center form-check-label">
                            <input class="form-check-input" type="radio" name="options" id="option2"
                                   autocomplete="off"> @lang('diagnosis.alittle')
                        </label>
                        <label class="btn btn-danger center form-check-label">
                            <input class="form-check-input" type="radio" name="options" id="option3"
                                   autocomplete="off"> @lang('diagnosis.alot')
                        </label>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header font-weight-bold"> @lang('diagnosis.Shortness of Breath'):</div>
                    <div class="btn-group" data-toggle="buttons">
                        <img src="images/dypnea.png" style="margin-right: 15px">
                        <label class="btn btn-success center form-check-label ">
                            <input class="form-check-input" type="radio" name="options" id="option1" autocomplete="off">
                            @lang('diagnosis.none')
                        </label>
                        <label class="btn btn-warning center form-check-label">
                            <input class="form-check-input" type="radio" name="options" id="option2"
                                   autocomplete="off"> @lang('diagnosis.alittle')
                        </label>
                        <label class="btn btn-danger center form-check-label">
                            <input class="form-check-input" type="radio" name="options" id="option3"
                                   autocomplete="off"> @lang('diagnosis.alot')
                        </label>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header font-weight-bold"> @lang('diagnosis.Muscle pain'):</div>
                    <div class="btn-group" data-toggle="buttons">
                        <img src="images/muscle.png" style="margin-right: 15px">
                        <label class="btn btn-success center form-check-label ">
                            <input class="form-check-input" type="radio" name="options" id="option1" autocomplete="off">
                            @lang('diagnosis.none')
                        </label>
                        <label class="btn btn-warning center form-check-label">
                            <input class="form-check-input" type="radio" name="options" id="option2"
                                   autocomplete="off"> @lang('diagnosis.alittle')
                        </label>
                        <label class="btn btn-danger center form-check-label">
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
