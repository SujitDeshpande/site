$(document).ready(function(){
	$(".profile-update").click(function(){

		var id = $Auth::user()->id;
		var name = $('input[name="name"]').val();

		var password = $('input[name="password"]').val();
		var confirm_password = $('input[name="confirm_password"]').val();

		var hasError = false;
		if(name == '') {
			swal("Error", "Please Enter a Valid Name!", "error"); 
			hasError = true;
			$(window).scrollTop(0);
			return false;
		}	

		if (password != confirm_password) {
			swal("Error", "Passwords do not match.", "error"); 
			hasError = true;
			return false;
		}

	    if(hasError == false) {

			$.ajax({
			    type: "POST",
			    url: '/profile',
			    contentType: "application/json",
		        dataType: "json",
		        data: JSON.stringify({
		            name: $('input[name="name"]').val(),
		            password: $('input[name="mpassword"]').val()
		        }),
			    success: function(result) {
			        
			    	if(result.validation_result == 'false') {
			        	var errors = result.errors;
			        	if(errors.hasOwnProperty("name")) {
			        		$.each(errors.name, function(index){
			        			$('input[name="name"]').parent().append('<div class="req">' + errors.name[index]  + '</div>');	
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
					        title: "User Has been Updated",
					        text: name + "' has been updated",
					        type: "success",
					        showCancelButton: false,
					        confirmButtonText: "Ok",
					        closeOnConfirm: true
					    }, function () {
					        window.location="/home";
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
