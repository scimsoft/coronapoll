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
                <div class="card-header font-weight-bolder h2 "> Auto Test</div>
                &nbsp;
            </div>
            <div class="card">
                <div class="card-header font-weight-bold"> Temperatura:</div>
                <div class="btn-group " role="group" aria-label="Basic example">
                    <img src="images/termo.png" style="margin-right: 15px">
                    <button type="button" class="btn btn-success btn-rounded center">< 37,7</button>
                    <button type="button" class="btn btn-warning btn-rounded center">37,7-38,7</button>
                    <button type="button" class="btn btn-danger btn-rounded center">> 38,7 </button>
                </div>
            </div>
            <div class="card">
                <div class="card-header font-weight-bold"> Cough:</div>
                <div class="btn-group " role="group" aria-label="Basic example">
                    <img src="images/cough.png" style="margin-right: 15px">
                    <button type="button" class="btn btn-success btn-rounded center">Little</button>
                    <button type="button" class="btn btn-warning btn-rounded center">Medium</button>
                    <button type="button" class="btn btn-danger btn-rounded center">Constant</button>
                </div>
            </div>
            <div class="card">
                <div class="card-header font-weight-bold"> Shortness of Breath:</div>
                <div class="btn-group " role="group" aria-label="Basic example">
                    <img src="images/dypnea.png" style="margin-right: 15px">
                    <button type="button" class="btn btn-success btn-rounded center">Little</button>
                    <button type="button" class="btn btn-warning btn-rounded center">Medium</button>
                    <button type="button" class="btn btn-danger btn-rounded center">Heavy</button>
                </div>
            </div>
            <div class="card">
                <div class="card-header font-weight-bold"> Muscle pain:</div>
                <div class="btn-group " role="group" aria-label="Basic example">
                    <img src="images/muscle.png" style="margin-right: 15px">
                    <button type="button" class="btn btn-success btn-rounded center">Little</button>
                    <button type="button" class="btn btn-warning btn-rounded center">Medium</button>
                    <button type="button" class="btn btn-danger btn-rounded center">Heavy</button>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
