@extends('layouts.site.dashboard')

@section('title')
<title>Automation | Users</title>
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>Calendar</h2>
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
	                    <a href="#" class="btn btn-primary btn"><i class="fa fa-plus"></i> Create New User</a>
	                </div> 
	            </div>  
	            <div class="ibox-content">
	            	<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover dataTables-example">
							<tr>
								<td>Id</td>
								<td>Name</td>
								<td>Email</td>
								<td></td>
							</tr>	
							@foreach($users as $user)
							<tr>
								<td> {{$user->id}} </td>
								<td><a href="#">{{ $user->name }}</a></td>
								<td><a href="#">{{ $user->email }}</a></td>
								<td>
									<a data-user="{{ $user->id }}" id="user{{ $user->id }}" class="delete-user btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
							@endforeach
						</table>
					</div>
	            </div>         	
            </div>
        </div>
    </div>
</div>
@endsection