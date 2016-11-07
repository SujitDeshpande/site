<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @yield('title')

    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('font-awesome/css/font-awesome.css') !!}
    {!! Html::style('css/plugins/iCheck/custom.css') !!}
    {!! Html::style('css/plugins/fullcalendar/fullcalendar.css') !!}
    {!! Html::style('css/plugins/fullcalendar/fullcalendar.print.css') !!}
    {!! Html::style('css/animate.css') !!}
    {!! Html::style('css/style.css') !!}

</head>

<body>

<div id="wrapper">

    @include('site.includes.navbar')

    <div id="page-wrapper" class="gray-bg">
        @include('site.includes.header')
        @yield('content')


    </div>
</div>

<!-- Mainly scripts -->
{!! Html::script('js/plugins/fullcalendar/moment.min.js') !!}
{!! Html::script('js/jquery-2.1.1.js') !!}
{!! Html::script('js/bootstrap.min.js') !!}
{!! Html::script('js/plugins/metisMenu/jquery.metisMenu.js') !!}
{!! Html::script('js/plugins/slimscroll/jquery.slimscroll.min.js') !!}

<!-- Custom and plugin javascript -->
{!! Html::script('js/inspinia.js') !!}
{!! Html::script('js/plugins/pace/pace.min.js') !!}
<!-- jQuery UI custom -->
{!! Html::script('js/jquery-ui.custom.min.js') !!}
<!-- iCheck -->
{!! Html::script('js/plugins/iCheck/icheck.min.js') !!}
<!-- Full Calendar -->
{!! Html::script('js/plugins/fullcalendar/fullcalendar.min.js') !!}
</body>

</html>
