@extends ('layout.admin')
@section ('titulo','Ver Servicio')
@section ('barra_lateral')
  @include('admin.servicios.sidebar')
@endsection
@section ('page_header')
  <h1>
      MODULO DE SERVICIOS
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{url('admin/voluntarios')}}">Servicio</a></li>
        <li class="active">Ver Servicio</li>

      </ol>	
@endsection
@section ('contenido')
    <section class="invoice">
      <!-- title row -->
      <div class="row" bgcolor="red">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-medkit"></i><b> Servicio: {{$servicio->nombre}}</b> 
            <small class="pull-right">Fecha: {{$servicio->fecha}} </small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Información de Servicio
          <address>
            <strong></strong><br>
            <b>Contacto: </b>{{$servicio->contacto}}<br> 
            <b>N° Contacto: </b> {{$servicio->numero_contacto}}<br>
            <b>Duracion: </b> {{$servicio->duracion}}<br>
            <b>Creado el: </b> {{$servicio->created_at}}<br>
            <b>Actualizado el: </b> {{$servicio->updated_at}}<br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Encargado
          <address>
             @if ($encargado)
              <strong>Nombre: {{$encargado->nombre.' '.$encargado->apellido}} </strong><br>
              <strong>Telefono: {{$detalle_voluntario->telefono}} </strong><br>
              <strong>Correo: {{$detalle_voluntario->email}} </strong><br>

            @else
              <strong>No asignado</strong>
            @endif
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Ubicacion de Servicio</b><br>
          <br>
          <b>Lugar:</b> {{$servicio->lugar}}<br>
          <b>Hora de Inicio:</b> {{\Carbon\Carbon::createFromFormat('H:i:s',$servicio->hora_inicio)->format('h a') }} <br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <h3>Participantes: </h3>
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Nombres</th>
              <th>Hora_llegada</th>
              <th>Hora_Salida</th>
              <th>Cargo</th>
              <th>Tipo_servicio</th>
              <th>Reemplazo de</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              @foreach( $participantes as $participante)
                  <td>
                    {{$participante->nombre.' '.$participante->apellido}}
                  </td>
                  <td>
                    @if($participante->hora_llegada)
                      {{$participante->hora_llegada}}
                    @else
                     Falta Ingresar
                    @endif

                  </td>
                  <td>
                    @if($participante->hora_salida)
                      {{$participante->hora_salida}}
                    @else
                     Falta Ingresar
                    @endif 
                  </td>
                  <td>
                   @if($participante->tipo_servicio)
                      {{$participante->tipo_servicio}}
                    @else
                     Falta Ingresar
                    @endif
                  </td>
                  <td>
                    @if($participante->cargo)
                      {{$participante->cargo}}
                    @else
                     Falta Ingresar
                    @endif
                  </td>
                  <td>
                    @if($participante->reemplazo_de)
                      {{$participante->reemplazo_de}}
                    @else
                     Falta Ingresar
                    @endif
                  </td>
               <tr>
              @endforeach
             
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-12">
          <p class="lead">Observaciones</p>
           @foreach($comentarios as $comentario)
            <div class="box-footer box-comments">
           
              <div class="box-comment">
                <!-- Para la imagen 
                <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">
                -->
                <div class="comment-text">
                      <span class="username">
                        {{$comentario->nombre.' '.$comentario->apellido}}
                        <span class="text-muted pull-right">{{$comentario->fecha}}</span>
                      </span><!-- /.username -->
                        {{$comentario->comentario}}
                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
            </div>
            @endforeach
        </div>

        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <br>
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
        </div>
      </div>
    </section>

@endsection 