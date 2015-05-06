<?php
class Articulos extends CI_Controller 
{
	function index()
	{
		//cargar el helper de url, con funciones para url
		$this->load->helper('url');

		//cargo el modelo del articulos
		$this->load->model('Articulos_model');

		//pido los reportes
		$reportes= $this->Articulos_model->dame_ultimos_reportes();

		//creo el array con datos de configuracion para la vista
		$datos_vista = array('rs_articulos'=>$reportes);
	/*
		$datos = array(
						'titulo' => 'Pagina de Prueba',
						'descripcion' => 'Esta es la descripcion de esta pagina',
						'cuerpo' => 'El cuerpo de la pagina.....<p>Varios Parrafos<p>'
			);
	*/
		//$this->load->view('/plantillas/mivista',$datos);//Las vistas 	estan cargadas en la carpeta plantilla
		$this->load->view('/plantillas/home',$datos_vista);

	}
/*los parametros que reciben corresponde a lo que viene despues del nombre de la funcion de la url*/

	function ordenadores($marca=null, $modelo=null)
	{
		if (is_null($marca) && is_null($modelo))
		{
			echo 'Aquí se muestran los productos de ordenadores';
		}
		elseif(is_null($modelo))
		{
			echo 'Mostrando ordenadores de marca ' . $marca;
		}
		else
		{
			echo 'Mostrando ordenadores de marca ' . $marca . ' y modelo ' . $modelo;
		}
	}

	function monitores()
	{
		echo 'Aquí se muestran los productos de monitores';
	}

	function perifericos($modelo)
	{
		echo 'Estás viendo el periférico ' . $modelo;
	}
}

?>