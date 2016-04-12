<div class="container-second-nav padding-15">
	@if(isset($action_create_button))
		<a class="link-blue font-14" href="{{$action_create_button}}"><i class="ion-android-add"></i> Tambah</a>
	@else
		@if($action_create_id!='')
			{!! Form::open(['url' => $action_update_route, 'method' => 'PATCH']) !!}
		@else
			{!! Form::open(['url' => $action_store_route, 'method' => 'POST']) !!}
		@endif
		<a href="{{$action_redirect_route}}" class="link-blue padding-left-15 padding-right-15 padding-bottom-5"><i class="ion-android-close"></i>&nbsp;Batal</a>
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
				data-id="{{$action_delete_id}}"
				data-title="{{$action_delete_title}}"
				data-effect="{{$action_delete_effect}}"
				data-action="{{$action_delete_url}}">
				<i class="ion-android-delete"></i> Hapus
			</a>
		</a>
	@endif
</div>
