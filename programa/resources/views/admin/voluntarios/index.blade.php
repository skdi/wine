@extends ('layout.admin')
@section ('titulo','Voluntarios')
@section ('servicios')
  3
@endsection
@section ('barra_lateral')
  @include('admin.voluntarios.sidebar')
@endsection
@section ('page_header')
  <h1>
        MODULO DE VOLUNTARIOS
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active"><a href="{{url('admin/voluntarios')}}">Voluntarios</a></li>
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
                    <div class="small-box bg-red">
                      <div class="inner">
                        <h3>{{sizeof($voluntarios)}}
                        </h3>

                        <p>Voluntarios Registrados</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person-add"></i>
                      </div>
                      <a href="{{url('admin/voluntarios/create')}}" class="small-box-footer">
                        Crear Voluntario <i class="fa fa-plus-circle"></i>
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
                  <th>DNI</th>
                  <th>NOMBRE</th>
                  <th>APELLIDO</th>
                  <th>AREA</th>
                  <th>ESTADO</th>
                  <th>TIPO VOLUNTARIO</th>
                  <th>VER PERFIL</th>
                  <th>EDITAR</th>
                  <th>ELIMINAR</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($voluntarios as $voluntario)
                      <tr>
                        <td>{{ $voluntario->id_voluntario }}</td>
                        <td>{{ $voluntario->nombre }}</td>
                        <td>{{ $voluntario->apellido }}</td>
                        <td>{{ $voluntario->area }}</td>
                        <td>
                           @if ($voluntario->estado==1)
                              <span class="badge bg-green">Activo</span>
                            
                           @else
                              <span class="badge bg-red">Inactivo</span>
                           @endif
                        </td>
                        <td>{{ $voluntario->tipo }}</td>
                        <td><a href="/admin/voluntarios/{{$voluntario->id_voluntario}}" class="btn btn-primary"><i class="fa fa-id-card"></i> </a></td>
                        <td><a href="/admin/voluntarios/{{$voluntario->id_voluntario}}/edit" class="btn btn-success"><i class="fa fa-edit"></i> </a></td>
                        <td>
                           @if ($voluntario->estado==0)
                              <center><strong>-</strong></center>
                           @else
                            {!! Form::open([ 'route' => ['voluntarios.destroy', $voluntario->id_voluntario], 'method' => 'DELETE']) !!}
                              {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                           @endif

                        </td>
                      </tr>
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