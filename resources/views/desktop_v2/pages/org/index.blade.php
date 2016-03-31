@extends('desktop_v2.page_templates.wireframe_without_menu')

@section('content')

<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<!-- Search Box -->
		<div class="row padding-top-30">
			<div class="col-sm-12">
				@include('desktop_v2.components.grand_search_box', ['search_name' => 'q', 'search_placeholder' => 'Cari Perusahaan'])

				@if(isset($page_datas->search))
					<div class="clearfix">&nbsp;</div>
					Menampilkan pencarian "{{$page_datas->search}}"  <a href="{{route('org.index')}}" class="link-black font-size-18"><i class="ion-android-cancel"></i></a>
				@endif

				@include('desktop_v2.components.alert_box')
			</div>
		</div>

		<div class="clearfix">&nbsp;</div>
		<div class="clearfix">&nbsp;</div>

		<!-- End of Search Box -->
		
		<!-- Content -->
		<?php $initial = '0'; ?>
		<div class="row">
			@forelse($page_datas->datas['data'] as $key => $dt)
				@if($initial!=strtoupper($dt['name'][0]))
					<div class="col-sm-12">
						<h3 class="text-uppercase">{{strtoupper($dt['name'][0])}}</h3>
					</div>
				@endif

			<div class="col-sm-6">
				@include('desktop_v2.components.card', ['card_content' => $dt])
			</div>
			
			<?php $initial = strtoupper($dt['name'][0]);?>
			@empty
				<div class="col-sm-12">
					<p class="background-white padding-15">Tidak ada data organisasi</p>
				</div>
			@endforelse
		</div>
		<!-- End of Content -->

		<!-- Modal Delete -->
		@include('desktop_v2.components.modal_delete', [
				'modal_id'      => 'organisation_del', 
				'modal_route'   => ''
		])
		<!-- End of Modal Delete -->
		<!-- Button Create -->
		<a class="link-white background-blue link-round-100 font-size-50 padding-right-15 padding-left-22" id="link-add-fixed" href="{{route('org.create')}}"><i class ="ion-android-add"></i></a>
		<!-- End of Button Create -->
	</div>
</div>
@stop

@section('js')
	<script type="text/javascript">
		hris_modal_delete.init();
	</script>
@stop