<div class="row">
	<div class="col-xs-12 padding-15">
		<div class=" background-white border-black padding-15 height-120">
			<p class="text-uppercase font-25 link-black">
				{{$card_content['name']}}
			</p>
			<div class="row font-18 text-xs-center position-absolute" style="top: 100px; width: calc(88%);">
				<div class="col-xs-4 text-xs-center ">
				<a class="link-blue" href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" 
						data-target="#chart_edit"
						data-id=""
						data-name=""
						data-parent="{{$card_content['name']}}"
						data-parentid="{{$card_content['id']}}"
						data-department="{{$card_content['department']}}"
						data-title="Tambah Bawahan {{$card_content['name']}}"
						data-action="{{ route('chart.update', ['org_id' => $page_datas->datas['id'], 'branch' => $card_content['branch_id'], $card_content['id'] => 0]) }}">
						Tambah
				</a>
				</div>

				<div class="col-xs-4 text-xs-center ">
				<a class="link-blue" href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" 
						data-target="#chart_edit"
						data-id="{{$card_content['id']}}"
						data-name="{{$card_content['name']}}"
						data-parent="{{$card_content['chart']['name']}}"
						data-parentid="{{$card_content['chart_id']}}"
						data-department="{{$card_content['department']}}"
						data-title="Ubah Struktur Organisasi {{$card_content['name']}}"
						data-action="{{ route('chart.update', ['org_id' => $page_datas->datas['id'], 'branch' => $card_content['branch_id'], 'id' => $card_content['id']]) }}">
						Ubah
				</a>
				</div>

				<div class="col-xs-4 text-xs-center ">
				<a class="link-blue" href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" 
						data-target="#organisation_del"
						data-id="{{$card_content['id']}}"
						data-title="Hapus Data Struktur Organisasi {{$card_content['name']}}"
						data-effect="Masukkan password Anda untuk melanjutkan "
						data-action="{{ route('chart.destroy', ['org_id' => $page_datas->datas['id'], 'branch' => $card_content['branch_id'], 'id' => $card_content['id']]) }}">
						Hapus
				</a>
				</div>
			</div>
		</div>
	</div>
</div>	