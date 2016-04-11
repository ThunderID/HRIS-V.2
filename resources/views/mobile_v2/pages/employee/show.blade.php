@extends('mobile_v2.page_templates.wireframe_with_menu')

@section('content')

<!-- employee Index -->
<div class="row padding-15">
	<div class="col-xs-12">
		<div class="background-white">
			@section('action_area')
				<?php $action_area = true;?>
				<div class="row">
					<div class="col-xs-8 padding-top-5">
						<a href="{{route('employee.index', ['org_id' => $page_datas->datas['id']])}}" class="link-blue background-white padding-right-15 padding-top-5 padding-bottom-5"><i class="ion-android-arrow-back"></i></a> {{$page_attributes->page_subtitle}}
					</div>
					<div class="col-xs-4 text-xs-right">
						<a class="link-black" href="{{route('employee.edit', ['org_id' => $page_datas->datas['id'], 'employee' => $page_datas->datas['employee']['id']])}}">
							<i class="ion-android-create"></i> 
						</a>
						&nbsp;&nbsp;
						<a class="link-black" href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" 
							data-target="#organisation_del"
							data-id="{{$page_datas->datas['employee']['id']}}"
							data-title="Hapus Data Cabang {{$page_datas->datas['employee']['name']}}"
							data-effect="Menghapus data akan menghapus semua dokumen dan riwayat kerja. Masukkan password Anda untuk melanjutkan "
							data-action="{{ route('employee.destroy', ['org_id' => $page_datas->datas['id'], 'employee' => $page_datas->datas['employee']['id']]) }}">
							<i class="ion-android-delete"></i> 
						</a>
					</div>
				</div>
			@stop

			<div class="row padding-15">
				<div class="col-xs-8">
					<div class="row">
						<div class="col-xs-12">
							<h5 class="font-dark-blue">{{$page_datas->datas['employee']['name']}}</h5>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							Karyawan {{$page_datas->datas['employee']['newest_status']}} @if(is_null($page_datas->datas['employee']['activation_link']) || $page_datas->datas['employee']['activation_link'] == '') - <span class="font-green font-bold">Aktif</span> @endif
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							{{$page_datas->datas['employee']['newest_position']}}
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							NIK :
							{{$page_datas->datas['employee']['newest_nik']}}
						</div>
					</div>
					<div class="clearfix">&nbsp;</div>
					<div class="row">
						<div class="col-xs-12">
							<i class="ion-email"></i>&nbsp;
							{{$page_datas->datas['employee']['email']}}
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<i class="ion-android-phone-portrait"></i>&nbsp;
							{{$page_datas->datas['employee']['phone']}}
						</div>
					</div>
				</div>
				<div class="col-xs-4">
					<img src="{{$page_datas->datas['employee']['avatar']}}" class="img-circle max-width-75">
				</div>
			</div>

			<div class="row padding-15">
				<div class="col-sm-12 font-size-10"> 
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a class="nav-link active" href="#profile" data-toggle="tab">Profil</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#carrier" data-toggle="tab">Karir</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#document" data-toggle="tab">Dokumen</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#contract" data-toggle="tab">Kontrak Kerja</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#relation" data-toggle="tab">Relasi</a>
						</li>
					</ul>

					<div class="tab-content">
						<div id="profile" class="tab-pane fade in active">
							@include('mobile_v2.pages.employee.profile.index')
						</div>
						<div id="carrier" class="tab-pane fade">
							@include('desktop_v2.pages.employee.carrier.index')
						</div>
						<div id="document" class="tab-pane fade">
							@include('desktop_v2.pages.employee.document.index')
						</div>
						<div id="contract" class="tab-pane fade">
							@include('desktop_v2.pages.employee.contract.index')
						</div>
						<div id="relation" class="tab-pane fade">
							@include('desktop_v2.pages.employee.relation.index')
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- End of employee Index -->

<!-- Modal Delete -->
@include('desktop_v2.components.modal_delete', [
		'modal_id'      => 'organisation_del', 
		'modal_route'   => ''
])
<!-- End of Modal Delete -->
@stop

@section('js')
	<script type="text/javascript">
		hris_slimscroll.init();
		hris_modal_delete.init();
		hris_modal_chart_edit.init();
	</script>
@stop