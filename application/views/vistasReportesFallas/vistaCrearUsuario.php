<!DOCTYPE html>
<html lang="es">
<head>
	<link rel="stylesheet" href="<?php echo base_url()?>css/estilos_css_test.css" media="screen"/>
	<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
	
	<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('css/boostrap-theme.min.css');?>">

</head>
<body >

	<?php sleep(3);?>

	<div class="presentation" align="center">
		<a href= <?=base_url()?> class="btn btn-info btn-xs">Volver</a>
	</div>

	<ul><div align="left">
		> <a href= <?= site_url('/_reportes')?>> Reportes  </a> > <a href= <?= site_url('/_reportes/insertarUsuario')?>> Nuevo Usuario </a><br>
	</div></ul>

	<h4 align="center"><strong>Solicitud-T&eacute;cnico</strong></h4>

	<ul><h5> (*) Todos los campos son requeridos</h5></ul>

	<form class="form-horizontal" action= <?=site_url('/_reportes/crearUsuario')?> method="post"/>


		<?php if (validation_errors()): ?>
			<table padding-left="20px" padding-right="20px" class="table alert alert-error">
				<tr>
					<strong><td align="center" class="danger"><?php echo validation_errors(); ?></td></strong>
				</tr>

			</table>


		<?php endif; ?>

	
		<ul>
		
		<div class="form-group">
			<label class="control-label col-xs-2">(*) Departamento:</label>
			<div class="col-xs-2">
				<select class="form-control" name="depto">
					<option>Departamento</option>
					<option value="Biologia">Biologia</option>
					<option value="Computacion">Computacion</option>
					<option value="Fisica">Fisica</option>
					<option value="Matematica">Matematica</option>
					<option value="Quimica">Quimica</option>	
				</select>
			</div>
		</div>

		
		<div class="form-group">
			<label class="control-label col-xs-2">(*) Tipo de Usuario:</label>
			<div class="col-xs-2">	
				<select class="form-control" name="verf_usuar">
					<option>Tipo de Usuario</option>
					<option value="0">Usuario</option>
					<option value="1">(*) Administrador</option>
						
				</select>
			</div>
		</div>


		
			
			<div class="form-group">
				<label class="control-label col-xs-2">(*) Nombre de Usuario:</label>
				<div class="col-xs-2">
					<input placeholder="Usuario" class="form-control" type="text" name="user" required>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-xs-2">(*) Contrase&ntildea:</label>
				<div class="col-xs-2">
					<input placeholder="Contrase&ntilde;a" class="form-control" type="password" name="pass" required>
				</div>
			</div>
		
			
			<div class="form-group">
				<label class="control-label col-xs-2">(*) Confirmar Contrase&ntildea:</label>
				<div class="col-xs-2">
					<input placeholder="Repetir Contrase&ntilde;a" class="form-control" type="password" name="passconf" required>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-xs-2">(*) Nombre:</label>
				<div class="col-xs-2">
					<input placeholder="Nombre" class="form-control" type="text" name="nombre">
				</div>
			</div>
		
			<div class="form-group">
				<label class="control-label col-xs-2">(*) Apellido:</label>
				<div class="col-xs-2">
					<input placeholder="Apellido" class="form-control" type="text" name="apellido">
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-xs-2">(*) Telefono:</label>
				<div class="col-xs-2">
					<input placeholder="04XX-XXXXXXX" class="form-control" type="text" name="telf">
				</div>
			</div>
			
			<div class="form-group">		
				<label class="control-label col-xs-2">(*) Correo:</label> 
				<div class="col-xs-2">
					<input placeholder="ejemplo@correo.com" class="form-control" type="email" name="correo">
				</div>
			</div>	

		
		</div></ul>

		<div align="center">
			<input class="btn btn-success" type='submit' name='boton_enviar' value='Crear Usuario'>
		</div>
	</form>
	<br>
	
<script src="<?php echo base_url('js/jquery-1.11.js');?>"></script>

<script src="<?php echo base_url('js/bootstrap.min.js') ;?>"></script>
</body>
</html>