<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="<?php echo base_url()?>css/estilos_css_test.css" media="screen"/>
	<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">

	<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('css/boostrap-theme.min.css');?>">

</head>
<body >

<div class="conteiner-fluid cuerpo" align="center">

	<?php echo validation_errors(); ?>

	
	
</div>



<section class="conteiner-fluid cuerpo" >
	<div class="row" >

			<article >

				<table class="table" padding-left="20px" padding-right="20px">
					<tr>
						<td align="center" class="danger">Error de Autentificaci&oacuten de usuarios ALFA.<td>
					</tr>

				</table>

			<p align="center"><?php echo anchor( base_url(), 'Volver al Inicio') ;?><p>


						
		</article>
	</div>
</section>

	<script src="<?php echo base_url('js/jquery-1.11.js');?>"></script>

<script src="<?php echo base_url('js/bootstrap.min.js') ;?>"></script>
</body>
</html>