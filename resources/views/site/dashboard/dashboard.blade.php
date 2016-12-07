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
                <div class="col-md-4">
                    <div class="ibox float-e-margins">

                        <div class="ibox-title">
                            <h5>Users</h5>
                        </div>

                        <div>
                            <div class="ibox-content no-padding border-left-right">
                                <img alt="image" class="img-responsive" src="img/users.jpg">

                            </div>
                            <div class="ibox-content profile-content">
                                <div class="text-center">
                                <b><span>{{$user_count}} Users</span> </b>
                                </div>
                                <div class="user-button">
                                    <div class="row">
                                        <div class="text-center">
                                            <a href="/user"><button type="button" class="btn btn-primary btn">View All Users </button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                </div>
                @endif

                <div class="col-md-4">
                    <div class="ibox float-e-margins">

                        <div class="ibox-title">
                            <h5>Discussions</h5>
                        </div>

                        <div>
                            <div class="ibox-content no-padding border-left-right">
                                <img alt="image" class="img-responsive" src="img/discussion.jpg">

                            </div>
                            <div class="ibox-content profile-content">
                                <div class="text-center">
                                <b><span>{{$disc_count}} Discussion Threads</span> </b>
                                </div>
                                <div class="user-button">
                                    <div class="row">
                                        <div class="text-center">
                                            <a href="/forums"><button type="button" class="btn btn-primary btn">View All Discussions </button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                </div>                
                
                <div class="col-md-4">
                    <div class="ibox float-e-margins">

                        <div class="ibox-title">
                            <h5>Incidents</h5>
                        </div>

                        <div>
                            <div class="ibox-content no-padding border-left-right">
                                <img alt="image" class="img-responsive" src="img/incidents.jpg">

                            </div>
                            <div class="ibox-content profile-content">
                                <div class="text-center">
                                <b><span>{{$incident_count}} Incidents</span> </b>
                                </div>
                                <div class="user-button">
                                    <div class="row">
                                        <div class="text-center">
                                            <a href="/incidents"><button type="button" class="btn btn-primary btn">View All Incidents </button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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