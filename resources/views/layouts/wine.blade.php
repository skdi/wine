<!DOCTYPE html>
<html>
<head>
	<title>Wine- @yield('title')</title>
	<link href="{{ asset('css/index.css') }}" rel="stylesheet">
	<script src="{{ asset('js/menu.js') }}" defer></script>
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	@yield('head')
</head>
<body>
	<div class="barra">
		<h2>WINE </h2>
	</div>
	<div class="sidebar">
		<h2>MENU</h2>
		<ul>
			<li><a href="">Inicio</a></li>
			<li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
			<li><a href="{{ route('register') }}">Registrarse</a></li>
			<li><a href="">Contactenos</a></li>
	        <li><a href="">Siguenos</a></li>
		</ul>
	</div>
	<div class="contenido">
		@yield('content')
	</div>
</body>
</html>