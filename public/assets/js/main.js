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

		$('.navbar-fixed-top ul.nav').find('a').click(function(){
		    var $href = $(this).attr('href');
		    var $anchor = $('#'+$href).offset();
		    $anchor.top = $anchor.top - $(".navbar").height(); 
		    $('body').animate({ scrollTop: $anchor.top });
		    return false;
		});	

		$(window).resize(function(){
			if($(window).width() > 753) {
				console.log('maior');
				function containerRightHeight() {
					$("#container-left").css({ "height": $("#container-right").height() + 'px' });
				}

				setTimeout(containerRightHeight);
				$('.learnMore').on('click', function () {
					setTimeout(containerRightHeight);
				});
			} else {
				console.log('menor');
				function containerRightHeight() {
					$("#container-left").css({ "height": "auto" });
				}
				
				setTimeout(containerRightHeight);
				$('.learnMore').on('click', function () {
					setTimeout(containerRightHeight);
				});
			}
		});

		if($(window).width() > 753) {
			function containerRightHeight() {
				$("#container-left").css({ "height": $("#container-right").height() + 'px' });
			}

			setTimeout(containerRightHeight);
			$('.learnMore').on('click', function () {
				setTimeout(containerRightHeight);
			});
		}

		$('#right-presentation .learnMore').on('click', function (e) {
			$('.presentation-text').toggleClass('ver-mais');
			if($('.presentation-text').hasClass('ver-mais')) {
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