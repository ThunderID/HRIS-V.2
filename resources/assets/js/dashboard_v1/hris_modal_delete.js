;var hris_modal_delete = {
	display			: null,
	field			: null,
	submit			: function(){

	},
	init			: function(){
		
		///////////////////////////
		// LISTEN TO OPEN MODAL  //
		///////////////////////////
		$('body').on('click', '*[data-toggle=modal][data-target="#hris_modal_delete"]', function(){
			var obj = $(this);
			hris_modal_delete.display 	= obj.data('capcus-display-target');
			hris_modal_delete.field 	= obj.data('capcus-field-target');

			////////////////
			// CLEAR FORM //
			////////////////
			$('#hris_modal_delete').find('*[name]').val('');

			///////////////
			// FILL FORM //
			///////////////
			if (obj.data('capcus-data'))
			{
				// PARSE VALUE
				value = obj.data('capcus-data');

				// FILL Form
				$('#hris_modal_delete').find('input[name=_hris_modal_delete_edit_index]').val(value.index);
			}
		});

		///////////////////////////
		// LISTEN TO ADD ADDRESS //
		///////////////////////////
		$('body').on('click', '#hris_modal_delete button#submit', function(){
			//////////////////
			// GET ALL DATA //
			//////////////////
			var submitted = {
				index 			: ($("#hris_modal_delete").find('input[name=_hris_modal_delete_edit_index]').val() ? $("#hris_modal_delete").find('input[name=_hris_modal_delete_edit_index]').val(): $(hris_modal_delete.display).find('.list-group-item').size()),
			};

			////////////////
			// HIDE MODAL //
			////////////////
			$('#hris_modal_delete').modal('hide');
		});

	}
};

