<div class="row">
	<div class="col-sm-12">
		<div class="padding-top-15 font-size-18 padding-bottom-10">Dokumen <a href=""><i class="ion-ios-plus-outline"></i></a></div>
		<div class="slim-scroll">
			@foreach($page_datas->datas['employee']['persondocuments'] as $key => $value)
				<?php $document = json_decode($value['documents'], true);?>
				<div class="row">
					<div class="col-sm-12 padding-right-30">
						<div class="link-square-green">
							<a class="link-transparent">
								<div class="font-size-18 font-dark-blue padding-top-5 text-uppercase">
									{{$document['code']}}
									&nbsp;&nbsp;
									<a class="link-dark-blue" href="">
										<i class="ion-android-create"></i> 
									</a>
									&nbsp;&nbsp;
									<a class="link-dark-blue" href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" 
											data-target="#organisation_del"
											data-id="{{$value['id']}}"
											data-title="Hapus Data Dokumen {{$document['code']}}"
											data-effect="Menghapus data dokumen. Masukkan password Anda untuk melanjutkan "
											data-action="#">
											<i class="ion-android-delete"></i> 
									</a>
								</div>
								<div class="font-size-14">
									@foreach($document['document'] as $key2 => $value2)
										<div>{{ucwords(str_replace('_', ' ', $key2))}} : {{$value2}}</div>
									@endforeach
								</div>
							</a>
						</div>	
					</div>	
				</div>	
			@endforeach
		</div>
	</div>
</div>