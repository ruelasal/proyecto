<h1>Validador de XML </h1>
<?php echo validation_errors(); ?>
<?php echo $error; ?>
<?php echo form_open_multipart('utilerias/validaxml', array('class' => 'form-horizontal', 'name' => 'formulario', 'id' => 'formulario', 'role' => 'form')); ?>

	<label for="name" class="">Subir XML a validar</label><br>
	<input type="file" name="xml" id="xml" ><br>
	<input type="submit" class="" value="Validar">

<?php echo form_close(); ?>