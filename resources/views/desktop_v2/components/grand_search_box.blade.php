{!! Form::open(['method' => 'GET']) !!}
	<div class="container-search-box">
		<input type="search" class="{{$background_search_box}} {{$font_search_box}}" id="search" name="{{$search_name}}" placeholder="{{$search_placeholder}}" />
		<button class="icon {{$background_search_box}} {{$font_search_box}}"><i class="ion-android-search font-size-25"></i></button>
	</div>
{!!Form::close()!!}