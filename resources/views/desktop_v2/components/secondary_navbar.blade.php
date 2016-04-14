<div class="container-second-nav padding-15">
	@if(isset($action_create_button))
		@if(isset($special_case_import) && $special_case_import)
			<span class="dropdown">
				<a class="link-blue font-14 nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="ion-android-add"></i> Tambah</a>
				<div class="dropdown-menu background-white create-menu">
					<a class="padding-top-15 link-blue font-14 dropdown-item" href="{{$action_create_button}}">Form Karyawan</a>
					<a class="padding-top-15 link-blue font-14 dropdown-item" href="#">Unggah Dokumen Karyawan</a>
					<a class="padding-top-15 padding-bottom-15 link-blue font-14 dropdown-item" href="#">Unduh Template Dokumen</a>
				</div>
			</span>
		@else
			<a class="link-blue font-14" href="{{$action_create_button}}"><i class="ion-android-add"></i> Tambah</a>
		@endif
	@else
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
