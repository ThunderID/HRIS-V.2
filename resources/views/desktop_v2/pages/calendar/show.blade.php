@extends('desktop_v2.page_templates.wireframe_with_menu')

@section('content')

<!-- calendar Index -->
<div class="row">
	<div class="col-md-3">
		@include('desktop_v2.components.grand_search_box', ['search_name' => 'q', 'search_placeholder' => 'Cari Kalender', 'background_search_box' => 'background-light-blue', 'font_search_box' => 'font-dark-blue'])
		<div class="background-white">

			<div class="workspace mCustomScrollbar light _mCS_2 mCS-autoHide workspace-desktop" data-mcs-theme="minimal-dark" style="overflow: visible;">
				<div class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" style="max-height: none;" tabindex="0">
					<div class="mCSB_container" style="position: relative; left: 0px;" dir="ltr">
				
						<!-- Content -->
						<div class="row slim-scroll">
							@forelse($page_datas->datas['calendars'] as $key => $dt)

							<div class="col-sm-12">
								<?php 
								if($dt['id']==$page_datas->datas['calendar']['id'])
								{
									$is_selected = true;
								}
								else
								{
									$is_selected = false;
								}
								?>
								@include('desktop_v2.components.card_plain_calendar', ['card_content' => $dt, 'is_selected' => $is_selected])
							</div>
							
							@empty
								<div class="col-md-12 col-sm-12">
									<p class="background-white padding-15">Tidak ada data kalender</p>
								</div>
							@endforelse
						</div>
						<!-- End of Content -->

					</div>	
				</div>	
			</div>

		</div>
	</div>
	<div class="col-md-9 margin-left-negative-10">
		<div class="row background-shade-blue margin-left-negative-20">
			@include('desktop_v2.components.secondary_navbar', ['action_create_button' => route('calendar.create', ['org_id' => $page_datas->datas['id']]), 'action_edit_button' =>  route('calendar.edit', ['org_id' => $page_datas->datas['id'], 'calendar' => $page_datas->datas['calendar']['id']]), 
				'action_delete_id' 	=> $page_datas->datas['calendar']['id'], 'action_delete_title' => 'Hapus Data Kalender '.$page_datas->datas['calendar']['name'], 'action_delete_effect' => 'Menghapus kalender akan menghapus semua jadwal pada kalender tersebut. Masukkan password Anda untuk melanjutkan ',
				'action_delete_url' 	=> route('calendar.destroy', ['org_id' => $page_datas->datas['id'], 'calendar' => $page_datas->datas['calendar']['id']])
			])
		</div>
		<div class="row background-white margin-right-negative-10">

			<div class="workspace mCustomScrollbar light _mCS_2 mCS-autoHide workspace-desktop" data-mcs-theme="minimal-dark" style="overflow: visible;">
				<div class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" style="max-height: none;" tabindex="0">
					<div class="mCSB_container" style="position: relative; left: 0px;" dir="ltr">
				
						<!-- Content -->
						<div class="row background-white slim-scroll">
							<div class="col-md-12 text-xs-left slim-scroll">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End of calendar Index -->

<!-- Modal Delete -->
@include('desktop_v2.components.modal_delete', [
		'modal_id'      => 'organisation_del', 
		'modal_route'   => ''
])
<!-- End of Modal Delete -->

@stop

@section('js')
	<script type="text/javascript">
		hris_set_workspace.desktopInit();
		hris_modal_delete.init();
	</script>
@stop