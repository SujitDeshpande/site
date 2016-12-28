
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Automation | User Shifts</title>

    @include('site.includes.styles')
	<meta name="csrf-token" content="{!! csrf_token() !!}"/>
	<style>
	.table th {
		text-align: center;
	}
	.label_width {
		float: left;
		width: 100px;
	}
	.list-group-item {
		cursor:move;
	}
	#dataTable { text-align: center; }
	</style>
	
</head>

<body>

<div id="wrapper">

@include('site.includes.navbar')

<div id="page-wrapper" class="gray-bg">
@include('site.includes.header')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>User Shifts</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/home">Home</a>
            </li>
            <li class="active">
                <strong>User Shifts</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row animated fadeInDown">
		<?php $class = "col-lg-12";?>
		@if($is_admin == 1)
		<?php 
		$class = "col-lg-10";
		?>
        <div class="col-lg-2 drag_div">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>User Shifts</h5>
                </div>
                <div class="ibox-content">
				<p>Drag a shift and drop into the shift user.</p>
				  <ul class="list-group">
				  <?php $i=0;?>
				  @foreach($shift_types as $sft_type)
					<?php $i++;
					?>
					@if($i <= 2) 
					<li data-shift="{{$sft_type->shift_type}}" data-shift_color="{{$sft_type->shift_color}}" data-shift_id="{{$sft_type->id}}" data-shift_desc="{{$sft_type->shift_desc}}" class="draggable list-group-item" style="background-color:{{$sft_type->shift_color}};">{{$sft_type->shift_type}}--{{$sft_type->shift_desc}}</li>
					@endif
				  @endforeach
				  </ul>
                </div>
            </div>
        </div>
		@endif
        <div class="{{$class}}">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>User Shifts </h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
								<?php
								$filter_mstyle = "style=width:auto;float:left;";
								$filter_ystyle = "style=width:auto;";
								?>
						<div style="margin-bottom:-30px">
							<select id="filter_month" {{$filter_mstyle}} class="form-control filter_month">
								<?php
								for ($m=1; $m<=12; $m++) {
									$mlead = 0;
									if($m > 9) {
										$mlead = '';
									}
									$month = date('F', mktime(0,0,0,$m, 1, date('Y')));
									?>
									<option value="{{$mlead}}{{$m}}">{{$month}}</option>
								<?php } ?>
							</select>
								<?php
								//Get year dropown
								$currently_selected = date('Y'); 
								 // Year to start available options at
								$earliest_year = 1950; 
								// Set your latest year you want in the range, in this case we use PHP to just set it to the current year.
								$latest_year = date('Y');
								?>
							<select id="filter_year" {{$filter_ystyle}} class="form-control filter_year">
								<?php
								  // Loops over each int[year] from current year, back to the $earliest_year [1950]
								  foreach ( range( $latest_year, $earliest_year ) as $i ) { 
									$selected = '';
									if($i == $currently_selected) {
										$selected = 'selected';
									}
									  
								?>
										<option value="{{$i}}" {{$selected}}>{{$i}}</option>
								<?php } ?>
							</select>
						</div>
						<table class="table table-striped table-bordered table-hover" id="dataTable">
							<thead>
								<tr>
									<th rowspan="2">Date</th>
									<th rowspan="2">Day</th>
									<th colspan="{{$shift_usr}}">Shift Users</th>
									@if($is_admin == 2)
									<th rowspan="2">Actuals</th>
									<th rowspan="2">Location</th>
									@endif
								</tr>
								<tr>
									@foreach($users as $u)
									@if($u->shift_user == 'Y')
										<th>{{$u->name}}</th>
									@endif
									@endforeach
									
								</tr>
							</thead>
							<tbody>
								<?php 
								
								$sel_year = (int)$year;
								$sel_month=(int)$mon;
								
								//calculate maxdays in moonth
								$maxDays=cal_days_in_month(CAL_GREGORIAN,$sel_month,$sel_year);
								
								//looping each day
								for($i = 1;$i <= $maxDays;$i++) {
									$zero = 0;
									if($i>9) {
										$zero = '';
									}
								$date = $year.'-'.$mon.'-'.$zero.$i;
								
								$dayname = date('D', strtotime($date));
								?>
								<tr id="shift_data" class="{{$month}}" data-date="{{$date}}">
									<td><?php echo $zero.$i;?></td>
									<td>{{$dayname}}</td>
									<?php
									//user_logged
									$logged = '';
									?>
									@foreach($users as $u)
									@if($u->shift_user == 'Y')
										<?php 
										$shft_name = ""; 
										$ps_color = "";
										$as_color = "";
										$shift_id = "";
										$ps_abbr = "";
										$as_abbr = "";
										$act_shift = "";
										$loc = "";
										?>
										@foreach($shifts as $shift)
											@foreach($shift as $s)
												@if($date == $s->date && $u->id == $s->user_id)
													<?php 
													$shft_name = "<b>Planned -- $s->planned_shift</b>";
													$shift_id = $s->id;
													$ps_color = $s->ps_color;
													$as_color  = $s->shift_color;
													$ps_abbr = $s->ps_desc;
													$as_abbr = $s->shift_desc;
													$act_shift = "<b>Actual -- $s->actual_shift</b>";
													$loc = "<b>Location -- $s->location</b>";
													if($s->sid == 5) {
														$act_shift = "<b>Actual -- TBD</b>";
													}
													if($s->l_id == 0) {
														$loc = "<b>Location -- TBD</b>";
													}
													?>
												@endif
											@endforeach
										@endforeach
										<?php
										if($shft_name == '' && ($u->id == $worker_id)) {
											$logged = 'logged_user_nops';
										}
										?>
										<td data-shift_date="{{$date}}" data-user_id="{{$u->id}}" class="droppable">
										<abbr title="{{$ps_abbr}}"><span class="label label_width" style="background-color:{{$ps_color}}"><?php echo $shft_name;?></span></abbr><br/>
										@if($act_shift !== 'Actual--') 
										<abbr title="{{$as_abbr}}"><span class="label label_width" style="background-color:{{$as_color}}"><?php echo $act_shift; ?></abbr><br/>
										@endif
										@if($loc !== 'Location--')
										<span class="label label_width"><?php echo $loc; ?></span>
										@endif
										</td>
										
									@endif
									@endforeach
									@if($is_admin == 2)
									<td>
										<select class="form-control myshift {{$logged}}" data-update_type="shift" data-usr_login="{{$worker_id}}">
											<option value="">--select--</option>
											@foreach($shift_types as $sft_type)
											@if($sft_type->id !== 5) 
											<option value="{{$sft_type->id}}">
												{{$sft_type->shift_type}}
											</option>
											@endif
											@endforeach
										</select>
									
									</td>
									<td>
										<select id="work_loc" class="form-control myshift {{$logged}}" data-update_type="locs" data-usr_login="{{$worker_id}}">
											<option value="">--select--</option>
											@foreach($locs as $lo)
											<option value="{{$lo->id}}">
												{{$lo->location}}
											</option>
											@endforeach
										</select>
										@endif
									</td>
								</tr>
								<?php } ?>
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

<script>
	$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	});
</script>
<script type="text/javascript" src="../../js/jquery-ui-1.10.4.min.js"></script>
<script type="text/javascript" src="../../js/custom/shifts/addShift.js"></script>
</body>

</html>
