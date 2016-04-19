; var hris_slimscroll = {
	
	init  : function () {
		doc_height = $(window).height();
		doc_height = doc_height - 135;
	    $(".slim-scroll-canvas").height(doc_height);
	},

	resize  : function () {
		$( window ).resize(function() {
			doc_height = $(window).height();
			doc_height = doc_height - 135;
		    $(".slim-scroll-canvas").height(doc_height);
		});
	},	
};
			