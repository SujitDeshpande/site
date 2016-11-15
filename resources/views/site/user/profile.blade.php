<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Automation | Dashboard</title>

    @include('site.includes.styles')

</head>

<body>

<div id="wrapper">

    @include('site.includes.navbar')

    <div id="page-wrapper" class="gray-bg">
        @include('site.includes.header')
         <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center m-t-lg">
                        <h1>
                            Welcome to Automation App
                        </h1>
                        <small>
                            Your controls for Automation will appear here...
                        </small>
                    </div>
                </div>
            </div>
        </div>
        @include('site.includes.footer')

    </div>
</div>

@include('site.includes.scripts')
</body>

</html>