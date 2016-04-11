<div class="row">
	<div class="col-xs-6">
		<h5 class="padding-left-30 padding-top-15 padding-bottom-10 text-xs-left">Urutkan</h5>
	</div>	
	<div class="col-xs-6 text-xs-right">
		<a class="link-black font-size-25 margin-right-10" href="#modal_filter_close" data-dismiss="modal" aria-hidden="true">
			<i class="ion-ios-close-empty"></i>
		</a>
	</div>	
</div>	
<hr class="margin-top-0 margin-left-30 margin-right-30"/>
<div class="row padding-left-30 padding-right-30 font-size-14">
	<div class="col-xs-12 font-white">
		<div class="row">
			<div class="col-xs-12 background-blue">
				<p class="margin-bottom-5 margin-top-5">Nama Karyawan</p>
			</div>
		</div>	

		<div class="row">
			<div class="col-xs-12 link-square-gray">
				<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'sort' => 'name-asc']))}}">A - Z</a>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 link-square-gray">
				<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'sort' => 'name-desc']))}}">Z - A</a>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 background-blue">
				<p class="margin-bottom-5 margin-top-5">Mulai Bekerja</p>
			</div>
		</div>	

		<div class="row">
			<div class="col-xs-12 link-square-gray">
				<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'sort' => 'workstart-asc']))}}">1 - 10</a>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 link-square-gray">
				<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'sort' => 'workstart-desc']))}}">10 - 1</a>
			</div>
		</div>


		<div class="row">
			<div class="col-xs-12 background-blue">
				<p class="margin-bottom-5 margin-top-5">Akhir Status / Berhenti Kerja</p>
			</div>
		</div>	

		<div class="row">
			<div class="col-xs-12 link-square-gray">
				<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'sort' => 'workend-asc']))}}">1 - 10</a>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 link-square-gray">
				<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'sort' => 'workend-desc']))}}">10 - 1</a>
			</div>
		</div>

	</div>	
</div>	