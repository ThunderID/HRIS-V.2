; var hris_modal_chart_edit = {

	init: function(){
		$('#chart_edit').on('show.bs.modal', function (e) {
			var id          = $(e.relatedTarget).attr('data-id');
			var title       = $(e.relatedTarget).attr('data-title');
			var parent      = $(e.relatedTarget).attr('data-parent');
			var parentid    = $(e.relatedTarget).attr('data-parentid');
			var name        = $(e.relatedTarget).attr('data-name');
			var department  = $(e.relatedTarget).attr('data-department');
			var action      = $(e.relatedTarget).attr('data-action');

			$('.mod_id').val(id);
			$('.modal_title').html(title);
			$('.modal_parent').val(parent);
			$('.modal_chart_id').val(parentid);
			$('.modal_name').val(name);
			$('.modal_department').val(department);
			$('.modal2').attr('action', action);
		}); 
	}
};

; var hris_modal_delete = {

	init: function(){
		$('#organisation_del').on('show.bs.modal', function (e) {
			var id      = $(e.relatedTarget).attr('data-id');
			var title   = $(e.relatedTarget).attr('data-title');
			var effect  = $(e.relatedTarget).attr('data-effect');
			var action  = $(e.relatedTarget).attr('data-action');

			$('.mod_id').val(id);
			$('.modal_title').html(title);
			$('.modal_effect').html(effect);
			$('.modal1').attr('action', action);
		}); 
	}
};


; var hris_modal_work_update = {

	init: function(){
		$('#work_update').on('show.bs.modal', function (e) {

			var id          = $(e.relatedTarget).attr('data-id');
			var title       = $(e.relatedTarget).attr('data-title');
			var personid    = $(e.relatedTarget).attr('data-personid');
			var nik    		= $(e.relatedTarget).attr('data-nik');
			var grade       = $(e.relatedTarget).attr('data-grade');
			var status  	= $(e.relatedTarget).attr('data-status');
			var start 	 	= $(e.relatedTarget).attr('data-start');
			var end  		= $(e.relatedTarget).attr('data-end');
			var reason  	= $(e.relatedTarget).attr('data-reason');
			var action      = $(e.relatedTarget).attr('data-action');

			var preload_data_tag = [];

			var chartid      = $(e.relatedTarget).attr('data-chartid');
			var chartname	 = $(e.relatedTarget).attr('data-chartname');


			$('.mod_id').val(id);
			$('.modal_title').html(title);
			$('.modal_personid').val(personid);
			$('.modal_nik').val(nik);
			$('.modal_grade').val(grade);
			$('.modal_status').val(status);
			$('.modal_start').val(start);
			$('.modal_end').val(end);
			$('.modal_reason').val(reason);
			$('.modal_work_update').attr('action', action);
			
			if(chartid!='')
			{
				preload_data_tag.push({id: chartid, text: chartname})
			}

			hris_select_chart.init(preload_data_tag);
			if(chartid!='')
			{
				$('select').val(chartid);

				$(".select2-selection__rendered").text(chartname);
				$(".select2-selection__rendered").attr("title",chartname);
			}

		}); 
	}
};

