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
						<table class="table table-striped table-bordered table-hover dataTables-example">
							<thead>
								<tr>
									<td>Id</td>
									<td>Name</td>
									<td>Email</td>
                                    <td>Role</td>
									<td>Edit / Delete User</td>
								</tr>
							</thead>
							<tbody>	
								@foreach($users as $user)
								<tr>
									<td> {{$user->id}} </td>
									<td>{{ $user->name }}</td>
									<td>{{ $user->email }}</td>
                                    <td>{{ $user->groupname }}</td>
									<td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i>
                                        </button>
                                        <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content animated bounceInRight">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                            <i class="fa fa-user modal-icon"></i>
                                                            <h4 class="modal-title">Edit User</h4>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form role="form">
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label">ID</label>
                                                                    <div class="col-sm-10">
                                                                        <input readonly="readonly" name="mid" value="{{ $user->id }}" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <p>&nbsp;</p>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label">Name</label>
                                                                    <div class="col-sm-10">
                                                                        <input name="mname" value="{{ $user->name }}" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <p>&nbsp;</p>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label">Email</label>
                                                                    <div class="col-sm-10">
                                                                        <input name="memail" value="{{ $user->email }}" class="form-control">
                                                                    </div>
                                                                </div>                                        
                                                                <p>&nbsp;</p>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label">Group</label>
                                                                    <div class="col-sm-10">
                                                                        <input name="mGroup" value="{{ $user->groupname }}" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <p>&nbsp;</p>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label">Password</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="password" placeholder="Leave this field blank to keep the password unchanged" name="mpassword" value class="form-control">
                                                                    </div>
                                                                </div>
                                                                <p>&nbsp;</p>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label">Confirm Password</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="password" placeholder="Leave this field blank to keep the password unchanged" name="mconfirm_password" value class="form-control">
                                                                    </div>
                                                                </div>
                                                                <p>&nbsp;</p>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary">Save changes</button>
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
        $.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
		});    
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'}

                ]

            });

            /* Init DataTables */
            var oTable = $('#editable').DataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>

    <script type="text/javascript" src="js/custom/user/deleteUser.js"></script>
    <script type="text/javascript" src="js/custom/user/modifyUser.js"></script>

</body>

</html>
