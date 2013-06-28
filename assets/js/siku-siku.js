$(function () {
	
	// jQuery UI easings
	// http://api.jqueryui.com/easings/
	
	$('.browser-content').hover(function () {				
		$(this).find('.project-info').stop().animate({ 'height': '100%' }, 250, 'easeOutQuart');
	}, function () {
		$(this).find('.project-info').stop().animate({ 'height': '0%' }, 250);
	});
});