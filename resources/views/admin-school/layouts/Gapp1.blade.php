<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		@include('include.head')
		<meta charset="utf-8">
		<title>{{ __("lang.admin school") }}	</title>
		<link rel="stylesheet" type="text/css" href="css\CSS\reset.css">
		<link rel="stylesheet" type="text/css" href="css\CSS\stayl.css">
	</head>
	<body>
		<div id="app">
            @include('include.nav')
            <main class="py-4">
				</div>
				<div id="con">
					<div id="menu">
						<form action="{{ route('logoutSchool') }}" method="POST" class="">
							@csrf
							<input type="submit" class="" value="logout">
						</form>
						
						<!--<h1 id="name"> نظام المتابعة المدرسي  </h1>-->
						<a href="#" class="name">ghadajameel66@gmail.com‬‏</a>
						<ul class="menu-all">
						

							<li class="menu-item"> <a href="#"> Login </a></li>
							<li class="menu-item"> <a href="#"> Contact </a></li>
							<li class="menu-item"> <a href="#">  About </a></li>
							<li class="menu-item"> <a href="#">  Home  </a></li>
							
						</ul>
					</div>
				</div>
				<!--Hero img-->
				<div id="Hero">
					<img
					class="hero-img"
					src="Img\Hero.jpg"
					width="700px"
					height="500px"
					>
				</div>
				<!--Welcom-->
				<div id="About">
					<h1>اهلاً بكم </h1>
					<div>
						<p class="p">
							النظام يقوم بإدارة نظام المدرسة ويقوم بربط عدة جهات تقوم بتسهيل المتابعة للطالب <br>
							مثل المشرف و ولي الامر والمدرس والمسئول المالي والاخصائية الاجتماعية والإدارة<br>
							بحيث تسهل على ولي الامر متابعة الطالب بشكل يومي<br>
							.وابلاغه بكل ما قد يحصل بشكل سريع
						</p>
						<img class="About-img" src="Img\1.png"> 
					</div>
					<!--log in-->
					<div id="row">
						<div class="col-3-1">
							<a href="#">تسجيل الدخول  </a>
						</div>
						<div class="col-3-2">
							<a href="#"> التواصل معنا  </a> 
						</div>
						<div class="col-3-3">
							<a href="#"> أضافة اشتراك مدرسة جديدة  </a>
						</div>
					</div>
					<!--end-->
					<div id="end">
						<img class="end-img" src="Img\icon.png" width="300px">
					</div>
				</div>
            </main>
	</body>
	@include('include.end')
</html>