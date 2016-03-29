<!-- 
Breadcrumb
==================================== -->
<ul class="breadcrumb background-white margin-bottom-0 font-size-12 text-uppercase {{(isset($padding_bottom) ? $padding_bottom : '')}} {{(isset($padding_top) ? $padding_top : '')}} {{(isset($padding_left) ? $padding_left : '')}}">
    <li>
    	<a href="#" class="link-black"><i class="ion-home"></i> Home</a>
    </li>
    @yield('breadcrumb')
</ul>

<!--
End Breadcrumb
==================================== -->
