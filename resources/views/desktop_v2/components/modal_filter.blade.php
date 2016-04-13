<ul class="dropdown-menu filter-menu filter-menu-employee" style="position:absolute; display:none; left: 345px; top: 145px;">
		<li class="dropdown-item border-bottom-1">
			<div class="row">
				<div class="col-sm-9 padding-10">
					<p class="font-size-16 font-black margin-bottom-0">Alat Pencarian</p>
				</div>
				<div class="col-sm-3 padding-10">
					<a href="#" class="link-blue font-size-16 link-filter-menu-close" style="float:right;" role="button" aria-haspopup="true"><i class="ion-android-close"></i></a>
				</div>
			</div>	
		</li>
		<li class="dropdown-item padding-top-10">
			<div class="row padding-bottom-10">
				<div class="col-sm-3 padding-0">
					<div class="slim-scroll-mini">
						<ul class="nav nav-tabs padding-right-5">
							<a data-toggle="tab" class="link-black" href="#filter"><li class="active padding-top-15 link-square-gray">Filter</li></a>
							<a data-toggle="tab" class="link-black" href="#sort"><li class="padding-top-15 link-square-gray">Urutkan</li></a>
						</ul>
					</div>
				</div>
				<div class="col-sm-4 border-left-1 padding-0">
					<div class="slim-scroll-mini padding-left-0">
						<div class="tab-content white-space-normal">
							<div id="filter" class="tab-pane fade in active">
								<ul class="nav nav-tabs padding-right-5 padding-left-5">
									<a data-toggle="tab" class="link-black" href="#branch"><li class="active padding-top-15 link-square-gray">Cabang</li></a>
									<a data-toggle="tab" class="link-black" href="#dept"><li class="padding-top-15 link-square-gray">Department</li></a>
									<a data-toggle="tab" class="link-black" href="#chart"><li class="padding-top-15 link-square-gray">Jabatan</li></a>
									<a data-toggle="tab" class="link-black" href="#grade"><li class="padding-top-15 link-square-gray">Kelas Jabatan</li></a>
									<a data-toggle="tab" class="link-black" href="#status"><li class="padding-top-15 link-square-gray">Status Pekerjaan</li></a>
									<a data-toggle="tab" class="link-black" href="#marital"><li class="padding-top-15 link-square-gray">Status Pernikahan</li></a>
									<a data-toggle="tab" class="link-black" href="#start"><li class="padding-top-15 link-square-gray">Mulai Bekerja</li></a>
									<a data-toggle="tab" class="link-black" href="#end"><li class="padding-top-15 link-square-gray">Berhenti Bekerja</li></a>
								</ul>
							</div>
							<div id="sort" class="tab-pane fade">
								<ul class="nav nav-tabs padding-right-5">
									<a data-toggle="tab" class="link-black" href="#sortname"><li class="active padding-top-15 link-square-gray">Nama</li></a>
									<a data-toggle="tab" class="link-black" href="#sortstart"><li class="padding-top-15 link-square-gray">Mulai Bekerja</li></a>
									<a data-toggle="tab" class="link-black" href="#sortend"><li class="padding-top-15 link-square-gray">Akhir Status/Berhenti</li></a>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-5 border-left-1 padding-0">
					<div class="slim-scroll-mini padding-left-0">
						<div class="tab-content white-space-normal">
							<div id="branch" class="tab-pane fade">
								<ul class="padding-left-5" style="list-style: outside none none;">
									@forelse($page_datas->datas['branches'] as $key => $value)
										<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'branchname' => $value['name']]))}}"><li class="padding-top-15 link-square-gray">{{$value['name']}}</li></a>
									@empty
										<p class="font-size-14 font-black text-xs-center">Tidak ada filter</p>
									@endforelse
								</ul>
							</div>
							<div id="dept" class="tab-pane fade">
								<ul class="padding-left-5" style="list-style: outside none none;">
									@forelse($page_datas->datas['departments'] as $key => $value)
										<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'department' => $value['department']]))}}"><li class="padding-top-15 link-square-gray">{{$value['department']}}</li></a>
									@empty
										<p class="font-size-14 font-black text-xs-center">Tidak ada filter</p>
									@endforelse
								</ul>
							</div>
							<div id="chart" class="tab-pane fade">
								<ul class="padding-left-5" style="list-style: outside none none;">
									@forelse($page_datas->datas['positions'] as $key => $value)
										<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'position' => $value['position']]))}}"><li class="padding-top-15 link-square-gray">{{$value['position']}}</li></a>
									@empty
										<p class="font-size-14 font-black text-xs-center">Tidak ada filter</p>
									@endforelse
								</ul>
							</div>
							<div id="grade" class="tab-pane fade">
								<ul class="padding-left-5" style="list-style: outside none none;">
									@forelse($page_datas->datas['grades'] as $key => $value)
										<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'currentgrade' => $value['grade']]))}}"><li class="padding-top-15 link-square-gray">{{$value['grade']}}</li></a>
									@empty
										<p class="font-size-14 font-black text-xs-center">Tidak ada filter</p>
									@endforelse
								</ul>
							</div>
							<div id="status" class="tab-pane fade">
								<ul class="padding-left-5" style="list-style: outside none none;">
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workstatus' => 'internship']))}}"><li class="padding-top-15 link-square-gray">Magang</li></a>
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workstatus' => 'contract']))}}"><li class="padding-top-15 link-square-gray">Kontrak</li></a>
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workstatus' => 'probation']))}}"><li class="padding-top-15 link-square-gray">Percobaan</li></a>
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workstatus' => 'permanent']))}}"><li class="padding-top-15 link-square-gray">Tetap</li></a>
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workstatus' => 'others']))}}"><li class="padding-top-15 link-square-gray">Lainnya</li></a>
								</ul>
							</div>
							<div id="marital" class="tab-pane fade">
								<ul class="padding-left-5" style="list-style: outside none none;">
									@forelse($page_datas->datas['maritalstatuses'] as $key => $value)
										<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'currentmaritalstatus' => $value['status']]))}}"><li class="padding-top-15 link-square-gray">{{$value['status']}}</li></a>
									@empty
										<p class="font-size-14 font-black text-xs-center">Tidak ada filter</p>
									@endforelse
								</ul>
							</div>
							<div id="start" class="tab-pane fade">
								<ul class="padding-left-5" style="list-style: outside none none;">
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workstart' => [Carbon\Carbon::now()->addDays(-1)->format('Y-m-d H:i:s'), Carbon\Carbon::now()->format('Y-m-d H:i:s') ]]))}}"><li class="padding-top-15 link-square-gray">Past 24 hours</li></a>
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workstart' => [Carbon\Carbon::now()->addWeeks(-1)->format('Y-m-d H:i:s'), Carbon\Carbon::now()->format('Y-m-d H:i:s') ]]))}}"><li class="padding-top-15 link-square-gray">Past week</li></a>
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workstart' => [Carbon\Carbon::now()->addMonths(-1)->format('Y-m-d H:i:s'), Carbon\Carbon::now()->format('Y-m-d H:i:s') ]]))}}"><li class="padding-top-15 link-square-gray">Past month</li></a>
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workstart' => [Carbon\Carbon::now()->addYears(-1)->format('Y-m-d H:i:s'), Carbon\Carbon::now()->format('Y-m-d H:i:s') ]]))}}"><li class="padding-top-15 link-square-gray">Past Year</li></a>
								</ul>
							</div>
							<div id="end" class="tab-pane fade">
								<ul class="padding-left-5" style="list-style: outside none none;">
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workend' => [Carbon\Carbon::now()->addDays(-1)->format('Y-m-d H:i:s'), Carbon\Carbon::now()->format('Y-m-d H:i:s') ]]))}}"><li class="padding-top-15 link-square-gray">Past 24 hours</li></a>
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workend' => [Carbon\Carbon::now()->addWeeks(-1)->format('Y-m-d H:i:s'), Carbon\Carbon::now()->format('Y-m-d H:i:s') ]]))}}"><li class="padding-top-15 link-square-gray">Past week</li></a>
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workend' => [Carbon\Carbon::now()->addMonths(-1)->format('Y-m-d H:i:s'), Carbon\Carbon::now()->format('Y-m-d H:i:s') ]]))}}"><li class="padding-top-15 link-square-gray">Past month</li></a>
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'workend' => [Carbon\Carbon::now()->addYears(-1)->format('Y-m-d H:i:s'), Carbon\Carbon::now()->format('Y-m-d H:i:s') ]]))}}"><li class="padding-top-15 link-square-gray">Past Year</li></a>
								</ul>
							</div>

							<div id="sortname" class="tab-pane fade">
								<ul class="padding-left-5" style="list-style: outside none none;">
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'sort' => 'name-asc']))}}"><li class="padding-top-15 link-square-gray">A - Z</li></a>
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'sort' => 'name-desc']))}}"><li class="padding-top-15 link-square-gray">Z - A</li></a>
								</ul>
							</div>
							<div id="sortstart" class="tab-pane fade">
								<ul class="padding-left-5" style="list-style: outside none none;">
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'sort' => 'workstart-asc']))}}"><li class="padding-top-15 link-square-gray">1 - 10</li></a>
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'sort' => 'workstart-desc']))}}"><li class="padding-top-15 link-square-gray">10 - 1</li></a>
								</ul>
							</div>
							<div id="sortend" class="tab-pane fade">
								<ul class="padding-left-5" style="list-style: outside none none;">
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'sort' => 'workend-asc']))}}"><li class="padding-top-15 link-square-gray">1 - 10</li></a>
									<a class="link-black" href="{{route('employee.index', array_merge(Input::all(), ['org_id' => $page_datas->datas['id'], 'sort' => 'workend-desc']))}}"><li class="padding-top-15 link-square-gray">10 - 1</li></a>
								</ul>
							</div>

						</div>
					</div>
				</div> 
			</div>	

		</li>
	</ul>