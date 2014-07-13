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
	// alert(dataSource); return false;
	// alert(urlRequest); return false;
	$.ajax({
		type: "POST",
		url: urlRequest,
		dataType: "json",
		data: dataSource,
		success: function(response) {
			console.log(response);
		}
	});
});