@extends('mobile_v2.page_templates.wireframe_with_menu')

@section('content')

<!-- Branch Index -->
<div class="row padding-15">
	<div class="col-xs-12">
		@section('action_area')
			<?php $action_area = true;?>
			@if(isset($page_datas->datas['branch']['id']))
				{!! Form::open(['url' => route('branch.update', ['org_id' => $page_datas->datas['id'], 'branch' => $page_datas->datas['branch']['id']]), 'method' => 'PATCH']) !!}
			@else
				{!! Form::open(['url' => route('branch.store', ['org_id' => $page_datas->datas['id']]), 'method' => 'POST']) !!}
			@endif
			<div class="row">
				<div class="col-xs-10 padding-top-5">
					<a href="{{route('org.index')}}" class="link-blue background-white padding-right-15 padding-top-5 padding-bottom-5"><i class="ion-android-arrow-back"></i></a> {{$page_attributes->page_subtitle}}
				</div>
				<div class="col-xs-2 text-xs-right">
					<button type="submit" class="button-white font-blue text-xs-right border-0"><i class="ion-android-done"></i></button>
				</div>
			</div>
		@stop
		
		@include('desktop_v2.components.alert_box')
		 <fieldset class="form-group">
			<label for="branchname">Nama Cabang</label>
			<input name="name" value="{{$page_datas->datas['branch']['name']}}" class="form-control" id="branchname" placeholder="Masukkan nama perusahaan">
		</fieldset>
		<fieldset class="form-group">
			<label for="branchphone">Telepon</label>
			<input name="phone" value="{{$page_datas->datas['branch']['phone']}}" class="form-control" id="branchphone" placeholder="Masukkan telepon perusahaan">
		</fieldset>
		<fieldset class="form-group">
			<label for="branchmail">Email</label>
			<input name="mail" value="{{$page_datas->datas['branch']['phone']}}" class="form-control" id="branchmail" placeholder="Masukkan email perusahaan">
			<small class="text-muted">Email harus unik</small>
		</fieldset>
		<fieldset class="form-group">
			<label for="branchaddress">Alamat</label>
			<textarea name="address" class="form-control" id="branchaddress" placeholder="Masukkan alamat kantor cabang">
				{{$page_datas->datas['branch']['address']}}
			</textarea>
		</fieldset>
		{!!Form::close()!!}
	</div>
</div>

<!-- End of Branch Index -->
@stop

@section('js')
	<script type="text/javascript">
		hris_slimscroll.init();
	</script>
@stop