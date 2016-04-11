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
			@include('desktop_v2.components.secondary_navbar', ['action_create_button' => route('employee.create', ['org_id' => $page_datas->datas['id']]), 'action_edit_button' =>  route('employee.edit', ['org_id' => $page_datas->datas['id'], 'employee' => $page_datas->datas['employee']['id']]), 
				'action_delete_id' 	=> $page_datas->datas['employee']['id'], 'action_delete_title' => 'Hapus Data Karyawan '.$page_datas->datas['employee']['name'], 'action_delete_effect' => 'Menghapus karyawan akan menghapus pekerjaan, dokumen dan laporan karyawan. Masukkan password Anda untuk melanjutkan ',
				'action_delete_url' 	=> route('employee.destroy', ['org_id' => $page_datas->datas['id'], 'employee' => $page_datas->datas['employee']['id']])
			])
		</div>
		<div class="row background-gray-238">
			<div class="col-sm-4 text-xs-left background-white padding-right-0">
				<div class="slim-scroll">
					<div class="row padding-left-15 padding-top-15 font-black">
						<div class="col-sm-12">
							<img src="http://cdncms.fonts.net/images/1fbc3283deeda23a/Letterhart.gif" class="img-circle max-width-third">
						</div>
						
						<div class="clearfix">&nbsp;</div>
						
						<div class="col-sm-12">
							<h5 class="font-dark-blue">{{$page_datas->datas['employee']['name']}}</h5>
							<p>Karyawan {{$page_datas->datas['employee']['newest_status']}} @if(is_null($page_datas->datas['employee']['activation_link']) || $page_datas->datas['employee']['activation_link'] == '') - <span class="font-green font-bold">Aktif</span> @endif</p>

							<label>Jabatan :</label>
							<p>{{$page_datas->datas['employee']['newest_position']}}</p>
							<label>NIK :</label>
							<p>{{$page_datas->datas['employee']['newest_nik']}}</p>
							<label>Email :</label>
							<p>{{$page_datas->datas['employee']['email']}}</p>
							<label>Nomor Telepon :</label>
							<p>{{$page_datas->datas['employee']['phone']}}</p>
						</div>

						<div class="col-sm-12 padding-right-45">
							<h6 class="font-dark-blue">Stat</h6>

							<div class="row padding-top-15"> 
								<div class="col-sm-6 font-dark-blue text-xs-left"> 
									Sisa Cuti :
								</div>
								<div class="col-sm-6 font-red text-xs-right"> 
									Silahkan Upgrade Plan Anda
								</div>
							</div>
							<hr class="margin-top-0 margin-bottom-0 border-dark-blue"/>

							<div class="row padding-top-15"> 
								<div class="col-sm-6 font-dark-blue text-xs-left"> 
									Kelas Jabatan :
								</div>
								<div class="col-sm-6 font-dark-blue text-xs-right"> 
									{{$page_datas->datas['employee']['newest_grade']}}
								</div>
							</div>
							<hr class="margin-top-0 margin-bottom-0 border-dark-blue"/>

							<div class="row padding-top-15"> 
								<div class="col-sm-6 font-dark-blue text-xs-left"> 
									Masa Kerja :
								</div>
								<div class="col-sm-6 font-dark-blue text-xs-right"> 
									{{Carbon\Carbon::parse($page_datas->datas['employee']['work_period'][0])->diffInMonths(Carbon\Carbon::parse($page_datas->datas['employee']['work_period'][1]))}} Bulan
								</div>
							</div>
							<hr class="margin-top-0 margin-bottom-0 border-dark-blue"/>

							<div class="row padding-top-15"> 
								<div class="col-sm-6 font-dark-blue text-xs-left"> 
									Time Loss Rate :
								</div>
								<div class="col-sm-6 font-red text-xs-right"> 
									Silahkan Upgrade Plan Anda
								</div>
							</div>
							<hr class="margin-top-0 margin-bottom-0 border-dark-blue"/>
						</div>

						<div class="col-sm-12 padding-right-45">
							<h6 class="font-dark-blue padding-bottom-10 padding-top-15">Profil Karyawan</h6>
							<label>Jenis Kelamin :</label>
							<p>{{$page_datas->datas['employee']['gender']}}</p>
							<label>Umur :</label>
							<p>{{Carbon\Carbon::parse($page_datas->datas['employee']['date_of_birth'])->diffInYears(Carbon\Carbon::now())}} Tahun</p>
							<label>TTL :</label>
							<p>{{$page_datas->datas['employee']['place_of_birth']}} , {{Carbon\Carbon::parse($page_datas->datas['employee']['date_of_birth'])->format('d M Y')}}</p>
							<label>Status Perkawinan :</label>
							<p>{{$page_datas->datas['employee']['current_marital_status']}}</p>
							<label>Alamat :</label>
							<p>{{$page_datas->datas['employee']['address']}}</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-8 text-xs-left padding-right-0 padding-left-5">
				<div class="slim-scroll background-white">
					<div class="row">
						<div class="col-sm-12 padding-left-30 padding-top-15 padding-right-15"> 
							<ul class="nav nav-tabs">
								<li class="nav-item">
									<a class="nav-link active" href="#carrier" data-toggle="tab">Karir</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#document" data-toggle="tab">Dokumen</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#contract" data-toggle="tab">Kontrak Kerja</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#relation" data-toggle="tab">Relasi</a>
								</li>
							</ul>

							<div class="tab-content">
								<div id="carrier" class="tab-pane fade in active">
									@include('desktop_v2.pages.employee.carrier.index')
								</div>
								<div id="document" class="tab-pane fade">
									@include('desktop_v2.pages.employee.document.index')
								</div>
								<div id="contract" class="tab-pane fade">
									@include('desktop_v2.pages.employee.contract.index')
								</div>
								<div id="relation" class="tab-pane fade">
									@include('desktop_v2.pages.employee.relation.index')
								</div>
							</div>
						</div>
					</div>
				</div>
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
				<div class="col-sm-3 padding-0">
					<div class="slim-scroll-mini">
						<ul class="nav nav-tabs padding-right-5">
							<a data-toggle="tab" class="link-black" href="#filter"><li class="active padding-top-15 link-square-gray">Filter</li></a>
							<a data-toggle="tab" class="link-black" href="#sort"><li class="padding-top-15 link-square-gray">Urutkan</li></a>
						</ul>
					</div>
				</div>
				<div class="col-sm-4 border-left-1 padding-0">
					<div class="slim-scroll-mini padding-left-0">
						<div class="tab-content white-space-normal">
							<div id="filter" class="tab-pane fade in active">
								<ul class="nav nav-tabs padding-right-5 padding-left-5">
									<a data-toggle="tab" class="link-black" href="#branch"><li class="active padding-top-15 link-square-gray">Cabang</li></a>
									<a data-toggle="tab" class="link-black" href="#dept"><li class="padding-top-15 link-square-gray">Department</li></a>
									<a data-toggle="tab" class="link-black" href="#chart"><li class="padding-top-15 link-square-gray">Jabatan</li></a>
									<a data-toggle="tab" class="link-black" href="#grade"><li class="padding-top-15 link-square-gray">Kelas Jabatan</li></a>
									<a data-toggle="tab" class="link-black" href="#status"><li class="padding-top-15 link-square-gray">Status Pekerjaan</li></a>
									<a data-toggle="tab" class="link-black" href="#marital"><li class="padding-top-15 link-square-gray">Status Pernikahan</li></a>
									<a data-toggle="tab" class="link-black" href="#start"><li class="padding-top-15 link-square-gray">Mulai Bekerja</li></a>
									<a data-toggle="tab" class="link-black" href="#end"><li class="padding-top-15 link-square-gray">Berhenti Bekerja</li></a>
								</ul>
							</div>
							<div id="sort" class="tab-pane fade">
								<ul class="nav nav-tabs padding-right-5">
									<a data-toggle="tab" class="link-black" href="#sortname"><li class="active padding-top-15 link-square-gray">Nama</li></a>
									<a data-toggle="tab" class="link-black" href="#sortstart"><li class="padding-top-15 link-square-gray">Mulai Bekerja</li></a>
									<a data-toggle="tab" class="link-black" href="#sortend"><li class="padding-top-15 link-square-gray">Akhir Status/Berhenti</li></a>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-5 border-left-1 padding-0">
					<div class="slim-scroll-mini padding-left-0">
						<div class="tab-content white-space-normal">
							<div id="branch" class="tab-pane fade">
								<ul class="padding-left-5" style="list-style: outside none none;">
									@forelse($page_datas->datas['branches'] as $key => $value)
										<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'branchname' => $value['name']]))}}"><li class="padding-top-15 link-square-gray">{{$value['name']}}</li></a>
									@empty
										<p class="font-size-14 font-black text-xs-center">Tidak ada filter</p>
									@endforelse
								</ul>
							</div>
							<div id="dept" class="tab-pane fade">
								<ul class="padding-left-5" style="list-style: outside none none;">
									@forelse($page_datas->datas['departments'] as $key => $value)
										<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'department' => $value['department']]))}}"><li class="padding-top-15 link-square-gray">{{$value['department']}}</li></a>
									@empty
										<p class="font-size-14 font-black text-xs-center">Tidak ada filter</p>
									@endforelse
								</ul>
							</div>
							<div id="chart" class="tab-pane fade">
								<ul class="padding-left-5" style="list-style: outside none none;">
									@forelse($page_datas->datas['positions'] as $key => $value)
										<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'position' => $value['position']]))}}"><li class="padding-top-15 link-square-gray">{{$value['position']}}</li></a>
									@empty
										<p class="font-size-14 font-black text-xs-center">Tidak ada filter</p>
									@endforelse
								</ul>
							</div>
							<div id="grade" class="tab-pane fade">
								<ul class="padding-left-5" style="list-style: outside none none;">
									@forelse($page_datas->datas['grades'] as $key => $value)
										<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'currentgrade' => $value['grade']]))}}"><li class="padding-top-15 link-square-gray">{{$value['grade']}}</li></a>
									@empty
										<p class="font-size-14 font-black text-xs-center">Tidak ada filter</p>
									@endforelse
								</ul>
							</div>
							<div id="status" class="tab-pane fade">
								<ul class="padding-left-5" style="list-style: outside none none;">
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workstatus' => 'internship']))}}"><li class="padding-top-15 link-square-gray">Magang</li></a>
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workstatus' => 'contract']))}}"><li class="padding-top-15 link-square-gray">Kontrak</li></a>
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workstatus' => 'probation']))}}"><li class="padding-top-15 link-square-gray">Percobaan</li></a>
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workstatus' => 'permanent']))}}"><li class="padding-top-15 link-square-gray">Tetap</li></a>
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workstatus' => 'others']))}}"><li class="padding-top-15 link-square-gray">Lainnya</li></a>
								</ul>
							</div>
							<div id="marital" class="tab-pane fade">
								<ul class="padding-left-5" style="list-style: outside none none;">
									@forelse($page_datas->datas['maritalstatuses'] as $key => $value)
										<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'currentmaritalstatus' => $value['status']]))}}"><li class="padding-top-15 link-square-gray">{{$value['status']}}</li></a>
									@empty
										<p class="font-size-14 font-black text-xs-center">Tidak ada filter</p>
									@endforelse
								</ul>
							</div>
							<div id="start" class="tab-pane fade">
								<ul class="padding-left-5" style="list-style: outside none none;">
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workstart' => [Carbon\Carbon::now()->addDays(-1)->format('Y-m-d H:i:s'), Carbon\Carbon::now()->format('Y-m-d H:i:s') ]]))}}"><li class="padding-top-15 link-square-gray">Past 24 hours</li></a>
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workstart' => [Carbon\Carbon::now()->addWeeks(-1)->format('Y-m-d H:i:s'), Carbon\Carbon::now()->format('Y-m-d H:i:s') ]]))}}"><li class="padding-top-15 link-square-gray">Past week</li></a>
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workstart' => [Carbon\Carbon::now()->addMonths(-1)->format('Y-m-d H:i:s'), Carbon\Carbon::now()->format('Y-m-d H:i:s') ]]))}}"><li class="padding-top-15 link-square-gray">Past month</li></a>
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workstart' => [Carbon\Carbon::now()->addYears(-1)->format('Y-m-d H:i:s'), Carbon\Carbon::now()->format('Y-m-d H:i:s') ]]))}}"><li class="padding-top-15 link-square-gray">Past Year</li></a>
								</ul>
							</div>
							<div id="end" class="tab-pane fade">
								<ul class="padding-left-5" style="list-style: outside none none;">
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workend' => [Carbon\Carbon::now()->addDays(-1)->format('Y-m-d H:i:s'), Carbon\Carbon::now()->format('Y-m-d H:i:s') ]]))}}"><li class="padding-top-15 link-square-gray">Past 24 hours</li></a>
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workend' => [Carbon\Carbon::now()->addWeeks(-1)->format('Y-m-d H:i:s'), Carbon\Carbon::now()->format('Y-m-d H:i:s') ]]))}}"><li class="padding-top-15 link-square-gray">Past week</li></a>
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workend' => [Carbon\Carbon::now()->addMonths(-1)->format('Y-m-d H:i:s'), Carbon\Carbon::now()->format('Y-m-d H:i:s') ]]))}}"><li class="padding-top-15 link-square-gray">Past month</li></a>
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workend' => [Carbon\Carbon::now()->addYears(-1)->format('Y-m-d H:i:s'), Carbon\Carbon::now()->format('Y-m-d H:i:s') ]]))}}"><li class="padding-top-15 link-square-gray">Past Year</li></a>
								</ul>
							</div>

							<div id="sortname" class="tab-pane fade">
								<ul class="padding-left-5" style="list-style: outside none none;">
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'sort' => 'name-asc']))}}"><li class="padding-top-15 link-square-gray">A - Z</li></a>
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'sort' => 'name-desc']))}}"><li class="padding-top-15 link-square-gray">Z - A</li></a>
								</ul>
							</div>
							<div id="sortstart" class="tab-pane fade">
								<ul class="padding-left-5" style="list-style: outside none none;">
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'sort' => 'workstart-asc']))}}"><li class="padding-top-15 link-square-gray">1 - 10</li></a>
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'sort' => 'workstart-desc']))}}"><li class="padding-top-15 link-square-gray">10 - 1</li></a>
								</ul>
							</div>
							<div id="sortend" class="tab-pane fade">
								<ul class="padding-left-5" style="list-style: outside none none;">
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'sort' => 'workend-asc']))}}"><li class="padding-top-15 link-square-gray">1 - 10</li></a>
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'sort' => 'workend-desc']))}}"><li class="padding-top-15 link-square-gray">10 - 1</li></a>
								</ul>
							</div>

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