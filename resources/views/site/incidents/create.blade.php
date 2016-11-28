<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Automation | Create Incident</title>

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
                <a href="/incidents">Users</a>
            </li>
            <li class="active">
                <strong>Create</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Create Incident</h5>
                    <div class="ibox-tools">

                    </div>
                </div>  
                                <div class="ibox-content">

                                    <form method="get" class="form-horizontal" autocomplete="off">
                                         
                                        <div class="form-group"><label class="col-sm-2 control-label">Name</label>
                                            <div class="col-sm-10">
                                                <input name="name" value="{{$name}}" class="form-control">
                                            </div>
                                        </div>
										<?php 
											  $date = date('Y-m-d H:i:s');
								        ?>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Date</label>
                                            <div class="col-sm-10">
                                                <input name="date" value={{$date}} class="form-control">
                                            </div>
                                        </div>                                        

                                        

                                        <div class="form-group"><label class="col-sm-2 control-label">Status</label>
                                            <div class="col-sm-10">
												<select class="form-control" id="status">
													<option value="WIP">
													WIP
													</option>
													<option value="Complete">
													Complete
													</option>
												
												</select>
                                                <!--{!! Form::select('group', $groups , null, ['class'=>'form-control', 'id'=>'select-group']) !!}-->
                                            </div>
                                        </div>

                                        <div class="form-group"><label class="col-sm-2 control-label">Category</label>
                                            <div class="col-sm-10">
                                                <!--{!! Form::select('status', $status , null, ['class'=>'form-control', 'id'=>'status-group']) !!}-->
												<select class="form-control" id="category">
													<option value="Data">
													Data
													</option>
													<option value="Code">
													Code
													</option>
													<option value="Expected Behaviour">
													Expected Behaviour
													</option>
												
												</select>
                                            </div>
                                        </div>

                                        <div class="hr-line-dashed"></div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Comments</label>
                                            <div class="col-sm-10">
                                                <input type="tetxarea" name="password" value class="form-control">
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
<script type="text/javascript" src="js/custom/incidents/addIncident.js"></script>

</body>

</html>
