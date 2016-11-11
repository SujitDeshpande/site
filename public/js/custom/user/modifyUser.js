$(document).ready(function(){
	$(".user-update").click(function(){
		var user_id = $('input[name="mid"]').val();;
		var name = $('input[name="mname"]').val();
		var email = $('input[name="memail"]').val();

		var password = $('input[name="mpassword"]').val();
		var confirm_password = $('input[name="mconfirm_password"]').val();
		var group = $('#select-group option:selected').val();
		var groupname = $('#select-group option:selected').text();

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

	    if(hasError == false) {

			$.ajax({
			    type: "POST",
			    url: '/user/'+user_id,
			    contentType: "application/json",
		        dataType: "json",
		        data: JSON.stringify({
		            name: $('input[name="mname"]').val(),
		            email: $('input[name="memail"]').val(),
		            group: $('#select-group option:selected').val(),
		            password: $('input[name="mpassword"]').val()
		        }),
			    success: function(result) {
			        
			    	if(result.validation_result == 'false') {
			        	var errors = result.errors;
			        	if(errors.hasOwnProperty("name")) {
			        		$.each(errors.name, function(index){
			        			$('input[name="mname"]').parent().append('<div class="req">' + errors.name[index]  + '</div>');	
			        		}); 	
			        	}
			        	
				        if(errors.hasOwnProperty("email")) {
				        	$.each(errors.memail, function(index){
				        		$('input[name="memail"]').parent().append('<div class="req">' + errors.email[index]  + '</div>');	
				        	});
				        }
				        if(errors.hasOwnProperty("group")) {
				        	$.each(errors.group, function(index){
				        		$('#select-group').parent().append('<div class="req">' + errors.group[index]  + '</div>');	
				        	});
				        }
				        
				        if(errors.hasOwnProperty("password")) {
				        	$.each(errors.password, function(index){
				        		$('input[name="mpassword"]').parent().append('<div class="req">' + errors.password[index]  + '</div>');	
				        	});
				        }
				        if(errors.hasOwnProperty("password_confirmation")) {
				        	$.each(errors.password_confirmation, function(index){
				        		$('input[name="mconfirm_password"]').parent().append('<div class="req">' + errors.password_confirmation[index]  + '</div>');	
				        	});
				        }
				        
			        }
			        else{
			        	console.log(result);
					    swal({
					        title: "User Has been Updated",
					        text: groupname+ " '" + name + "' has been updated",
					        type: "success",
					        showCancelButton: false,
					        confirmButtonColor: "#DD6B55",
					        confirmButtonText: "Ok",
					        closeOnConfirm: false
					    }, function () {
					        $('#myModal').modal('hide'); 
					    });						
						      
			        }
			    },
		        error: function(jqXHR, exception) {
		            //alert("Error:"+jqXHR.status+":"+ jqXHR.responseText+":"+exception);
		            //$('#post').html(jqXHR.responseText);
		            //<div id="post">Result</div>
		            console.log(jqXHR.responseText);
		        }
			});
	    }
	    return false;
	});
});
