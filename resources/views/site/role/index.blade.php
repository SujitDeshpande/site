<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Automation | Roles</title>

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
                <strong>Roles</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
	            <div class="ibox-title">
	            	<h5>Roles</h5>
	                <div class="ibox-tools">
	                </div> 
	            </div>
	            <div class="ibox-content">
	            	<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="dataTable">
							<thead>
								<tr>
									<td>Id</td>
									<td>Name</td>
								</tr>
							</thead>
							<tbody>	
								@foreach($groups as $group)
								<tr>
									<td>{{ $group->id }} </td>
									<td>{{ $group->name }}</td>
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
        $(document).ready(function () {
            $('#dataTable').DataTable()
        });

    </script>
</body>

</html>