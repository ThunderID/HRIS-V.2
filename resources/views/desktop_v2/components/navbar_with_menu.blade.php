<!-- 
Fixed Navigation
==================================== -->
<header id="navigation" class="navbar-fixed-top max-height-85 padding-left-0">
	<div class="container-fluid max-height-85">
		<div class="row">
			<div class="col-sm-12 padding-left-0 padding-right-0" >
				<div class="padding-top-8 background-dark-blue height-85 width-85 pull-left text-xs-center padding-10" style="float:left;">
					<a class="link-white font-size-50" href="#menu" data-toggle="modal" data-target=".bd-example-modal-lg">
						<i class="ion-android-apps padding-top-18"></i>
					</a>
				</div>
				<div class="background-blue height-50 padding-top-10 padding-left-15" style="float:left; width: calc(100% - 85px);">
					<a class="link-white font-size-25" href="#body">
						HRIS
					</a>
					<!-- main nav -->
					<a href="#" class="dropdown-toggle link-white font-size-16 padding-top-7 padding-right-15" style="float:right;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">HRD&nbsp;&nbsp;&nbsp;<i class="ion-android-contact"></i></a>
					<ul class="dropdown-menu private-menu" style="float:right;position:relative;">
						<li class="dropdown-item height-100">
							<div class="row">
								<div class="col-sm-5 padding-10">
									<img src="http://cdncms.fonts.net/images/1fbc3283deeda23a/Letterhart.gif" class="img-circle dimension-max-width">
								</div>
								<div class="col-sm-7 padding-10">
									<h5 class="margin-bottom-0">HRD</h5>
									<label>Head of Corporate</label>
									<br/>
									<a class="button border-blue background-dark-blue padding-5 link-white">
										Akun Saya
									</a>
								</div>
							</div>	
						</li>
						<li class="dropdown-item background-gray-238 height-43">
							<div class="row">
								<div class="col-sm-12 padding-right-15 padding-top-8 text-xs-right">
									<a class="button padding-5 link-black border-gray-225 pull-right font-size-12">
										Sign Out
									</a>
								</div>
							</div>	
						</li>
					</ul>
					<!-- /main nav -->
				</div>
				<div class="background-blue height-35 padding-0" style="float:left; width: calc(100% - 85px);">
					@include('desktop_v2.components.breadcrumb', ['padding_bottom' => 'padding-bottom-7', 'padding_top' => 'padding-top-10'])
				</div>
			</div>
		</div>
	</div>
</header>
<!--
End Fixed Navigation
==================================== -->
