$(function() {
	$("#curtain").fadeOut(2000, function() { 
		setInterval(function() { $("#teaser img").fadeToggle(); }, 1000);
		$("#teaser .social_box, #teaser p").fadeToggle(1500);
	});
});