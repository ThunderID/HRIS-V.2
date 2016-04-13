@extends('desktop_v2.page_templates.wireframe_with_menu')

@section('content')

<!-- Employee Index -->
<div class="row">
	<div class="col-md-3">
		@include('desktop_v2.components.grand_search_box', ['search_name' => 'q', 'search_placeholder' => 'Cari Karyawan', 'background_search_box' => 'background-light-blue', 'font_search_box' => 'font-dark-blue'])
		<div class="background-white slim-scroll">
			<!-- Content -->
			<div class="row">
				<div class="col-sm-12">
					<div class="row margin-right-0">
						<div class="col-sm-6">
							<p class="font-size-18 margin-bottom-0 padding-15">Karyawan</p>
						</div>
						<div class="col-sm-6 text-xs-right">
							<a href="#" class="link-blue font-size-16 link-filter-menu" role="button" aria-haspopup="true"><p class="font-size-18 margin-bottom-0 padding-top-15"><i class="ion-funnel"></i></a>
						</div>
					</div>
				</div>
				@forelse($page_datas->datas['employees'] as $key => $dt)

				<div class="col-sm-12">
					@include('desktop_v2.components.card_plain_employee', ['card_content' => $dt])
				</div>
				
				@empty
					<div class="col-md-12 col-sm-12">
						<p class="background-white padding-15">Tidak ada data karyawan</p>
					</div>
				@endforelse
			</div>
			<!-- End of Content -->			
		</div>
	</div>
	@if($page_datas->datas['employee']['id']!='')
		{!! Form::open(['url' => route('employee.update', ['org_id' => $page_datas->datas['id'], 'employee' => $page_datas->datas['employee']['id']]), 'method' => 'PATCH']) !!}
	@else
		{!! Form::open(['url' => route('employee.store', ['org_id' => $page_datas->datas['id']]), 'method' => 'POST']) !!}
	@endif
	<div class="col-md-9 margin-left-negative-10">
		<div class="row background-shade-blue text-xs-right">
			@include('desktop_v2.components.secondary_navbar', ['action_create_id' => $page_datas->datas['employee']['id'], 
			'action_redirect_route' => route('employee.index', ['org_id' => $page_datas->datas['id']])
			])
		</div>
		<div class="row">
			<div class="col-sm-12 padding-0">
				<div class="slim-scroll background-white padding-15">
					<div class="row">
						<div class="col-sm-12">
							<div class="font-size-18 padding-bottom-15 padding-top-15">
								{{(($page_datas->datas['employee']['id']!='') ? $page_datas->datas['employee']['name'] : 'Tambah Karyawan Baru')}}
							</div>
							@include('desktop_v2.components.alert_box')

							<div class="font-size-14 padding-bottom-15">
								<strong>Profil</strong>
							</div>
						</div>
						<div class="col-md-2 col-sm-4">
							<label for="file-upload-box">Foto Karyawan</label>
							@if(!isset($page_datas->datas['employee']['id']))
								<div class="file-upload-box border-gray-225">
									<p class="background-gray-238 margin-bottom-0 height-180 padding-top-85">Foto</p>
								</div>
							@else
								<div class="file-upload-box border-gray-225">
									<img src="{{$page_datas->datas['employee']['avatar']}}" style="width:100%;">
								</div>
							@endif
							<input name="avatar" value="{{$page_datas->datas['employee']['avatar']}}" class="form-control font-size-10 border-top-0" id="avatar" placeholder="masukkan url avatar">
						</div>
						<div class="col-md-5 col-sm-8">
							<fieldset class="form-group">
								<label for="employeename">Nama Karyawan</label>
								<input name="name" value="{{$page_datas->datas['employee']['name']}}" class="form-control" id="employeename" placeholder="Masukkan nama karyawan">
							</fieldset>
							<fieldset class="form-group">
								<label for="employeeplaceofbirth">Tempat Lahir</label>
								<input name="place_of_birth" value="{{$page_datas->datas['employee']['place_of_birth']}}" class="form-control" id="employeeplaceofbirth" placeholder="Masukkan tempat lahir karyawan">
							</fieldset>
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
						<div class="col-md-5 col-sm-12">
							<fieldset class="form-group">
								<label for="employeeusername">Username</label>
								<input name="username" value="{{$page_datas->datas['employee']['username']}}" class="form-control" id="employeeusername" placeholder="Masukkan username karyawan">
							</fieldset>
							<fieldset class="form-group">
								<label for="employeedateofbirth">Tanggal Lahir</label>
								<input name="date_of_birth" value="{{$page_datas->datas['employee']['date_of_birth']}}" class="form-control" id="employeedateofbirth" placeholder="Masukkan tanggal lahir karyawan">
							</fieldset>
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
					<div class="row">
						<div class="col-sm-12">
							<div class="font-size-14 padding-bottom-15 padding-top-15">
								<strong>Kontak</strong>
							</div>
						</div>
						<div class="col-sm-6">
							<fieldset class="form-group">
								<label for="employeephone">Telepon</label>
								<input name="phone" value="{{$page_datas->datas['employee']['phone']}}" class="form-control" id="employeephone" placeholder="Masukkan telepon karyawan">
							</fieldset>
							<fieldset class="form-group">
								<label for="employeemail">Email</label>
								<input name="mail" value="{{$page_datas->datas['employee']['email']}}" class="form-control" id="employeemail" placeholder="Masukkan email karyawan">
								<small class="text-muted">Email harus unik</small>
							</fieldset>
						</div>
						<div class="col-sm-6">
							<fieldset class="form-group">
								<label for="employeeaddress">Alamat</label>
								<textarea name="address" class="form-control" id="employeeaddress" placeholder="Masukkan alamat karyawan">
									{{$page_datas->datas['employee']['address']}}
								</textarea>
							</fieldset>
						</div>
					</div>
					@if($page_datas->datas['employee']['id']!='')
						<div class="clearfix">&nbsp;</div>
						@include('desktop_v2.pages.employee.carrier.index', ['scroll_class' => ''])

						<div class="clearfix">&nbsp;</div>
						@include('desktop_v2.pages.employee.document.index', ['scroll_class' => ''])

						<div class="clearfix">&nbsp;</div>
						@include('desktop_v2.pages.employee.relation.index', ['scroll_class' => ''])
						<div class="clearfix">&nbsp;</div>
						<div class="clearfix">&nbsp;</div>
					@else
						@include('desktop_v2.pages.employee.carrier.create_no_submit')
						<div class="clearfix">&nbsp;</div>
						<div class="clearfix">&nbsp;</div>
						<div class="clearfix">&nbsp;</div>
						<div class="clearfix">&nbsp;</div>
					@endif
				</div>
			</div>
		</div>
	</div>
	{!!Form::close()!!}

	@include('desktop_v2.components.modal_filter')
</div>

<!-- End of Employee Index -->
@stop

@section('js')
	<script type="text/javascript">
		hris_slimscroll.init();
		hris_slimscroll_mini.init();
		hris_filter.init();
		hris_select_chart.init([]);
		hris_modal_work_update.init();
		hris_modal_relative_update.init();
		hris_modal_document_update.init();
	</script>
@stop