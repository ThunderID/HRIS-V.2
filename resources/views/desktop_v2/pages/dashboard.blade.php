@extends('desktop_v2.page_templates.wireframe_with_menu')

@section('content')

<div class="row margin-0">
<div class="col-md-12">
DESKTOP
{{$page_datas->paging->render()}}
</div>
</div>
@stop

@section('js')

@stop