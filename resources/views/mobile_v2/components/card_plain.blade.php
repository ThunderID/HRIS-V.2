<div class="row padding-15">
	<div class="col-xs-12">
		<div class=" background-white padding-15 height-120">
			<div class="row">
				<div class="col-xs-12">
					<a class="text-uppercase font-25 link-black" href="{{route('branch.show', ['org_id' => $card_content['organisation_id'], 'branch' => $card_content['id']])}}">
						Cabang {{$card_content['name']}}
					</a>
					<div class="font-size-14">
						<div>{{(isset($card_content['phone']) ? $card_content['phone'] : '')}}</div>
						<div>{{(isset($card_content['address']) ? $card_content['address'] : '')}}</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 text-xs-right">
					<div class="padding-bottom-5 font-18">
						<a class="link-black" href="{{route('branch.edit', ['org_id' => $card_content['organisation_id'], 'branch' => $card_content['id']])}}">
							<i class="ion-android-create"></i> Ubah
						</a>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<a class="link-black" href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" 
								data-target="#organisation_del"
								data-id="{{$card_content['id']}}"
								data-title="Hapus Data Cabang {{$card_content['name']}}"
								data-effect="Menghapus data akan menghapus struktur organisasi. Lanjutkan Menghapus ?"
								data-action="{{ route('branch.destroy', ['org_id' => $card_content['organisation_id'], 'branch' => $card_content['id']]) }}">
								<i class="ion-android-delete"></i> Hapus
							</a>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
