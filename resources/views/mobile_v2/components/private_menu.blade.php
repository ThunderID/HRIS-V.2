<div class="row">
	<div class="col-xs-12 text-xs-right">
		<a class="link-black font-size-25 margin-right-10" href="#private_menu_close" data-dismiss="modal" aria-hidden="true">
			<i class="ion-ios-close-empty"></i>
		</a>
	</div>	
</div>	
<div class="row">
	<div class="col-xs-4 col-xs-offset-4 text-xs-center">
		<img src="{{Session::get('whoami')['avatar']}}" class="img-circle dimension-max-width">
	</div>	
</div>	
<div class="row padding-top-10 font-blue">
	<div class="col-xs-12 text-xs-center">
		<h5 class="margin-bottom-0">{{Session::get('whoami')['name']}}</h5>
		<label>{{Session::get('whoami')['email']}}</label>
		<hr class="margin-top-0 margin-left-30 margin-right-30"/>
	</div>
</div>	

<div class="row">
	<div class="col-xs-12 text-left text-xs-center padding-left-45 padding-right-45">
		<!-- menu -->
		<button class="button border-gray-225 padding-5 button-white" style="width:100%;">
			Akun Saya
		</button>
	</div>
</div>
<div class="row padding-top-10">
	<div class="col-xs-12 text-left text-xs-center padding-left-45 padding-right-45">
		<a class="btn border-gray-225 padding-5 button-white" style="width:100%;" href="{{route('auth.logout.get')}}">
			Sign Out
		</a>
		<!-- /menu -->
	</div>
</div>