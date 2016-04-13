<div class="row">
	<div class="col-xs-12">
		<strong>Dokumen</strong>
	</div>
</div>
<div class="clearfix">&nbsp;</div>

<div class="row">
	<div class="col-sm-12">
		@if(!is_null($page_datas->datas['employee']['persondocuments']))
			<div class="{{$scroll_class}}">
				@foreach($page_datas->datas['employee']['persondocuments'] as $key => $value)
					<?php $document = json_decode($value['documents'], true);
						  $keys = [];
					?>
					<?php $keys=json_encode($document['document']) ;?>
					<div class="row">
						<div class="col-sm-12 padding-right-30">
							<div class="link-square-green">
								<div class="font-size-18 font-dark-blue padding-top-5 text-uppercase">
									{{$document['code']}}
									&nbsp;&nbsp;
									<a class="link-dark-blue" href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" 
										data-target="#document_update"
										data-id=""
										data-title="Ubah Data Dokumen {{$page_datas->datas['employee']['name']}}"
										data-personid=""
										data-code="{{$document['code']}}"
										data-documents="{{$keys}}"
										data-action="{{route('employee.document.store', ['org_id' => $page_datas->datas['id'], 'employee' => $page_datas->datas['employee']['id']] )}}">
										<i class="ion-android-create"></i> 
									</a>
									&nbsp;&nbsp;
									<a class="link-dark-blue" href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" 
											data-target="#organisation_del"
											data-id="{{$value['id']}}"
											data-title="Hapus Data Dokumen {{$document['code']}}"
											data-effect="Menghapus data dokumen. Masukkan password Anda untuk melanjutkan "
											data-action="{{route('employee.document.destroy', ['org_id' => $page_datas->datas['id'], 'employee' => $page_datas->datas['employee']['id'], 'id' => $value['id']] )}}">
											<i class="ion-android-delete"></i> 
									</a>
								</div>
								<div class="font-size-14">
									@foreach($document['document'] as $key2 => $value2)
										<div>{{ucwords(str_replace('_', ' ', $key2))}} : {{$value2}}</div>
									@endforeach
								</div>
						</div>	
						</div>	
					</div>
					<div class="clearfix">&nbsp;</div>
				@endforeach
			</div>
		@else
			<p class="font-size-14 font-gray-225">Belum ada data dokumen</p>
		@endif
	</div>
</div>

<a class="link-white background-blue link-round-100 font-size-25 padding-right-7 padding-left-12" id="link-add-fixed-small" 
	data-backdrop="static" data-keyboard="false" data-toggle="modal" 
	data-target="#document_update"
	data-id=""
	data-title="Tambah Data Dokumen {{$page_datas->datas['employee']['name']}}"
	data-personid=""
	data-code=""
	data-action="{{route('employee.document.store', ['org_id' => $page_datas->datas['id'], 'employee' => $page_datas->datas['employee']['id']] )}}"
	href="javascript:void(0);">
	<i class ="ion-android-add"></i>
</a>

<!-- Modal Document -->
@include('desktop_v2.components.modals.modal_document_update', [
		'modal_id'      => 'document_update', 
		'modal_route'   => route('ajax.organisation.charts', ['id' => $page_datas->datas['id']])
])
<!-- End of Modal Document -->