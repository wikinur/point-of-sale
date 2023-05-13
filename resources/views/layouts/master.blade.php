<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS | @yield('title')</title>

<!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('asset/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    @yield('css')

    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    </head>
    <body class="hold-transition sidebar-mini layout-fixed skin-light-purple">
        <div class="wrapper">
            {{-- Navbar --}}
            @includeIf('layouts.navbar')

            {{-- Sidebar --}}
            @includeIf('layouts.sidebar')

            {{-- Content --}}
            <div class="content-wrapper">
                <section class="content">                   
                    <div class="container-fluid">
                        <h1 class="py-3">@yield('title')</h1>
                        @yield('content')
                    </div>
                </section>
            </div>
                
            {{-- Footer --}}
            @includeIf('layouts.footer')
        </div>
        <!-- jQuery -->
        <script src="{{ asset('asset/plugins/jquery/jquery.min.js') }}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('asset/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset ('asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <!-- DataTables  & Plugins -->
        <script src="{{ asset('asset/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('asset/dist/js/adminlte.js') }}"></script>
        <script src="{{ asset('asset/dist/js/vue.min.js') }}"></script>
        <script src="{{ asset('asset/dist/js/axios.min.js') }}"></script>
        @yield('js')
    </body>
</html>
