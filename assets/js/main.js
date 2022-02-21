$(document).ready(function () {

    $("#chat").scrollTop($(this).innerHeight() + 10000000);

	window.setTimeout(function() {
	    $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
	        $(this).remove(); 
	    });
	}, 5000);
 
});

