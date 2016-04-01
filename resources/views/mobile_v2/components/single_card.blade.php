<div class="row">
	<div class="col-sm-12 padding-15">
		<p class="font-size-25">
			{{$card_content['name']}}
		</p>
		<div class="font-size-14">
			<div class="padding-bottom-5"><i class="ion-android-phone-portrait"></i>&nbsp;{{(isset($card_content['phone']) ? $card_content['phone'] : 'tidak ada data')}}</div>
			<div class="padding-bottom-5"><i class="ion-android-mail"></i>&nbsp;{{(isset($card_content['email']) ? $card_content['email'] : 'tidak ada data')}}</div>
			<div class="padding-bottom-5"><i class="ion-android-pin"></i>&nbsp;{{(isset($card_content['address']) ? $card_content['address'] : 'tidak ada data')}}</div>
		</div>
	</div>	
</div>	