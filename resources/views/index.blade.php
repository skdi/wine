@extends('layouts.wine')

@section('content')
	
	<div class="imagenes">
		<figure>
			<img src="{{URL::asset('/img/almacen.jpg')}}" alt="" class="">
		</figure>
		<figure>
			<img src="{{URL::asset('/img/BD.jpg')}}" alt="" class="">
		</figure>
		<figure>
			<img src="{{URL::asset('/img/control.jpg')}}" alt="" class="">
		</figure>
		<figure>
			<img src="{{URL::asset('/img/controlVentas.jpg')}}" alt="" class="">
		</figure>

	</div>
	<!--
	<div class="contenido">
		<img src="{{URL::asset('/img/menu.png')}}" alt="" class="menu-bar"> 
	</div>
	-->
@endsection