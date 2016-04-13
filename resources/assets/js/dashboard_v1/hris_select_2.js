; var hris_select_chart = {
	
	init  : function (preload_data_tag) {
		var action = $('.select-chart').attr('data-route');

		$('.select-chart').select2({
		placeholder: 'Masukkan jabatan karyawan',
		minimumInputLength: 3,
		data: preload_data_tag,
		tags: false,
		ajax: {
			url: action,
			dataType: 'json',
			data: function (term) {
				return {
					term
				};
			},
			processResults: function (data) {
                // parse the results into the format expected by Select2.
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data
                return {
                    results: data
                };

            },
            cache: true

			}
		});	
	},
};
