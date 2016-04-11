<?php
	$bg 			= 'link-square-gray';
	$icon 			= '';
	if($card_content['newest_work_end']!='0000-00-00' && $card_content['newest_work_end'] < Carbon\Carbon::now()->format('Y-m-d H:i:s'))
	{
		$bg 		= 'link-square-gray-225';
		$icon 		= '<i class="ion-ios-minus-outline" style="float:right;"></i>';
	}
	elseif(is_null($card_content['last_password_updated_at']) || ($card_content['newest_work_end']!= '0000-00-00' && $card_content['newest_work_end'] < Carbon\Carbon::now()->addWeeks(1)->format('Y-m-d H:i:s')))
	{
		$bg 		= 'link-square-yellow';
		$icon 		= '<i class="ion-ios-information-outline" style="float:right;"></i>';
	}
?>
<div class="row margin-right-0">
	<div class="col-sm-12 padding-15 {{isset($is_selected) && $is_selected ? 'link-square-blue' : $bg }}">
		<a class="link-transparent" href="{{route('employee.show', ['org_id' => $card_content['organisation_id'], 'id' => $card_content['id']])}}">
			<div class="font-size-18 padding-left-15">
				{{$card_content['name']}}
				{!!$icon!!}
			</div>
			<div class="font-size-14 padding-left-30">
				<div>Jabatan : {{(isset($card_content['newest_position']) ? $card_content['newest_position'] : '-')}}</div>
				<div>NIK : {{(isset($card_content['newest_nik']) ? $card_content['newest_nik'] : '-')}}</div>
				<div>Email : {{(isset($card_content['email']) ? $card_content['email'] : '-')}}</div>
			</div>
		</a>
	</div>	
</div>	