@extends('mobile_v2.page_templates.wireframe_with_menu')

@section('content')

<!-- Employee Index -->
<div class="row">
	<div class="col-xs-12">
		<div class="row padding-top-30 padding-left-15 padding-right-15">
			<div class="col-xs-12">
				@include('desktop_v2.components.grand_search_box', ['search_name' => 'q', 'search_placeholder' => 'Cari Karyawan', 'background_search_box' => 'background-light-blue', 'font_search_box' => 'font-dark-blue'])
			</div>
		</div>
		
		<div class="modal fade filter-employee padding-top-58" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog background-white">
				<div class="modal-content background-white">
					@include('mobile_v2.components.modal_filter_employee')
				</div>
			</div>
		</div>
		
		<div class="modal fade sort-employee padding-top-58" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog background-white">
				<div class="modal-content background-white">
					@include('mobile_v2.components.modal_sort_employee')
				</div>
			</div>
		</div>

		<div class="clearfix">&nbsp;</div>

		<div class="row padding-top-30 padding-left-15 padding-right-15">
			<div class="col-xs-6">
				<a class="link-square-gray-225 border-blue link-blue" href="#"  data-toggle="modal" data-target=".filter-employee">
					<i class="ion-funnel"></i> Filter
				</a>
			</div>
			<div class="col-xs-6 text-xs-right">
				<a class="link-square-gray-225 border-blue link-blue" href="#" data-toggle="modal" data-target=".sort-employee">
					<i class="ion-android-funnel"></i> Urutkan
				</a>
			</div>
		</div>

		<div class="clearfix">&nbsp;</div>
		<!-- Content -->
		@forelse($page_datas->datas['employees'] as $key => $dt)
			<div class="row">
				<div class="col-xs-12">
					@include('mobile_v2.components.card_plain_employee', ['card_content' => $dt])
				</div>
			</div>
		@empty
			<div class="row padding-15">
				<div class="col-xs-12">
					<p class="background-white padding-15">Tidak ada data Karyawan</p>
				</div>
			</div>
		@endforelse
		<!-- End of Content -->
	
		<a class="link-white background-blue link-round-100 font-size-25 padding-right-7 padding-left-12" id="link-add-fixed-small" href="{{route('employee.create', ['org_id' => $page_datas->datas['id']])}}"><i class ="ion-android-add"></i></a>
	
	</div>
</div>

<!-- End of Employee Index -->
@stop

@section('js')
	<script type="text/javascript">
		hris_slimscroll.init();
		hris_modal_filter_employee.init();
		hris_modal_sort_employee.init();
	</script>
@stop