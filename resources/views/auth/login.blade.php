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

                <div class="card-header" id="googleheader" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">{{ __('Login with Google') }}</div>
                <div class="form-group row"  id="collapseOne" class="collapse show" aria-labelledby="googleheader" data-parent="#loginaccordion">
                    <div class="col-md-6 offset-md-3">
                        <a href="{{ url('/redirect') }}" class="btn btn-facebook col-md-6"> <img src="images/btn_google_signin_dark_normal_web.png"></a>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">



                    </div>
                </div>
                <div class="card-header " id="emailheader" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">{{ __('Login with email') }}</div>

                <div class="card-body collapse show" id="collapseTwo" aria-labelledby="emailheader" data-parent="#loginaccordion">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row" >
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right" >{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

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
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                                
                            </div>
                        </div>

                    </form>
                </div>
                <div class="card">
                <div class="card-header" id="registerheader" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">{{ __('Not registerer?') }}</div>
                <div class="col-md-8 offset-md-4 collapse" id="collapseThree" aria-labelledby="registerheader" data-parent="#loginaccordion">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Please Register Here') }}</a>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection
    @section('scripts')

@stop