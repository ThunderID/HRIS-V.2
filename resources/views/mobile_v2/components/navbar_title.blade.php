<!-- 
Title
==================================== -->
<div class="background-white secondary-navbar-fixed margin-bottom-0 font-size-12 {{(isset($padding_bottom) ? $padding_bottom : '')}} {{(isset($padding_top) ? $padding_top : '')}} {{(isset($padding_left) ? $padding_left : '')}}">
	@if(!isset($action_area) || !$action_area)
		<a href="" class="link-black text-uppercase"> {{$page_attributes->page_title}} </a>
	@else
		@yield('action_area')
	@endif
</div>

<div class="padding-top-58 font-size-18">&nbsp;</div>

<!--
End Title
==================================== -->
