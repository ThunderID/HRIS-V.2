<div class="row">
	<div class="col-sm-12">
		<div class="padding-top-15 font-size-18 padding-bottom-10">Relasi <a href=""><i class="ion-ios-plus-outline"></i></a></div>
		@if(!is_null($page_datas->datas['employee']['relatives']))
			<div class="{{$scroll_class}}">
				@foreach($page_datas->datas['employee']['relatives'] as $key => $value)
					<div class="row">
						<div class="col-sm-12 padding-right-30">
							<div class="link-square-green">
								<a class="link-transparent">
									<div class="font-size-18 font-dark-blue padding-top-5">
										{{$value['relative']['name']}} - {{$value['relationship']}}
										&nbsp;&nbsp;
										<a class="link-dark-blue" href="">
											<i class="ion-android-create"></i> 
										</a>
										&nbsp;&nbsp;
										<a class="link-dark-blue" href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" 
												data-target="#organisation_del"
												data-id="{{$value['id']}}"
												data-title="Hapus Data Relasi {{$value['relative']['name']}}"
												data-effect="Menghapus data relasi. Masukkan password Anda untuk melanjutkan "
												data-action="{{route('employee.relation.destroy', ['org_id' => $page_datas->datas['id'], 'employee' => $page_datas->datas['employee']['id'], 'id' => $value['id']] )}}">
												<i class="ion-android-delete"></i> 
										</a>
									</div>
									<div class="font-size-14">
										<div>Umur: {{Carbon\Carbon::parse($value['relative']['date_of_birth'])->diffInYears(Carbon\Carbon::now())}} Tahun</div>
										<div>Telepon: {{$value['relative']['phone']}}</div>
									</div>
								</a>
							</div>	
						</div>	
					</div>
				@endforeach
			</div>
		@else
			<p class="font-size-14 font-gray-225">Belum ada data relasi</p>
		@endif
	</div>
</div>