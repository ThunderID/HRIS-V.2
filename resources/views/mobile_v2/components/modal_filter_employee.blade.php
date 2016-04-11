<div class="row">
	<div class="col-xs-6">
		<h5 class="padding-left-30 padding-top-15 padding-bottom-10 text-xs-left">Filter</h5>
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
				<p class="margin-bottom-5 margin-top-5">Cabang</p>
			</div>
		</div>	

		<div class="row">
			@forelse($page_datas->datas['branches'] as $key => $value)
				<div class="col-xs-12 link-square-gray">
					<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'branchname' => $value['name']]))}}">{{$value['name']}}</a>
				</div>
			@empty
				<p class="font-black text-xs-center">Tidak ada filter</p>
			@endforelse
		</div>

		<div class="row">
			<div class="col-xs-12 background-blue">
				<p class="margin-bottom-5 margin-top-5">Department</p>
			</div>
		</div>	

		<div class="row">
			@forelse($page_datas->datas['departments'] as $key => $value)
				<div class="col-xs-12 link-square-gray">
					<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'department' => $value['department']]))}}">{{$value['department']}}</a>
				</div>
			@empty
				<p class="font-size-14 font-black text-xs-center">Tidak ada filter</p>
			@endforelse
		</div>

		<div class="row">
			<div class="col-xs-12 background-blue">
				<p class="margin-bottom-5 margin-top-5">Jabatan</p>
			</div>
		</div>	

		<div class="row">
			@forelse($page_datas->datas['positions'] as $key => $value)
				<div class="col-xs-12 link-square-gray">
					<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'position' => $value['position']]))}}">{{$value['position']}}</a>
				</div>
			@empty
				<p class="font-size-14 font-black text-xs-center">Tidak ada filter</p>
			@endforelse
		</div>

		<div class="row">
			<div class="col-xs-12 background-blue">
				<p class="margin-bottom-5 margin-top-5">Kelas Jabatan</p>
			</div>
		</div>	

		<div class="row">
			@forelse($page_datas->datas['grades'] as $key => $value)
				<div class="col-xs-12 link-square-gray">
					<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'currentgrade' => $value['grade']]))}}">{{$value['grade']}}</a>
				</div>
			@empty
				<p class="font-size-14 font-black text-xs-center">Tidak ada filter</p>
			@endforelse
		</div>

		<div class="row">
			<div class="col-xs-12 background-blue">
				<p class="margin-bottom-5 margin-top-5">Status Pernikahan</p>
			</div>
		</div>	

		<div class="row">
			@forelse($page_datas->datas['maritalstatuses'] as $key => $value)
				<div class="col-xs-12 link-square-gray">
					<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'currentmaritalstatus' => $value['status']]))}}">{{$value['status']}}</a>
				</div>
			@empty
				<p class="font-size-14 font-black text-xs-center">Tidak ada filter</p>
			@endforelse
		</div>

		<div class="row">
			<div class="col-xs-12 background-blue">
				<p class="margin-bottom-5 margin-top-5">Status Pernikahan</p>
			</div>
		</div>	

		<div class="row">
			@forelse($page_datas->datas['maritalstatuses'] as $key => $value)
				<div class="col-xs-12 link-square-gray">
					<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'currentmaritalstatus' => $value['status']]))}}">{{$value['status']}}</a>
				</div>
			@empty
				<p class="font-size-14 font-black text-xs-center">Tidak ada filter</p>
			@endforelse
		</div>

		<div class="row">
			<div class="col-xs-12 background-blue">
				<p class="margin-bottom-5 margin-top-5">Mulai Bekerja</p>
			</div>
		</div>	

		<div class="row">
			<div class="col-xs-12 link-square-gray">
				<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workstart' => [Carbon\Carbon::now()->addWeeks(-1)->format('Y-m-d H:i:s'), Carbon\Carbon::now()->format('Y-m-d H:i:s') ]]))}}">Past week</a>
			</div>
			<div class="col-xs-12 link-square-gray">
				<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workstart' => [Carbon\Carbon::now()->addWeeks(-1)->format('Y-m-d H:i:s'), Carbon\Carbon::now()->format('Y-m-d H:i:s') ]]))}}">Past week</a>
			</div>
			<div class="col-xs-12 link-square-gray">
				<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workstart' => [Carbon\Carbon::now()->addMonths(-1)->format('Y-m-d H:i:s'), Carbon\Carbon::now()->format('Y-m-d H:i:s') ]]))}}">Past month</a>
			</div>
			<div class="col-xs-12 link-square-gray">
				<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workstart' => [Carbon\Carbon::now()->addYears(-1)->format('Y-m-d H:i:s'), Carbon\Carbon::now()->format('Y-m-d H:i:s') ]]))}}">Past Year</a>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 background-blue">
				<p class="margin-bottom-5 margin-top-5">Akhir Status / Berhenti Kerja</p>
			</div>
		</div>	

		<div class="row">
			<div class="col-xs-12 link-square-gray">
				<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workend' => [Carbon\Carbon::now()->addWeeks(-1)->format('Y-m-d H:i:s'), Carbon\Carbon::now()->format('Y-m-d H:i:s') ]]))}}">Past week</a>
			</div>
			<div class="col-xs-12 link-square-gray">
				<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workend' => [Carbon\Carbon::now()->addWeeks(-1)->format('Y-m-d H:i:s'), Carbon\Carbon::now()->format('Y-m-d H:i:s') ]]))}}">Past week</a>
			</div>
			<div class="col-xs-12 link-square-gray">
				<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workend' => [Carbon\Carbon::now()->addMonths(-1)->format('Y-m-d H:i:s'), Carbon\Carbon::now()->format('Y-m-d H:i:s') ]]))}}">Past month</a>
			</div>
			<div class="col-xs-12 link-square-gray">
				<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workend' => [Carbon\Carbon::now()->addYears(-1)->format('Y-m-d H:i:s'), Carbon\Carbon::now()->format('Y-m-d H:i:s') ]]))}}">Past Year</a>
			</div>
		</div>
	</div>	
</div>	