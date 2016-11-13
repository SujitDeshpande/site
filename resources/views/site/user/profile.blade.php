<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Automation | Profile</title>

    @include('site.includes.styles')
    
    <meta name="csrf-token" content="{!! csrf_token() !!}"/>

</head>

<body>

<div id="wrapper">

@include('site.includes.navbar')

<div id="page-wrapper" class="gray-bg">
@include('site.includes.header')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Automation</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/home">Home</a>
            </li>
            <li>
                <a href="user">Users</a>
            </li>
            <li class="active">
                <strong>Profile</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Profile</h5>
                    <div class="ibox-tools">

                    </div>
                </div>  
                <div class="ibox-content">

                    <form method="get" class="form-horizontal" autocomplete="off">
                         
                        <div class="form-group"><label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input name="name" value class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input name="email" value class="form-control">
                            </div>
                        </div>                                        

                        

                        <div class="form-group"><label class="col-sm-2 control-label">Group</label>
                            <div class="col-sm-10">
                                {!! Form::select('group', $groups , null, ['class'=>'form-control', 'id'=>'select-group']) !!}
                            </div>
                        </div>

                        <div class="form-group"><label class="col-sm-2 control-label">Group</label>
                            <div class="col-sm-10">
                                {!! Form::select('status', $status , null, ['class'=>'form-control', 'id'=>'status-group']) !!}
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" value class="form-control">
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="confirm_password" value class="form-control">
                            </div>

                        </div>

                        <div class="hr-line-dashed"></div>


                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a class="btn btn-white" href="/user"><i class="fa fa-close"></i> Cancel</a>
                                <button class="user-create btn btn-primary" type="submit"><i class="fa fa-check"></i> Save changes</button>

                            </div>
                        </div>
                    </form>
                </div>       
            </div>
        </div>
    </div>
</div>

@include('site.includes.footer')
</div>
</div>
    @include('site.includes.scripts')
    
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".chosen").chosen({
        width:'50%'
    });

</script>
<script type="text/javascript" src="js/custom/user/addUser.js"></script>

</body>

</html>
