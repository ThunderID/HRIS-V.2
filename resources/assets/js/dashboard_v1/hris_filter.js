; var hris_filter = {
	
	init  : function () {
		$('.link-filter-menu').click(function(){
			$('.filter-menu-employee').css('display', 'block');
		});
		$('.link-filter-menu-close').click(function(){
			$('.filter-menu-employee').css('display', 'none');
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