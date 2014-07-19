jQuery(function(){


});
//
$('body').on('click', '#clickNewEditDepartement', function() {
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
//


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
				$("div#feedback_error_modal").append(div_sms);
				setTimeout(function()
	            {
	                $('#feedback_error_modal').slideUp(250, function()
	                {
	                    $('#feedback_error_modal').removeClass();
	                });
	            },response.sms_value.length*125);
			}
		}
	});
});

jQuery('body').on('click', 'a.aDelEmployee', function(event) {
	var urlRequest = jQuery(this).attr('data-url');
	$.ajax({
		type: "GET",
		url: urlRequest,
		dataType: "json",
		success: function(response) {
			// Remove row from table of selected
			if (response.success) {
                jQuery(this).parent().parent().remove();
        	};
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
	event.preventDefault();
});

$('body').on("click", "a.remove", function(event) {
    event.preventDefault();

    if (jQuery('input[type="checkbox"]').is(':checked')) {
        var url = jQuery(this).attr('href');
        var rcdsChecked = jQuery('input:checkbox:checked.checkedID').map(function() {
            return jQuery(this).val();
        }).get();
        var confirming = "Do you want to delete as permanent?";
        if (!confirm(confirming)) {
            return false;
        };
        jQuery.ajax({
            type: "POST",
            url: url,
            dataType: "json",
            data: {"checkedID": rcdsChecked},
            success: function(response) {
            	if (response.success) {
            		jQuery('input:checkbox:checked').each(function() {    
                        jQuery('input:checkbox:checked').parents("tr").remove();
                        jQuery('input:checkbox:checked').removeAttr('checked');
                    });
            	};
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
    } else {
    	var msg = "Please checked the checkbox before you would like to delete.";
        var div_sms = '<div class="alert alert-danger alert-dismissable">';
		div_sms += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		div_sms += '<strong>Confirming</strong> '+ msg;
		div_sms += '</div>';
		$("div#feedback_error").append(div_sms);
		setTimeout(function()
        {
            $('#feedback_error').slideUp(250, function()
            {
                $('#feedback_error').removeClass();
            });
        },response.msg.length*125);

        return false;
    }

});