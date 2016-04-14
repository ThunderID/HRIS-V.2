@extends('desktop_v2.page_templates.wireframe_with_menu')

@section('content')

<!-- Branch Index -->
<style>
/** {margin: 0; padding: 0;}*/

.tree ul {
	padding-top: 20px; position: relative;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

.tree li {
	float: left; text-align: center;
	list-style-type: none;
	position: relative;
	padding: 20px 5px 0 5px;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/

.tree li::before, .tree li::after{
	content: '';
	position: absolute; top: 0; right: 50%;
	border-top: 1px solid #ccc;
	width: 50%; height: 20px;
}
.tree li::after{
	right: auto; left: 50%;
	border-left: 1px solid #ccc;
}

/*We need to remove left-right connectors from elements without 
any siblings*/
.tree li:only-child::after, .tree li:only-child::before {
	display: none;
}

/*Remove space from the top of single children*/
.tree li:only-child{ padding-top: 0;}

/*Remove left connector from first child and 
right connector from last child*/
.tree li:first-child::before, .tree li:last-child::after{
	border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.tree li:last-child::before{
	border-right: 1px solid #ccc;
	border-radius: 0 0 0;
	-webkit-border-radius: 0 0 0;
	-moz-border-radius: 0 0 0;
}
.tree li:first-child::after{
	border-radius: 0 0 0 0;
	-webkit-border-radius: 0 0 0 0;
	-moz-border-radius: 0 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree ul ul::before{
	content: '';
	position: absolute; top: 0; left: 50%;
	border-left: 1px solid #ccc;
	width: 0; height: 20px;
}

.tree li div{
	border: 1px solid #ccc;
	padding: 5px 10px;
	text-decoration: none;
	color: #666;
	font-family: arial, verdana, tahoma;
	font-size: 11px;
	display: inline-block;
	
	border-radius: 0px;
	-webkit-border-radius: 0px;
	-moz-border-radius: 0px;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.tree li div:hover, .tree li div:hover+ul li div {
	background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
}
/*Connector styles on hover*/
.tree li div:hover+ul li::after, 
.tree li div:hover+ul li::before, 
.tree li div:hover+ul::before, 
.tree li div:hover+ul ul::before{
	border-color:  #94a0b4;
}

.FixedHeightContainer
{
  float:right;
  height: 250px;
  width:250px; 
  padding:3px; 
    background:#f00;
}
.Content
{
  height:224px;
  width:224px;
   overflow-x:scroll;
   overflow-y:scroll;
    background:#fff;
}

</style>

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
				<div class="row text-xs-center">
					<div class="col-md-12">
						<div style="border-bottom: black 0.2px solid; border-left: black 0.2px solid; overflow-x: auto; overflow-y: auto; margin-bottom: 10px; height: 400px; border-top: black 0.2px solid; border-right: black 0.2px solid" class="tree">
							<div id="frame-chart">
								@forelse($page_datas->datas['charts'] as $key => $dt)
									<?php
										function breakChilds($child)
										{	
											$width = 0;				
											foreach ($child as $key => $value) 
											{
												$width = $width + 158;
												echo("
													<li>
														<div style='padding=0px;'>
															<p style='margin-bottom:5px!important;font-size:14px;'>" 
																. $value['name'] . 
															"</p>
															<a href='#' style='width:100px!important;text-align:center;'>
																Tambah
															</a>
															&nbsp;
															<a href='#' style='width:100px!important;text-align:center;'>
																Edit
															</a>
															&nbsp;
															<a href='#' style='width:100px!important;text-align:center;'>
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

										echo("
											<ul>
												<li>
													<div style='padding=0px;'>
														<p style='margin-bottom:5px!important;font-size:14px;'>" 
															. $dt['name'] . 
														"</p>
														<a href='#' style='width:100px!important;text-align:center;'>
															Tambah
														</a>
														&nbsp;
														<a href='#' style='width:100px!important;text-align:center;'>
															Edit
														</a>
														&nbsp;
														<a href='#' style='width:100px!important;text-align:center;'>
															Hapus
														</a>									
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

		$( document ).ready(function() {
		    setChartWidth({{$width}});
		});

		// hris_slimscroll.init(); 
		hris_modal_delete.init();
		hris_modal_chart_edit.init();
	</script>
@stop