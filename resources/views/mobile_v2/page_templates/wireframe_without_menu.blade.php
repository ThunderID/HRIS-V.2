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
		{!! Html::style('http://ionicons.com/css/ionicons.min.css?v=2.0.1') !!}

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		@yield('css')
	</head>
	<body class="background-gray-238 font-black">
		@include('mobile_v2.components.navbar_plain')

		@include('mobile_v2.components.navbar_title', ['padding_top' => 'padding-top-58', 'padding_left' => 'padding-left-15', 'padding_bottom' => 'padding-bottom-6'])
		
		@yield('content')
		
		<div class="modal fade private-menu-modal padding-top-58 padding-left-35 padding-right-50" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog background-white height-300" style="width:calc(100% - 5px);">
				<div class="modal-content background-white height-300">
					@include('mobile_v2.components.private_menu')
				</div>
			</div>
		</div>
		
		<script type="text/javascript" src="{{ elixir('js/dashboard.js') }}"></script>
		@include('plugins.select2')

		@yield('js')

		<script type="text/javascript">
			hris_private_menu.init();
		</script>

	</body>
</html>
