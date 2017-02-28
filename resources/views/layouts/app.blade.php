<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - {{ $pageTitle or "Home" }}</title>
    <meta property="og:url"           content="{{ Request::url() }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ config('app.name', 'Laravel') }} - {{ $pageTitle or "Home" }}" />
    <meta property="og:description"   content="{{ config('app.name', 'Laravel') }} - {{ $pageTitle or "Home" }}" />
    <meta property="og:image"         content="{{ asset('images/header.jpg') }}" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}"/>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('components/font-awesome/css/font-awesome.min.css') }}">
    @yield('css')
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>
<body>
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=1231289680289804";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <div class="container" id="wrapper">
        @include('layouts.header')
        <div class="time">
            <span class="pull-right">Bắc Giang - {{ date("D d/m/Y") }}</span>
        </div>
        <div class="row">
            <div class="col-sm-9" id="main">
                @yield('content')
            </div>
            <div class="col-sm-3">
                @include('layouts.sidebar')
            </div>
            @yield('more')
        </div>
        @include('layouts.footer')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
</body>
</html>
