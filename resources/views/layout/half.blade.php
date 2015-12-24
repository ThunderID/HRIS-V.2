<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>HRIS - Reliance</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<link href="/assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="/assets/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"rel="stylesheet">
		<link href="/assets/css/font-awesome.css" rel="stylesheet">
		<link href="/assets/css/style.css" rel="stylesheet">
		<link href="/assets/css/pages/dashboard.css" rel="stylesheet">
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>

	<body>
		@include('component.navbar')

		@include('component.subnavbar')
		
		<div class="main">
			<div class="main-inner">
				<div class="container">
					@yield('content')
				</div>
				<!-- /container --> 
			</div>
			<!-- /main-inner --> 
		</div>
		<!-- /main -->

		<div class="footer">
			<div class="footer-inner">
				<div class="container">
					<div class="row">
						<div class="span12"> &copy; 2015 </div>
						<!-- /span12 --> 
					</div>
					<!-- /row --> 
				</div>
				<!-- /container --> 
			</div>
			<!-- /footer-inner --> 
		</div>
		<!-- /footer --> 

		<!-- Le javascript
		================================================== --> 
		<!-- Placed at the end of the document so the pages load faster --> 
		<script src="/assets/js/jquery-1.7.2.min.js"></script> 
		<script src="/assets/js/excanvas.min.js"></script> 
		<script src="/assets/js/chart.min.js" type="text/javascript"></script> 
		<script src="/assets/js/bootstrap.js"></script>
		<script language="javascript" type="text/javascript" src="/assets/js/full-calendar/fullcalendar.min.js"></script>
		 
		<script src="/assets/js/base.js"></script> 
	</body>
</html>
