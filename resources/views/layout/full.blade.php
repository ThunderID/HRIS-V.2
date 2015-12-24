<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>HRIS - Reliance</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes"> 

		<link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="/assets/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

		<link href="/assets/css/font-awesome.css" rel="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
		
		<link href="/assets/css/style.css" rel="stylesheet" type="text/css">
		<link href="/assets/css/pages/signin.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
			
					<a class="brand" href="index.html">
						HRIS - Reliance
					</a>
				</div> <!-- /container -->
			</div> <!-- /navbar-inner -->
		</div> <!-- /navbar -->

		@yield('content')
		
		<script src="/assets/js/jquery-1.7.2.min.js"></script>
		<script src="/assets/js/bootstrap.js"></script>
		<script src="/assets/js/signin.js"></script>
	</body>
</html>