<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @yield('title')

    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('font-awesome/css/font-awesome.css') !!}
    {!! Html::style('css/plugins/iCheck/custom.css') !!}
    {!! Html::style('css/animate.css') !!}
    {!! Html::style('css/style.css') !!}
</head>

<body class="gray-bg">

    @yield('content')

    <!-- Mainly scripts -->
    {!! Html::script('js/jquery-2.1.1.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}
     <!-- iCheck -->
    {!! Html::script('js/plugins/iCheck/icheck.min.js') !!}
</body>

</html>
