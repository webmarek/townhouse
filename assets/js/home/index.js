/* this is home js*/
'use strict';

$(document).ready(function() {

	//settings for slider
	var width = 720;
	var animationSpeed = 1000;
	var pause = 3000;
	var currentSlide = 1;

	//cache DOM elements
	var $slider = $('#slider');
	var $slideContainer = $('.slides', $slider);//its one piece
	var $slides = $('.slide', $slider);//it is an array

	/*above means the same as: $slider.find('.slides');
	* or $slideContainer.find('.slide')
	* */

	var interval;

	function startSlider() {
		interval = setInterval(function() {
			$slideContainer.animate({'margin-left': '-='+width}, animationSpeed, function() {
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


});