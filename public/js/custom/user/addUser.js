$(document).ready(function(){
	$(".user-create").click(function(){

		var name = $('input[name="name"]').val();
		var email = $('input[name="email"]').val();

		var password = $('input[name="password"]').val();
		var confirm_password = $('input[name="confirm_password"]').val();
		var group = $('#select-group option:selected').val();
		var groupname = $('#select-group option:selected').text();

		var status = $('#status-group option:selected').val();
		var statusname = $('#status-group option:selected').text();

		var hasError = false;
		if(name == '') {
			swal("Oops!", "Need a first name.", "error"); 
			hasError = true;
			$(window).scrollTop(0);
			return false;
		}	

	    if(email == '') {
			swal("Oops!", "We need an email.", "error"); 
			hasError = true;
			return false;
		}

		if (password == '' || confirm_password == '') {
			swal("Oops!", "Password and Confirm Password needs to be filled.", "error");
			hasError = true;
			return false;
		}

		if (password != confirm_password) {
			swal("Oops!", "Passwords do not match.", "error"); 
			hasError = true;
			return false;
		}

		if(group == '') {
			swal("Oops!", "We need a group.", "error"); 
			hasError = true;
			return false;
		}

		if(statusname == '') {
			swal("Error", "Please Select a Status", "error"); 
			hasError = true;
			return false;
		}

	    if(hasError == false) {

			$.ajax({
			    type: "POST",
			    url: '/user',
			    contentType: "application/json",
		        dataType: "json",
		        data: JSON.stringify({
		            name: $('input[name="name"]').val(),
		            email: $('input[name="email"]').val(),
		            group: $('#select-group option:selected').val(),
		            status: $('#status-group option:selected').val(),
		            password: $('input[name="password"]').val()
		        }),
			    success: function(result) {
			        
			    	if(result.validation_result == 'false') {
			        	var errors = result.errors;
			        	if(errors.hasOwnProperty("name")) {
			        		$.each(errors.name, function(index){
			        			$('input[name="name"]').parent().append('<div class="req">' + errors.name[index]  + '</div>');	
			        		}); 	
			        	}
			        	
				        if(errors.hasOwnProperty("email")) {
				        	$.each(errors.email, function(index){
				        		$('input[name="email"]').parent().append('<div class="req">' + errors.email[index]  + '</div>');	
				        	});
				        }
				        if(errors.hasOwnProperty("group")) {
				        	$.each(errors.group, function(index){
				        		$('#select-group').parent().append('<div class="req">' + errors.group[index]  + '</div>');	
				        	});
				        }

				        if(errors.hasOwnProperty("status")) {
				        	$.each(errors.status, function(index){
				        		$('#status-group').parent().append('<div class="req">' + errors.status[index]  + '</div>');	
				        	});
				        }
				        
				        if(errors.hasOwnProperty("password")) {
				        	$.each(errors.password, function(index){
				        		$('input[name="password"]').parent().append('<div class="req">' + errors.password[index]  + '</div>');	
				        	});
				        }
				        if(errors.hasOwnProperty("password_confirmation")) {
				        	$.each(errors.password_confirmation, function(index){
				        		$('input[name="confirm_password"]').parent().append('<div class="req">' + errors.password_confirmation[index]  + '</div>');	
				        	});
				        }
				        
			        }
			        else{
			        	console.log(result);

					    swal({
					        title: "User Has been Created",
					        text: groupname+ " '" + name + "' has been created",
					        type: "success",
					        showCancelButton: false,
					        confirmButtonText: "Ok",
					        closeOnConfirm: true
					    }, function () {
					        window.location="/user"; 
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
