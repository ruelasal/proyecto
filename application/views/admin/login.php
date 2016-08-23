<div class="container">
	<div class="col-xs-12">
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<nav class="navbar navbar-inverse"><h2 class="title text-center blanco">Incia secion o Recupera tu contraseña</h2></nav>
				<div class="col-sm-5 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Inicia seccion con tu usuario</h2>
						<?php echo validation_errors(); ?>
						<?php echo form_open('admin/login'); ?>
							<label for="usuario" class="col-sm-2 control-label">Usuario</label>
							<input name="usuario" class="form-control" type="text" id="Usuario" placeholder="Usuario" />
							<label for="password" class="col-sm-2 control-label">Password</label>
							<input name="password" class="form-control" type="password" id="Password" placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Recordar contraseña
							</span>
								<button type="submit" class="btn btn-default">Inicia</button>
						<?php echo form_close(); ?>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">o</h2>
				</div>
				<div class="col-sm-5">
					<div class="signup-form"><!--sign up form-->
						<h2>Recura contraseña</h2>
						<?php echo form_open('admin/recupera'); ?>
							<label for="nombre" class="col-sm-2 control-label">Nombre</label>
							<input name="nombre" id="Nombre" type="text" class="form-control" placeholder="Nombre de contacto principal"/>
							<label for="correo" class="col-sm-2 control-label">Correo</label>
							<input name="correo" id="Correo" type="correo" class="form-control" placeholder="Direccion de correo"/>
							<label for="cliente" class="col-sm-2 control-label">Cliente</label>
							<input name="cliente" id="Cliente" type="text" class="form-control" placeholder="Nuemro de cliente"/>
								<button type="submit" class="btn btn-default">Recuperar</button>
						<?php echo form_close(); ?>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

	<a href="<?php echo base_url()?>inicio">Inicio</a>

		</div>
	</div>