; var hris_tree = {
	
	init  : function (_width) {
	    $("#frame-chart").width(_width);

		var f_width = $("#frame-scroller").width();
		$("#frame-scroller").scrollLeft((_width/2)-(f_width/2));
	},
};		