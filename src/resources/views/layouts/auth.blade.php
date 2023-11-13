<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ShopFP Admin | @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('adminlte/dist/css/adminlte.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    @yield('css')
</head>

<body class="hold-transition login-page">
    <main class="login-box">
        <div class="card">
            <div class="card-body login-card-body">

                @yield('content')

            </div>
        </div>
    </main>
    <!-- jQuery -->
    <script src="{{ URL::asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ URL::asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ URL::asset('adminlte/dist/js/adminlte.min.js') }}"></script>

    @yield('js')
</body>

</html>
