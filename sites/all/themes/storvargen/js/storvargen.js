
(function($) { 
	$(window).load(function() {
		var stickySidebar = $('.stick-bg').offset().top;
		console.log(stickySidebar);

		$(window).scroll(function() {  
		    if ($(window).scrollTop() > stickySidebar) {
		        $('.stick-bg').addClass('fix-bg');
		    }
		    else {
		        $('.stick-bg').removeClass('fix-bg');
		    }  
		});

	});
	$(document).ready(function() {
		
		$(".sticky-title").sticky({ topSpacing: 0, widthFromWarapper: true });
	});
})(jQuery);