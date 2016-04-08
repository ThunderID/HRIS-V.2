<!DOCTYPE html>
<html lang="id">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>HRIS - Administrator</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ elixir('css/dashboard.css') }}" media="screen" title="no title" charset="utf-8">

		<link href='https://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
		{!! Html::style('/assets/css/ionicons.min.css') !!}
<style>
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 12px 16px;
    z-index: 99;
}

.dropdown:hover .dropdown-content {
    display: block;
    z-index: 99;
}
</style>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		@yield('css')
	</head>
	<body class="background-gray-238 font-black">
		@include('desktop_v2.components.navbar_with_menu')

		<section class="padding-top-85">
			@yield('content')
		</section>

		<div class="modal fade bd-example-modal-lg background-blue" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog fullscreen-menu background-blue" >
				<div class="modal-content fullscreen-menu background-blue">
					@include('desktop_v2.components.modal_menu')
				</div>
			</div>
		</div>

		<script type="text/javascript" src="{{ elixir('js/dashboard.js') }}"></script>
		{!! Html::script('/assets/js/slimscroll/jquery.slimscroll.min.js') !!}
		
		@include('plugins.select2')

		<script type="text/javascript">
			hris_menu.init();
		</script>

		@yield('js')
	</body>
</html>
