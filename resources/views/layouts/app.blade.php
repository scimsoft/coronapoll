<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:creator" content="@gerrit_sevilla">
    <meta name="twitter:title" content="STOP coronavirus">
    <meta name="twitter:description" content="A anonymous crowd-data site, with the intention to share our coronavirus symptoms, to plot a map with coronavirus hotspots and how the evoluate. ">
    <meta name="twitter:summary_large_image" content="https://0corona.com/images/0coronamap.jpg">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>

    </style>

    @laravelPWA

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/symptoms') }}">
                    <img src="images/icons/icon-36x36.png">
                    {{ config('app.name', 'Laravel') }}
                </a>


                <!-- Example single danger button -->
                <div class="btn-group">
                    <button type="button" class="btn  " data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <img src="images/share_share.png" width="20px">
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item btn btn-outline-success" href="https://wa.me/?text=STOP+coronavirus+https%3A%2F%2F0corona.com%2F" target="_blank"><img src="images/share_whatsapp.png" width="24px"> Whatsapp</a>
                        <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u=https://0corona.com" target="_blank"><img src="images/share_facebook.png" width="24px">  Facebook</a>
                        <a class="dropdown-item" href="https://twitter.com/home?status=https://0corona.com " target="_blank"><img src="images/share_twitter.png" width="24px">  Twitter</a>
                        <a class="dropdown-item" href="mailto:info@example.com?&subject=&body=https://0corona.com " target="_blank"><img src="images/share_email.png" width="24px">  Email</a>

                    </div>
                </div>



                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->

                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Config::get('languages')[App::getLocale()] }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @foreach (Config::get('languages') as $lang => $language)
                                        @if ($lang != App::getLocale())
                                    <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">
                                        {{$language}}
                                    </a>
                                        @endif
                                    @endforeach


                                </div>
                            </li>

                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>

                        @else

                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')

        </main>

            <div class="footer">
                <div class="privacy">
                <a class="btn btn-light" href="https://github.com/scimsoft/coronapoll">GitHub Source </a>
                <a href="https://www.iubenda.com/privacy-policy/62552887" class="btn btn-light" title="Privacy Policy ">
                    Privacy Policy</a>

                <a class="btn btn-light">0corona.com 2020</a>
                </div>
            </div>


    </div>

    @yield('scripts');
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-161664478-1"></script>
    <script type="text/javascript " src="https://cdn.iubenda.com/iubenda.js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-161664478-1');
    </script>

</body>
</html>
