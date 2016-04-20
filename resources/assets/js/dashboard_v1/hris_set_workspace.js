; var hris_set_workspace= {
	
	desktopInit  : function () {
		doc_height = $(window).height();
		doc_height = doc_height - 135;
	    $(".workspace-desktop").height(doc_height);
	},

	desktopResize  : function () {
		$( window ).resize(function() {
			doc_height = $(window).height();
			doc_height = doc_height - 135;
		    $(".workspace-desktop").height(doc_height);
		});
	},	

	miniDesktopInit  : function () {
		doc_height = $(window).height();
		doc_height = doc_height - 187;
	    $(".workspace-mini-desktop").height(doc_height);
	},

	miniDesktopResize  : function () {
		$( window ).resize(function() {
			doc_height = $(window).height();
			doc_height = doc_height - 187;
		    $(".workspace-mini-desktop").height(doc_height);
		});
	},		
};
			