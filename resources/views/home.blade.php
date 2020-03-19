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
        </div>
    </div>
</div>
@endsection
