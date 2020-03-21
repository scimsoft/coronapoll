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
                <div class="card-header font-weight-bold"> </div>
                <div class="card-header font-weight-bolder h2 "> @lang('diagnosis.Auto Test')</div>
                &nbsp;
            </div>
            <div class="card">
                <div class="card-header font-weight-bold"> @lang('diagnosis.Temperatura'):</div>

                <div class="btn-group " role="group" aria-label="Basic example">
                    <img src="images/termo.png" style="margin-right: 15px">

                    <button type="button" class="btn btn-success btn-rounded center" onclick="addClass('active')">@lang('diagnosis.normaltemp')</button>
                    <button type="button" class="btn btn-warning btn-rounded center">@lang('diagnosis.fever')</button>
                    <button type="button" class="btn btn-danger btn-rounded center">@lang('diagnosis.highfever')</button>
                </div>
            </div>
            <div class="card">
                <div class="card-header font-weight-bold"> @lang('diagnosis.Cough'):</div>
                <div class="btn-group " role="group" aria-label="Basic example">
                    <img src="images/cough.png" style="margin-right: 15px">
                    <button type="button" class="btn btn-success btn-rounded center">@lang('diagnosis.none')</button>
                    <button type="button" class="btn btn-warning btn-rounded center">@lang('diagnosis.alittle')</button>
                    <button type="button" class="btn btn-danger btn-rounded center">@lang('diagnosis.alot')</button>
                </div>
            </div>
            <div class="card">
                <div class="card-header font-weight-bold"> @lang('diagnosis.Shortness of Breath'):</div>
                <div class="btn-group " role="group" aria-label="Basic example">
                    <img src="images/dypnea.png" style="margin-right: 15px">
                    <button type="button" class="btn btn-success btn-rounded center">@lang('diagnosis.none')</button>
                    <button type="button" class="btn btn-warning btn-rounded center">@lang('diagnosis.alittle')</button>
                    <button type="button" class="btn btn-danger btn-rounded center">@lang('diagnosis.alot')</button>
                </div>
            </div>
            <div class="card">
                <div class="card-header font-weight-bold"> @lang('diagnosis.Muscle pain'):</div>
                <div class="btn-group " role="group" aria-label="Basic example">
                    <img src="images/muscle.png" style="margin-right: 15px">
                    <button type="button" class="btn btn-success btn-rounded center">@lang('diagnosis.none')</button>
                    <button type="button" class="btn btn-warning btn-rounded center">@lang('diagnosis.alittle')</button>
                    <button type="button" class="btn btn-danger btn-rounded center">@lang('diagnosis.alot')</button>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
