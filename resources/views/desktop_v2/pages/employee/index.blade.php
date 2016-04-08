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
		<div class="row background-shade-blue">
			@include('desktop_v2.components.secondary_navbar', ['action_create_button' => route('employee.create', ['org_id' => $page_datas->datas['id']])])
		</div>
		<div class="row background-gray-238">
			<div class="col-md-12 text-xs-center" style="padding-top:calc(10% + 50px);">
				<p class="font-size-25 font-gray-225">Belum ada data karyawan yang dipilih</p>
			</div>
		</div>
	</div>

	<ul class="dropdown-menu filter-menu filter-menu-employee" style="position:absolute; display:none; left: 345px; top: 145px;">
		<li class="dropdown-item border-bottom-1">
			<div class="row">
				<div class="col-sm-9 padding-10">
					<p class="font-size-16 font-black margin-bottom-0">Alat Pencarian</p>
				</div>
				<div class="col-sm-3 padding-10">
					<a href="#" class="link-blue font-size-16 link-filter-menu-close" style="float:right;" role="button" aria-haspopup="true"><i class="ion-android-close"></i></a>
				</div>
			</div>	
		</li>
		<li class="dropdown-item padding-top-10">
			<div class="row padding-bottom-10">
				<div class="col-sm-3">
					<div class="slim-scroll-mini border-right-1">
						<p>Filter</p>
						<p>Urutkan</p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="slim-scroll-mini border-right-1 padding-left-0">
						<p>Cabang</p>
						<p>Department</p>
						<p>Jabatan</p>
						<p>Kelas Jabatan</p>
						<p>Status Pekerjaan</p>
						<p>Status Pernikahan</p>
						<p>Mulai Bekerja</p>
						<p>Berhenti Bekerja</p>
					</div>
				</div>
				<div class="col-sm-5">
					<div class="slim-scroll-mini padding-left-0">
						<div class="filter-branch" style="display:none;">
							<p>MMS</p>
						</div>
					</div>
				</div> 
			</div>	
		</li>
	</ul>
</div>

<!-- End of Employee Index -->
@stop

@section('js')
	<script type="text/javascript">
		hris_slimscroll.init();
		hris_slimscroll_mini.init();
		hris_filter.init();
	</script>
@stop