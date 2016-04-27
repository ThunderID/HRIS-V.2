@extends('desktop_v2.page_templates.wireframe_plain')

@section('content')

<!-- Auth Index -->
<div class="row">
	{!! Form::open(['url' => route('auth.login.post'), 'method' => 'POST']) !!}
	<div class="col-md-offset-4 col-md-4 background-white">
		<div class="row">
			<div class="col-sm-12 padding-15">
				<div class="font-size-18">
					HRIS
				</div>
				@include('desktop_v2.components.alert_box')
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 padding-right-15 padding-left-15">
				 <fieldset class="form-group">
					<label for="username">Username</label>
					<input name="username" value="" class="form-control" id="username" placeholder="Masukkan username">
				</fieldset>
				 <fieldset class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" value="" class="form-control" id="password" placeholder="Masukkan password">
				</fieldset>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 padding-right-15 padding-left-15 padding-bottom-15 text-xs-right">
				<button type="submit" class="button-blue">Login</button>
			</div>
		</div>
	</div>
	{!!Form::close()!!}
</div>

<!-- End of Auth Index -->
@stop
