<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')-Touch and Earn</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/custom.css') }}">

    @stack('css')
</head>



<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{'backend/assets/dist/img/AdminLTELogo.png'}}" alt="AdminLTELogo" height="60" width="60">
        </div> --}}


            {{-- topbar  --}}
        @include('backend.layouts.partials.topbar')


        <!-- Main Sidebar Container -->

            {{-- sidenav  --}}
        @include('backend.layouts.partials.sidenav')


        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    @yield('toproute')
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    @yield('homesection')
                </div>
            </section>
        </div>

        {{-- footer  --}}
        @include('backend.layouts.partials.footer')


    </div>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script src="{{ asset('backend/assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('backend/assets/dist/js/demo.js') }}"></script>

    @stack('js')

</body>

</html>
