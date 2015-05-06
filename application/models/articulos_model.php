<?php
class Articulos_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function dame_ultimos_reportes()
	{
		$ssql="select * from reporte order by id desc";
		return mysql_query($ssql);
	}

}

?>