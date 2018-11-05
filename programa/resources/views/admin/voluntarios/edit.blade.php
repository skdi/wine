@extends ('layout.admin')
@section ('titulo','Editar Voluntario')
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
        <li class="active">Editar</li>
      </ol>
@endsection
@section ('contenido')

          <!-- general form elements -->
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-7">
                <div class="box box-primary">
                  <div class="box-header with-border">
                 <h3 class="box-title">Editar Voluntario: <b>{{$voluntario->nombre.' '.$voluntario->apellido}}</b> </h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" class="form-group" method="POST" action="/admin/voluntarios/{{$voluntario->id_voluntario}}" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
                  <div class="box-body">
                    <div class="form-group">
                      <label for="">DNI</label>
                      <input type="number" name="dni" class="form-control" min='0' placeholder="{{$voluntario->id_voluntario}}">
                    </div>
                    <div class="form-group">
                      <label for="">Nombre</label>
                      <input type="text" name="nombre" class="form-control"  placeholder="{{$voluntario->nombre}}">
                    </div>
                    <div class="form-group">
                      <label for="">Apellido</label>
                      <input type="text" name="apellido" class="form-control" placeholder="{{$voluntario->apellido}}">
                    </div>
                    <div class="form-group">
                        <label>Area</label>
                        <select class="form-control" name="area">
                          <option>{{$voluntario->area}}</option> 
                          <option>FBI</option>
                          <option>GRD</option>
                          <option>Logística</option>
                          <option>Salud</option>
                          <option>Voluntariado</option>
                          <option>Presidencia</option>
                          <option>Consejo Provincial</option>
                        </select>
                     </div>
                    <div class="form-group">
                        <label>Tipo Voluntario</label>
                        <select class="form-control" name="tipo_voluntario" placeholder="{{$voluntario->tipo}}">
                          <option >{{$voluntario->tipo}}</option> 
                          <option>Administrador</option>
                          <option>Coordinador/Jefe</option>
                          <option>Coordinador_Area</option>
                          <option>Voluntario</option>
                        </select>
                     </div>
                      <div class="form-group">
                        <label>Estado</label>
                       <select class="form-control" name="estado" id="estado">
                            @if ($voluntario->estado==1)
                               <option value="1">Activo</option>
                            
                           @else
                               <option value="0">Inactivo</option>
                           @endif

                          <option value="1">Activo</option>
                          <option value="0">Inactivo</option>
                      </select>
                     </div>
                     <!-- 
                      <div class="form-group">
                        <label for=""> Fotos</label>
                        <input type="file" name="archivo">
                      </div> -->
                  </div>
                  
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
                </form>
                </div>
              </div>
         </div>
@endsection 