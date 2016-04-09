<div class="container-second-nav padding-15">
	@if(isset($action_create_button))
		<a class="link-blue font-14" href="{{$action_create_button}}"><i class="ion-android-add"></i> Tambah</a>
	@else
		@if($page_datas->datas['branch']['id']!='')
			{!! Form::open(['url' => route('branch.update', ['org_id' => $page_datas->datas['id'], 'branch' => $page_datas->datas['branch']['id']]), 'method' => 'PATCH']) !!}
		@else
			{!! Form::open(['url' => route('branch.store', ['org_id' => $page_datas->datas['id']]), 'method' => 'POST']) !!}
		@endif
		<a href="{{route('branch.index', ['org_id' => $page_datas->datas['id']])}}" class="link-blue padding-left-15 padding-right-15 padding-bottom-5"><i class="ion-android-close"></i>&nbsp;Batal</a>
		<button type="submit" class="button-shade-blue"><i class="ion-android-folder"></i>&nbsp;Simpan</button>
	@endif
	@if(isset($action_edit_button))
		&nbsp;
		&nbsp;
		<a class="link-blue font-14" href="{{$action_edit_button}}"><i class="ion-android-create"></i> Ubah</a>
		
		&nbsp;
		&nbsp;
		<a class="link-blue font-14" href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" 
				data-target="#organisation_del"
				data-id="{{$page_datas->datas['branch']['id']}}"
				data-title="Hapus Data Cabang {{$page_datas->datas['branch']['name']}}"
				data-effect="Menghapus cabang akan menghapus data struktur organisasi. Masukkan password Anda untuk melanjutkan "
				data-action="{{ route('branch.destroy', ['org_id' => $page_datas->datas['id'], 'branch' => $page_datas->datas['branch']['id']]) }}">
				<i class="ion-android-delete"></i> Hapus
			</a>
		</a>
	@endif
</div>
