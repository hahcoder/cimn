jQuery(document).ready(function($) {
	jQuery('.nav-link').on('click', function(event) {
		event.preventDefault();
		var par = $(this).parent();
		par.children('.nav-content').show();
	});
});

$(function () {
  $('[data-toggle="popover"]').popover()
})