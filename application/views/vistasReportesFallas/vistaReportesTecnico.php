<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="<?php echo base_url()?>css/estilos_css_test.css" media="screen"/>
	<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">


<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/estilos.css">

	<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('css/boostrap-theme.min.css');?>">


</head>
<body >
	<?php sleep(3);?>
	
	<div align="center">
		<a href= <?=site_url('/_reportes/logout')?> onclick="javascript:return salirr();" class="btn btn-danger btn-xs " align="" > Salir </a>
	</div>
	
	<ul><div align="left">
		> <a href= <?= site_url('/_reportes')?>> Reportes  </a><br>
	</div></ul>
	
	<h4 align="center"><strong>Reportes realizados</strong></h4><br>
	
	<ul><a href= <?= site_url('/_reportes/insertarUsuario')?> class="btn btn-primary ">Crear Usuario</a> <a href=<?=site_url('/_reportes/solicitud')?> class="btn btn-primary ">Realizar Solicitud</a></ul><br><br>
	
	<div class="table-responsive" align="center">
		<table class="table table-bordered table-hover">
			<tr class="info">
				<td><b>Usuario</b></td>
				<td><b>Fecha</b></td>
				<td><b>Hora</b></td>
				<td><b>Tipo</b></td>
				<td><b>Asunto</b></td>
				<td><b>Descripcion</b></td>
				<td><b>Estado</b></td>
				<td><b>Departamento </b></td>
				<td><b>Acciones</b></td>
			</tr>
	

			<?php

				if($rs_->num_rows() > 0)
				{
					foreach($rs_->result() as $row)
					{
						echo '<tr>';
						echo '<td> <a href= "'.site_url('/_reportes/verPerfil/'.$row->User_usuar.' ').'" class="btn btn-info btn-xs">'.$row->User_usuar.'</a></td>';
						echo '<td>'.$row->Fecha.'</td>';
						echo '<td>'.$row->Hora.'</td>';
						echo '<td>'.$row->tipo.'</td>';
						echo '<td>'.$row->Asunto.'</td>';
						echo '<td>'.$row->Descrip.'</td>';
						echo '<td>'.$row->Estado.'</td>';
						echo '<td>'.$row->Depto.'</td>';
						echo '<td> <a href="'.site_url('/_reportes/preModificarReporte/'.$row->Id_repor.'').'" class="btn btn-warning btn-xs">Modificar</a> <a href="'.site_url('/_reportes/eliminarReporte/'.$row->Id_repor.'').'" onclick="javascript:return asegurar();" class="btn btn-danger btn-xs">Eliminar</a> </td>';
					}

				}
		echo '</table>';
		echo '</div>';
				
					
				
			?>

			<script>
				function asegurar ()
  				{
      				rc = confirm("Seguro que desea Eliminar?");
      				return rc;
  				}
			</script>

			<script>
				function salirr ()
  				{
      				rc = confirm("Seguro que desea Salir?");
      				return rc;
  				}
			</script>
		<script src="<?php echo base_url('js/jquery-1.11.js');?>"></script>

<script src="<?php echo base_url('js/bootstrap.min.js') ;?>"></script>
</body>

</html>

