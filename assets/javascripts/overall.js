jQuery(function(){


});

$('body').on('click', '#clickNewEditEmployee', function() {
	var urlRequest = jQuery(this).attr('data-url');
	var request = jQuery.ajax({
			url: urlRequest,
			type: "POST",
			dataType: "html",
			success:function(response){
				jQuery(".modal-detail-body").html(response);
			}
		});
	request.fail(function( jqXHR, textStatus ) { // fail connect to a function in controller activities.php		
		alert("connecting failed...");
	});
});

$('body').on('click', '#btnSaveEmployee', function(event) {
	event.preventDefault();
	var urlRequest = $(this).parent().parent().attr('action');
	var dataSource = $(this).parent().parent().serialize();
	$.ajax({
		type: "POST",
		url: urlRequest,
		dataType: "json",
		data: dataSource,
		success: function(response) {
			if (response) {
				var div_sms = '<div class="alert alert-'+response.sms_type+' alert-dismissable">';
				div_sms += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
				div_sms += '<strong>'+response.sms_title+'</strong> '+response.sms_value;
				div_sms += '</div>';
				$("div#feedback_error").append(div_sms);
				setTimeout(function()
	            {
	                $('#feedback_error').slideUp(250, function()
	                {
	                    $('#feedback_error').removeClass();
	                });
	            },response.sms_value.length*125);
			}
		}
	});
});