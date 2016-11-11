$(".edit-user").click(function(){

	var user_id = $(this).attr('data-user');
	
	var selector = "#user"+user_id;
  
		$.ajax({
		    url: '/user/'+ user_id +'/edit',
		    type: 'GET',

		    success: function(result) {
		        $(selector).closest('tr').fadeOut(1000);
		        swal("Deleted!", "This user has been deleted.", "success");
		    },
	        error: function(jqXHR, exception) {
			    //alert("Error:"+jqXHR.status+":"+ jqXHR.responseText+":"+exception);
			    //$('#post').html(jqXHR.responseText);
			    //console.log(jqXHR.responseText);
			}

		});


    return false;
});