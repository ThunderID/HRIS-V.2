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
							<img src="{{$page_datas->datas['employee']['avatar']}}" class="img-circle max-width-third">
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
				<div class="background-white">
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

	@include('desktop_v2.components.modal_filter')
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