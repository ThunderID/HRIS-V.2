; var hris_filter = {
	
	init  : function () {
		$('.link-filter-menu').click(function(){
			$('.filter-menu-employee').css('display', 'block');
		});
		$('.link-filter-menu-close').click(function(){
			$('.filter-menu-employee').css('display', 'none');
		});
	},

	setPosition  : function () {
		$( document ).ready(function() {
			left_anchor = $('#left-anchor').outerWidth() + 5;
			top_anchor = 138;
			$('.modal-filter').css({top: top_anchor, left: left_anchor, position:'absolute'});
		});

		$( window ).resize(function() {
			left_anchor = $('#left-anchor').outerWidth() + 5;
			top_anchor = 138;
			$('.modal-filter').css({top: top_anchor, left: left_anchor, position:'absolute'});
		});
	},	
};

; var hris_modal_filter_employee = {
	
	init  : function () {
   		$('#modal').modal('toggle');
	},
};


; var hris_modal_sort_employee = {
	
	init  : function () {
   		$('#modal').modal('toggle');
	},
};