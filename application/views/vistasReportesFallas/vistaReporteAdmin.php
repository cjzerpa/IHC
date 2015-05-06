<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="<?php echo base_url()?>css/estilos_css_test.css" media="screen"/>
	<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
	<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('css/boostrap-theme.min.css');?>">

	<title></title>
</head>
<body>
	<h4>Reportes realizados</h4>
	<div class="table-responsive informacion">
	<table class="table">
			<tr>
				<td>Usuario</td>
				<td>Fecha</td>
				<td>Hora</td>
				<td>Tipo</td>
				<td>Asunto</td>
				<td>Descripcion</td>
				<td>Estado</td>
				<td>Departamento </td>
				<td>Acciones</td>
			</tr>
	

		<?php
			if($rs_->num_rows() > 0)
			{
				foreach($rs_->result() as $row)
				{
					echo '<tr>';
					echo '<td> <a href= "'.site_url('/_reportes/verPerfil/'.$row->User_usuar.' ').'" class="btn btn-default btn-xs">'.$row->User_usuar.'</a></td>';
					echo '<td>'.$row->Fecha.'</td>';
					echo '<td>'.$row->Hora.'</td>';
					echo '<td>'.$row->tipo.'</td>';
					echo '<td>'.$row->Asunto.'</td>';
					echo '<td>'.$row->Descrip.'</td>';
					echo '<td>'.$row->Estado.'</td>';
					echo '<td>'.$row->Depto.'</td>';
					echo '<td> <a href="'.site_url('/_reportes/preModificarReporte/'.$row->Id_repor.'').'" class="btn btn-default btn-xs">Modificar</a> <a href="'.site_url('/_reportes/eliminarReporte/'.$row->Id_repor.'').'" class="btn btn-default btn-xs">Eliminar</a> </td>';


				}

			}
	echo '</table>';
	echo '</div>';
			echo '<a href="'.site_url('/_reportes/solicitud').'" class="btn btn-default btn-xs">Realizar Solicitud</a>';

		?>
	
<script src="<?php echo base_url('js/jquery-1.11.js');?>"></script>

<script src="<?php echo base_url('js/bootstrap.min.js') ;?>"></script>
</body>
</html>