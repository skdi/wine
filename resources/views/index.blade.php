@extends('layouts.wine')

@section('content')
	<div class="barra">
		<h2>WINE :D</h2>
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
	<div class="imagenes">
		<figure>
			<img src="{{URL::asset('/img/1.jpg')}}" alt="" class="">
		</figure>
		<figure>
			<img src="{{URL::asset('/img/1.jpg')}}" alt="" class="">
		</figure>
		<figure>
			<img src="{{URL::asset('/img/1.jpg')}}" alt="" class="">
		</figure>
		<figure>
			<img src="{{URL::asset('/img/1.jpg')}}" alt="" class="">
		</figure>
	</div>
	<!--
	<div class="contenido">
		<img src="{{URL::asset('/img/menu.png')}}" alt="" class="menu-bar"> 
	</div>
	-->
@endsection