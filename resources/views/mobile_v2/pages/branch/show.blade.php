@extends('mobile_v2.page_templates.wireframe_with_menu')

@section('content')

<!-- Branch Index -->
<div class="row padding-15">
	<div class="col-xs-12">
		<div class="row">
			<div class="col-xs-12 text-xs-left">
				@include('mobile_v2.components.single_card', ['card_content' => $page_datas->datas['branch']])
			</div>
		</div>

		<div class="row padding-15">
			<div class="col-xs-12">
				<div class="background-white">
					<div class="row padding-15">
						<div class="col-xs-12">
							<p class="font-size-18">Struktur Organisasi Cabang {{$page_datas->datas['branch']['name']}}</p>
							@include('desktop_v2.components.alert_box')
						</div>

						<div class="col-xs-12 list padding-left-0">
						@forelse($page_datas->datas['charts'] as $key => $dt)
							<?php
								function breakChilds($child)
								{	
									$width = 0;				
									foreach ($child as $key => $value) 
									{
										$width = $width + 158;
										echo("<li><div><i class='ion-ios-circle-outline font-size-18'></i>&nbsp;" . $value['name']);

										if(count($value['childs']) != 0)
										{
											echo("<ul>");
											$width = $width + breakChilds($value['childs']);
											echo("</ul>");

											$width = $width - 158;
										}
										else
										{
											echo("</div></li>");
										}
									}

									return $width;
								}

								echo("
									<ul class='first'>
										<li class='first'>
											<div>
												<i class='ion-ios-circle-outline font-size-18'></i>&nbsp;
												" 
												. $dt['name'] . 
												"
											</div>
											<ul>
									");
								$width =  breakChilds($dt['childs']);
								echo("</ul></li></ul>");
							?>
						@empty
							<p class="background-white padding-15">Tidak ada data struktur organisasi</p>
						@endforelse
						</div>
					</div>
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