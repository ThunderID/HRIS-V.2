; var hris_wizard_new_employee = {

	init: function(){
		$(".hris_form_wizard").hide();
		$(".link-mobile-create").hide();
		$(".modal_employee_profile").show();
		$(".link-mobile-next-profile").show();
		$(".link-mobile-prev-profile").show();

		hris_wizard_employee_profile.init();
		hris_wizard_new_employee_contact.init();
		hris_wizard_new_employee_carrier.init();
	}
};

; var hris_wizard_exists_employee = {

	init: function(){
		$(".hris_form_wizard").hide();
		$(".link-mobile-create").hide();
		$(".modal_employee_profile").show();
		$(".link-mobile-next-profile").show();
		$(".link-mobile-prev-profile").show();

		hris_wizard_employee_profile.init();
		hris_wizard_exists_employee_contact.init();
		hris_wizard_exists_employee_carrier.init();
		hris_wizard_employee_document.init();
		hris_wizard_employee_relation.init();
	}
};

; var hris_wizard_employee_profile = {

	init: function(){
		$(".link-mobile-next-profile").click(function(){
			$(".hris_form_wizard").hide();
			$(".link-mobile-create").hide();
			$(".modal_employee_contact").show();
			$(".link-mobile-prev-contact").show();
			$(".link-mobile-next-contact").show();
		});
	}
};

; var hris_wizard_new_employee_contact = {

	init: function(){
		$(".link-mobile-prev-contact").click(function(){
			$(".hris_form_wizard").hide();
			$(".link-mobile-create").hide();
			$(".modal_employee_profile").show();
			$(".link-mobile-prev-profile").show();
			$(".link-mobile-next-profile").show();
		});

		$(".link-mobile-next-contact").click(function(){
			$(".hris_form_wizard").hide();
			$(".link-mobile-create").hide();
			$(".modal_employee_carrier_new").show();
			$(".link-mobile-prev-carrier-new").show();
			$(".link-mobile-next-carrier-new").show();
		});
	}
};

; var hris_wizard_exists_employee_contact = {

	init: function(){
		$(".link-mobile-prev-contact").click(function(){
			$(".hris_form_wizard").hide();
			$(".link-mobile-create").hide();
			$(".modal_employee_profile").show();
			$(".link-mobile-prev-profile").show();
			$(".link-mobile-next-profile").show();
		});

		$(".link-mobile-next-contact").click(function(){
			$(".hris_form_wizard").hide();
			$(".link-mobile-create").hide();
			$(".modal_employee_carrier").show();
			$(".link-mobile-prev-carrier").show();
			$(".link-mobile-next-carrier").show();
		});
	}
};

; var hris_wizard_new_employee_carrier = {

	init: function(){
		$(".link-mobile-prev-carrier-new").click(function(){
			$(".hris_form_wizard").hide();
			$(".link-mobile-create").hide();
			$(".modal_employee_contact").show();
			$(".link-mobile-prev-contact").show();
			$(".link-mobile-next-contact").show();
		});
	}
};

; var hris_wizard_exists_employee_carrier = {

	init: function(){
		$(".link-mobile-prev-carrier").click(function(){
			$(".hris_form_wizard").hide();
			$(".link-mobile-create").hide();
			$(".modal_employee_contact").show();
			$(".link-mobile-prev-contact").show();
			$(".link-mobile-next-contact").show();
		});

		$(".link-mobile-next-carrier").click(function(){
			$(".hris_form_wizard").hide();
			$(".link-mobile-create").hide();
			$(".modal_employee_document").show();
			$(".link-mobile-prev-document").show();
			$(".link-mobile-next-document").show();
		});
	}
};

; var hris_wizard_employee_document = {

	init: function(){
		$(".link-mobile-prev-document").click(function(){
			$(".hris_form_wizard").hide();
			$(".link-mobile-create").hide();
			$(".modal_employee_carrier").show();
			$(".link-mobile-prev-carrier").show();
			$(".link-mobile-next-carrier").show();
		});

		$(".link-mobile-next-document").click(function(){
			$(".hris_form_wizard").hide();
			$(".link-mobile-create").hide();
			$(".modal_employee_relation").show();
			$(".link-mobile-prev-relation").show();
			$(".link-mobile-next-relation").show();
		});
	}
};

; var hris_wizard_employee_relation = {

	init: function(){
		$(".link-mobile-prev-relation").click(function(){
			$(".hris_form_wizard").hide();
			$(".link-mobile-create").hide();
			$(".modal_employee_document").show();
			$(".link-mobile-prev-document").show();
			$(".link-mobile-next-document").show();
		});
	}
};