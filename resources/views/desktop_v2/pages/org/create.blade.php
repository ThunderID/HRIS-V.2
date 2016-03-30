@extends('desktop_v2.page_templates.wireframe_without_menu')

@section('content')

<div class="row padding-15" style="left:15px;">
	<div class="col-sm-12">
		<!-- Title -->
		<div class="row">
			<div class="col-sm-12">
				<h3 class="padding-top-13">{{$page_attributes->page_subtitle}}</h3>
			</div>
		</div>

		<div class="clearfix">&nbsp;</div>

		<!-- End of Title -->
		
		<!-- Content -->
		<div class="row background-white padding-15 margin-left-0 margin-right-0">
			<div class="col-md-10 col-sm-8 padding-15">
				<form>
					@section('action_area')
						<a href="" class="link-white background-red padding-left-30 padding-right-30 padding-top-5 padding-bottom-5">Batal</a>
						<button class="button-blue">Simpan</button>
					@stop
					 <fieldset class="form-group">
						<label for="orgname">Nama Perusahaan</label>
						<input type="name" class="form-control" id="orgname" placeholder="Masukkan nama perusahaan">
						<small class="text-muted">Sebaiknya nama perusahaan diikuti bentuk. Contoh : ThunderLabs, PT</small>
					</fieldset>
					<fieldset class="form-group">
						<label for="orgconde">Singkatan Nama Perusahaan</label>
						<input type="code" class="form-control" id="orgconde" placeholder="Masukkan nama perusahaan">
						<small class="text-muted">Singkatan/Kode harus unik</small>
					</fieldset>
				</form>
			</div>
			<div class="col-md-2 col-sm-4 padding-15">
				<label for="file-upload-box">Logo Perusahaan</label>
				<div class="file-upload-box border-gray-225">
					<p class="background-gray-238 margin-bottom-0 height-180 padding-top-85">Logo</p>
					<input type="file" class="uploadbox background-gray-238" />
				</div>
				<small class="text-muted">p.s. ukuran maksimal gambar 1mb</small>
			</div>
		</div>
		<!-- End of Content -->
	</div>
</div>
@stop

@section('js')

@stop