; var hris_auto_generate_nik = {

	init: function(){
		$("#employeeworkstart").change(function(){
			var nikurl      = $(this).attr('data-nikurl');
			var data 		= {"join_year": $(this).val()};

			$.ajax({
				type: "GET",
				url : nikurl,
				data : data,
				//dataType: "json",
				error:function(resp){
					alert('Error Generate NIK!');
				},
				success: function(resp){
					$('#employeenik').val(resp);
				}
			});
		});
	}
};

; var hris_auto_generate_username = {

	init: function(){
		$("#employeename").change(function(){
			var unameurl   	= $(this).attr('data-unameurl');
			var data 		= {"name": $(this).val()};

			$.ajax({
				type: "GET",
				url : unameurl,
				data : data,
				//dataType: "json",
				error:function(resp){
					alert('Error Generate Username!');
				},
				success: function(resp){
					$('#employeeusername').val(resp);
				}
			});
		});
	}
};