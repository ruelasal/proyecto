<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>"><?php echo NOMBRE_EMPRESA; ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        

        <li class="<?php echo activate_menu('admin'); ?> dropdown">
          <a href="<?php echo base_url(); ?>admin" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pedidos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url(); ?>admin">Nuevo</a></li>
            <li><a href="#">Editar</a></li>
            <li><a href="#">Eliminar</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Listar pedidos</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Ver pedidos surtidos</a></li>
          </ul>
        </li>

        <li class="<?php echo activate_menu('productos'); ?> dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Productos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url(); ?>productos">Nuevo</a></li>
            <li><a href="#">Editar</a></li>
            <li><a href="#">Eliminar</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url(); ?>productos/verproductos">Listar productos</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Ver productos activos</a></li>
            <li><a href="#">Ver productos inactivos</a></li>
          </ul>
        </li>        

        <li class="<?php echo activate_menu('admin'); ?> dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categorias <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Nuevo</a></li>
            <li><a href="#">Editar</a></li>
            <li><a href="#">Eliminar</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Listar catergorias</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Ver</a></li>
          </ul>
        </li>


        <li class="<?php echo activate_menu('admin'); ?> dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Etiquetas <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Nuevo</a></li>
            <li><a href="#">Editar</a></li>
            <li><a href="#">Eliminar</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Listar etiquetas</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Ver</a></li>
          </ul>
        </li>


        <li class="<?php echo activate_menu('admin'); ?> dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Nuevo</a></li>
            <li><a href="#">Editar</a></li>
            <li><a href="#">Eliminar</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Listar </a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Ver</a></li>
          </ul>
        </li>  


        <li class="<?php echo activate_menu('admin'); ?> dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Noticias <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Nuevo</a></li>
            <li><a href="#">Editar</a></li>
            <li><a href="#">Eliminar</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Listar </a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Ver</a></li>
          </ul>
        </li>


        <li class="<?php echo activate_menu('admin'); ?> dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Documentos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Nuevo</a></li>
            <li><a href="#">Editar</a></li>
            <li><a href="#">Eliminar</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Listar </a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Ver</a></li>
          </ul>
        </li>               


        <li class="<?php echo activate_menu('utilerias'); ?> dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Utilerias <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url(); ?>utilerias/formxml">Vallida Xml</a></li>
            <li><a href="<?php echo base_url(); ?>utilerias/forarchiv">Subir Archivos</a></li>
            <li><a href="#">Subir Imagenes</a></li>
            <li><a href="#">Respaldar</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Listar </a></li>
            <li><a href="<?php echo base_url(); ?>utilerias/verxmls">Listar Xml</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Ver</a></li>
          </ul>
        </li>               



      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li class="<?php echo activate_menu('usuarios'); ?> "><a href="<?php echo base_url(); ?>usuarios"><?php echo $usuario; ?> <span class="badge">42</span></a></li>
        <li class="<?php echo activate_menu('sistema'); ?> dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sistema <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url(); ?>sistema/addusuario">Nuevo usuario</a></li>
            <li><a href="<?php echo base_url(); ?>sistema/edituser">Editar usuario</a></li>
            <li><a href="#">Nuevo Slider</a></li>
            <li><a href="#">Editar Slider</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url(); ?>sistema/usuarioslista">Listar usuarios</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Configuracion</a></li>
            <li><a href="<?php echo base_url(); ?>admin/cerrar_sesion">Salir</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>