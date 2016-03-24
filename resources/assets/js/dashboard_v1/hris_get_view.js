; var hris_get_view = {
	
	ajax_request  : function(param, toUrl){
		$.ajax({
		   	url: toUrl+param,
		   	type:'GET',
		   	success: function(data){
				this.canvas = data;
		   	},
		   	error: function(){
		   		var error = "</br></br><h2 class='text-center m-t-md'>Terjadi masalah penerimaan data, silahkan muat ulang halaman</h2>";
				this.fail = error;
		   	}
		});	
	},

	ajax_canvas : function(){
		this.canvas;
	},

	ajax_error : function(){
		this.fail;
	},

	init: function(){
		$('body').on('click', '*[data-hris-api-action]', function(){
			var obj = $(this);
			switch (obj.data('hris-api-action').toLowerCase())
			{
				case 'employees'		: hris_get_view.ajax_request(obj.data('hris-api-data'), obj.data('hris-api-target')); break;
			}
		});
	}
};