<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('extra_stylesheet')
    @include('admin-panel.layouts.stylesheet')

</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

    <div class="app-wrapper">
        <div id="overlay">
            <div class="cv-spinner">
                <span class="spinner"></span>
            </div>
        </div>
        <!-- Preloader -->
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('assets/image/logo/kdr-logo.png') }}" alt="AdminLTELogo"
                height="175" width="124">
        </div> --}}

        <!-- Navbar -->
        @include('admin-panel.layouts.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin-panel.layouts.sidebar')

        <!-- Main Content Wrapper. Contains page content -->

        <main class="app-main">
            <!--begin::App Content Header-->
            @yield('content')
            <!--end::App Content-->
        </main>
        <!-- /.content-wrapper -->
        @include('admin-panel.layouts.footer')

        <!-- Control Sidebar -->
        {{-- <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside> --}}
        <!-- /.control-sidebar -->
        @include('admin-panel.layouts.footer')
    </div>
    <!-- ./wrapper -->

    @include('admin-panel.layouts.javascript')
    @yield('extra_javascript')
</body>

</html>
