/**
 * Created by Jon on 2017-07-10.
 */

/*this one goes in views/flats/index.php*/

$(document).ready(function () {

	var $divMenu = $('#divMenu');

	$("#menu").menu({
		position: {
			my: 'center top',
			at: 'center bottom'
		},
		icons: {
			submenu: 'ui-icon-triangle-1-s'
		}
    });

	var menuY = $divMenu.offset().top;
	var menuX = $divMenu.offset().left;

	$(window).resize(function () {
		var widthTotal = $(window).width();
		var widthMenu = $('#divMenu ul').width();
		if ($divMenu.attr('class') == "stickyMenu") {
			menuX = (widthTotal - widthMenu) / 2;
			$divMenu.css({
				'left': menuX
			});
		}
	});

	function stickyNav() {
		var scrollY = $(window).scrollTop();
		menuX = $divMenu.offset().left;

		if (scrollY > menuY) {
			$divMenu.addClass('stickyMenu').css({
				'left': menuX
			});

		} else {
			$divMenu.removeClass('stickyMenu');
		}
	}


	$(window).scroll(function () {

		var $this = $(this);
		var $scrollup = $('#scrollup');
		var $scrolldown = $('#scrolldown');

		stickyNav();

		if ($this.scrollTop() > 300) {
			$scrollup.fadeIn(200);
			//console.log("fadeIn odpalony");
		} else {
			$scrollup.fadeOut(200);
			//console.log("fadeout odpalony");
		}

		if (($(this).scrollTop() < ($(document).height() * 0.6)  ) || !($(this).scrollTop())) {
			$scrolldown.fadeIn(200);
		}
		else {
			$scrolldown.fadeOut(200);
		}
	});


	$('#scrollup').on('click', function (e) {
		e.preventDefault();
		$('html,body').animate({
			scrollTop: 0
		}, 500);
	});

	$('#scrolldown').on('click', function (e) {
		e.preventDefault();
		var totalHeight = $(document).height();
		$('html,body').animate({
			scrollTop: totalHeight
		}, 500);
	});


	stickyNav();

});