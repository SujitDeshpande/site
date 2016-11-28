$(".delete-incident").click(function(){

	var incident_id  = $(this).data("incident");
	var selector = "#incident"+incident_id;

	swal({
		title: "Are you sure?",
		//text: "You will not be able to recover this imaginary file!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Yes, delete it!",
		closeOnConfirm: false
    	}, function () {
	    
		$.ajax({
		    url: '/incidents/'+ incident_id,
		    type: 'DELETE',
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
        
    });

    return false;
});