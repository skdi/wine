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
		<h2>Wine N Bread Corporation  </h2>
	</div>
	<div class="sidebar">
		<h2>Menú</h2>
		<ul>
			<li><a href="{{ url('wine') }}">Inicio</a></li>
			 @guest
			 	<li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
				<li><a href="{{ route('register') }}">Registrarse</a></li>
			 	
			 @else 
				<li><a href="{{ route('logout') }}"onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Deseas salir {{ Auth::user()->name }}</a></li>
			 	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			@endif
			<li><a href="">Contactenos</a></li>
	        <li><a href="">Siguenos</a></li>
		</ul>
	</div>
	<div class="Gcontenido">
		<div class="contenido">
			@yield('content')
		</div>
	</div>
</body>
</html>