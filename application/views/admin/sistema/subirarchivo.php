<h1>Subir archivo a la base de datos </h1>
<?php echo validation_errors(); ?>
<?php echo $error; ?>
<?php echo form_open_multipart('utilerias/subirarchivo', array('class' => 'form-horizontal', 'name' => 'formulario', 'id' => 'formulario', 'role' => 'form')); ?>

	<label for="name" class="">Subir Archivo</label><br>
	<input type="file" name="xml" id="xml" ><br>
	<input type="submit" class="" value="Subir">

<?php echo form_close(); ?>