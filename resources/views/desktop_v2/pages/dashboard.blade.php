<?php
	// var_dump($page_attributes);
	// var_dump($page_datas);
	// exit;
?>

@extends('desktop_v2.page_templates.wireframe')

@section('navbar')
	@include('desktop_v2.components.navbar_plain')
@stop

@section('content')</br>
</br>
</br>
</br>
</br>
<h2>desktop</h2>

<div class="row">
<div class="col-md-12">
{{$page_datas->paging->render()}}
</div>
</div>
@stop

@section('js')

@stop