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
<div class="row padding-15">
	<div class="col-xs-12">
		<div class="{{isset($is_selected) && $is_selected ? 'link-square-blue' : $bg }} padding-15 height-150">
			<div class="row">
				<div class="col-xs-12">
					<a class="text-uppercase font-25 link-black" href="{{route('employee.show', ['org_id' => $card_content['organisation_id'], 'employee' => $card_content['id']])}}">
						{{$card_content['name']}}
						{!!$icon!!}
					</a>
					<div class="font-size-14">
						<div>Jabatan : {{(isset($card_content['newest_position']) ? $card_content['newest_position'] : '-')}}</div>
						<div>NIK : {{(isset($card_content['newest_nik']) ? $card_content['newest_nik'] : '-')}}</div>
						<div>Email : {{(isset($card_content['email']) ? $card_content['email'] : '-')}}</div>
						<br/>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 text-xs-right">
					<div class="padding-bottom-5 font-18">
						<a class="link-black" href="{{route('employee.edit', ['org_id' => $card_content['organisation_id'], 'employee' => $card_content['id']])}}">
							<i class="ion-android-create"></i> Ubah
						</a>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<a class="link-black" href="javascript:void(0);" data-backdrop="static" data-keyboard="false" data-toggle="modal" 
							data-target="#organisation_del"
							data-id="{{$card_content['id']}}"
							data-title="Hapus Data Cabang {{$card_content['name']}}"
							data-effect="Menghapus data akan menghapus semua dokumen dan riwayat kerja. Masukkan password Anda untuk melanjutkan "
							data-action="{{ route('employee.destroy', ['org_id' => $card_content['organisation_id'], 'employee' => $card_content['id']]) }}">
							<i class="ion-android-delete"></i> Hapus
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
