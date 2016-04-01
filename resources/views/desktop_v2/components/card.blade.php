<div class="row">
	<div class="col-lg-2 col-md-4 col-sm-3 padding-right-0">
		<div class="background-white " id="col-eq-height">
			<div>
				<a class="link-white" href="{{route('org.show', $card_content['id'])}}">
					<img src="{{$card_content['logo']}}">
				</a>
			</div>
		</div>	
	</div>	
	<div class="col-lg-10 col-md-8 col-sm-9 padding-left-5">
		<div class=" background-white padding-15 height-120">
			<a class="text-uppercase font-25 link-black" href="{{route('org.show', $card_content['id'])}}">
				{{$card_content['name']}}
			</a>
			<div class="position-absolute bottom-15 font-18">
				<a class="link-black" href="{{route('org.edit', $card_content['id'])}}">
					<i class="ion-android-create"></i> Ubah
				</a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<a class="link-black" href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" 
						data-target="#organisation_del"
						data-id="{{$card_content['id']}}"
						data-title="Hapus Data Perusahaan {{$card_content['name']}}"
						data-effect="Menghapus perusahaan akan menghapus data kebijakan, cabang, struktur organisasi dan menghentikan tagihan plan. Lanjutkan Menghapus ?"
						data-action="{{ route('org.destroy', $card_content['id']) }}">
						<i class="ion-android-delete"></i> Hapus
					</a>
				</a>
			</div>
		</div>
	</div>
</div>	