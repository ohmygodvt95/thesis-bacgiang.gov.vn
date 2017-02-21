<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $pageTitle or "Bắc Giang Portal" }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Theme style -->
    <link href="{{ asset("components/AdminLTE/dist/css/AdminLTE.min.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("components/AdminLTE/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("components/font-awesome/css/font-awesome.css") }}" rel="stylesheet" type="text/css"/>
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-blue">
    <div class="wrapper">
        <!-- Header -->
        @include('admin.layouts.header')
        <!-- Sidebar -->
        @include('admin.layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    {{ $pageTitle or "Page Title" }}
                    <small>{{ $page_description or null }}</small>
                </h1>
                <!-- You can dynamically generate breadcrumbs here -->
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                    <li class="active">Here</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                @if (session('message'))
                    <div class="alert alert-{{ session('type') }}">
                        {{ session('message') }}
                    </div>
                @endif
                <!-- Your Page Content Here -->
                @yield('content')
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
        <!-- Footer -->
        @include('admin.layouts.footer')
    </div><!-- ./wrapper -->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- AdminLTE -->
    <script src="{{ asset ("components/AdminLTE/dist/js/app.min.js") }}" type="text/javascript"></script>
</body>
</html>
