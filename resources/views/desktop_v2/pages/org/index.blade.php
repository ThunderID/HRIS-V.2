@extends('desktop_v2.page_templates.wireframe_without_menu')

@section('content')

<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<!-- Search Box -->
		<div class="row padding-top-30">
			<div class="col-sm-12">
				@include('desktop_v2.components.grand_search_box')
			</div>
		</div>

		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>

		<!-- End of Search Box -->
		<!-- Content -->
		<?php $initial = '0'; ?>
		<div class="row">
			@foreach($page_datas->datas['data'] as $key => $dt)
				@if($initial!=strtoupper($dt['name'][0]))
					<div class="col-sm-12">
						<h3 class="text-uppercase">{{strtoupper($dt['name'][0])}}</h3>
					</div>
				@endif

			<div class="col-sm-6">
				@include('desktop_v2.components.card', ['card_content' => $dt])
			</div>
			
			<?php $initial = strtoupper($dt['name'][0]);?>
			@endforeach
		</div>
		<!-- End of Content -->
	</div>
</div>
@stop

@section('js')

@stop