$(document).ready(function(){
	$(".incident-create").click(function(){
		var incident_no = $('input[name="incident_no"]').val();
		var status = $('#status option:selected').val();
		
		var category = $('#category option:selected').val();
		var stream = $('#stream option:selected').val();
		var comments = $('#comments').val();
		var hasError = false;
		if(incident_no.trim() == '') {
			swal("Oops!", "Need a Incident Number", "error"); 
			hasError = true;
			$(window).scrollTop(0);
			return false;
		}	

	    if(status == '') {
			swal("Oops!", "We need an status.", "error"); 
			hasError = true;
			return false;
		}
		
		if(category == '') {
			swal("Oops!", "We need an category.", "error"); 
			hasError = true;
			return false;
		}
		
		if(stream == '') {
			swal("Oops!", "We need an stream.", "error"); 
			hasError = true;
			return false;
		}
		
		if(comments.trim() == '') {
			swal("Oops!", "We need an comments.", "error"); 
			hasError = true;
			return false;
		}

	    if(hasError == false) {

			$.ajax({
			    type: "POST",
			    url: '/incidents',
			    contentType: "application/json",
		        dataType: "json",
		        data: JSON.stringify({
		            status: status,
		            category:category,
					stream:stream,
		            comments: comments,
					incident_no:incident_no,
		        }),
			    success: function(result) {
			        
			    	if(result.validation_result == 'false') {
			        	var errors = result.errors;
			        	if(errors.hasOwnProperty("incident_no")) {
			        		$.each(errors.incident_no, function(index){
			        			$('input[name="incident_no"]').parent().append('<div class="req">' + errors.incident_no[index]  + '</div>');	
			        		}); 	
			        	}
			        	
				        if(errors.hasOwnProperty("status")) {
				        	$.each(errors.status, function(index){
				        		$('#status').parent().append('<div class="req">' + errors.status[index]  + '</div>');	
				        	});
				        }
				        if(errors.hasOwnProperty("category")) {
				        	$.each(errors.category, function(index){
				        		$('#category').parent().append('<div class="req">' + errors.category[index]  + '</div>');	
				        	});
				        }
						
				        if(errors.hasOwnProperty("comments")) {
				        	$.each(errors.comments, function(index){
				        		$('input[name="comments"]').parent().append('<div class="req">' + errors.comments[index]  + '</div>');	
				        	});
				        }
				        
			        }
			        else{
			        	console.log(result);
					    swal({
					        title: "Incident Has been Created",
					        //text: groupname+ " '" + name + "' has been created",
					        type: "success",
					        showCancelButton: false,
					        confirmButtonText: "Ok",
					        closeOnConfirm: true
					    }, function () {
					        window.location="/incidents"; 
					    });	   
						  
			        }
			    },
		        error: function(jqXHR, exception) {
		            //alert("Error:"+jqXHR.status+":"+ jqXHR.responseText+":"+exception);
		            //$('#post').html(jqXHR.responseText);
		            console.log(jqXHR.responseText);
		        }
			});

	    }
	    return false;
	});
});
