<div class="container top">
	
	      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("utilerias"); ?>">
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
          <a  href="<?php echo site_url("").$this->uri->segment(1); ?>/formxml" class="btn btn-success">Subir XML</a>
        </h2>
      </div>
		<div class="row">
			<div class="sapn12 columns">

			<div class="well">
                   <?php echo validation_errors(); ?>
        <?php echo form_open('/utilerias/verxmls', array('class' => 'form-inline', 'name' => 'formulario', 'id' => 'formulario', 'role' => 'form')); ?>
      
        <div class="form-group">
          <label class="sr-only">Busqueda</label>
          <p class="form-control-static">Buscar</p>
        </div>
         <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Numero/Descripcion">
         <input type="submit" class="btn btn-default" value="Buscar">
      
      <?php echo form_close(); ?>

          	</div>



		    <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="header">#</th>
                <th class="yellow header headerSortDown">Nombre</th>
                <th class="green header">Subido el</th>
                <th class="red header">Ultima modificacion</th>
                <th class="red header">Usuario</th>
                <th class="red header">Tipo</th>
                <th class="red header">ruta</th>
                <th class="red header">Fecha ultima modificacion</th>
                <th class="red header">Accion</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($docfis as $row)
              {
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['nombre'].'</td>';
                echo '<td>'.$row['fecharegistro'].'</td>';
                echo '<td>'.$row['fecharegistro'].'</td>';
                echo '<td>'.$row['idusuario'].'</td>';
                echo '<td></td>';
                echo '<td>'.$row['ruta'].'</td>';
                echo '<td>'.$row['fecharegistro'].'</td>';
                echo '<td class="crud-actions">
                  <a href="'.site_url("utilerias").'/descargapdf/'.$row['id'].'" class="btn btn-info">Descargar Pdf</a><br><br>  
                  <a href="'.site_url("utilerias").'/descargarxml/'.$row['id'].'" class="btn btn-danger">Descargar Xml</a>
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