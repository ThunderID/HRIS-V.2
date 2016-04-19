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
		<div class="row background-shade-blue margin-left-negative-20">
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
				</div>
				
				<?php
					function breakChilds($child)
					{	
						$width = 0;				
						foreach ($child as $key => $value) 
						{
							$width 				= $width + 158;
							echo("
								<li>
									<div style='padding=0px;'>
										<p style='margin-bottom:5px!important;font-size:14px;'>" 
											. $value['name'] . 
										"</p>
										<a class='link-dark-blue' href='javascript:void(0);' data-backdrop='static' 
											data-keyboard	='false' 
											data-toggle		='modal' 
											data-target		='#chart_edit'
											data-id 		= '". $key ."'
											data-title		= 'Tambah Chart'
											data-parent 	= '". $value['name'] ."'
											data-parentid	= '". $key ."'
											data-name		= ''
											data-department = '". $value['department'] ."'
											data-action		= '". route('chart.update', ['org_id' => $value['org_id'], 'branch_id' => $value['branch_id'], 'id' => 0]) . "'
										>									
											Tambah
										</a>
										&nbsp;
										<a class='link-dark-blue' href='javascript:void(0);' data-backdrop='static' 
											data-keyboard	='false' 
											data-toggle		='modal' 
											data-target		='#chart_edit'
											data-id 		= '". $key ."'
											data-title		= 'Edit " . $value['name'] . "'
											data-parent 	= '". $value['parent'] ."'
											data-parentid	= '". $value['id_parent'] ."'
											data-name		= '". $value['name'] . "'
											data-department = '". $value['department'] ."'
											data-action		= '". route('chart.update', ['org_id' => $value['org_id'], 'branch_id' => $value['branch_id'], 'id' => $key]) . "'
										>
											Edit
										</a>
										&nbsp;
										<a class='link-dark-blue' href='javascript:void(0);' data-backdrop='static' 
											data-keyboard	='false' 
											data-toggle		='modal' 
											data-target		='#organisation_del'
											data-id 		= '". $key ."'
											data-title		= 'Hapus " . $value['name'] . "'
											data-effect		= 'Masukkan password untuk menghapus data!'
											data-action		= '". route('chart.destroy', ['org_id' => $value['org_id'], 'branch_id' => $value['branch_id'], 'id' => $key]) . "'
										>										
											Hapus
										</a>									
									</div>
								");

							if(count($value['childs']) != 0)
							{
								echo("<ul>");
								$width = $width + breakChilds($value['childs']);
								echo("</ul>");

								$width = $width - 158;
							}
							else
							{
								echo("</li>");
							}
						}

						return $width;
					}
				?>

				<div class="row text-xs-center">
					<div class="col-md-12">
						<div id="frame-scroller" style="border-bottom: black 0.2px solid; border-left: black 0.2px solid; overflow-x: auto; overflow-y: auto; margin-bottom: 10px; height: 400px; border-top: black 0.2px solid; border-right: black 0.2px solid" class="tree">
							<div id="frame-chart">
								<?php
									$dt = $page_datas->datas['charts'];
									echo("
										<ul>
											<li>
												<div style='padding=0px;'>
													<p style='margin-bottom:5px!important;font-size:14px;'>" 
														. $dt['name'] . 
													"</p>
													<a class='link-dark-blue' href='javascript:void(0);' data-backdrop='static' 
														data-keyboard	='false' 
														data-toggle		='modal' 
														data-target		='#chart_edit'
														data-id 		= '0'
														data-title		= 'Tambah Chart'
														data-parent 	= ''
														data-parentid	= '0'
														data-name		= ''
														data-department = ''
														data-action		= '". route('chart.update', ['org_id' => $dt['org_id'], 'branch_id' => $dt['branch_id'], 'id' => 0]) . "'
													>														
														Tambah
													</a>
												</div>
											<ul>
										");
									$width =  breakChilds($dt['childs']);
									echo("</ul></li></ul>");
								?>
							</div>
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
		function setChartWidth(new_width) {
		    $("#frame-chart").width(new_width);
		}

		function centerViewPort(_width) {
			var f_width = $("#frame-scroller").width();
			$("#frame-scroller").scrollLeft((_width/2)-(f_width/2));
		}

		$( document ).ready(function() {
		    setChartWidth({{$width}});
		    centerViewPort({{$width}});
		});


		// hris_slimscroll.init(); 
		hris_modal_delete.init();
		hris_modal_chart_edit.init();
	</script>
@stop