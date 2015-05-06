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

	<div align="center" class="presentation">
		<a href= <?=base_url()?> class="btn btn-info btn-xs">Volver</a>
	</div>

	<ul><div align="left">
		> <a href= <?= site_url('/_reportes')?>> Reportes  </a> > <a href= <?= site_url('/_reportes/solicitud')?>> Solicitud </a><br>
	</div></ul>

	<h4 align="center"><strong>Realizar Reporte</strong></h4><br>
	
	<ul><h5> (*) Todos los campos son requeridos</h5></ul><br>

	<form class="form-horizontal" action= <?=site_url('/_reportes/generarReporte')?> method="post"/>
		
		<?php if (validation_errors()): ?>
			<table padding-left="20px" padding-right="20px" class="table alert alert-error">
				<tr>
					<strong><td align="center" class="danger"><?php echo validation_errors(); ?></td></strong>
				</tr>

			</table>


		<?php endif; ?>

			<div class="form-group">
				<label class="control-label col-xs-2">(*) Usuarios</label>
				<div class="col-xs-3">
					<select class="form-control" name="usuario">
						<option value="">Usuarios</option>
							<?php
								if($rs_->num_rows()>0)
								{
									foreach ($rs_->result() as $row)
									{
										echo '<option value='.$row->User_usuar.'>'.$row->User_usuar.'</option>';
										
									}
								}
							?>
					</select>
				</div>
			</div >
					

			<div class="form-group">
				<label class="control-label col-xs-2">(*) Departamento</label>
				<div class="col-xs-3">
					<select class="form-control" name="depto">
						<option value="">Departamento</option>
						<option value="Biologia">Biologia</option>
						<option value="Computacion">Computacion</option>
						<option value="Fisica">Fisica</option>
						<option value="Matematica">Matematica</option>
						<option value="Quimica">Quimica</option>	
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-xs-2">(*) Tipo de Problema</label>
				<div class="col-xs-3">
					<select  class="form-control" name="tipo">
						<option value="">Tipo de Problema</option>
						<option value="Software">Software</option>
						<option value="Hardware">Hardware</option>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-xs-2">(*) Asunto</label>
				<div class="col-xs-3">			
					<input placeholder="Asunto" value="" class="form-control" type="text" name="asunto">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-xs-2">(*) Descripci&oacuten</label>
				<div class="col-xs-3">
					<textarea placeholder="Descripcion" class="form-control" name="descrip" rows="3" cols="50"></textarea><br><br>
				</div>
			</div>
			<br>
			<div class="form-group" align="center">
				<input class="btn btn-success " type='submit' name='boton_enviar' value='Generar'>
			</div>
	</form>
	<br>
	
<script src="<?php echo base_url('js/jquery-1.11.js');?>"></script>

<script src="<?php echo base_url('js/bootstrap.min.js') ;?>"></script>
</body>
</html>