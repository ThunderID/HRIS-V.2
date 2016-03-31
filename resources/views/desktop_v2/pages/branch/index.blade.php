@extends('desktop_v2.page_templates.wireframe_with_menu')

@section('content')

<!-- Branch Index -->
<div class="row">
	<div class="col-md-3">
		@include('desktop_v2.components.grand_search_box', ['search_name' => 'q', 'search_placeholder' => 'Cari Perusahaan', 'background_search_box' => 'background-light-blue', 'font_search_box' => 'font-dark-blue'])
	</div>
</div>
<!-- End of Branch Index -->
@stop
