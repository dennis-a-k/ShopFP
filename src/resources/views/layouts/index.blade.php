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
    <!-- overlayScrollbars -->
    {{-- <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}"> --}}
    <!-- Vite -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    @yield('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        @include('components.preloader')
        <!-- /.preloader -->

        <!-- Navbar -->
        @include('components.header')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('components.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <main class="content-wrapper">
            <!-- Content Header (Page header) -->
            @yield('content-header')
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    @yield('content')

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </main>
        <!-- /.content-wrapper -->

        <!-- Footer -->
        @include('components.footer')
        <!-- /.footer -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ URL::asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ URL::asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ URL::asset('adminlte/dist/js/adminlte.min.js') }}"></script>

    @yield('js')
</body>

</html>
