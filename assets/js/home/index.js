/* this is home js*/
'use strict';

$(document).ready(function () {

	//putting that one into a Immediately Invoked Function Expression
	(function () {
		//settings for slider
		var width = 720;
		var animationSpeed = 1000;
		var pause = 3000;
		var currentSlide = 1;

		//cache DOM elements
		var $slider = $('#slider');
		var $slideContainer = $slider.find('.slides');//its one piece
		var $slides = $slideContainer.find('.slide');//it is an array

		var interval;

		function startSlider() {
			interval = setInterval(function () {
				$slideContainer.animate({'margin-left': '-=' + width}, animationSpeed, function () {
					if (++currentSlide === $slides.length) {
						currentSlide = 1;
						$slideContainer.css('margin-left', 0);
					}
				});
			}, pause);
		}

		function pauseSlider() {
			clearInterval(interval);
		}

		$slideContainer
			.on('mouseenter', pauseSlider)
			.on('mouseleave', startSlider);

		startSlider();

	})();

});