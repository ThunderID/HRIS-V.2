@extends('layout.half')

@section('content')
	<div class="row">
		@foreach($organisation['branches'] as $key => $value)
			<!-- /span6 -->
			<div class="span6">
				<div class="widget widget-table action-table">
					<div class="widget-header"> <i class="icon-th-list"></i>
						<h3>Cabang {{$value['name']}}</h3>
					</div>
					<!-- /widget-header -->
					<div class="widget-content">
						
					</div>
					<!-- /widget-content --> 
				</div>
				<!-- /widget -->
			</div>
			<!-- /span6 --> 
		@endforeach
	</div>
	<!-- /row --> 
@stop