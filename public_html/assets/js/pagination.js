
$(document).ready(function() {

	// $.AJAX Example Request
	$('.ajax-pag > li a').on('click', function(eve){
		eve.preventDefault();

		var link = $(this).attr('href');

		$.ajax({
			url: link,
			type: "GET",
			dataType: "html",
			beforeSend: function(){
				showBusy();
			},
		  	success: function(html) {
		    	updatePage(html);
		 	}
		});


	});

});


// Functon to Show out Busy Div
function showBusy(){

	$('#ajax-content').block({
		message: '<h1>Processing</h1>',
		css: {border:'3px solid #000'}
	});
}

function updatePage(html){

	window.setTimeout( function(){
		$('#ajax-content').html(html);
	}, 2000)


}
