<div class="container top">
	
	      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("sistema"); ?>">
            <?php echo ucfirst($this->uri->segment(1));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li class="active">
          <?php echo ucfirst($this->uri->segment(2));?>
        </li>
      </ul>

      <div class="page-header users-header">
        <h2>
          <?php echo ucfirst($this->uri->segment(1));?> 
          <a  href="<?php echo site_url("").$this->uri->segment(1); ?>/addusuario" class="btn btn-success">Nuevo usuario</a>
        </h2>
      </div>
		<div class="row">
			<div class="sapn12 columns">

			<div class="well">
                   <?php echo validation_errors(); ?>
        <?php echo form_open('/sistema/usuarioslista', array('class' => 'form-inline', 'name' => 'formulario', 'id' => 'formulario', 'role' => 'form')); ?>
      
        <div class="form-group">
          <label class="sr-only">Busqueda</label>
          <p class="form-control-static">Buscar</p>
        </div>
         <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Nombre/Correo/Usuario">
         <input type="submit" class="btn btn-default" value="Buscar">
      
      <?php echo form_close(); ?>

          	</div>



		    <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="header">#</th>
                <th class="yellow header headerSortDown">Usuario</th>
                <th class="green header">Nombre</th>
                <th class="red header">Correo</th>
                <th class="red header">Grupo</th>
                <th class="red header">Perfil</th>
                <th class="red header">Fecha Registro</th>
                <th class="red header">Fecha ultima modificacion</th>
                <th class="red header">Accion</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($usuarios as $row)
              {
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['usuario'].'</td>';
                echo '<td>'.$row['idnombre'].'</td>';
                echo '<td>'.$row['email'].'</td>';
                echo '<td>'.$row['grupo'].'</td>';
                echo '<td>'.$row['perfil'].'</td>';
                echo '<td>'.$row['fecharegistro'].'</td>';
                echo '<td>'.$row['fecharegistro'].'</td>';
                echo '<td class="crud-actions">
                  <a href="'.site_url("usuarios").'/usuarios/edituser/'.$row['id'].'" class="btn btn-info">Ver y editar</a>  
                  <a href="'.site_url("usuarios").'/usuarios/delete/'.$row['id'].'" class="btn btn-danger">Eliminar</a>
                </td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
          </table>
            
              
          <div class="row">
            <div class="col-md-12">
              <nav>
                <ul class="pagination">
                <?php echo $links; ?>
                </ul>
              </nav>
            </div>
          </div>
              
            
				
			</div>
		</div>

</div><!--Container top-->