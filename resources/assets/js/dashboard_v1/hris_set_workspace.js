; var hris_set_workspace= {
	
	desktopInit  : function () {
		$( document ).ready(function() {
			doc_height = $(window).height();
			doc_height = doc_height - 135;
		    $(".workspace-desktop").height(doc_height);
		});

		$( window ).resize(function() {
			doc_height = $(window).height();
			doc_height = doc_height - 135;
		    $(".workspace-desktop").height(doc_height);
		});
	},	

	miniDesktopInit  : function () {
		$( document ).ready(function() {
			doc_height = $(window).height();
			doc_height = doc_height - 187;
		    $(".workspace-mini-desktop").height(doc_height);
		});

		$( window ).resize(function() {
			doc_height = $(window).height();
			doc_height = doc_height - 187;
		    $(".workspace-mini-desktop").height(doc_height);
		});
	},
		
};
			