<!-- 
Fixed Navigation
==================================== -->
<header id="navigation" class="navbar-fixed-top navbar">
	<div class="container-fluid" style="max-height:85px;">
		<div class="row" style="background-color: #2a5196 !important;max-height:85px;padding:0px;">
			<div class="col-sm-1" style="padding:0px;">
				<div class="navbar-header">

					<!-- logo -->
					<a class="navbar-brand" href="#body">
						<h1 id="logo">
							<img src="img/logo.png" alt="MENU">
						</h1>
					</a>
					<!-- /logo -->
				</div>
			</div>
			<div class="col-sm-11">
				<div class="row">
					<div class="col-sm-12" style="background-color: #3f67ae !important; ">
						<div class="navbar-header">
							<!-- logo -->
							<h3 style="margin-top:13px;">
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
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Administrator HRD <span class="caret"></span></a>
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
					<div class="col-sm-12" style="padding:0px;">
						<ul class="breadcrumb" style="background-color: #fff !important; padding-bottom:7px;text-transform: uppercase;">
						    <li>
						    	<i class="fa fa-home"></i>
						    	<a href="#">Home</a>
						    </li>
						    @yield('breadcrumb')
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!--
End Fixed Navigation
==================================== -->
