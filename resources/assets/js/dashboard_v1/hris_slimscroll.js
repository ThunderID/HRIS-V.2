; var hris_slimscroll = {
	
	init  : function () {
		doc_height = $(window).height();
		doc_height = doc_height - 135;

   		$('.slim-scroll').slimScroll({
	        height: doc_height
	    });
	},
};

; var hris_slimscroll_mini = {
	
	init  : function () {
		doc_height = 225;

   		$('.slim-scroll-mini').slimScroll({
	        height: doc_height
	    });
	},
};
