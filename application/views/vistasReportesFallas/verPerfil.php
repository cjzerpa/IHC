<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="<?php echo base_url()?>css/estilos_css_test.css" media="screen"/>
	<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">

	<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('css/boostrap-theme.min.css');?>">


</head>
<body >
		
	<?php sleep(3);

	echo '<div align="center"> <a href="'.base_url().'" class="btn btn-info btn-xs">Volver</a></div';
	?>

	<br>
	<ul><div >
		> <a href= <?= site_url('/_reportes')?>> Reportes  </a> > <a href= <?= site_url('/_reportes/verPerfil/')?>> Ver Perfil </a><br>
	</div>
	</ul>

	<h4 align="center"><strong>Usuarios</strong></h4>
	<div class="table-responsive" align="center">
	<table class="table table-bordered table-hover">
			<tr class="info">
				<td><b>Usuario</b></td>
				<td><b>Nombre</b></td>
				<td><b>Apellido</b></td>
				<td><b>Departamento</b></td>
				<td><b>Correo</b></td>
				<td><b>Telefono</b></td>
			</tr>
	

		<?php
			if($rs_->num_rows() > 0)
			{
				foreach($rs_->result() as $row)
				{
					echo '<tr>';
					echo '<td>'.$row->User_usuar.'</td>';
					
					echo '<td>'.$row->Nombre.'</td>';
					echo '<td>'.$row->Apellido.'</td>';
					echo '<td>'.$row->Escuela.'</td>';
					
					echo '<td>'.$row->Email_usuar.'</td>';
					echo '<td>'.$row->Telefono_usuar.'</td>';
				}

			}
	echo '</table>';
	echo '</div>';
			echo '<br><br><br>';
			
			echo '<br><br><br><br><br><br>';
		?>
	<br><br><br><br><br><br><br><br>
	<script src="<?php echo base_url('js/jquery-1.11.js');?>"></script>

	<script src="<?php echo base_url('js/bootstrap.min.js') ;?>"></script>

</body>

</html>