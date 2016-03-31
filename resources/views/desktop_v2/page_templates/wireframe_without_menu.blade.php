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
		<link rel="stylesheet" href="http://ionicons.com/css/ionicons.min.css?v=2.0.1">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		@yield('css')
	</head>
	<body class="background-gray-238 font-black">
		@include('desktop_v2.components.navbar_plain')

		@include('desktop_v2.components.breadcrumb', ['padding_top' => 'padding-top-58', 'padding_left' => 'padding-left-15', 'padding_bottom' => 'padding-bottom-6', 'padding_top_action' => 'padding-top-53'])
		
		@yield('content')
		
		<script type="text/javascript" src="{{ elixir('js/dashboard.js') }}"></script>
		@include('plugins.select2')

		@yield('js')

	</body>
</html>
