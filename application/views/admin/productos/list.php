<div class="container top">
  
        <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("productos"); ?>">
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
          <?php echo ucfirst($this->uri->segment(2));?> 
          <a  href="<?php echo site_url("productos").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Nuevo producto</a>
        </h2>
      </div>
    <div class="row">
      <div class="sapn12 columns">

      <div class="well">
                   <?php echo validation_errors(); ?>
        <?php echo form_open('/productos/verproductos', array('class' => 'form-inline', 'name' => 'formulario', 'id' => 'formulario', 'role' => 'form')); ?>
      
        <div class="form-group">
          <label class="sr-only">Busqueda</label>
          <p class="form-control-static">Buscar</p>
        </div>
         <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Descripcion">
         <input type="submit" class="btn btn-default" value="Buscar">
      
      <?php echo form_close(); ?>

            </div>


        <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="header">#</th>
                <th class="yellow header headerSortDown">Codigo</th>
                <th class="green header">Descripcion</th>
                <th class="red header">Unidad</th>
                <th class="red header">Existencia</th>
                <th class="red header">Precio</th>
                <th class="red header">Imagen Principal</th>
                <th class="red header">Imagen Miniatura</th>
                <th class="red header">Familia</th>
                <th class="red header">Marca</th>
                <th class="red header">Fecha Registro</th>
                <th class="red header">Fecha ultima modificacion</th>
                <th class="red header">Usuario que lo modifica</th>
                <th class="red header">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($productos as $row)
              {
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['codigo'].'</td>';
                echo '<td>'.$row['descripcion'].'</td>';
                echo '<td>'.$row['unidad'].'</td>';
                echo '<td>'.$row['existencia'].'</td>';
                echo '<td>'.$row['precio'].'</td>';
                echo '<td>'.$row['idimagen'].'</td>';
                echo '<td>'.$row['miniatura'].'</td>';
                echo '<td>'.$row['idfamilia'].'</td>';
                echo '<td>'.$row['idmarca'].'</td>';
                echo '<td>'.$row['fecharegistro'].'</td>';
                echo '<td>'.$row['fecharegistro'].'</td>';
                echo '<td>'.$row['idusuario'].'</td>';
                echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/productos/update/'.$row['id'].'" class="btn btn-info">Ver y editar</a>  
                  <a href="'.site_url("admin").'/productos/delete/'.$row['id'].'" class="btn btn-danger">Eliminar</a>
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