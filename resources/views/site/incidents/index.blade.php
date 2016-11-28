<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Automation | Incidents</title>

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
                <strong>Incident Dashbord</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
	            <div class="ibox-title">
	            	<h5>Incidents</h5>
	                <div class="ibox-tools">
	                    <!--<button type="button" class="btn btn-primary btn" data-toggle="modal" data-target="#createModal"><i class="fa fa-plus"></i> Create New Record</button>-->
						<button type="button" class="btn btn-primary btn" data-toggle="modal" data-target="#createModal"><i class="fa fa-plus"></i> Insert Record
                                        </button>
							<?php 
								$date = date('d F, Y');
								?>
										<div class="modal inmodal" id="createModal" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content animated bounceInRight">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                            <h4 class="modal-title">Add Incident</h4>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form role="form">
                                                                <div class="form-group">
                                                                        <input name="mid" id="mid" class="form-control" type="hidden">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label">Name</label>
                                                                    <div class="col-sm-10">
                                                                        <input name="mname" id="mname" value="{{$name}}" class="form-control" disabled>
                                                                    </div>
                                                                </div>
                                                                <p>&nbsp;</p>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label">Date</label>
                                                                    <div class="col-sm-10">
                                                                        <input name="date" id="date" value="{{$date}}" class="form-control" disabled>
                                                                    </div>
                                                                </div> 
																<p>&nbsp;</p>
																<div class="form-group">
                                                                    <label class="col-sm-2 control-label">Incident Number</label>
                                                                    <div class="col-sm-10">
                                                                        <input name="incident_no" id="incident_no" value="" class="form-control" required="true">
                                                                    </div>
                                                                </div>
                                                                
                                                                <p>&nbsp;</p>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label">Status</label>
                                                                    <div class="col-sm-10">
																	<select class="form-control" id="status" required="true">
																		<option value="">
																		-- Select --
																		</option>
																		<option value="WIP">
																		WIP
																		</option>
																		<option value="Complete">
																		Complete
																		</option>
												
																	</select>
                                                                    </div>
                                                                </div>
                                                                <p>&nbsp;</p>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label">Category</label>
                                                                    <div class="col-sm-10">
																	<select class="form-control" id="category" required="true">
																		<option value="">
																		-- Select --
																		</option>
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
																<p>&nbsp;</p>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label">Stream</label>
                                                                    <div class="col-sm-10">
																	<select class="form-control" id="stream" required="true">
																		<option value="">
																		-- Select --
																		</option>
																		<option value="mPos">
																		mPos
																		</option>
																		<option value="FastFind">
																		FastFind
																		</option>
																	
																	</select>
                                                                    </div>
                                                                </div>
                                                                <p>&nbsp;</p>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label">Comments</label>
                                                                    <div class="col-sm-10">
																		<textarea class="form-control" rows="5" name="comments" id="comments" required="true"></textarea>
                                                                    </div>
                                                                </div>
                                                                <p>&nbsp;</p>
                                                                <div class="modal-footer">
                                                                    <button type="button" class= "btn btn-white" data-dismiss="modal">Close</button>
                                                                    <button type="button" class="incident-create btn btn-primary">Save</button>
                                                                </div>                                                        
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
										

					</div> 
	            </div>  
	            <div class="ibox-content">
	            	<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover dataTable">
							<thead>
								<tr>
									<td>Sr No</td>
									<td>Name</td>
									<td>Date</td>
									<td>Incident Number</td>
                                    <td>Status</td>
                                    <td>Category</td>
									<td>Stream</td>
									<td>Comments</td>
									<td>Edit / Delete Incident</td>
								</tr>
							</thead>
							<tbody>	
								<?php $i= 0;
								?>
								
								@foreach($incidents as $incs)
								<?php $i++; ?>
								<tr>
									<td>{{ $i }} </td>
									<td>{{ $incs->name }} </td>
									<td>{{  $date('d F, Y') }} </td>
									<td>{{ $incs->incident_no }} </td>
									<td>{{ $incs->status }}</td>
									<td>{{ $incs->category }}</td>
									<td>{{ $incs->stream }}</td>
                                    <td>{{ $incs->comments }}</td>

									<td>
										@if($logged_user_id == $incs->user_id)
                                        <button data-incident="{{ $incs->id }}" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" data-bid="{{$incs->id}},{{$incs->incident_no}},{{$incs->status}},{{$incs->category}},{{$incs->stream}},{{$incs->comments}}"><i class="fa fa-edit"></i>
                                        </button>
										<a data-incident="{{ $incs->id }}" id="incident{{ $incs->id }}" class="delete-incident btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        @endif
										<div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content animated bounceInRight">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                            <h4 class="modal-title">Edit Incident</h4>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form role="form">
                                                                <div class="form-group">
                                                                        <input name="mid" id="incid" value="{{$incs->id}}" class="form-control" type="hidden">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label">Name</label>
                                                                    <div class="col-sm-10">
                                                                        <input name="mname" id="mname" value="{{$name}}" class="form-control" disabled>
                                                                    </div>
                                                                </div>
                                                                <p>&nbsp;</p>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label">Date</label>
                                                                    <div class="col-sm-10">
                                                                        <input name="date" id="date" value="{{date('d F, Y')}}" class="form-control" disabled>
                                                                    </div>
                                                                </div>
                                                                <p>&nbsp;</p>
																 <div class="form-group">
                                                                    <label class="col-sm-2 control-label">Incident Number</label>
                                                                    <div class="col-sm-10">
                                                                        <input name="date" id="select-incident_no" value="" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <p>&nbsp;</p>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label">Status</label>
                                                                    <div class="col-sm-10">
																	<select class="form-control" id="select-status" required="true">
																		<option value="WIP">
																		WIP
																		</option>
																		<option value="Complete">
																		Complete
																		</option>
												
																	</select>
                                                                    </div>
                                                                </div>
                                                                <p>&nbsp;</p>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label">Category</label>
                                                                    <div class="col-sm-10">
																	<select class="form-control" id="select-category" required="true">
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
																<p>&nbsp;</p>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label">Stream</label>
                                                                    <div class="col-sm-10">
																	<select class="form-control" id="select-stream" required="true">
																		
																		<option value="mPos">
																		mPos
																		</option>
																		<option value="FastFind">
																		FastFind
																		</option>
																	
																	</select>
                                                                    </div>
                                                                </div>
                                                                <p>&nbsp;</p>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label">Comments</label>
                                                                    <div class="col-sm-10">
																		<textarea class="form-control" rows="5" name="comments" id="select-comments" required="true"></textarea>
                                                                    </div>
                                                                </div>
                                                                <p>&nbsp;</p>
                                                                <div class="modal-footer">
                                                                    <button type="button" class= "btn btn-white" data-dismiss="modal">Close</button>
                                                                    <button type="button" class="incident-update btn btn-primary">Save changes</button>
                                                                </div>                                                        
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>  
										


										
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
		
		$('#createModal').on('hidden.bs.modal', function () {
          $(this).removeData('bs.modal');
        });
		
		
		
        $('#myModal').on('show.bs.modal', function (event) {
            
            var button = $(event.relatedTarget)
            var csv = button.data('bid')
			
            var arr = csv.split(',');
			$(".modal-body #incid").val( arr[0] );
            $(".modal-body #select-incident_no").val(arr[1]);
			$("#select-status").val(arr[2].trim());
			$("#select-category").val(arr[3].trim());
			$("#select-stream").val(arr[4].trim());
            $(".modal-body #select-comments").val( arr[5] );
            //alert(lines)
        });

        $.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
		});    
        $(document).ready(function () {
            $('.dataTable').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'csv',  title: 'Incidents', text: 'Export to Excel'}
                ]

            });


        });

    </script>
	<script type="text/javascript" src="js/custom/incidents/addIncident.js"></script>
    <script type="text/javascript" src="js/custom/incidents/deleteIncident.js"></script>
    <script type="text/javascript" src="js/custom/incidents/modifyIncident.js"></script>

</body>

</html>
