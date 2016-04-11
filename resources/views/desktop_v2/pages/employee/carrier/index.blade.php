<div class="row">
	<div class="col-sm-12">
		<h4 class="padding-top-15">Karir <a href=""><i class="ion-android-add"></i></a></h4>
		<div class="slim-scroll">
			@foreach($page_datas->datas['employee']['works'] as $key => $value)
				<div class="row">
					<div class="col-sm-12 padding-right-30">
						<div class="link-square-green">
							<a class="link-transparent">
								<div class="font-size-18 font-dark-blue padding-top-5">
									{{$value['chart']['name']}} - {{$value['chart']['branch']['name']}}
									&nbsp;&nbsp;
									<a class="link-dark-blue" href="">
										<i class="ion-android-create"></i> 
									</a>
									&nbsp;&nbsp;
									<a class="link-dark-blue" href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" 
											data-target="#organisation_del"
											data-id="{{$value['id']}}"
											data-title="Hapus Data Pekerjaan {{$value['chart']['name']}}"
											data-effect="Menghapus data pekerjaan. Masukkan password Anda untuk melanjutkan "
											data-action="#">
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
			@endforeach
		</div>
	</div>
</div>