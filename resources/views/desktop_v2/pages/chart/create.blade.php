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
	<h2>Form</h2>
</div>

<div class="row">
	@if(!empty($page_datas->datas['id']))
    {!! Form::open(['url' => route('chart.update', ['org_id' => $page_datas->datas['organisation_id'], 'branch_id' => $page_datas->datas['branch_id'], 'id' => $page_datas->datas['id']]), 'method' => 'PATCH']) !!}
    @else
    {!! Form::open(['url' => route('chart.store', ['org_id' => $page_datas->datas['organisation_id'], 'branch_id' => $page_datas->datas['branch_id']]), 'method' => 'POST']) !!}
    @endif

		<div class="row">
			<label for="tag">Name</label>
			{!! Form::text('name',  $page_datas->datas['name'], [
			]) !!}
		</div>

		<div class="row">
			<label for="tag">Path</label>
			{!! Form::text('path',  $page_datas->datas['path'], [
			]) !!}
		</div>

		<div class="row">
			<label for="tag">Departement</label>
			{!! Form::text('department',  $page_datas->datas['department'], [
			]) !!}
		</div>		

		<div class="row">
			<a href="{{ URL::route('org.index') }}">Batal</a>
			<button>Simpan</button>
	 	</div>
    {!! Form::close() !!}
</div>

<div class="row">
	<h2>Page Datas ($page_datas)</h2>
</div>

<div class="row">
	<?php
		var_dump($page_datas->datas);
	?>
</div>

