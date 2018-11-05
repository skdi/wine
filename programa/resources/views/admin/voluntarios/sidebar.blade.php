<ul class="sidebar-menu" data-widget="tree">
        <li class="header">FUNCIONES</li>
        <!-- Optionally, you can add icons to the links -->
        <li ><a href="{{url('admin')}}"><i class="fa fa-home fa-fw"></i> <span>Inicio</span></a></li>
        <li class="active" ><a href="{{url('admin/voluntarios')}}"><i class="fa fa-users"></i> <span>Voluntarios</span></a></li>
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