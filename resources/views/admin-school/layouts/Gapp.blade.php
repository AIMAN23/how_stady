<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		{{-- @include('include.head') --}}
		<meta charset="utf-8">
		<title>{{ __("lang.admin school") }}	</title>
		{{-- <title>Azure by TEMPLATED</title> --}}
		{{-- <meta http-equiv="content-type" content="text/html; charset=utf-8" /> --}}
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" rel="stylesheet" type="text/css" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> --}}
		<script src="{{ asset('/azure/js/jquery.min.js') }}"></script>
		<script src="{{ asset('/azure/js/skel.min.js') }}"></script>
		<script src="{{ asset('/azure/js/skel-panels.min.js') }}"></script>
		<script src="{{ asset('/azure/js/init.js') }}"></script>
		<noscript>
			<link rel="stylesheet" type="text/css" href="css/skel-noscript.css" >
			<link rel="stylesheet" type="text/css" href="css/style.css" >
			<link rel="stylesheet" type="text/css" href="css/style-desktop.css" >
		</noscript>
	</head>
	<body>
		<div id="skel-panels-pageWrapper" style="position: relative; left: 0px; right: 0px; top: 0px; backface-visibility: hidden; transition: -webkit-transform 0.25s ease-in-out 0s; transform: translate(0px, 0px); z-index: auto;">
			<div id="header-wrapper">
				<div class="container">
					<div id="header">
						<div id="logo">
							<h1><a href="#">Azure</a></h1>
							<p>by TEMPLATED</p>
						</div>
						<nav id="nav">
							<ul>
								<li class="current_page_item"><a href="index.html">Homepage</a></li>
								<li><a href="threecolumn.html">Three Column</a></li>
								<li><a href="twocolumn1.html">Two Column #1</a></li>
								<li><a href="twocolumn2.html">Two Column #2</a></li>
								<li><a href="onecolumn.html">One Column</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
			<!--  -->
			<div id="wrapper">
				<div class="container" id="welcome">
					<div class="row">
						<div class="12u">
							<section class="content">
								<h2>Integer gravida nibh quis urna</h2>
								<p>This is <strong>Azure</strong>, a responsive HTML5 site template freebie by <a href="http://templated.co">TEMPLATED</a>. Released for free under the <a href="http://templated.co/license">Creative Commons Attribution</a> license, so use it for whatever (personal or commercial) – just give us credit! Check out more of our stuff at <a href="http://templated.co">our site</a> or follow us on <a href="http://twitter.com/templatedco">Twitter</a>.</p>
								<p>&nbsp;</p>
								
								<p><a href="#" class="button-style1">Read Full Article</a></p>
							</section>
						</div>
					</div>
				</div>
			</div>
			<!--  -->
			<div class="container" id="copyright">
				Design: <a href="http://templated.co">TEMPLATED</a> Images: <a href="http://unsplash.com">Unsplash</a> (<a href="http://unsplash.com/cc0">CC0</a>)
			</div>
		</div>
	</body>
</html>