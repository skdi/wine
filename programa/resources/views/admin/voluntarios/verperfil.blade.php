@extends ('layout.admin')
@section ('titulo','Ver perfil Voluntario')
@section ('barra_lateral')
  @include('admin.voluntarios.sidebar')
@endsection
@section ('page_header')
  <h1>
      MODULO DE VOLUNTARIOS
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{url('admin/voluntarios')}}">Voluntarios</a></li>
        <li class="active">Ver perfil</li>

      </ol>	
@endsection
@section ('contenido')
      <div class="row">
        <!-- /.col -->
                <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">{{$voluntario->nombre}} {{$voluntario->apellido}}
              </h3>
              <p class="text-muted text-center">{{$voluntario->tipo}}</p>

   
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Acerca de {{$voluntario->nombre}} {{$voluntario->apellido}} </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Correo</strong>

              <p class="text-muted">
                {{$detalle_voluntario->email}}
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Sexo</strong>

              <p class="text-muted">{{$detalle_voluntario->sexo}}</p>
              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Teléfono</strong>

              <p>{{$detalle_voluntario->telefono}}</p>
              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Dirección</strong>

              <p>{{$detalle_voluntario->direccion}}</p>
              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Año de Graduación</strong>

              <p>{{$detalle_voluntario->año_graduacion}}</p>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#servicio" data-toggle="tab">Servicios</a></li>
              <li><a href="#horas_servicio" data-toggle="tab">Horas en Servicio</a></li>
              <li><a href="#Configuracion" data-toggle="tab">Configuracion</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="servicio">
               
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="horas_servicio">
                <div class="box">
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Servicio</th>
                  <th>Progreso</th>
                  <th style="width: 40px">Horas</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>Salud</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-danger" style="width: {{ $horas_servicio->servicio_salud* 100/50 }}%"></div>
                    </div>
                  </td>
                  <td><center><span class="badge bg-red">{{$horas_servicio->servicio_salud}}</span></center></td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>Logística</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                    </div>
                  </td>
                  <td><center></center><span class="badge bg-yellow">{{$horas_servicio->servicio_almacen}}</span></td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Interno</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                    </div>
                  </td>
                  <td><center></center><span class="badge bg-light-blue">{{$horas_servicio->servicio_interno}}</span></td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Externo</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-success" style="width: %"></div>
                    </div>
                  </td>
                  <td><center></center><span class="badge bg-green">{{$horas_servicio->servicio_externo}}</span></td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="Configuracion">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Correo</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
@endsection 