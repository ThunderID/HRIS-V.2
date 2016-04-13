@extends('mobile_v2.page_templates.wireframe_with_menu')

@section('content')

<!-- employee Index -->
<div class="row padding-15">
	<div class="col-xs-12">
		@section('action_area')
			<?php $action_area = true;?>
			@if(isset($page_datas->datas['employee']['id']))
				{!! Form::open(['url' => route('employee.update', ['org_id' => $page_datas->datas['id'], 'employee' => $page_datas->datas['employee']['id']]), 'method' => 'PATCH']) !!}
			@else
				{!! Form::open(['url' => route('employee.store', ['org_id' => $page_datas->datas['id']]), 'method' => 'POST']) !!}
			@endif
			<div class="row">
				<div class="col-xs-6 padding-top-5">
					<a href="{{route('org.index')}}" class="link-mobile-create link-mobile-prev-profile link-blue background-white padding-right-15 padding-top-5 padding-bottom-5"><i class="ion-android-arrow-back"></i> {{$page_attributes->page_subtitle}} </a>
					<a href="#" class="link-mobile-create  link-mobile-prev-contact link-blue background-white padding-right-15 padding-bottom-5">  <i class="ion-android-arrow-back"></i> Kembali </a>
					@if($page_datas->datas['employee']['id']=='')
						<a href="#" class="link-mobile-create link-mobile-prev-carrier-new link-blue background-white padding-right-15 padding-bottom-5">  <i class="ion-android-arrow-back"></i> Kembali </a>
					@else
						<a href="#" class="link-mobile-create link-mobile-prev-carrier link-blue background-white padding-right-15 padding-bottom-5">  <i class="ion-android-arrow-back"></i> Kembali </a>
						<a href="#" class="link-mobile-create link-mobile-prev-document link-blue background-white padding-right-15 padding-bottom-5">  <i class="ion-android-arrow-back"></i> Kembali </a>
						<a href="#" class="link-mobile-create link-mobile-prev-relation link-blue background-white padding-right-15 padding-bottom-5">  <i class="ion-android-arrow-back"></i> Kembali </a>
					@endif
				</div>
				<div class="col-xs-6 text-xs-right padding-top-5">
					<a href="#" class="link-mobile-create link-mobile-next-profile link-blue background-white padding-right-15 padding-bottom-5"> Lanjutkan <i class="ion-android-arrow-forward"></i></a>
					<a href="#" class="link-mobile-create link-mobile-next-contact link-blue background-white padding-right-15 padding-bottom-5"> Lanjutkan <i class="ion-android-arrow-forward"></i></a>
					@if($page_datas->datas['employee']['id']=='')
						<button type="submit" class="link-mobile-create link-mobile-next-carrier-new button-white font-blue text-xs-right border-0"><i class="ion-android-done"></i></button>
					@else
						<a href="#" class="link-mobile-create link-mobile-next-carrier link-blue background-white padding-right-15 padding-bottom-5"> Lanjutkan <i class="ion-android-arrow-forward"></i></a>
						<a href="#" class="link-mobile-create link-mobile-next-document link-blue background-white padding-right-15 padding-bottom-5"> Lanjutkan <i class="ion-android-arrow-forward"></i></a>
						<button type="submit" class="link-mobile-create link-mobile-next-relation button-white font-blue text-xs-right border-0"><i class="ion-android-done"></i></button>
					@endif
				</div>
			</div>
		@stop

		@include('desktop_v2.components.alert_box')

		<div class="hris_form_wizard modal_employee_profile">
			<div class="row">
				<div class="col-xs-12">
					<strong>Profil</strong>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<div class="clearfix">&nbsp;</div>
					<fieldset class="form-group">
						<label for="avatarkaryawan">Foto Karyawan</label>
						<input name="avatar" value="{{$page_datas->datas['employee']['avatar']}}" class="form-control font-size-10" id="avatar" placeholder="masukkan url Foto">
					</fieldset>
				</div>
				<div class="col-xs-6 padding-15">
					@if(!isset($page_datas->datas['id']))
						<div class="file-upload-box border-gray-225">
							<p class="background-gray-238 margin-bottom-0 height-180 padding-top-85">Foto</p>
						</div>
					@else
						<div class="file-upload-box border-gray-225">
							<img src="{{$page_datas->datas['employee']['avatar']}}" style="width:100%;">
						</div>
					@endif
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<fieldset class="form-group">
						<label for="employeename">Nama Karyawan</label>
						<input name="name" value="{{$page_datas->datas['employee']['name']}}" class="form-control" id="employeename" placeholder="Masukkan nama perusahaan">
					</fieldset>
				</div>
				<div class="col-xs-12">
					<fieldset class="form-group">
						<label for="employeeplaceofbirth">Tempat Lahir</label>
						<input name="place_of_birth" value="{{$page_datas->datas['employee']['place_of_birth']}}" class="form-control" id="employeeplaceofbirth" placeholder="Masukkan tempat lahir karyawan">
					</fieldset>
				</div>
				<div class="col-xs-12">
					<fieldset class="form-group">
						<label for="employegender">Jenis Kelamin</label>
						<select name="gender" class="form-control" id="employegender">
							<option @if($page_datas->datas['employee']['gender'] == 'male') class="selected" @endif value="male">
								Pria
							</option>
							<option @if($page_datas->datas['employee']['gender'] == 'female') class="selected" @endif value="female">
								Wanita
							</option>
						</select>
					</fieldset>
				</div>
				<div class="col-xs-12">
					<fieldset class="form-group">
						<label for="employeeusername">Username</label>
						<input name="username" value="{{$page_datas->datas['employee']['username']}}" class="form-control" id="employeeusername" placeholder="Masukkan username karyawan">
					</fieldset>
				</div>
				<div class="col-xs-12">
					<fieldset class="form-group">
						<label for="employeedateofbirth">Tanggal Lahir</label>
						<input name="date_of_birth" value="{{$page_datas->datas['employee']['date_of_birth']}}" class="form-control" id="employeedateofbirth" placeholder="Masukkan tanggal lahir karyawan">
					</fieldset>
				</div>
				<div class="col-xs-12">
					<fieldset class="form-group">
						<label for="employeemaritalstatus">Status Pernikahan</label>
						<select name="current_marital_status" class="form-control" id="employegender">
							@foreach($page_datas->datas['maritalstatuses'] as $key => $value)
								<option @if($page_datas->datas['employee']['current_marital_status'] == $value['status']) class="selected" @endif>
									{{$value['status']}}
								</option>
							@endforeach
						</select>
					</fieldset>
				</div>
			</div>

			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>
		</div>
		<div class="hris_form_wizard modal_employee_contact">
			<div class="row">
				<div class="col-xs-12">
					<strong>Kontak</strong>
				</div>
			</div>
			<div class="clearfix">&nbsp;</div>
			<div class="row">
				<div class="col-xs-12">
					<fieldset class="form-group">
						<label for="employeephone">Telepon</label>
						<input name="phone" value="{{$page_datas->datas['employee']['phone']}}" class="form-control" id="employeephone" placeholder="Masukkan telepon karyawan">
					</fieldset>
				</div>
				<div class="col-xs-12">
					<fieldset class="form-group">
						<label for="employeemail">Email</label>
						<input name="mail" value="{{$page_datas->datas['employee']['email']}}" class="form-control" id="employeemail" placeholder="Masukkan email karyawan">
						<small class="text-muted">Email harus unik</small>
					</fieldset>
				</div>
				<div class="col-xs-12">
					<fieldset class="form-group">
						<label for="employeeaddress">Alamat</label>
						<textarea name="address" class="form-control" id="employeeaddress" placeholder="Masukkan alamat karyawan">
							{{$page_datas->datas['employee']['address']}}
						</textarea>
					</fieldset>
				</div>
			</div>
		</div>

		@if($page_datas->datas['employee']['id']!='')
			{!!Form::close()!!}
			
			<div class="hris_form_wizard modal_employee_carrier">
				@include('mobile_v2.pages.employee.carrier.index', ['scroll_class' => ''])
			</div>
			<div class="hris_form_wizard modal_employee_document">
				@include('mobile_v2.pages.employee.document.index', ['scroll_class' => ''])
			</div>

			<div class="hris_form_wizard modal_employee_relation">
				@include('mobile_v2.pages.employee.relation.index', ['scroll_class' => ''])
			</div>
			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>
		@else
			<div class="hris_form_wizard modal_employee_carrier_new">
				@include('desktop_v2.pages.employee.carrier.create_no_submit')
			</div>
			<div class="clearfix">&nbsp;</div>
			<div class="clearfix">&nbsp;</div>
			{!!Form::close()!!}
		@endif
	</div>
</div>

<!-- End of employee Index -->
@stop

@section('js')
	<script type="text/javascript">
		hris_slimscroll.init();
		hris_slimscroll_tab.init();
		hris_modal_delete.init();
		hris_select_chart.init([]);
		hris_modal_work_update.init();
		hris_modal_relative_update.init();
		hris_modal_document_update.init();

		@if($page_datas->datas['employee']['id']=='')
			hris_wizard_new_employee.init();
		@else
			hris_wizard_exists_employee.init();
		@endif
	</script>
@stop