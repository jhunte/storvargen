
(function($) { 
	$.fn.toggleContent = function(childSelector, content) {
		if($(this).find(childSelector).length) {
			$(this).find(childSelector).remove();
		}
		else {
			$(this).append(content);
		}
		$(this).toggleClass('expanded');
		$(this).toggleClass('collapsed');
	}

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