<div class="row background-white">
	<div class="col-sm-12 padding-15">
		<div class="font-size-25">
			{{$card_content['name']}}
		</div>
		<div class="font-size-14">
			<div><i class="ion-android-phone-portrait"></i>&nbsp;{{(isset($card_content['phone']) ? $card_content['phone'] : 'tidak ada data')}}</div>
			<div><i class="ion-android-mail"></i>&nbsp;{{(isset($card_content['email']) ? $card_content['email'] : 'tidak ada data')}}</div>
			<div><i class="ion-android-pin"></i>&nbsp;{{(isset($card_content['address']) ? $card_content['address'] : 'tidak ada data')}}</div>
		</div>
	</div>	
</div>	