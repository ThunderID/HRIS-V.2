<!-- 
Breadcrumb
==================================== -->
<div class="row padding-0 background-white"> 
	<div class="col-sm-8"> 
		<ul class="breadcrumb margin-bottom-0 font-size-12 text-uppercase {{(isset($padding_bottom) ? $padding_bottom : '')}} {{(isset($padding_top) ? $padding_top : '')}} {{(isset($padding_left) ? $padding_left : '')}}">
		    <li>
		    	<a href="{{route('org.index')}}" class="link-black"><i class="ion-home"></i> Home</a>
		    </li>
		    @forelse($page_attributes->breadcrumb as $name => $route)
			    <li>
		    		<a href="{{$route}}" class="link-black">{{$name}}</a>
			    </li>
			@empty
			@endforelse
		</ul>
	</div>
	<div class="col-sm-4 padding-top-53 text-xs-right margin-left-negative-15"> 
	    @yield('action_area')
	</div>
</div>

<!--
End Breadcrumb
==================================== -->
