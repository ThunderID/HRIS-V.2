<!DOCTYPE html>
<html lang="en">
<body>
	@if(isset($data))
		<table class="table"  border="1">				
			<thead>
				<tr>
					<th>No</th>
					@foreach($data['profile'] as $key => $value)
						<th class="text-center">profile_{{$value}}</th>
					@endforeach
					@foreach($data['work'] as $key => $value)
						<th class="text-center">work_{{$value}}</th>
					@endforeach
					@foreach($data['relatives'] as $key => $value)
						@foreach($value as $key2 => $value2)
							<th class="text-center">relatives_{{$key+1}}_content_{{$value2}}</th>
						@endforeach
					@endforeach
			
					@foreach($data['document'] as $key => $value)
						@foreach($value as $key2 => $value2)
							<th class="text-center">document_{{$key}}_content_{{$value2}}</th>
						@endforeach
					@endforeach
				</tr>
			</thead>
		</table>
	@endif
</body>
</html>