<!DOCTYPE html>
<html lang="en">
<body>
	@if(isset($data))
		<table class="table" style="border:1px solid #000;">				
			<thead>
				<tr>
					<th colspan="8"></th>
				</tr>
				<tr>
					<th style="width:10%">&nbsp;</th>
					<th colspan="7" style="height:20%">Template Import Karyawan</th>
				</tr>
				<tr>
					<th colspan="8"></th>
				</tr>
				<tr>
					<th rowspan="3" class="text-center">No<br/>&nbsp;</th>
					<th rowspan="2" colspan="{{count($data['profile'])}}" class="text-left">Profil</th>
					<th rowspan="2" colspan="{{count($data['work'])}}" class="text-center">Penempatan</th>
					<?php 
					$total_relatives = 0;
					foreach ($data['relatives'] as $key => $value) 
					{
						$total_relatives = $total_relatives + count($value);
					}
					?>
					<th colspan="{{$total_relatives}}" class="text-center">Relatives</th>
					<?php 
					$total_document = 0;
					foreach ($data['document'] as $key => $value) 
					{
						$total_document = $total_document + count($value);
					}
					?>
					<th colspan="{{$total_document}}" class="text-center">Dokumen</th>
				</tr>
				<tr>
					@foreach($data['relatives'] as $key => $value)
						@foreach($value as $key2 => $value2)
							<th rowspan="2" class="text-center">{{$value2}} {{$key}}</th>
						@endforeach
					@endforeach
					
					@foreach($data['document'] as $key => $value)
						<th colspan="{{count($value)}}" class="text-center">{{$key}}</th>
					@endforeach
				</tr>
				<tr>
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