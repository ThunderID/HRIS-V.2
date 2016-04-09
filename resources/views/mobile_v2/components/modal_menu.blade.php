<div class="row">
	<div class="col-sm-12 padding-left-10 padding-right-0" >
		<div class="padding-top-8 height-85 width-85 pull-left text-xs-center padding-left-10" style="float:left;">
			<a class="link-white font-size-50" href="#body" data-dismiss="modal" aria-hidden="true">
				<i class="ion-ios-close-empty"></i>
			</a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12 text-left padding-left-60">
		<!-- logo -->
		<a class="link-white font-size-28 text-uppercase" href="{{route('org.index')}}">
			MENU
		</a>
		<br/>
		<a class="link-white font-size-18" href="{{route('org.index')}}">
			{{$page_datas->datas['name']}}
		</a>
		<!-- /logo -->
	</div>
</div>

<div class="clearfix">&nbsp;</div>

<div class="row padding-left-45 font-white padding-right-45">
	<div class="col-xs-6 text-xs-center">
		<a href="{{route('org.show', ['org_id' => $page_datas->datas['id']])}}" class="link-black">
			<div class="card padding-top-15">
				<img class="card-img-top" src="{{url('/assets/img/menu/dashboard-96.png')}}" alt="Card image cap" style="vertical-align:center;">
				<div class="card-block padding-10">
					<p class="card-text">Dashboard</p>
				</div>
			</div>
		</a>
	</div>
	<div class="col-xs-6 text-xs-center">
		<a href="{{route('branch.index', ['org_id' => $page_datas->datas['id']])}}" class="link-black">
			<div class="card padding-top-15">
				<img class="card-img-top" src="{{url('/assets/img/menu/building-96.png')}}" alt="Card image cap" style="vertical-align:center;">
				<div class="card-block padding-10">
					<p class="card-text">Cabang</p>
				</div>
			</div>
		</a>
	</div>
	<div class="col-xs-6 text-xs-center">
		<a href="{{route('employee.index', ['org_id' => $page_datas->datas['id']])}}" class="link-menu">
			<div class="card padding-top-30">
				<img class="card-img-top" src="{{url('/assets/img/menu/collaborator-96.png')}}" alt="Card image cap" style="vertical-align:center;">
				<div class="card-block">
					<p class="card-text">Karyawan</p>
				</div>
			</div>
		</a>
	</div>
</div>