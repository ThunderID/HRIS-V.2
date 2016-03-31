@extends('desktop_v2.page_templates.wireframe_without_menu')

@section('content')

<!-- Title -->
<div class="row padding-15 left-15">
		<div class="col-sm-12">
			<h3 class="padding-top-13">{{$page_attributes->page_subtitle}} "{{$page_datas->datas['name']}}"</h3>
		</div>
	</div>
</div>
<!-- End of Title -->

<!-- Stat -->
<div class="row padding-top-15 margin-left-0 margin-right-0 font-white">
	<div class="col-sm-3">
		<div class="card">
			<div class="card-header background-dark-blue">
				Plan
			</div>
			<div class="card-block background-blue">
				<blockquote class="card-blockquote">
					<div class="font-size-25">Free</div>
				</blockquote>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="card">
			<div class="card-header background-dark-blue">
				Total Cabang
			</div>
			<div class="card-block background-blue">
				<blockquote class="card-blockquote">
					<div class="font-size-25">@number(count($page_datas->datas['branches']))</div>
				</blockquote>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="card">
			<div class="card-header background-dark-blue">
				Total Karyawan
			</div>
			<div class="card-block background-blue">
				<blockquote class="card-blockquote">
					<div class="font-size-25 font-red"><i><small>Silahkan upgrade plan Anda</small></i></div>
				</blockquote>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="card">
			<div class="card-header background-dark-blue">
				Loss Time Rate
			</div>
			<div class="card-block background-blue">
				<blockquote class="card-blockquote">
					<div class="font-size-25 font-red"><i><small>Silahkan upgrade plan Anda</small></i></div>
				</blockquote>
			</div>
		</div>
	</div>
</div>
<!-- End of Stat -->
@stop
