@extends ('layout.admin') <!--- -->
@section ('titulo')
  {{$titulo}}
@endsection
@section ('barra_lateral')
<ul class="sidebar-menu" data-widget="tree">
        <li class="header">FUNCIONES</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active" ><a href="{{url('admin')}}"><i class="fa fa-home fa-fw"></i> <span>Inicio</span></a></li>
        <li ><a href="{{url('admin/voluntarios')}}"><i class="fa fa-users"></i> <span>Voluntarios</span></a></li>
        <li ><a href="#"><i class="fa fa-building"></i> <span>Areas</span></a></li>
         <li class="treeview">
          <a  href="{{url('admin/servicios')}}"><i class="fa fa-ambulance"></i> <span>Servicios</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/servicios')}}">Ver Servicios</a></li>
            <li><a href="#">Mis servicios</a></li>
            <li><a href="#">Observaciones</a></li>
            <li><a href="#">Validar Servicios</a></li>
            <li><a href="#">Validar Horas</a></li>

          </ul>
        </li>
        <li><a href="#"><i class="fa fa-bar-chart"></i> <span>Reportes</span></a></li>
</ul>
@endsection
@section ('page_header')
 @include('admin.quota')
  <div class="alert alert-danger">
                <h4><center><i class="icon fa fa-align-center"></i>{{$titulo}}</center></h4>
  </div>
  </h1>
@endsection
@section ('contenido')
<div class="row" >

        <div class="col-lg-4 col-xs-4">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3>{{$servicios}}</h3>

               <strong><p>Servicios Totales</p></strong>
            </div>
            <div class="icon">
              <i class="ion ion-earth""></i>
            </div>
            <a href="{{url('admin/servicios')}}" class="small-box-footer">Ir a ello <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-4">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$voluntarios}}</h3>

              <strong><p>Voluntarios Totales</p></strong>
            </div>
            <div class="icon">
              <i class="ion ion-android-people"></i>
            </div>
            <a href="{{url('admin/voluntarios')}}" class="small-box-footer">Ir a ello<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      <!-- -->
      <div class="col-lg-4 col-xs-4">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$voluntarios}}</h3>

               <strong><p>Mis servicios</p></strong>
            </div>
            <div class="icon">
              <i class="ion ion-medkit"></i>
            </div>
            <a href="{{url('admin/voluntarios')}}" class="small-box-footer">Ir a ello <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div>

</div>
@endsection