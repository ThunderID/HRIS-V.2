; var hris_submit = {
	
	ajax_request  : function(toUrl, e){
		$.ajax({
		   	url: toUrl,
		   	type:'POST',
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
		this.ajax_request();
	}
};