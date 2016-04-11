<div class="row">
	<div class="col-sm-12">
		<h4 class="padding-top-15">Relasi <a href=""><i class="ion-android-add"></i></a></h4>
		<div class="slim-scroll">
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
											data-action="#">
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
	</div>
</div>