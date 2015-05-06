<!DOCTYPE html>
<html lang="es">
<head>

	<link rel="stylesheet" href="<?php echo base_url()?>css/estilos_css_test.css" media="screen"/>
	<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">

	 <style>            
        .waiting {
          width:210px;
          height:35px;
          position:absolute;
          left:50%;
          top:50%;
          margin:-100px 0 0 -150px;
          border-radius: 10px;
          border: 1px solid #cccccc;
          background-color: white;
          padding: 5px;    
          display:none;
        }
      </style>   

	<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('css/boostrap-theme.min.css');?>">

</head>
<body>

	

	<section class="conteiner-fluid">
	<div class="row">

		<article class="col-md-6 col-xs-1">
       		 <figure>
           		 <img src= "<?php echo base_url()?>images/facyt3.png" class="img-triple" alt="Imagen facyt3">
       		 </figure>
   		</article>

   	

		<article >Bienvenidos a la plataforma SIRF (Sistema para Reportes<br>
				y Fallas) de FACYT. Se brindan los siguientes servicios:<br>
				<strong>Orientados a Docentes:</strong><br><br>
				<strong>Orientados a Tecnicos:</strong><br><br>
				La plataforma SIRF tiene como objetivo servir de comunicacion entre
				el personal administrativo de la FACYT<br>

		</article>
			
			
		
	</div>
</section>
  <br><br>
  <form class="form-inline" align="center" action=<?=site_url('/_reportes/login')?> method="post">
      <div class="form-group">
        <div class="col-xs-3">
          
          <input placeholder="Usuario" class="form-control" type="text"  name="nombre"  required/>   
        </div>
        
        <br><br>
        
        <div class="col-xs-3">
          <input placeholder="Contrase&ntilde;a"class="form-control" type="password"  name="pass" required/>
          
        </div>
      </div>
      
      <br><br>
      
      <div class="checkbox">
        <label>  Recordar </label>
        <input class="checkbox" type="checkbox">
      </div>  
      
      <br><br>

      <div class="form-group">
        <input class="btn btn-success " type='submit' name='boton_enviar' value='Ingresar'>
      </div>

    </form>

    <br><br><br><br><br><br><br>
<?php
	sleep(3);
	?>


<script src="<?php echo base_url('js/bootstrap.min.js') ;?>"></script>

</body>
</html>

