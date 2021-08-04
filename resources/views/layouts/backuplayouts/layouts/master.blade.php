<!doctype html>
<html class="no-js" lang="eng">
<head>
<title>: {{@$title}}</title>

	<!-- head Data  included -->
	@include('layouts/head')
	<!-- stylesheets included -->
</head>

<body>

	<!-- header included -->
	@include('layouts/header')
	<!-- header included -->
	
	<!--center area section -->
	@yield('content')
	<!--center area section -->	
		
	<!-- footer included -->
	@include('layouts/footer')
	<!-- footer included -->
	
	<!-- popups Included -->
	@include('layouts/popups')
	<!-- popups Included -->
	
	<!-- external plugins included -->
	@include('layouts/plugins')
	<!-- external plugins included -->
	
</body>

</html>