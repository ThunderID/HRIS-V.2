@extends('desktop_v2.page_templates.wireframe_with_menu')

@section('content')

<!-- Branch Index -->
<div class="row">
	<div class="col-md-3">
		@include('desktop_v2.components.grand_search_box', ['search_name' => 'q', 'search_placeholder' => 'Cari Cabang', 'background_search_box' => 'background-light-blue', 'font_search_box' => 'font-dark-blue'])
		<div id="slim-scroll" class="background-white">
			<!-- Content -->
			<div class="row">
				@forelse($page_datas->datas['branches'] as $key => $dt)

				<div class="col-sm-12">
					@include('desktop_v2.components.card_plain', ['card_content' => $dt])
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
	<div class="col-md-9">
		@include('desktop_v2.components.secondary_navbar')
	</div>
</div>
<!-- End of Branch Index -->
@stop

@section('js')
	<script type="text/javascript">
		hris_slimscroll.init();
	</script>
@stop