<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Automation | Users</title>

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
            <li class="active">
                <strong>Users</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
	            <div class="ibox-title">
	            	<h5>Users</h5>
	                <div class="ibox-tools">
	                    <a href="create" class="btn btn-primary btn"><i class="fa fa-plus"></i> Create New User</a>
	                </div> 
	            </div>  
	            <div class="ibox-content">
	            	<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="dataTable">
							<thead>
								<tr>
									<td>Id</td>
									<td>Name</td>
									<td>Email</td>
                                    <td>Role</td>
                                    <td>Status</td>
									<td>Edit / Delete User</td>
								</tr>
							</thead>
							<tbody>	
								@foreach($users as $user)
								<tr>
									<td>{{ $user->id }} </td>
									<td>{{ $user->name }}</td>
									<td>{{ $user->email }}</td>
                                    <td>{{ $user->groupname }}</td>
                                    <td>
                                    @if ( $user->statusname == "Active")
                                    <span class="label label-primary">{{ $user->statusname }}</span>
                                    @elseif ( $user->statusname  == "Inactive")
                                    <span class="label label-danger">{{ $user->statusname }}</span>
                                    @elseif ( $user->statusname == "Awaiting Approval")
                                    <span class="label label-warning">{{ $user->statusname }}</span>
                                    @endif
                                    </td>

									<td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" data-bid="{{ $user->id }},{{ $user->name }},{{ $user->email }},{{ $user->groupname }},{{ $user->avatar }} "><i class="fa fa-edit"></i>
                                        </button>
                                        <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content animated bounceInRight">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                            <img name="mimage" id="mimage" class="mimage modal-icon img-circle"  alt="image" width="20%" height="20%"/>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form role="form">
                                                                <div class="form-group">
                                                                        <input name="mid" id="mid" class="form-control" type="hidden">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label">Name</label>
                                                                    <div class="col-sm-10">
                                                                        <input name="mname" id="mname" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <p>&nbsp;</p>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label">Email</label>
                                                                    <div class="col-sm-10">
                                                                        <input name="memail" id="memail" class="form-control">
                                                                    </div>
                                                                </div>                                        
                                                                <p>&nbsp;</p>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label">Group</label>
                                                                    <div class="col-sm-10">
                                                                    {!! Form::select('group', $groups , $user->groupname, ['class'=>'form-control', 'id'=>'select-group']) !!}
                                                                    </div>
                                                                </div>
                                                                <p>&nbsp;</p>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label">Status</label>
                                                                    <div class="col-sm-10">
                                                                    {!! Form::select('status', $status , $user->statusname, ['class'=>'form-control', 'id'=>'status-group']) !!}
                                                                    </div>
                                                                </div>
                                                                <p>&nbsp;</p>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label">Password</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="password" placeholder="Leave this field blank to keep your password unchanged..." name="mpassword" value class="form-control">
                                                                    </div>
                                                                </div>
                                                                <p>&nbsp;</p>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label">Confirm Password</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="password" placeholder="Leave this field blank to keep your password unchanged..." name="mconfirm_password" value class="form-control">
                                                                    </div>
                                                                </div>
                                                                <p>&nbsp;</p>
                                                                <div class="modal-footer">
                                                                    <button type="button" class= "btn btn-white" data-dismiss="modal">Close</button>
                                                                    <button type="button" class="user-update btn btn-primary">Save changes</button>
                                                                </div>                                                        
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>                                        


										<a data-user="{{ $user->id }}" id="user{{ $user->id }}" class="delete-user btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
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


    <!-- Page-Level Scripts -->
    <script>
        $('#myModal').on('hidden.bs.modal', function () {
          $(this).removeData('bs.modal');
        });

        $('#myModal').on('show.bs.modal', function (event) {
            
            var button = $(event.relatedTarget)
            var csv = button.data('bid')

            var arr = csv.split(',');
            $(".modal-body #mid").val( arr[0] );
            $(".modal-body #mname").val( arr[1] );
            $(".modal-body #memail").val( arr[2] );
            $('.modal-header #mimage').attr('src', '/uploads/avatars/'+arr[4]);
            //$(".modal-body #mimage").val( arr[4] );
            //$(".modal-body #select-group").val( arr[3] );
            //alert(lines)
        });

        $.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
		});    
        $(document).ready(function () {
            $('#dataTable').DataTable()
        });

    </script>

    <script type="text/javascript" src="js/custom/user/deleteUser.js"></script>
    <script type="text/javascript" src="js/custom/user/modifyUser.js"></script>

</body>

</html>
