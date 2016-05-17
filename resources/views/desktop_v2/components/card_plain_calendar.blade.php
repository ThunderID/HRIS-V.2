<div class="row">
	<div class="col-sm-12 padding-15 {{isset($is_selected) && $is_selected ? 'link-square-blue' : 'link-square-gray' }}">
		<a class="link-transparent" href="{{route('calendar.show', ['org_id' => $card_content['organisation_id'], 'id' => $card_content['id']])}}">
			<div class="font-size-18 padding-left-5">
				{{$card_content['name']}}
			</div>
			<div class="font-size-14 padding-left-15">
				<div>Hari Kerja : {{(isset($card_content['workdays']) ? $card_content['workdays'] : '-')}}</div>
				<div>Jam Kerja : {{(isset($card_content['start']) ? $card_content['start'].' - '.$card_content['end'] : '-')}}</div>
			</div>
		</a>
	</div>	
</div>	