$(function() {
	$("#curtain").fadeOut(2500);
	
	/* Showcase handler. */
	var displayShowcase = 4;
	var totalShowcase = $("div.showcase ul li").length;
	var entryWidth = 245;
	var totalSlide = totalShowcase - displayShowcase;	// Number of times we can "slide" right from the initial state.
	var maxMarginLeft = -1 * entryWidth * totalSlide;
	// Initialization.
	if (displayShowcase < totalShowcase) {
		$("div.showcase a.next").removeClass("disabled");
	}
	$("div.showcase a.next").click(function() {
		// Clear timer.
		clearInterval(t);
		
		if ($(this).hasClass("disabled")) {
			return false;
		}
		
		$("div.showcase a.prev").removeClass("disabled");
		var targetMargin = parseInt($("div.showcase ul").css("margin-left")) - entryWidth;
		$("div.showcase ul").animate({ marginLeft: targetMargin }, function() {
			if (parseInt($("div.showcase ul").css("margin-left")) == maxMarginLeft) {
				$("div.showcase a.next").addClass("disabled");
			}
		});
	});
	$("div.showcase a.prev").click(function() {
		
		if ($(this).hasClass("disabled")) {
			return false;
		}
		
		$("div.showcase a.next").removeClass("disabled");
		var targetMargin = parseInt($("div.showcase ul").css("margin-left")) + entryWidth;
		$("div.showcase ul").animate({ marginLeft: targetMargin }, function() {
			if (parseInt($("div.showcase ul").css("margin-left")) == 0) {
				$("div.showcase a.prev").addClass("disabled");
			}
		});
	});
	
	/* Show tooltip if user didn't click the next button. */
	$("div.showcase a.next").tipsy({ trigger: 'manual', html: true, fade: true, gravity: 's', offset: 3, fallback: "<span>Click this button to scroll.</span>" });
	var t = setInterval(function() {
		$("div.showcase a.next").tipsy("show");
		setTimeout(function() {
			$("div.showcase a.next").tipsy("hide");
		}, 3000);
	}, 15000);
});