@extends ('layout.admin')
@section ('titulo','Crear voluntario')
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
        <li class="active">Crear Registro</li>
      </ol>
@endsection
@section ('contenido')
          @if ($errors->any())
             <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-bell-slash-o"></i> No estas insertando algunos datos!</h4>
                </ul>  
                    @foreach($errors->all() as $error)
                     <p>{{$error}}</p> 
                    @endforeach
                <ul>
              </div>

          @endif
         
          <!-- general form elements -->
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-7">
                <div class="box box-primary">
                  <div class="box-header with-border">
                 <h3 class="box-title">Crear Voluntario</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" class="form-group" method="POST" action="/admin/voluntarios/">
                  @csrf
                  <div class="box-body">
                    @include('admin.voluntarios.form')
                  </div>
                  
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                  </div>
                </form>
                </div>
              </div>
         </div>
@endsection 