<div class="row">
	<div class="col-xs-12">
		<strong>Relatif</strong>
	</div>
</div>
<div class="clearfix">&nbsp;</div>
<div class="row">
	<div class="col-xs-12">
		@if(!is_null($page_datas->datas['employee']['relatives']))
			<div class="{{$scroll_class}}">
				@foreach($page_datas->datas['employee']['relatives'] as $key => $value)
					<div class="row">
						<div class="col-xs-12 padding-right-30">
							<div class="link-square-green">
								<div class="font-size-18 font-dark-blue padding-top-5">
									{{$value['relative']['name']}} - {{$value['relationship']}}
									&nbsp;&nbsp;
									<a class="link-dark-blue" href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" 
										data-target="#relative_update"
										data-id="{{$value['id']}}"
										data-title="Ubah Data relatif {{$page_datas->datas['employee']['name']}}"
										data-personid="{{$value['person_id']}}"
										data-relativeid="{{$value['relative_id']}}"
										data-name="{{$value['relative']['name']}}"
										data-placeofbirth="{{$value['relative']['place_of_birth']}}"
										data-gender="{{$value['relative']['gender']}}"
										data-relation="{{$value['relationship']}}"
										data-dateofbirth="{{$value['relative']['date_of_birth']}}"
										data-phone="{{$value['relative']['phone']}}"
										data-email="{{$value['relative']['email']}}"
										data-address="{{$value['relative']['address']}}"
										data-action="{{route('employee.relation.store', ['org_id' => $page_datas->datas['id'], 'employee' => $page_datas->datas['employee']['id']] )}}">
										<i class="ion-android-create"></i> 
									</a>
									&nbsp;&nbsp;
									<a class="link-dark-blue" href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" 
										data-target="#organisation_del"
										data-id="{{$value['id']}}"
										data-title="Hapus Data Relatif {{$value['relative']['name']}}"
										data-effect="Menghapus data relasi. Masukkan password Anda untuk melanjutkan "
										data-action="{{route('employee.relation.destroy', ['org_id' => $page_datas->datas['id'], 'employee' => $page_datas->datas['employee']['id'], 'id' => $value['id']] )}}">
										<i class="ion-android-delete"></i> 
									</a>
								</div>
								<div class="font-size-14">
									<div>Umur: {{Carbon\Carbon::parse($value['relative']['date_of_birth'])->diffInYears(Carbon\Carbon::now())}} Tahun</div>
									<div>Telepon: {{$value['relative']['phone']}}</div>
								</div>
							</div>	
						</div>	
					</div>
					<div class="clearfix">&nbsp;</div>
				@endforeach
			</div>
		@else
			<p class="font-size-14 font-gray-225">Belum ada data relasi</p>
		@endif
	</div>
</div>

<a class="link-white background-blue link-round-100 font-size-25 padding-right-7 padding-left-12" id="link-add-fixed-small" 
	data-backdrop="static" data-keyboard="false" data-toggle="modal" 
	data-target="#relative_update"
	data-id=""
	data-title="Tambah Data relatif {{$page_datas->datas['employee']['name']}}"
	data-personid="{{$page_datas->datas['employee']['id']}}"
	data-relativeid=""
	data-name=""
	data-placeofbirth=""
	data-gender=""
	data-relation=""
	data-dateofbirth=""
	data-phone=""
	data-email=""
	data-address=""
	data-action="{{route('employee.relation.store', ['org_id' => $page_datas->datas['id'], 'employee' => $page_datas->datas['employee']['id']] )}}"
	href="javascript:void(0);">
	<i class ="ion-android-add"></i>
</a>

<!-- Modal Relative -->
@include('desktop_v2.components.modals.modal_relative_update', [
		'modal_id'      => 'relative_update', 
		'modal_route'   => route('ajax.organisation.charts', ['id' => $page_datas->datas['id']])
])
<!-- End of Modal Relative -->