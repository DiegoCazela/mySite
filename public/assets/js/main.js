(function($) {
	$(document).ready(function() {
		// $('#menu-user-login').on('click', function (e) {
		// 	if(!$('#form-modal').length || $('#result-modal').css('display') == 'none') {
		// 		if($('#result-modal').css('display') == 'none'){
		// 			$('#result-modal').css('display','block');
		// 		} else {
		// 			$('#result-modal').load('/user');
		// 		}
		// 	} else {
		// 		$('#result-modal').css('display','none');
		// 	}
		// })

		var settings = {

		// Parallax background effect?
			parallax: true,

		// Parallax factor (lower = more intense, higher = less intense).
			parallaxFactor: 20

		};

		skel.breakpoints({
			xlarge: '(max-width: 1800px)',
			large: '(max-width: 1200px)',
			medium: '(max-width: 992px)',
			small: '(max-width: 768px)',
			xsmall: '(max-width: 480px)'
		});

	//$(function() {

		var $window = $(window),
			$body = $('body'),
			$containerLeft = $('#container-left'),
			$footer = $('#footer'),
			$main = $('#main');

		// Disable animations/transitions until the page has loaded.
			$body.addClass('is-loading');

			$window.on('load', function() {
				$body.removeClass('is-loading');
			});

		// Touch?
			if (skel.vars.mobile) {

				// Turn on touch mode.
					$body.addClass('is-touch');

				// Height fix (mostly for iOS).
					window.setTimeout(function() {
						$window.scrollTop($window.scrollTop() + 1);
					}, 0);

			}

		// Fix: Placeholder polyfill.
			//$('form').placeholder();

		// Prioritize "important" elements on medium.
			skel.on('+medium -medium', function() {
				$.prioritize(
					'.important\\28 medium\\29',
					skel.breakpoint('medium').active
				);
			});

		// Footer.
			skel.on('+medium', function() {
				$footer.insertAfter($main);
			});

			skel.on('-medium !medium', function() {
				$footer.appendTo($containerLeft);
			});

		// Parallax background.

			// Disable parallax on IE (smooth scrolling is jerky), and on mobile platforms (= better performance).
				if (skel.vars.browser == 'ie'
				||	skel.vars.mobile)
					settings.parallax = false;

			if (settings.parallax) {

				skel.on('change', function() {

					if (skel.breakpoint('medium').active) {

						$window.off('scroll.strata_parallax');
						$containerLeft.css('background-position', 'top left, center center');

					}
					else {

						$containerLeft.css('background-position', 'left 0px');

						$window.on('scroll.strata_parallax', function() {
							$containerLeft.css('background-position', 'left ' + (-1 * (parseInt($window.scrollTop()) / settings.parallaxFactor)) + 'px');
						});

					}

				});

				$window.on('load', function() {
					$window.triggerHandler('scroll');
				});
			}
		//});

		$('#right-presentation .learnMore').on('click', function (e) {
			$('.presentation-text').toggleClass('ver-mais');
			if($('.presentation-text').hasClass('ver-mais')) {
				console.log('Ok');
				$('#right-presentation .title, #right-presentation .learnMore').css({
				    "opacity":"0"
				}).animate({
					opacity:1
				},1000); 

				$('.presentation-text.ver-mais').css({
				    "opacity":"0",
				    "display":"block"
				}).animate({
					opacity:1
				},1000);    

				$('#right-presentation .learnMore').html('<p>Fechar</p>');
			} else {
				$('#right-presentation .title, #right-presentation .learnMore').css({
				    "opacity":"0"
				}).animate({
					opacity:1
				},1000); 

				$('.presentation-text').css({
				    "opacity":"0",
				    "display":"-webkit-box"
				}).animate({
					opacity:1
				},1000); 

				$('#right-presentation .learnMore').html('<p>Ver Mais</p>');
			}
		})

		$('#right-curriculum .learnMore').on('click', function (e) {
			$('.curriculum-text').toggleClass('ver-mais');
			if($('.curriculum-text').hasClass('ver-mais')) {
				console.log('Ok');
				$('#right-curriculum .title, #right-curriculum .learnMore').css({
				    "opacity":"0"
				}).animate({
					opacity:1
				},1000); 

				$('.curriculum-text.ver-mais').css({
				    "opacity":"0",
				    "display":"block",
				}).animate({
					opacity:1
				},1000);   

				$('#right-curriculum .learnMore').html('<p>Fechar</p>');
			} else {
				$('#right-curriculum .title, #right-curriculum .learnMore').css({
				    "opacity":"0"
				}).animate({
					opacity:1
				},1000); 

				$('.curriculum-text').css({
				    "opacity":"0",
				    "display":"-webkit-box"
				}).animate({
					opacity:1
				},1000); 

				$('#right-curriculum .learnMore').html('<p>Ver Mais</p>');
			}
		})
	});

	$(document).ready(function() {
		$('.navbar-fixed-top ul.nav').find('a').click(function(){
		    var $href = $(this).attr('href');
		    var $anchor = $('#'+$href).offset();
		    $('body').animate({ scrollTop: $anchor.top });
		    return false;
		});
	});

	// $(document).ready(function() {
	// 	$("#form-contacts .btn.btn-default").on('click', function() {
	// 		console.log('entrou');
	// 		// window.location = '?contact=ok';

	// 		$.get("/", { contact:"ok"});

	// 		$.ajax({
	// 		  url: "/", 
	// 		  data: { contact:"ok" },
	// 		  type: 'GET',
	// 		});
	// 	})
	// });

})(jQuery);