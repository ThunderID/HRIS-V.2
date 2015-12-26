@extends('layout.half')

@section('content')
	<div class="row">
		<!-- /span6 -->
		<div class="span12">
			<div class="widget widget-table action-table">
				<div class="widget-header"> <i class="icon-th-list"></i>
					<h3>Karyawan {{$organisation['name']}}</h3>
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
							@forelse($employees as $key => $value)
								<tr>
									<td> {{$value['name']}} </td>
									<td> {{$value['jabatan']}} </td>
									<td class="td-actions"><a href="javascript:;" class="btn btn-small btn-warning"><i class="btn-icon-only icon-calendar"> </i></a></td>
								</tr>
							@empty
								<tr>
									<td colspan="3"> Tidak ada karyawan </td>
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
	</div>
	<!-- /row --> 
@stop