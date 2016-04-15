<!DOCTYPE html>
<html lang="en">
<body>
	@if(isset($data))
		<table class="table"  border="1">				
			<thead>
				<tr>
					<th rowspan="3" class="text-center">No<br/>&nbsp;</th>
					<th colspan="{{count($data['profile'])}}" class="text-left">profil</th>
					<th colspan="{{count($data['work'])}}" class="text-center">penempatan</th>
					<?php 
					$total_relatives = 0;
					foreach ($data['relatives'] as $key => $value) 
					{
						$total_relatives = $total_relatives + count($value);
					}
					?>
					<th colspan="{{$total_relatives}}" class="text-center">relatif</th>
					<?php 
					$total_document = 0;
					foreach ($data['document'] as $key => $value) 
					{
						$total_document = $total_document + count($value);
					}
					?>
					<th colspan="{{$total_document}}" class="text-center">dokumen</th>
				</tr>
				<tr>
					<th></th>
					@foreach($data['profile'] as $key => $value)
						<th rowspan="2" class="text-center">{{$value}}</th>
					@endforeach
					@foreach($data['work'] as $key => $value)
						<th rowspan="2" class="text-center">{{$value}}</th>
					@endforeach
					@foreach($data['relatives'] as $key => $value)
						@foreach($value as $key2 => $value2)
							<th rowspan="2" class="text-center">{{$value2}}[{{$key+1}}]</th>
						@endforeach
					@endforeach
					
					@foreach($data['document'] as $key => $value)
						<th colspan="{{count($value)}}" class="text-center">{{$key}}</th>
					@endforeach
				</tr>
				<tr>
					<th></th>
					@foreach($data['profile'] as $key => $value)
						<th></th>
					@endforeach
					@foreach($data['work'] as $key => $value)
						<th></th>
					@endforeach
					@foreach($data['relatives'] as $key => $value)
						@foreach($value as $key2 => $value2)
							<th></th>
						@endforeach
					@endforeach
					
					@foreach($data['document'] as $key => $value)
						@foreach($value as $key2 => $value2)
							<th class="text-center">{{$value2}}</th>
						@endforeach
					@endforeach
				</tr>
			</thead>
		</table>
	@endif
</body>
</html>