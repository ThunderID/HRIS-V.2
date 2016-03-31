{!! Form::open(['method' => 'GET']) !!}
	<div class="container-search-box">
		<input type="search" id="search" name="{{$search_name}}" placeholder="{{$search_placeholder}}" />
		<button class="icon"><i class="ion-android-search font-size-25"></i></button>
	</div>
{!!Form::close()!!}