<div class="row">
	<div class="col-sm-12 padding-15 link-square-gray {{isset($is_selected) && $is_selected ? 'link-square-blue' : ''}}">
		<a class="{{isset($is_selected) && $is_selected ? 'link-white' : 'link-black'}}" href="{{route('branch.show', ['org_id' => $card_content['organisation_id'], 'id' => $card_content['id']])}}">
			<div class="font-size-18 padding-left-15">
				{{$card_content['name']}}
			</div>
			<div class="font-size-14 padding-left-30">
				<div>{{(isset($card_content['phone']) ? $card_content['phone'] : '')}}</div>
				<div>{{(isset($card_content['address']) ? $card_content['address'] : '')}}</div>
			</div>
		</a>
	</div>	
</div>	