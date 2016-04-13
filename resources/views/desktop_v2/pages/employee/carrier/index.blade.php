<div class="row">
	<div class="col-sm-12">
		<div class="padding-top-15 font-size-18 padding-bottom-10">Karir 
			<a class="link-dark-blue" href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" 
				data-target="#work_update"
				data-id=""
				data-title="Tambah Data Pekerjaan {{$page_datas->datas['employee']['name']}}"
				data-personid=""
				data-chartid=""
				data-chartname=""
				data-nik=""
				data-grade=""
				data-status=""
				data-start=""
				data-end=""
				data-reason=""
				data-action="{{route('employee.work.store', ['org_id' => $page_datas->datas['id'], 'employee' => $page_datas->datas['employee']['id']] )}}">
				<i class="ion-ios-plus-outline"></i> 
			</a>
		</div>
		@if(!is_null($page_datas->datas['employee']['works']))
			<div class="{{$scroll_class}}">
				@foreach($page_datas->datas['employee']['works'] as $key => $value)
					<div class="row">
						<div class="col-sm-12 padding-right-30">
							<div class="link-square-green">
								<a class="link-transparent">
									<div class="font-size-18 font-dark-blue padding-top-5">
										{{$value['chart']['name']}} - {{$value['chart']['branch']['name']}}
										&nbsp;&nbsp;
										<a class="link-dark-blue" href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" 
												data-target="#work_update"
												data-id="{{$value['id']}}"
												data-title="Ubah Data Pekerjaan {{$page_datas->datas['employee']['name']}}"
												data-personid="{{$value['person_id']}}"
												data-chartid="{{$value['chart_id']}}"
												data-chartname="{{$value['chart']['name']}} cabang {{$value['chart']['branch']['name']}}"
												data-nik="{{$value['nik']}}"
												data-grade="{{$value['grade']}}"
												data-status="{{$value['status']}}"
												data-start="{{$value['start']}}"
												data-end="{{$value['end']}}"
												data-reason="{{$value['reason_end_job']}}"
												data-action="{{route('employee.work.store', ['org_id' => $page_datas->datas['id'], 'employee' => $page_datas->datas['employee']['id'], 'id' => $value['id']] )}}">
												<i class="ion-android-create"></i> 
										</a>
										&nbsp;&nbsp;
										<a class="link-dark-blue" href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" 
												data-target="#organisation_del"
												data-id="{{$value['id']}}"
												data-title="Hapus Data Pekerjaan {{$page_datas->datas['employee']['name']}}"
												data-effect="Menghapus data pekerjaan. Masukkan password Anda untuk melanjutkan "
												data-action="{{route('employee.work.destroy', ['org_id' => $page_datas->datas['id'], 'employee' => $page_datas->datas['employee']['id'], 'id' => $value['id']] )}}">
												<i class="ion-android-delete"></i> 
										</a>
									</div>
									<div class="font-size-14">
										<div>{{Carbon\Carbon::parse($value['start'])->format('d M Y')}} - {{strtotime($value['end']) ? Carbon\Carbon::parse($value['end'])->format('d M Y') : 'sekarang'}}</div>
									</div>
								</a>
							</div>	
						</div>	
					</div>
					<div class="clearfix">&nbsp;</div>
				@endforeach
			</div>
		@else
			<p class="font-size-14 font-gray-225">Belum ada data pekerjaan</p>
		@endif
	</div>
</div>

<!-- Modal Work -->
@include('desktop_v2.components.modals.modal_work_update', [
		'modal_id'      => 'work_update', 
		'modal_route'   => route('ajax.organisation.charts', ['id' => $page_datas->datas['id']])
])
<!-- End of Modal Work -->