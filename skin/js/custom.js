jQuery(document).ready(function($) {
	jQuery('.nav-link').on('click', function(event) {
		event.preventDefault();
		var par = $(this).parent();
		par.children('.nav-content').show();
	});
	$('.danger').popover({ 
	    html : true,
	    content: function() {
	      return $('#popover_content_wrapper').html();
	    }
	  });
});

// Bootstrap custom
$(function () {
  $('[data-toggle="popover"]').popover()
})

// End Bootstrap custom