@extends('mobile_v2.page_templates.wireframe_without_menu')

@section('content')

<div class="row padding-15 left-15">
	<div class="col-sm-12">

		<!-- Content -->
		@section('action_area')
			<?php $action_area = true;?>
			@if(isset($page_datas->datas['id']))
				{!! Form::open(['url' => route('org.update', $page_datas->datas['id']), 'method' => 'PATCH']) !!}
			@else
				{!! Form::open(['url' => route('org.store'), 'method' => 'POST']) !!}
			@endif
			<div class="row">
				<div class="col-xs-10 padding-top-5">
					<a href="{{route('org.index')}}" class="link-blue background-white padding-right-15 padding-top-5 padding-bottom-5"><i class="ion-android-arrow-back"></i></a> {{$page_attributes->page_subtitle}}
				</div>
				<div class="col-xs-2 text-xs-right">
					<button type="submit" class="button-white font-blue text-xs-right"><i class="ion-android-done"></i></button>
				</div>
			</div>
		@stop
		<div class="row">
			<div class="col-xs-6">
				<div class="clearfix">&nbsp;</div>
				<fieldset class="form-group">
					<label for="orglogo">Logo Perusahaan</label>
					<input name="logo" value="{{$page_datas->datas['logo']}}" class="form-control font-size-10" id="logo" placeholder="masukkan url logo">
				</fieldset>
			</div>
			<div class="col-xs-6 padding-15">
				@if(!isset($page_datas->datas['id']))
					<div class="file-upload-box border-gray-225">
						<p class="background-gray-238 margin-bottom-0 height-180 padding-top-85">Logo</p>
					</div>
				@else
					<div class="file-upload-box border-gray-225">
						<img src="{{$page_datas->datas['logo']}}" style="width:100%;">
					</div>
				@endif
			</div>
			<div class="col-xs-12">
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
		</div>
		{!!Form::close()!!}
		<!-- End of Content -->
	</div>
</div>
@stop

@section('js')

@stop