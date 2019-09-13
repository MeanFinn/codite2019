$(function() {
	$('form').submit(function(e) {
		$(this).find('button[type="submit"]')
		.addClass('disabled')
		.html('<i class="fas fa-atom-alt"></i')
	});
});