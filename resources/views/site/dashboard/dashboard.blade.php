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
        <?php?>
         <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                @if($group_id == 1)
                <div class="col-lg-4">
                    <div class="ibox-content text-center">

                            <div class="m-b-md">
                            <h2 class="font-bold no-margins">
                                
                            </h2>
                                <small></small>
                            </div>
                            <!--<img src="img/a4.jpg" class="img-circle circle-border m-b-md" alt="profile">-->
                            <i class="fa fa-users fa-5x"></i>
                            <div>
                                <span>{{$user_count}} Users</span> 
                            </div>
                        </div>
                        <div class="widget-text-box">
                            <h4 class="media-heading"></h4>
                            <p class="text-center">Users Content</p>
                            <div class="text-center">
                                <a href="/user"><button type="button" class="btn btn-primary btn">View All Users </button></a>
                            </div>
                        </div>
                </div>
                @endif
                
                <div class="col-lg-4">
                    <div class="widget-head-color-box navy-bg p-lg text-center">
                            <div class="m-b-md">
                            <h2 class="font-bold no-margins">
                                
                            </h2>
                                <small></small>
                            </div>
                            <i class="fa fa-comments fa-5x"></i>
                            <div>
                                <span>{{$disc_count}} Discussions</span>
                            </div>
                        </div>
                        <div class="widget-text-box">
                            <h4 class="media-heading"></h4>
                            <p class="text-center">Discussions content</p>
                            <div class="text-center">
                                <a href="/forums"><button type="button" class="btn btn-primary btn">View All Discussions </button></a>
                            </div>
                        </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget-head-color-box navy-bg p-lg text-center">
                            <div class="m-b-md">
                            <h2 class="font-bold no-margins">
                                
                            </h2>
                                <small></small>
                            </div>
                            <i class="fa fa-stack-exchange fa-5x"></i>
                            <div>
                                <span>{{$incident_count}} Incidents</span>
                            </div>
                        </div>
                        <div class="widget-text-box">
                            <h4 class="media-heading"></h4>
                            <p class="text-center">Incidents content</p>
                            <div class="text-center">
                                <a href="/incidents"><button type="button" class="btn btn-primary btn">View All Incidents </button></a>
                            </div>
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