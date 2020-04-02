@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@lang('views.welcomeheader')</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <p class="h5"> @lang('views.welcomename')</p>

                            @lang('views.welcometext')</p>


                        </div>

                    </div>

                </div>

                <div class="accordion" id="loginaccordion">
                    <div class="card">

                        <div class="card-header" id="googleheader" data-toggle="collapse" data-target="#collapseOne"
                             aria-expanded="true" aria-controls="collapseOne"><a class="btn btn-info"
                                                                                 href="{{ url('/redirect') }}"><span
                                        class="fa fa-google"></span> @lang('auth.logingoogle')</a>

                            <div class="card-body collapse" id="collapseOne" aria-labelledby="googleheader"
                                 data-parent="#loginaccordion">

                            </div>

                        </div>
                        <div class="card-header " id="emailheader" data-toggle="collapse" data-target="#collapseTwo"
                             aria-expanded="true" aria-controls="collapseTwo"><a class="btn btn-info"><span
                                        class="fa fa-user"></span> @lang('auth.loginuser')</a></div>

                            <div class="card-body collapse @error('name') show @enderror @error('password') show @enderror" id="collapseTwo" aria-labelledby="emailheader"
                                 data-parent="#loginaccordion">

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-group row">

                                        <label for="email"
                                               class="col-md-4 col-form-label text-md-right">@lang('auth.loginusername')</label>

                                        <div class="col-md-6">
                                            <input id="loginname" type="name"
                                                   class="form-control @error('name') is-invalid @enderror" name="name"
                                                   value="{{ old('email') }}" required autocomplete="name" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password" required autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    @lang('auth.remember')
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                @lang('auth.login')
                                            </button>
{{--TODO recuperar contraseña--}}
                                            @if (Route::has('password.requestss'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif


                                        </div>
                                    </div>

                                </form>
                            </div>

                        <div class="card-header" id="registerheader" data-toggle="collapse"
                             data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><a
                                    class="btn btn-info"><span
                                        class="fa fa-edit"></span> @lang('auth.logincreateuser') </a></div>


                            <div class="card-body collapse @error('registername')show @enderror @error('registeremail')show @enderror @error('registerpassword')show @enderror" id="collapseThree" aria-labelledby="registerheader"
                                 data-parent="#loginaccordion">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="registername"
                                               class="col-md-4 col-form-label text-md-right">@lang('auth.loginusername')</label>

                                        <div class="col-md-6">
                                            <input id="registername" type="text" class="form-control @error('registername') is-invalid @enderror" name="registername"
                                                   value="{{ old('registername') }}" required autocomplete="name" autofocus
                                                   onkeyup="duplicateName(this)">

                                            @error('registername')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="registeremail"
                                               class="col-md-4 col-form-label text-md-right">@lang('auth.emailadressopcional')</label>

                                        <div class="col-md-6">
                                            <input id="registeremail" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="registeremail" value="{{ old('registeremail') }}" autocomplete="email">

                                            @error('registeremail')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password"
                                               class="col-md-4 col-form-label text-md-right">@lang('auth.password')</label>

                                        <div class="col-md-6">
                                            <input id="registerpassword" type="password"
                                                   class="form-control @error('registerpassword') is-invalid @enderror"
                                                   name="registerpassword" required autocomplete="new-password">

                                            @error('registerpassword')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="registerpassword-confirm"
                                               class="col-md-4 col-form-label text-md-right">@lang('auth.confirmpassword')</label>

                                        <div class="col-md-6">
                                            <input id="registerpassword-confirm" type="password" class="form-control"
                                                   name="registerpassword_confirmation" required
                                                   autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                @lang('auth.register')
                                            </button>
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

                function duplicateName(element) {
                    var d = document.getElementById('registername');
                    var name = $(element).val();

                    $.ajax({
                        type: "POST",
                        url: '{{url('/checkname')}}',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            name: name
                        },
                        dataType: "json",
                        success: function (res) {
                            if (res.exists) {
                                d.className += "form-control is-invalid";

                            } else {
                                d.className = "form-control is-valid";
                            }
                        },
                        error: function (jqXHR, exception) {

                        }
                    });
                }
            </script>
@stop
