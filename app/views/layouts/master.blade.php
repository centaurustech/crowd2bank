<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>@yield('title', 'Home Page')</title>
 
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	@yield('meta')
	
	@section('style')
		<link rel="stylesheet" href="{{ URL::asset('assets/styles/app.min.css') }}">
	@show

	<!--[if lt IE 9]>
	    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	
	<!-- App -->
	<script>
		window.App     = window.App || {};
		App.siteURL    = '{{ URL::to("/") }}';
		App.currentURL = '{{ URL::current() }}';
		App.fullURL    = '{{ URL::full() }}';
		App.apiURL     = '{{ URL::to("api") }}';
		App.assetURL   = '{{ URL::to("assets") }}';
	</script>
	
	@yield('script.header')
 
</head>
<body>
	@include('sections/navigation')
	@yield('body')
	@include('sections/footer')

	@section('script.footer')
		<!-- Script Footer -->
		<script>
			var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src='//www.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>
		
	@show
 
</body>
</html>

