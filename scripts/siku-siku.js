$.fn.createSlideshow = function() {
	return this.each(function() {
		var rotateNow = true,
			timerId = null,
			$panel = $(this);
		$panel.find('img').hide().filter(":first").show();
		
		// Create and configure slideshow controls.
		var numPics = $panel.find("img").length;
		var $control = $("<div></div>").addClass("control");
		for (var i = 1; i <= numPics; i++) {
			var $link = $("<a></a>").addClass("moss_link").html("0" + i).attr({ 
							id: function() { return "moss_link-" + i }, 
							href: "javascript:void(0);"
						});
			if (i == 1) { $link.addClass("selected"); }
			$control.append($link);
		}
		var $playButton = $("<a></a>").attr({ 
								id: "moss_play",
								href: "javascript:void(0);",
								title: "Stop slideshow."
							}).addClass("playing").click(function() {
								if ($(this).hasClass("playing")) {
									// Slideshow is playing; we're going to stop it.
									$(this).removeClass("playing").attr({ title: "Play slideshow." });
									rotateNow = false;
									if (timerId != null) { clearTimeout(timerId); }
								}
								else {
									// Slideshow is not playing; we're going to start it.
									$(this).addClass("playing").attr({ title: "Stop slideshow." });
									rotateNow = true;
									rotateNext();
								}
							}).appendTo($control);
		$panel.append($control);
		
		/* Slidehow link handler. */
		$panel.find(".moss_link").click(function() {
			if ($(this).attr("id") == $(".moss_link.selected").attr("id")) { return false; }
			
			$(".moss_link.selected").removeClass("selected");
			$(this).addClass("selected");
			var id = $(this).attr("id");
			var num = /-(\d)/.exec(id);
			$(".moss_img:visible").fadeOut(function() {
				$("#moss_img-" + num[1]).fadeIn();
			});
		});
		
		// Start rotation.
		rotateNext();
		function rotateNext() {
			var $current = $panel.find('img:visible'),
				$next = $current.next();
			if ($next.length == 0) {
				$next = $panel.find("img:first");
			}
			timerId = setTimeout(function() {
				$current.fadeOut(function() {
					// Update selected link.
					var id = $next.attr("id");
					var num = /-(\d)/.exec(id);
					$(".moss_link").removeClass("selected");
					$("#moss_link-" + num[1]).addClass("selected");
					
					$next.fadeIn(function() {	
						if (rotateNow) {
							rotateNext();
						}
					});	
				});
			}, 3000);
		}
	});
}

$(function() {
	var curtainTime = 2000;
	var matched = /source=internal/.exec(window.location);
	if (matched) {		/* i.e. No special URL parameter. */
		curtainTime = 0;
	}
	$("#curtain").fadeOut(curtainTime);
	
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
	
	/* Animate slideshow. */
	$(".slideshow").createSlideshow();
});