;var modal_tour_schedule = {
	display			: null,
	field			: null,
	render_promo_name: function(val) {
		var html = '<select name="promo_name[]" class="c-select form-control">';
		var promos = ['regular', 'early bird', 'last minute deal'];
		for (var i in promos)
		{
			html += '<option value="'+promos[i]+'" '+ (promos[i] == val ? 'selected' : '') + '>'+promos[i].toUpperCase()+'</option>';
		}
		html += '</select>';
		return html;
	},
	init			: function(){
		
		///////////////////////////
		// LISTEN TO OPEN MODAL  //
		///////////////////////////
		$('body').on('click', '*[data-toggle=modal][data-target="#modal_tour_schedule"]', function(){
			var obj = $(this);
			modal_tour_schedule.display 	= obj.data('capcus-display-target');
			modal_tour_schedule.field 		= obj.data('capcus-field-target');

			////////////////
			// CLEAR FORM //
			////////////////
			$('#modal_tour_schedule').find('*[name]').val('');
			$('#modal_tour_schedule #table-tour-schedule-promo tbody').find('tr').remove();

			///////////////
			// FILL FORM //
			///////////////
			if (obj.data('capcus-data'))
			{
				// PARSE VALUE
				value = obj.data('capcus-data');

				// FILL Form
				$('#modal_tour_schedule').find('input[name=departure]').val(value.departure);
				$('#modal_tour_schedule').find('input[name=departure_until]').val(value.departure_until);
				$('#modal_tour_schedule').find('select[name=currency]').val(value.currency);
				$('#modal_tour_schedule').find('input[name=price]').val(value.price);
				$('#modal_tour_schedule').find('input[name=_modal_tour_schedule_edit_index]').val(value.index);

				if (value.promo.length)
				{
					for (var i in value.promo)
					{
						$("#modal_tour_schedule #table-tour-schedule-promo tbody").append(
																				'<tr>' + 
																					'<td>' + modal_tour_schedule.render_promo_name(value.promo[i].name) + '</td>' + 
																					'<td><input type="text" class="form-control inputmask-dmyhi" name="promo_since[]" data-inputmask="\'mask\':\'d-m-y\'" value="'+value.promo[i].since+'"></td>' + 
																					'<td><input type="text" class="form-control inputmask-dmyhi" name="promo_until[]" data-inputmask="\'mask\':\'d-m-y\'" value="'+value.promo[i].until+'"></td>' + 
																					'<td><input type="text" class="form-control" name="promo_price[]" value="'+value.promo[i].price+'"></td>' +
																				'</tr>'
							);
						$("#modal_tour_schedule #table-tour-schedule-promo tbody tr:last input[data-inputmask]").inputmask();
					}
				}
			}

			
		});

		////////////////////////////
		// LISTEN TO ADD SCHEDULE //
		////////////////////////////
		$('#modal_tour_schedule ').on('click', 'button#submit', function(){
			//////////////////
			// GET ALL DATA //
			//////////////////
			var submitted = {
				index 			: ($("#modal_tour_schedule").find('input[name=_modal_tour_schedule_edit_index]').val() ? $("#modal_tour_schedule").find('input[name=_modal_tour_schedule_edit_index]').val(): $(modal_tour_schedule.display).find('.list-group-item').size()),
				departure 		: $("#modal_tour_schedule").find('input[name=departure]').val(),
				departure_until	: $("#modal_tour_schedule").find('input[name=departure_until]').val(),
				currency 		: $("#modal_tour_schedule").find('select[name=currency]').val(),
				price 			: $("#modal_tour_schedule").find('input[name=price]').val() * 1,
			};

			var promo = new Array;
			submitted.promo = new Array;
			$('#modal_tour_schedule select[name="promo_name[]"]').each(function(index){
				submitted.promo.push({
					name 	: $('#modal_tour_schedule select[name="promo_name[]"]:nth('+index+')').val(),
					since 	: $('#modal_tour_schedule input[name="promo_since[]"]:nth('+index+')').val(),
					until 	: $('#modal_tour_schedule input[name="promo_until[]"]:nth('+index+')').val(),
					price 	: $('#modal_tour_schedule input[name="promo_price[]"]:nth('+index+')').val()
				});
			});

			//////////////////
			// DISPLAY DATA //
			//////////////////
			
			if ($(modal_tour_schedule.display + ' .list-group-item:nth(' + submitted.index + ')').size()) // Edit
			{
							
				var html = '<div class="text-muted text-uppercase mb-l">SCHEDULE '+ ((submitted.index*1)+1) +'</div>' + 
								'<input type="hidden" name="'+modal_tour_schedule.field+'[]" value=\''+JSON.stringify(submitted)+'\'>' + 
													'Departure: ' + submitted.departure + (submitted.departure_until ? ' - ' + submitted.departure_until : '') + '<br>' +
													'Price: ' + submitted.currency + ' ' + ' <span class="number">' + capcus_math.thousand_separator(submitted.price) + '</span><br>' + 
													'Promo: ' + 
													'<div class="table-responsive">' + 
														'<table class="table table-hover">' + 
															'<thead>' + 
																'<tr>' + 
																	'<th>Promo</th>' + 
																	'<th>Active</th>' +
																	'<th>Price</th>' + 
																'</tr>' +
															'</thead>' +
															'<tbody>';
				for (var i in submitted.promo)
				{
					html += '<tr>' +
								'<td>' + submitted.promo[i].name + '</td>' +
								'<td>' + submitted.promo[i].since + ' - ' + submitted.promo[i].until + '</td>' + 
								'<td>' + submitted.currency + ' <span class="number">' + capcus_math.thousand_separator(submitted.promo[i].price) + '</span></td>' + 
							'</tr>';
				}
				html += 									'</tbody>' + 
														'</table>' + 
													'</div>' + 
													'<p class=\'mt-m\'>' + 
														'<a href=\'javascript:;\' data-toggle=\'modal\' data-target=\'#modal_tour_schedule\' data-capcus-data=\''+JSON.stringify(submitted)+'\' data-capcus-display-target=\''+modal_tour_schedule.display+'\' data-capcus-field-target=\''+modal_tour_schedule.field+'\'><i class=\'fa fa-pencil\'></i> Edit</a>' + 
													'</p>';

				$(modal_tour_schedule.display + ' .list-group-item:nth(' + submitted.index + ')').html(html);
			}
			else //new
			{
				var html = '<div class="list-group-item">' + 
								'<div class="text-muted text-uppercase mb-l">SCHEDULE '+ ($(modal_tour_schedule.display).length+1) +'</div>' + 
								'<input type="hidden" name="'+modal_tour_schedule.field+'[]" value=\''+JSON.stringify(submitted)+'\'>' + 
								'Departure: ' + submitted.departure + (submitted.departure_until ? ' - ' + submitted.departure_until : '') + '<br>' +
								'Price: ' + submitted.currency + ' ' + '<span class="number">' + capcus_math.thousand_separator(submitted.price) + '</span><br>' + 
								'Promo: ' + 
								'<div class="table-responsive">' + 
									'<table class="table table-hover">' + 
										'<thead>' + 
											'<tr>' + 
												'<th>Promo</th>' + 
												'<th>Active</th>' +
												'<th>Price</th>' + 
											'</tr>' +
										'</thead>' +
										'<tbody>';
				for (var i in submitted.promo)
				{
					html += '<tr>' +
								'<td>' + submitted.promo[i].name + '</td>' +
								'<td>' + submitted.promo[i].since + ' - ' + submitted.promo[i].until + '</td>' + 
								'<td>' + submitted.currency + ' <span class="number">' + capcus_math.thousand_separator(submitted.promo[i].price) + '</span></td>' + 
							'</tr>';
				}
				html +=					'</tbody>' + 
									'</table>' +
								'</div>' +
								'<p class=\'mt-m\'>' + 
									'<a href=\'javascript:;\' data-toggle=\'modal\' data-target=\'#modal_tour_schedule\' data-capcus-data=\''+JSON.stringify(submitted)+'\' data-capcus-display-target=\''+modal_tour_schedule.display+'\' data-capcus-field-target=\''+modal_tour_schedule.field+'\'><i class=\'fa fa-pencil\'></i> Edit</a>' + 
								'</p>' + 
							'</div>';
				$(modal_tour_schedule.display).append(html);
			}

			////////////////
			// HIDE MODAL //
			////////////////
			$('#modal_tour_schedule').modal('hide');
		});

		////////////////////////////////////
		// LISTEN TO ADD NEW PROMO BUTTON //
		////////////////////////////////////
		$('#modal_tour_schedule').on('click', 'a#add-new-promo', function(){
			$('#modal_tour_schedule #table-tour-schedule-promo tbody').append(
																				'<tr>' + 
																					'<td>' + modal_tour_schedule.render_promo_name('') + '</td>' + 
																					'<td><input type="text" class="form-control" data-inputmask="\'mask\':\'d-m-y\'" name="promo_since[]"></td>' + 
																					'<td><input type="text" class="form-control" data-inputmask="\'mask\':\'d-m-y\'" name="promo_until[]"></td>' + 
																					'<td><input type="text" class="form-control" name="promo_price[]"></td>' +
																				'</tr>'
																			);
			$("#modal_tour_schedule #table-tour-schedule-promo tbody tr:last input[data-inputmask]").inputmask();
		});
	}
};
