<!DOCTYPE html>
<html lang="es">
<head>
	<title>Sistema de Reporte de Fallas SIRF FACYT UC</title>
	<link rel="stylesheet" href="<?php echo base_url()?>css/estilos_css_test.css" media="screen"/>
	<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
<figure class="logofacyt">
		<img src="<?php echo base_url()?>images/SIRF(3).png" class="img-responsive">
</figure>


</head>
<body >
	<div class="presentacion">
	<?php
		if($this->session->userdata('logged_in')==TRUE)
		{
			if($this->session->userdata('tipo_user')==1)
				echo '<p>Bienvenido: '.$this->session->userdata('usuario').' '.$this->session->userdata('apellido').' - Tipo de Usuario: Administrador.</p>';
			else
				echo '<p>Bienvenido: '.$this->session->userdata('usuario').' '.$this->session->userdata('apellido').' - Tipo de Usuario: Usuario.</p>';
		}

	?>
	</div>

</body>
</html>