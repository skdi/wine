<!DOCTYPE html>
<html>
<head>
	<title>Wine- @yield('title')</title>
	<link href="{{ asset('css/index.css') }}" rel="stylesheet">
	<script src="{{ asset('js/menu.js') }}" defer></script>
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
</head>
<body>
	@yield('content')
</body>
</html>