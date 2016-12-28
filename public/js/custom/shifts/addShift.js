$(document).ready(function(){
	//disable not planned shifts
	$(".logged_user_nops").attr("disabled", true);
	
	//Datatable
	$('#dataTable').DataTable({
		paging: false,
		bFilter: false,
		bInfo: false,
		dom: '<"html5buttons"B>lTfgitp',
		buttons: [
			{extend: 'csv',  title: 'Shifts', text: 'Export to Excel'}
		]
    });
	
	//shift drag
	$('.draggable').draggable({
		start: function(event, ui) { 
			$(this).css("z-index", 1);
		}
		
	});
	
	//shift drop
	$( ".droppable" ).droppable({
	  drop: function( event, ui ) {
		var shift = ui.draggable.attr("data-shift");
		var shift_id = ui.draggable.attr("data-shift_id");
		var ps_color = ui.draggable.attr("data-shift_color");
		var ps_desc = ui.draggable.attr("data-shift_desc");
		var shift_date = $(this).data('shift_date');
		var user_id = $(this).data('user_id');
		addShift(shift,shift_id,shift_date,user_id,ps_color,ps_desc);
	  }
	});
	
	//Adding planned shifts by admin
	function addShift(shift,shift_id,shift_date,user_id,ps_color,ps_desc) {
		$.ajax({
			type: "POST",
			url: '/usershifts',
			contentType: "application/json",
			dataType: "json",
			data: JSON.stringify({
				shift:shift,
				date: shift_date,
				user_id: user_id,
				shift_id:shift_id,
				ps_color:ps_color,
				ps_desc:ps_desc
			}),
		success: function(result) {
				 var d = new Date();
				 var m = d.getMonth()+1;
				swal({
					title: "Shift Has been added",
					type: "success",
					showCancelButton: false,
					confirmButtonText: "Ok",
					closeOnConfirm: true
				}, function () {
					window.location="/usershifts/"+sel_year+'/'+sel_month; 
				});	   
				
		},
		error: function(jqXHR, exception) {
			//alert("Error:"+jqXHR.status+":"+ jqXHR.responseText+":"+exception);
			//$('#post').html(jqXHR.responseText);
			console.log(jqXHR.responseText);
			}
		});
	}
	
	//Updating actual shifts by user
	$('.myshift').on('change',function() {
		var shfittype_id = $(this).val();
		var loc_id = $(this).val();
		var login_id = $(this).data('usr_login');
		var date = $(this).closest('tr').data('date');
		var update_type = $(this).data('update_type');
		$.ajax({
			type: "POST",
			url: '/usershifts/'+login_id,
			contentType: "application/json",
			dataType: "json",
			data: JSON.stringify({
				shfittype_id:shfittype_id,
				loc_id:loc_id,
				user_id: login_id,
				date:date,
				update_type:update_type
			}),
			success: function(result) {  
				swal({
					title: "Actual Shift Has been updated",
					type: "success",
					showCancelButton: false,
					confirmButtonText: "Ok",
					closeOnConfirm: true
				}, function () {
					window.location="/usershifts/"+sel_year+'/'+sel_month; 
				});	   
			},
		error: function(jqXHR, exception) {
			//alert("Error:"+jqXHR.status+":"+ jqXHR.responseText+":"+exception);
			//$('#post').html(jqXHR.responseText);
			console.log(jqXHR.responseText);
			}
		});

	});
	
	var url = window.location.href.split('/'); 
	var sel_year = url[4];
	var sel_month = url[5];
	
	//Filter month
	$("#filter_year").val(sel_year);
	$("#filter_month").val(sel_month);
	$('#filter_month').on('change',function(){
	var month = $(this).val();
	var year = $("#filter_year").val();
	$.ajax({
			type: "GET",
			url: '/usershifts/'+year+'/'+month,
			contentType: "text/html",
			dataType: "html",
			success: function(result) {  
				window.location="/usershifts/"+year+'/'+month;	 
		},
		error: function(jqXHR, exception) {
			//alert("Error:"+jqXHR.status+":"+ jqXHR.responseText+":"+exception);
			//$('#post').html(jqXHR.responseText);
			console.log(jqXHR.responseText);
			}
		});

	});
	
	//Filter year
	$('#filter_year').on('change',function(){
		var month = $("#filter_month").val();;
		var year = $(this).val();
		$.ajax({
			type: "GET",
			url: '/usershifts/'+year+'/'+month,
			contentType: "text/html",
			dataType: "html",
			success: function(result) {  
				window.location="/usershifts/"+year+'/'+month;	 
			},
			error: function(jqXHR, exception) {
			//alert("Error:"+jqXHR.status+":"+ jqXHR.responseText+":"+exception);
			//$('#post').html(jqXHR.responseText);
			console.log(jqXHR.responseText);
			}
		});

	});
});






