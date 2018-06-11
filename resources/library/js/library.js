$(window).scroll(function() {
	if($(this).scrollTop() > 50) $('#backtop').stop().animate({ bottom: '10px' }, 200);
	else $('#backtop').stop().animate({ bottom: '-60px' }, 200);
});
$(document).ready(function() {
	$('#backtop').click(function(event) {
		event.preventDefault();
		$('html, body').animate({scrollTop: 0},500);
	});
});