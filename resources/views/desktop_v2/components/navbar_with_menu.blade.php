<!-- 
Fixed Navigation
==================================== -->
<header id="navigation" class="navbar-fixed-top navbar">
	<div class="container-fluid max-height-85">
		<div class="row background-dark-blue max-height-85">
			<div class="col-sm-1 padding-0 text-center">
				<!-- logo -->
				<a class="link-white font-size-50" href="#body">
					<i class="fa fa-th padding-top-18"></i>
				</a>
				<!-- /logo -->
			</div>
			<div class="col-sm-11">
				<div class="row background-blue padding-right-15">
					<div class="col-sm-12">
						<div class="navbar-header">
							<!-- logo -->
							<a class="link-white margin-top-8 font-size-25" href="#body">
								HRIS
							</a>
							<!-- /logo -->
						</div>
						<!-- main nav -->
						<nav class="collapse navbar-collapse navbar-right" role="navigation">
							<ul id="nav" class="nav navbar-nav">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle link-white" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">HRD&nbsp;&nbsp;&nbsp;<i class="fa fa-user"></i></a>
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
