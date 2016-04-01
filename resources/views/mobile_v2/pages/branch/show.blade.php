@extends('mobile_v2.page_templates.wireframe_with_menu')

@section('content')

<!-- Branch Index -->
<div class="row padding-15">
	<div class="col-xs-12">
		<div class="row">
			<div class="col-xs-12 text-xs-left">
				@include('mobile_v2.components.single_card', ['card_content' => $page_datas->datas['branch']])

				<div class="row text-xs-center">
					<div class="col-xs-12 text-xs-left">
						<p class="font-size-18">Struktur Organisasi Cabang {{$page_datas->datas['branch']['name']}}</p>
						@include('desktop_v2.components.alert_box')
					</div>
					
					@forelse($page_datas->datas['charts'] as $key => $dt)

					<div class="col-xs-12">
						@include('mobile_v2.components.node', ['card_content' => $dt])
					</div>
					
					@empty
						<div class="col-xs-12">
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