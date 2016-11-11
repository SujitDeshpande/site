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
									<td>Delete User</td>
								</tr>
							</thead>
							<tbody>	
								@foreach($users as $user)
								<tr>
									<td> {{$user->id}} </td>
									<td><a href="/user/{{$user->id}}">{{ $user->name }}</a></td>
									<td><a href="/user/{{$user->id}}">{{ $user->email }}</a></td>
                                    <td><a href="/user/{{$user->id}}">{{ $user->groupname }}</a></td>
									<td>
                                        <a data-user="{{ $user->id }}" id="user{{ $user->id }}" class="edit-user btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
                                        </button>
                                            </div>
                                        <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content animated bounceInRight">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <i class="fa fa-laptop modal-icon"></i>
                                                        <h4 class="modal-title">Modal title</h4>
                                                        <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                                                            printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                                                            remaining essentially unchanged.</p>
                                                                <div class="form-group"><label>Sample Input</label> <input type="email" placeholder="Enter your email" class="form-control"></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
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
    <script type="text/javascript" src="js/custom/user/editUser.js"></script>

</body>

</html>
