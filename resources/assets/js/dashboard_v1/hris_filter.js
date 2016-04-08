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
