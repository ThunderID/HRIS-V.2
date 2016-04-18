@extends('desktop_v2.page_templates.wireframe_with_menu')

@section('content')

<!-- Employee Index -->
<div class="row">
	<div class="col-md-3">
		@include('desktop_v2.components.grand_search_box', ['search_name' => 'q', 'search_placeholder' => 'Cari Karyawan', 'background_search_box' => 'background-light-blue', 'font_search_box' => 'font-dark-blue'])
		<div class="background-white slim-scroll">
			<!-- Content -->
			<div class="row">
				<div class="col-sm-12">
					<div class="row margin-right-0">
						<div class="col-sm-6">
							<p class="font-size-18 margin-bottom-0 padding-15">Karyawan</p>
						</div>
						<div class="col-sm-6 text-xs-right">
							<a href="#" class="link-blue font-size-16 link-filter-menu" role="button" aria-haspopup="true"><p class="font-size-18 margin-bottom-0 padding-top-15"><i class="ion-funnel"></i></a>
						</div>
					</div>
				</div>
				@forelse($page_datas->datas['employees'] as $key => $dt)

				<div class="col-sm-12">
					@include('desktop_v2.components.card_plain_employee', ['card_content' => $dt])
				</div>
				
				@empty
					<div class="col-md-12 col-sm-12">
						<p class="background-white padding-15">Tidak ada data karyawan</p>
					</div>
				@endforelse
			</div>
			<!-- End of Content -->			
		</div>
	</div>
	<div class="col-md-9 margin-left-negative-10">
		<div class="row background-shade-blue margin-left-negative-20">
			@include('desktop_v2.components.secondary_navbar', ['action_create_button' => route('employee.create', ['org_id' => $page_datas->datas['id']]), 'special_case_import' => true])
		</div>
		<div class="row background-gray-238">
			<div class="col-md-12 text-xs-center" style="padding-top:calc(10% + 50px);">
				<p class="font-size-25 font-gray-225">Belum ada data karyawan yang dipilih</p>
			</div>
		</div>
	</div>
	
	@include('desktop_v2.components.modal_filter')
</div>

<!-- End of Employee Index -->

<!-- Modal upload -->
@include('desktop_v2.components.modals.modal_employee_import', [
		'modal_emp_id'  => 'employee_upload', 
		'modal_route'   => ''
])

@stop

@section('js')
	<script type="text/javascript">
		hris_slimscroll.init();
		hris_slimscroll_mini.init();
		hris_filter.init();
		hris_modal_employee_upload.init();
	</script>
@stop