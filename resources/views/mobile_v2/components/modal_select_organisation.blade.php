@inject('organisations', 'App\API\Connectors\APIOrg')
<?php
	$organisations 			= $organisations->getIndex();
?>

<div class="row">
	<div class="col-xs-6">
		<h5 class="padding-left-30 padding-top-15 padding-bottom-10 text-xs-left">Perusahaan</h5>
	</div>	
	<div class="col-xs-6 text-xs-right">
		<a class="link-black font-size-25 margin-right-10" href="#select_organisation_close" data-dismiss="modal" aria-hidden="true">
			<i class="ion-ios-close-empty"></i>
		</a>
	</div>	
</div>	
<hr class="margin-top-0 margin-left-30 margin-right-30"/>
<div class="row padding-15">

	<div class="col-xs-12">
		<div class="row border-gray-238 margin-left-15 margin-right-15">
			<div class="col-xs-3 padding-right-0">
				<div class="background-white " id="col-eq-height">
					<div>
						<a class="link-blue" href="{{route('org.create')}}">
							<i class="ion-android-add font-size-50"></i>
						</a>
					</div>
				</div>	
			</div>	
			<div class="col-xs-9 padding-left-5">
				<div class=" background-white padding-15 height-120">
					<a class="text-uppercase font-size-16 padding-top-40 link-black" href="{{route('org.create')}}">
						Perusahaan Baru
					</a>
				</div>
			</div>
		</div>	
	</div>	
	<div class="clearfix">&nbsp;</div>

	@forelse($organisations['data']['data'] as $key => $dt)
	<div class="col-xs-12">
		@include('mobile_v2.components.card', ['card_content' => $dt])
	</div>
	<div class="clearfix">&nbsp;</div>
	@empty

	@endforelse
</div>	
