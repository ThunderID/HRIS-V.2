
; var hris_auto_generate_nik = {

	init: function(){
		// $(".modal_start").change(function(){
		// 	var nikurl      = $(this).attr('data-nikurl');
		// 	var data 		= {"join_year": $(this).val()};

		// 	$.ajax({
		// 		type: "GET",
		// 		url : nikurl,
		// 		data : data,
		// 		//dataType: "json",
		// 		error:function(resp){
		// 			alert('Error Generate NIK!');
		// 		},
		// 		success: function(resp){
		// 			$('.modal_nik').val(resp);
		// 		}
		// 	});
		// });

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