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

		//$(window).resize(function() {
	  	//if($(window).width() < 753) {
		//  	console.log('entrou');
			$('.navbar-fixed-top ul.nav').find('a').click(function(){
			    var $href = $(this).attr('href');
			    var $anchor = $('#'+$href).offset();
			    $anchor.top = $anchor.top - $(".navbar").height(); 
			    $('body').animate({ scrollTop: $anchor.top });
			    return false;
			});	
	  //	}
	//});

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
				

				// $('.navbar-fixed-top ul.nav').find('a').click(function(){
				//     var $href = $(this).attr('href');
				//     var $anchor = $('#'+$href).offset();
				//     $anchor.top = $anchor.top - $(".navbar").height(); 
				//     $('body').animate({ scrollTop: $anchor.top });
				//     return false;
				// });		

			} else {
				console.log('menor');
				// function containerRightHeight() {
				// 	$("#container-left").css({ "height": 400 + 'px' });
				// }

				function containerRightHeight() {
					// var leftPhotoHeight = $(".left-photo").height();
					// var leftCharacteristicsHeight = $(".left-characteristics").height();
					$("#container-left").css({ "height": "auto" });
				}
				
				setTimeout(containerRightHeight);
				$('.learnMore').on('click', function () {
					setTimeout(containerRightHeight);
				});


				// setTimeout(containerRightHeight);
				// $('.learnMore').on('click', function () {
				// 	setTimeout(containerRightHeight);
				// });

				// $('.navbar-fixed-top ul.nav').find('a').click(function(){
				//     var $href = $(this).attr('href');
				//     var $anchor = $('#'+$href).offset();
				//     $anchor.top = $anchor.top - $(".navbar").height(); 
				//     $('body').animate({ scrollTop: $anchor.top });
				//     return false;
				// });	

				// var ypos, image;
				// function parallex() {
				// 	ypos = window.pageYOffset;
				// 	image = document.getElementById('container-left');
				// 	image.style.top = ypos+'px';
				// }
				// window.addEventListener('scroll',parallex);
			}
		});

		if($(window).width() > 753) {
			// $('.navbar-fixed-top ul.nav').find('a').click(function(){
			//     var $href = $(this).attr('href');
			//     var $anchor = $('#'+$href).offset(); 
			//     $anchor.top = $anchor.top - 50;
			//     $('body').animate({ scrollTop: $anchor.top });
			//     return false;
			// });	

			function containerRightHeight() {
				$("#container-left").css({ "height": $("#container-right").height() + 'px' });
			}

			setTimeout(containerRightHeight);
			$('.learnMore').on('click', function () {
				setTimeout(containerRightHeight);
			});

			// var ypos, image;
			// function parallex() {
			// 	ypos = window.pageYOffset;
			// 	image = document.getElementById('container-left');
			// 	image.style.top = ypos * .7 +'px';
			// }
			// window.addEventListener('scroll',parallex);
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