
(function($) { 
	$(window).load(function() {
		var stickySidebar = $('#comments').offset().top;
		console.log(stickySidebar);

		$(window).scroll(function() {  
		    if ($(window).scrollTop() > stickySidebar) {
		        $('#comments').addClass('fix-bg');
		    }
		    else {
		        $('#comments').removeClass('fix-bg');
		    }  
		});

	});
	$(document).ready(function() {
		
		$("#comments .title").sticky({ topSpacing: 0, widthFromWarapper: true });
	});
})(jQuery);