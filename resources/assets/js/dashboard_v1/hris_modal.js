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

; var hris_modal_relative_update = {

	init: function(){
		$('#relative_update').on('show.bs.modal', function (e) {

			var id				= $(e.relatedTarget).attr('data-id');
			var title			= $(e.relatedTarget).attr('data-title');
			var personid		= $(e.relatedTarget).attr('data-personid');
			var relativeid		= $(e.relatedTarget).attr('data-relativeid');
			var name			= $(e.relatedTarget).attr('data-name');
			var placeofbirth	= $(e.relatedTarget).attr('data-placeofbirth');
			var gender			= $(e.relatedTarget).attr('data-gender');
			var relation  		= $(e.relatedTarget).attr('data-relation');
			var dateofbirth  	= $(e.relatedTarget).attr('data-dateofbirth');
			var phone 		 	= $(e.relatedTarget).attr('data-phone');
			var email  			= $(e.relatedTarget).attr('data-email');
			var address			= $(e.relatedTarget).attr('data-address');
			var action      	= $(e.relatedTarget).attr('data-action');


			$('.mod_id').val(id);
			$('.modal_title').html(title);
			$('.modal_personid').val(personid);
			$('.modal_relativeid').val(relativeid);
			$('.modal_relative_name').val(name);
			$('.modal_relative_place_of_birth').val(placeofbirth);
			$('.modal_relative_gender').val(gender);
			$('.modal_relationship').val(relation);
			$('.modal_relative_date_of_birth').val(dateofbirth);
			$('.modal_relative_phone').val(phone);
			$('.modal_relative_email').val(email);
			$('.modal_relative_address').val(address);
			$('.modal_relative_update').attr('action', action);

		}); 
	}
};

; var hris_modal_document_update = {

	init: function(){
		$('#document_update').on('show.bs.modal', function (e) {

			var id				= $(e.relatedTarget).attr('data-id');
			var title			= $(e.relatedTarget).attr('data-title');
			var personid		= $(e.relatedTarget).attr('data-personid');
			var code			= $(e.relatedTarget).attr('data-code');
			var action      	= $(e.relatedTarget).attr('data-action');

			$('.mod_id').val(id);
			$('.modal_document_secondary_title').html(title);
			$('.modal_personid').val(personid);
			$('.modal_document_update').attr('action', action);

			if(code!='')
			{
				var doc	= JSON.parse($(e.relatedTarget).attr('data-documents'));

				for(var k in doc) 
				{
					$('.modal_documents_'+k).val(doc[k]);
				}

				$(".document_form").hide();
			    $(".document_"+code+"_form").show();
				$(".document_click").hide();
				$(".document_back").hide();
				$(".document_cancel").show();
				$('.modal_document_title').html(title);
				$(".modal_document_title").show();
				$(".modal_document_secondary_title").hide();
				$('.modal_code').val(code);
			}
			else
			{
				$(".document_form").hide();
				$(".document_back").hide();
				$(".document_cancel").hide();
				$(".document_click").show();
				$(".modal_document_title").hide();
				$(".modal_document_secondary_title").show();
			}

		}); 

		$(".document_click").click(function(){
			var code			= $(this).attr('data-code');
			title 				=code.replace('_',' ');

			$(".document_"+code+"_form").show();
			$(".document_click").hide();
			$(".document_back").show();
			$(".document_cancel").hide();
			$('.modal_document_title').html(title);
			$(".modal_document_title").show();
			$(".modal_document_secondary_title").hide();
			$('.modal_code').val(code);
		});

		$(".document_back").click(function(){

			$(".document_form").hide();
			$(".document_back").hide();
			$(".document_cancel").hide();
			$(".document_click").show();
			$(".modal_document_title").hide();
			$(".modal_document_secondary_title").show();
		});

		$(".document_back").hide();
		$(".document_cancel").hide();
		$(".document_form").hide();
		$(".modal_document_title").hide();
	}
};
