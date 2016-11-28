<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Automation | Dashboard</title>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel='stylesheet' />
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel='stylesheet' />
    
    @yield('css')
    <link href="{{ asset('css/animate.css') }}" rel='stylesheet' />
    <link href="{{ asset('css/style.css') }}" rel='stylesheet' />

</head>
<body>
<div id="wrapper">

    @include('site.includes.navbar')

    <div id="page-wrapper" class="gray-bg">
        @include('site.includes.header')
         <div class="wrapper wrapper-content animated fadeInRight">

            @yield('content')

        </div>

    </div>
    
</div>


</body>    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"> </script>

<!-- Mainly scripts -->
<script src="{{ asset('js/bootstrap.min.js') }}"> </script>
<script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"> </script>
<script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"> </script>
<!-- Custom and plugin javascript -->
<script src="{{ asset('js/inspinia.js') }}"> </script>
<script src="{{ asset('js/plugins/pace/pace.min.js') }}"> </script>
@yield('js')

</html>
