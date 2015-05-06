<!DOCTYPE html>
<html lang="es">
<head>
<link rel="stylesheet" href="<?php echo base_url()?>css/estilos_css_test.css" media="screen"/>
	<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">

	<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('css/boostrap-theme.min.css');?>">
	<script src="<?php echo base_url('js/jquery-1.11.js');?>"></script>

	<script src="<?php echo base_url('js/bootstrap.min.js') ;?>"></script>
</head>
<body >

	<?php sleep(3);?>

	<div class="presentation" align="center">
		<a href= <?=base_url()?> class="btn btn-info btn-xs">Volver</a>
	</div>

	<ul><div align="left">
		> <a href= <?= site_url('/_reportes')?>><ins> Reportes</ins> </a> > <a href= <?= site_url('/_reportes/preModificarReporte/')?>> <ins>Editar Reporte</ins></a><br>
	</div></ul>

	<h4 align="center"><strong>Solicitud-Tecnico</strong></h4>

	<ul><h5 >(*) Campos requeridos</h5></ul><br>
	<ul>
	<form class="form form-horizontal" action=<?=site_url('/_reportes/generarReporte')?> method="post" >
		
		<div class="form-group" >
			<?php
				if($rs_->num_rows()>0)
					foreach ($rs_->result() as $row) 
					{

				
			?>
			<input type="hidden" name="id" value=<?=$row->Id_repor?>>
			
			<div class="form-group">
				<label class="control-label col-xs-2">(*) Usuario:</label>
				<div class="col-xs-2">
					<select class="form-control" name="usuario"  >
						<option value=<?=$row->User_usuar?>><?=$row->User_usuar?></option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-xs-2">(*) Departamento: </label>
					<div class="col-xs-2">
						<select class="form-control" name="depto" >
							<option value=<?=$row->Depto?>><?=$row->Depto?></option>
							<option value="Biologia">Biologia</option>
							<option value="Computacion">Computacion</option>
							<option value="Fisica">Fisica</option>
							<option value="Matematica">Matematica</option>
							<option value="Quimica">Quimica</option>	
						</select>
					</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-xs-2">(*) Tipo de Problema:</label>
				<div class="col-xs-2">
					<select class="form-control" name="tipo">
						<option <?=$row->tipo?>><?=$row->tipo?></option>
						<option value="Software">Software</option>
						<option value="Hardware">Hardware</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-xs-2">(*) Asunto</label>
				<div class="col-xs-2">
					<input class="form-control" type="text" name="asunto" value=<?=$row->Asunto ?>>
				</div>
			</div>
			
		
			<div class="form-group">
				<label class="control-label col-xs-2">(*) Descripcion</label>
				<div class="col-xs-2">
					<textarea class="form-control" name="descrip" rows="3" cols="50"><?=$row->Descrip?></textarea>
				</div>
			</div>
			
			<div class="form-group">
		        <label class="control-label col-xs-2">Estado de Solicitud:</label>
		        
		        <div class="col-xs-1">
		            <label class="radio-inline">
		               <input lass="radio" type="radio" name="estado" value="En Progreso" checked="checked">En proceso
		            </label>
		        </div>
		        
		        <div class="col-xs-1">
		            <label class="radio-inline">
		               			<input class="radio" type="radio" name="estado" value="Revisado">Revisado
		            </label>
		        </div>

		        <div class="col-xs-1">
		        	<label class="radio-inline">
		        		<input class="radio" type="radio" name="estado" value="Listo" checked="checked">Listo
		        	</label>
		        </div>
		    </div>
	

    		


				
		
			</div>

			
			</ul>
			<br>
			
			<div class"form-group" align="center">
				<input class="btn btn-success " type='submit' name='Enviar_modificacion' value='Actualizar'>
			</div>
		</div>					
	</form>
	
		<?php }?>
	<br>

	

</body>
</html>