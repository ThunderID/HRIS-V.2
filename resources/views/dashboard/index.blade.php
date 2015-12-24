@extends('layout.half')

@section('content')
	<div class="row">
		@foreach($absences as $key => $value)
			<!-- /span6 -->
			<div class="span6">
				<div class="widget widget-table action-table">
					<div class="widget-header"> <i class="icon-th-list"></i>
						<h3>Karyawan {{$value['name']}} Absen Hari Ini</h3>
					</div>
					<!-- /widget-header -->
					<div class="widget-content">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th> Nama </th>
									<th> Jabatan </th>
									<th class="td-actions"> </th>
								</tr>
							</thead>
							<tbody>
								@forelse($value['absencetoday'] as $key2 => $value2)
									<tr>
										<td> {{$value2['name']}} </td>
										<td> {{$value2['jabatan']}} </td>
										<td class="td-actions"><a href="javascript:;" class="btn btn-small btn-warning"><i class="btn-icon-only icon-calendar"> </i></a></td>
									</tr>
								@empty
									<tr>
										<td colspan="3"> Tidak ada karyawan absen hari ini </td>
									</tr>
								@endforelse
							</tbody>
						</table>
					</div>
					<!-- /widget-content --> 
				</div>
				<!-- /widget -->
			</div>
			<!-- /span6 --> 
		@endforeach
	</div>
	<!-- /row --> 
@stop