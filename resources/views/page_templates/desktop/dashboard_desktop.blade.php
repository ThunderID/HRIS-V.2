<!DOCTYPE html>
<html lang="id">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>HRIS - Administrator</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ elixir('css/dashboard.css') }}" media="screen" title="no title" charset="utf-8">

		<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700,500' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		@yield('css')
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container-fluid">
						<a class="navbar-brand" href="#"><i class="fa fa-th"></i> Menu</a>
						<p class="navbar-text navbar-right" href="#"><i class="fa fa-user"></i> Administrator HRD</p>
			</div>
			<div class="container-fluid">
				<a class="navbar-brand" href="#">Title</a>
				<ul class="nav navbar-nav">
					<li class="active">
						<a href="#">Home</a>
					</li>
					<li>
						<a href="#">Link</a>
					</li>
				</ul>
			</div>
		</nav>
	</body>
</html>
