(function($) {
	$(document).ready(function() {
		$('#menu-user-login').on('click', function (e) {
			if(!$('#form-modal').length || $('#result-modal').css('display') == 'none') {
				if($('#result-modal').css('display') == 'none'){
					$('#result-modal').css('display','block');
				} else {
					$('#result-modal').load('/modal_login');
				}
			} else {
				$('#result-modal').css('display','none');
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