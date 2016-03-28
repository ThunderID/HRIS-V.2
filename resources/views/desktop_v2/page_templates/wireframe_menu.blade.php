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
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		@yield('css')
	</head>
	<body class="background-dark-blue font-white">
		@include('desktop_v2.components.navbar_menu')

		@yield('content')
		
		<script type="text/javascript" src="{{ elixir('js/dashboard.js') }}"></script>

		@yield('js')
	</body>
</html>
