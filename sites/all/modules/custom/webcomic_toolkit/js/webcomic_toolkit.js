(function($) { 
	$(document).ready(function() {
		$(".edit-inline").editable(function(value, settings) {
			var term = {
				tid: $(this).attr('id'),
				description: value,
			};
			$.ajax({
	            url: '/comic/update/chapter/json',
	            type: 'post',
	            dataType: 'json',
            	success: function (data) {
            	},
            	data: JSON.stringify(term)
        	});
        	return(value);			
		},
		{
			indicator	: '<img src="/misc/throbber-active.gif"/>',
			tooltip		: 'Click to edit',
		}
		);
	});
})(jQuery);