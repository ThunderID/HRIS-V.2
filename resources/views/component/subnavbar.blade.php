		<div class="subnavbar">
			<div class="subnavbar-inner">
				<div class="container">
					<ul class="mainnav">
						<li class="active"><a href="index.html"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
						@if(isset($organisation))
						<li><a href="{{route('hris.employees.index', ['code' => $organisation['code']])}}"><i class="icon-user"></i><span>Karyawan</span> </a> </li>
						<li><a href="reports.html"><i class="icon-calendar"></i><span>Kalender Kerja</span> </a> </li>
						<li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-cog"></i><span>Pengaturan</span> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="signup.html">Kantor Cabang</a></li>
								<li><a href="signup.html">Template Cuti</a></li>
								<li><a href="signup.html">Dokumen</a></li>
								<li><a href="signup.html">Otentikasi</a></li>
								<li><a href="signup.html">Kebijakan Idle</a></li>
							</ul>
						</li>
						<li><a href="reports.html"><i class="icon-list-alt"></i><span>Laporan Aktivitas</span> </a> </li>
						<li><a href="reports.html"><i class="icon-bar-chart"></i><span>Laporan Kehadiran</span> </a> </li>
						@endif
					</ul>
				</div>
				<!-- /container --> 
			</div>
			<!-- /subnavbar-inner --> 
		</div>
		<!-- /subnavbar -->