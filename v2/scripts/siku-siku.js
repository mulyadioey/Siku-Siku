function getLocWidth($node) {
	var position = $node.position(),
		top = position.top,
		left = position.left,
		targetX = left,
		targetY = top + $node.height() + parseInt($node.css('padding-top'), 10) + parseInt($node.css('padding-bottom'), 10),
		width = $node.width() + parseInt($node.css('padding-left'), 10) + parseInt($node.css('padding-right'), 10);
	return [targetX, targetY, width];
}

function moveSelector($to) {
	var locWidth = getLocWidth($to);
	//$('section#projects .project-list-ctnr .selector').css({ top: locWidth[1], left: locWidth[0], width: locWidth[2] });
	$('section#projects .project-list-ctnr .selector').animate({ top: locWidth[1], left: locWidth[0], width: locWidth[2] }, 200);
}

$(function() {
	$('section#projects ul.style-1 li a').click(function() {
		$('section#projects ul.style-1 li').removeClass('selected');
		$(this).parent('li').addClass('selected');
		moveSelector($(this));
	});
	
	
});

$(window).load(function() {
	// Find the initial target location.
	moveSelector($('section#projects ul.style-1 li.selected a'));
});