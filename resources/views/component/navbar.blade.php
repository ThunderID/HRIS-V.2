		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.html">HRIS - Reliance</a>
					<div class="nav-collapse">
					<ul class="nav pull-right">
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i> @if(isset($organisation)) {{$organisation['name']}} @else Pilih Organisasi @endif <b class="caret"></b></a>
							<ul class="dropdown-menu">
								@foreach($organisations as $key => $value)
									@if(isset($organisation))
										<li @if($organisation['id']==$value['id']) class="active" @endif><a href="{{route('hris.dashboard.show', ['code' => $value['code']])}}">{{$value['name']}}</a></li>
									@else
										<li><a href="{{route('hris.dashboard.show', ['code' => $value['code']])}}">{{$value['name']}}</a></li>
									@endif
								@endforeach
							</ul>
						</li>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> {{$whoami['name']}} <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="javascript:;">Ubah Password</a></li>
								<li><a href="javascript:;">Logout</a></li>
							</ul>
						</li>
					</ul>
						<form class="navbar-search pull-right">
							<input type="text" class="search-query" placeholder="Search">
						</form>
					</div>
					<!--/.nav-collapse --> 
				</div>
				<!-- /container --> 
			</div>
			<!-- /navbar-inner --> 
		</div>
		<!-- /navbar -->