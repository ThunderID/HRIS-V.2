@extends('desktop_v2.page_templates.wireframe_with_menu')

@section('content')

<!-- Title -->
<div class="row padding-15 left-15">
		<div class="col-md-12">
			<h3 class="padding-top-13">{{$page_attributes->page_subtitle}} "{{$page_datas->datas['name']}}"</h3>
		</div>
	</div>
</div>
<!-- End of Title -->

<!-- Stat -->
<div class="row padding-top-15 margin-left-0 margin-right-0 font-white">
	<div class="col-md-3 col-sm-6">
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
	<div class="col-md-3 col-sm-6">
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
	<div class="col-md-3 col-sm-6">
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
	<div class="col-md-3 col-sm-6">
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
<div class="clearfix">&nbsp;</div>
<!-- Report and Notif -->
<div class="row padding-top-15 margin-left-0 margin-right-0 font-black">
	<div class="col-md-6 col-sm-12">
		<div class="card">
			<div class="card-header background-white font-size-18">
				Pengambilan Cuti Bulan ini
			</div>
			<div class="card-block background-white">
				<blockquote class="card-blockquote">
					<div class="font-size-25 font-red"><i><small>Silahkan upgrade plan Anda</small></i></div>
				</blockquote>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-12">
		<div class="card">
			<div class="card-header background-yellow font-size-18">
				Kontrak Kerja yang Akan Kadaluarsa
			</div>
			<div class="card-block background-yellow">
				<blockquote class="card-blockquote">
					<div class="font-size-25 font-red"><i><small>Silahkan upgrade plan Anda</small></i></div>
				</blockquote>
			</div>
		</div>
	</div>
</div>
<!-- End of Report and Notif -->
<!-- Chart and Calendar -->
<div class="row padding-top-15 margin-left-0 margin-right-0 font-black">
	<div class="col-md-6 col-sm-12">
		<div class="card">
			<div class="card-header background-white font-size-18">
				Grafik Kinerja Karyawan
			</div>
			<div class="card-block background-white">
				<blockquote class="card-blockquote">
					<div class="font-size-25 font-red"><i><small>Silahkan upgrade plan Anda</small></i></div>
				</blockquote>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-12">
		<div class="card">
			<div class="card-header background-white font-size-18">
				Kalender Kerja
			</div>
			<div class="card-block background-white">
				<blockquote class="card-blockquote">
					<div class="font-size-25 font-red"><i><small>Silahkan upgrade plan Anda</small></i></div>
				</blockquote>
			</div>
		</div>
	</div>
</div>
<!-- End of Chart and Calendar -->
@stop
