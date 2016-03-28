<div class="row">
	<h4>
		Message :
	</h4>
	<?php
		echo('msg'); 
		var_dump(Session::get('msg'));

		echo('msg-type'); 
		var_dump(Session::get('msg-type'));

		echo('msg-action'); 
		var_dump(Session::get('msg-action'));

		echo('msg-title'); 
		var_dump(Session::get('msg-title'));
	?>
</div>


<div class="row">
	<h2>Page Attributes ($page_attributes)</h2>
</div>

<div class="row">
	<h4>Title : {{$page_attributes->page_title}}</h4>
</div>

<div class="row">
	<h4>subtitle : {{$page_attributes->page_subtitle}}</h4>
</div>

<div class="row">
	<h4>breadcrumb : 
		@foreach($page_attributes->breadcrumb as $bc => $dt)
			</br>
			<a href="{{$dt}}">{{$bc}}</a>
		@endforeach
	</h4>
</div>

<div class="row">
	<h4>filter : 
		@foreach($page_attributes->filters as $key => $filter)
			</br>
			{{$key}} =>
				@foreach($filter as $dt)
					{{$dt}}
					&nbsp;
				@endforeach
		@endforeach
	</h4>
</div>

<div class="row">
	<h4>sort : 
		@foreach($page_attributes->sorts as $key => $sort)
			</br>
			{{$key}} => </br>
				@foreach($sort as $k => $dt)
					&nbsp; {{$k}} => {{$dt}}
					</br>
				@endforeach
		@endforeach
	</h4>
</div>

<div class="row">
	<h2>Page Datas ($page_datas)</h2>
</div>

<div class="row">
	<h4>id : {{$page_datas->datas['id']}}</h4>
</div>

<div class="row">
	<h4>name : {{$page_datas->datas['name']}}</h4>
</div>

<div class="row">
	<h4>code : {{$page_datas->datas['code']}}</h4>
</div>

<div class="row">
	<h4>branches : </h4>
</div>

<div class="row">
	<table>
		<thead>
			<tr>
				<th>
					No.
				</th>
				<th>
					Name
				</th>
				<th>
					Kontrol
				</th>							
			</tr>
		</thead>
		<tbody>
			@if(count($page_datas->datas['branches']) == 0)
				<tr>
					<td colspan="4" class="text-center">
						Tidak ada data
					</td>
				</tr>
			@else                                                                 
				@foreach($page_datas->datas['branches'] as $key => $dt)
					<tr>
						<td class="text-center">
							{{ ($page_datas->paging->perPage() * ($page_datas->paging->currentPage() - 1)) + $key + 1}}
						</td>
						<td>
							{{ $dt['name'] }}
						</td>
						<td>
							<a href="{{ route('branch.show', ['org_id' => $page_datas->datas['id'], 'id' => $dt['id']]) }}">
								show
							</a>
							&nbsp;
							<a href="{{ route('branch.edit', ['org_id' => $page_datas->datas['id'], 'id' => $dt['id']]) }}">
								edit
							</a>
							&nbsp;
						    {!! Form::open(['url' => route('branch.destroy', ['org_id' => $page_datas->datas['id'], 'id' => $dt['id']]), 'method' => 'DELETE']) !!}
								<button>Delete</button>
						    {!! Form::close() !!}														
						</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
</div>

<div>
	<?php
		var_dump($page_datas->datas['branches']);
	?>
</div>

<div class="row">
	<h4>Paging : </h4> 
	{{$page_datas->paging->appends(Input::all())->render()}}
</div>

<div class="row">
	<h4>Search : {{$page_datas->search}}</h4> 
</div>

<div class="row">
	<h4>filter : 
		@foreach($page_datas->filter as $key => $ft)
			</br>
			{{$key}} =>
			@foreach($ft as $tmp)
				&nbsp; 
				{{$tmp}}
			@endforeach
		@endforeach
	</h4> 
</div>

<div class="row">
	<h4>sort : </br>
		@foreach($page_datas->sort as $key => $ft)
			&nbsp; {{$ft}}
		@endforeach
	</h4> 
</div>

<div class="row">
	<h4>policies : </h4>
	<?php
		var_dump($page_datas->datas['policies']);
	?>
</div>