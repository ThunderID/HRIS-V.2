@extends('desktop_v2.page_templates.wireframe_without_menu')

@section('content')

<div class="row padding-15 left-15">
	<div class="col-sm-12">

		<!-- Title -->
		<div class="row">
			<div class="col-sm-12">
				<h3 class="padding-top-13">{{$page_attributes->page_subtitle}} {{$page_attributes->page_title}} </h3>
			</div>
		</div>

		<div class="clearfix">&nbsp;</div>

		<!-- End of Title -->
		
		<!-- Content -->
		<div class="row background-white padding-15 margin-left-0 margin-right-0">
			<div class="col-md-10 col-sm-8 padding-15">
				@section('action_area')
					@if(isset($page_datas->datas['id']))
						{!! Form::open(['url' => route('org.update', $page_datas->datas['id']), 'method' => 'PATCH']) !!}
					@else
						{!! Form::open(['url' => route('org.store'), 'method' => 'POST']) !!}
					@endif
						<a href="{{route('org.index')}}" class="link-white background-red padding-left-30 padding-right-30 padding-top-5 padding-bottom-5">Batal</a>
						<button type="submit" class="button-blue">Simpan</button>
				@stop
				 <fieldset class="form-group">
					<label for="orgname">Nama Perusahaan</label>
					<input name="name" value="{{$page_datas->datas['name']}}" class="form-control" id="orgname" placeholder="Masukkan nama perusahaan">
					<small class="text-muted">Sebaiknya nama perusahaan diikuti bentuk. Contoh : ThunderLabs, PT</small>
				</fieldset>
				<fieldset class="form-group">
					<label for="orgcode">Singkatan Nama Perusahaan</label>
					<input name="code" value="{{$page_datas->datas['code']}}" class="form-control" id="orgcode" placeholder="Masukkan nama perusahaan">
					<small class="text-muted">Singkatan/Kode harus unik</small>
				</fieldset>
			</div>
			<div class="col-md-2 col-sm-4 padding-15">
				<label for="file-upload-box">Logo Perusahaan</label>
				@if(!isset($page_datas->datas['id']))
					<div class="file-upload-box border-gray-225">
						<p class="background-gray-238 margin-bottom-0 height-180 padding-top-85">Logo</p>
					</div>
				@else
					<div class="file-upload-box border-gray-225">
						<img src="{{$page_datas->datas['logo']}}" style="width:100%;">
					</div>
				@endif
				<input name="logo" value="{{$page_datas->datas['logo']}}" class="form-control font-size-10 border-top-0" id="logo" placeholder="p.s. ukuran maksimal gambar 1mb">
				{!!Form::close()!!}
			</div>
		</div>
		<!-- End of Content -->
	</div>
</div>
@stop

@section('js')

@stop