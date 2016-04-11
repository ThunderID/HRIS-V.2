@extends('desktop_v2.page_templates.wireframe_with_menu')

@section('content')

<!-- Branch Index -->
<div class="row">
	<div class="col-md-3">
		@include('desktop_v2.components.grand_search_box', ['search_name' => 'q', 'search_placeholder' => 'Cari Cabang', 'background_search_box' => 'background-light-blue', 'font_search_box' => 'font-dark-blue'])
		<div class="background-white slim-scroll">
			<!-- Content -->
			<div class="row">
				@forelse($page_datas->datas['branches'] as $key => $dt)

				<div class="col-sm-12">
					<?php 
					if($dt['id']==$page_datas->datas['branch']['id'])
					{
						$is_selected = true;
					}
					else
					{
						$is_selected = false;
					}
					?>
					@include('desktop_v2.components.card_plain', ['card_content' => $dt, 'is_selected' => $is_selected])
				</div>
				
				@empty
					<div class="col-md-12 col-sm-12">
						<p class="background-white padding-15">Tidak ada data cabang</p>
					</div>
				@endforelse
			</div>
			<!-- End of Content -->			
		</div>
	</div>
	<div class="col-md-9 margin-left-negative-10">
		<div class="row background-shade-blue">
			@include('desktop_v2.components.secondary_navbar', ['action_create_button' => route('branch.create', ['org_id' => $page_datas->datas['id']]), 'action_edit_button' =>  route('branch.edit', ['org_id' => $page_datas->datas['id'], 'branch' => $page_datas->datas['branch']['id']]), 
				'action_delete_id' 	=> $page_datas->datas['branch']['id'], 'action_delete_title' => 'Hapus Data Cabang '.$page_datas->datas['branch']['name'], 'action_delete_effect' => 'Menghapus cabang akan menghapus data struktur organisasi. Masukkan password Anda untuk melanjutkan ',
				'action_delete_url' 	=> route('branch.destroy', ['org_id' => $page_datas->datas['id'], 'branch' => $page_datas->datas['branch']['id']])
			])
		</div>
		<div class="row background-white">
			<div class="col-md-12 text-xs-left slim-scroll">
				@include('desktop_v2.components.single_card', ['card_content' => $page_datas->datas['branch']])

				<div class="row text-xs-center">
					<div class="col-sm-12 text-xs-left">
						<p class="font-size-25">Struktur Organisasi Cabang {{$page_datas->datas['branch']['name']}}</p>
						
						@include('desktop_v2.components.alert_box')
					</div>
					
					@forelse($page_datas->datas['charts'] as $key => $dt)

					<div class="col-md-3 col-sm-12">
						@include('desktop_v2.components.node', ['card_content' => $dt])
					</div>
					
					@empty
						<div class="col-md-12 col-sm-12">
							<p class="background-white padding-15">Tidak ada data struktur organisasi</p>
						</div>
					@endforelse
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End of Branch Index -->

<!-- Modal Delete -->
@include('desktop_v2.components.modal_delete', [
		'modal_id'      => 'organisation_del', 
		'modal_route'   => ''
])
<!-- End of Modal Delete -->

<!-- Modal Edit -->
@include('desktop_v2.components.modal_chart_edit', [
		'modal_id'      => 'chart_edit', 
		'modal_route'   => '',
])
<!-- End of Modal Edit -->

@stop

@section('js')
	<script type="text/javascript">
		hris_slimscroll.init();
		hris_modal_delete.init();
		hris_modal_chart_edit.init();
	</script>
@stop