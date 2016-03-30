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
		<!-- End of Search Box -->
	</div>
</div>
@stop

@section('js')

@stop