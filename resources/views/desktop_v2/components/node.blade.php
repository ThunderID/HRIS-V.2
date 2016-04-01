<div class="row">
	<div class="col-sm-12 padding-15">
		<div class=" background-white border-black padding-15 height-120">
			<p class="text-uppercase font-25 link-black">
				{{$card_content['name']}}
			</p>
			<div class="position-absolute bottom-30 font-18 text-xs-center">
				<a class="link-blue" href="{{ route('chart.create', ['org_id' => $page_datas->datas['id'], 'branch' => $card_content['branch_id'], $card_content['id'], $card_content['id']]) }}">
					Tambah
				</a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<a class="link-blue" href="{{ route('chart.edit', ['org_id' => $page_datas->datas['id'], 'branch' => $card_content['branch_id'], $card_content['id'], $card_content['id']]) }}">
					Ubah
				</a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<a class="link-blue" href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" 
						data-target="#organisation_del"
						data-id="{{$card_content['id']}}"
						data-title="Hapus Data Struktur Organisasi {{$card_content['name']}}"
						data-effect="Lanjutkan Menghapus ?"
						data-action="{{ route('chart.destroy', ['org_id' => $page_datas->datas['id'], 'branch' => $card_content['branch_id'], $card_content['id'], $card_content['id']]) }}">
						Hapus
					</a>
				</a>
			</div>
		</div>
	</div>
</div>	