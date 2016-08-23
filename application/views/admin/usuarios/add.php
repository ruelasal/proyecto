<div class="container top">
	    <ul class="breadcrumb">
	     <li>
          <a href="<?php echo site_url("sistema"); ?>">
            <?php echo ucfirst($this->uri->segment(1));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li>
          <a href="<?php echo site_url("sistema").'/'.$this->uri->segment(2); ?>">
            <?php echo ucfirst($this->uri->segment(2));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li class="active">
          <a href="#">Nuevo</a>
        </li>
      </ul>



<h1 class="page-header"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h1>
<?php echo $mensaje; ?>
<?php echo validation_errors(); ?>

<?php echo form_open('sistema/addusuario', array('class' => 'form-horizontal', 'name' => 'formulario', 'id' => 'formulario', 'role' => 'form')); ?>
  
  <div class="form-group">
    <label for="usuario" class="col-lg-3 control-label">Usuario:</label>
    <div class="col-lg-3">
      <input type="text" id="usuario" name="usuario" value="<?php echo isset($usuario) ? $usuario : ''; ?>">
    </div>
  </div>
  

  <div class="form-group">
    <label for="password" class="col-lg-3 control-label">Password:</label>
    <div class="col-lg-3">
      <input type="password" id="password" name="password">
    </div>
  </div>

  <div class="form-group">
    <label for="nombre" class="col-lg-3 control-label">Nombre:</label>
    <div class="col-lg-3">
      <input type="text" id="nombre" name="nombre" value="<?php echo isset($nombre) ? $nombre : ''; ?>">
    </div>
  </div>

  <div class="form-group">
    <label for="email" class="col-lg-3 control-label">Email:</label>
    <div class="col-lg-3">
      <input type="text" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
    </div>
  </div>

 <div class="form-group">
    <label for="grupo" class="col-lg-3 control-label">Tipo Usuario:</label>
    <div class="col-lg-3">
      <select name="grupo" id="grupo">
        <option value="100">Administrador</option>
        <option value="50">Vendedor</option>
        <option value="25">Usuario</option>
        <option value="1">Cliente Antiguo</option>
        <option value="2">Cliente nuevo</option>
        <option value="3">Cliente web</option>
        <option value="4">Proveedor</option>
        <option value="5">Cobranza</option>
      </select>
    </div>
  </div>

  
 
  <div class="form-group">
    <div class="col-lg-offset-3 col-lg-10">
      <a class="btn btn-default" href="<?php echo base_url().'sistema/usuarioslista'; ?>">Regresar</a>
      <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-saved"></span> Guardar Usuario</button>
    </div>
  </div>
  <hr/>

<?php echo form_close(); ?>

</div>