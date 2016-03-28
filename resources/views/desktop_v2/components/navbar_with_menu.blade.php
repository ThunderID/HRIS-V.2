<!-- 
Fixed Navigation
==================================== -->
<header id="navigation" class="navbar-fixed-top navbar">
	<div class="container-fluid max-height-85">
		<div class="row background-dark-blue padding-0 max-height-85">
			<div class="col-sm-1 padding-0">
				<!-- logo -->
				<a href="#body" class="padding-0 link-white">
					<h1> MENU </h1>
				</a>
				<!-- /logo -->
			</div>
			<div class="col-sm-11">
				<div class="row">
					<div class="col-sm-12 background-blue">
						<div class="navbar-header">
							<!-- logo -->
							<h3 class="margin-top-13">
								<a href="#body">
									HRIS
								</a>
							</h3>
							<!-- /logo -->
						</div>
						<!-- main nav -->
						<nav class="collapse navbar-collapse navbar-right" role="navigation">
							<ul id="nav" class="nav navbar-nav">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle link-white" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> HRD <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="#">Action</a></li>
										<li><a href="#">Another action</a></li>
										<li><a href="#">Something else here</a></li>
										<li role="separator" class="divider"></li>
										<li><a href="#">Separated link</a></li>
									</ul>
								</li>
							</ul>
						</nav>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 padding-0">
						@include('desktop_v2.components.breadcrumb')
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!--
End Fixed Navigation
==================================== -->
