@extends ('layout.admin')
@section ('titulo','Servicios')
@section ('servicios')
  3
@endsection
@section ('barra_lateral')
  @include('admin.servicios.sidebar')
@endsection
@section ('page_header')
  <h1>
        MODULO DE SERVICIOS
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active"><a href="{{url('admin/servicios')}}">Servicios</a></li>
      </ol>
@endsection
@section ('contenido')
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <div class="row">
                  <div class="col-lg-12 col-xs-2">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                      <div class="inner">
                        <h3>{{sizeof($servicios)}}
                        </h3>

                        <p>Servicios Registrados</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-medkit"></i>
                      </div>
                      <a href="{{url('admin/voluntarios/create')}}" class="small-box-footer">
                        Crear Servicio <i class="fa fa-plus-circle"></i>
                      </a>
                    </div>
                  </div>
                </div>  
                  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead class="thead-light">
                <tr>
                  <th>NOMBRE</th>
                  <th>FECHA</th>
                  <th>hora_inicio</th>
                  <th>AREA</th>
                  <th><center>ESTADO</center> </th>
                  <th><center>VER INFORMACION</center> </th>
                  <th>EDITAR</th>
                  <th>ELIMINAR</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($servicios as $servicio)
                    @if ($servicio->estado!=0)
                      <tr class="table-primary">
                        <td>{{ $servicio->nombre }}</td>
                        <td>{{ $servicio->fecha}}</td>
                        <td>{{\Carbon\Carbon::createFromFormat('H:i:s',$servicio->hora_inicio)->format('h a') }} </td>
                        <td>{{ $servicio->area }}</td>
                        <td><center>
                           @if ($servicio->estado==1)
                              <span class="badge bg-yellow">Sin Validar</span>
                            
                           @else
                              <span class="badge bg-red">Inactivo</span>
                           @endif
                        </center></td>
                        <td><center><a href="/admin/servicios/{{$servicio->id_servicio}}" class="btn btn-primary"><i class="fa fa-info"></i> </a></center></td>
                        <td><a href="/admin/servicios/{{$servicio->id_servicio}}/edit" class="btn btn-success"><i class="fa fa-edit"></i> </a></td>
                        <td>
                            {!! Form::open([ 'route' => ['servicios.destroy', $servicio->id_servicio], 'method' => 'DELETE']) !!}
                              {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                      </tr>
                    @endif
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
@endsection