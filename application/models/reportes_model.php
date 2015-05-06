<?php
class Reportes_model extends CI_model
{
	function __construct()
	{
		parent::__construct();
	}

	function existe_usuario($user,$pass)//Funcion encargada de verificar si existe el usuario
	{
		$valor=0;
		$this->db->select('User_usuar','Pass_usuar');
		$this->db->where('User_usuar', $user);
		$this->db->where('Pass_usuar',$pass);

		$query = $this->db->get('Usuario');
			if ($query->num_rows() > 0)
			{	
				//$this->db->where('verf_tecnico',1);
				//$query = $this->db->get('Usuario');
				$this->db->select('User_usuar','verf_tecnico');
				$this->db->where('User_usuar', $user);
				$this->db->where('verf_tecnico',1);
				$query = $this->db->get('Usuario');
//
				if($query->num_rows() > 0)
					$valor= 1;
				else
					$valor= 2;
				
			}
			return $valor;
	}

	function listar_reportes()
	{
		//$query = $this->db->query("select * from reporte order by id desc");
		//return $query;
		$ssql="select * from reporte order by `Id` desc";
		return mysql_query($ssql);

	}

	function listar_reportes_usuario($user)
	{

		//$query = $this->db->query("SELECT * FROM reporte;");
		//return $query;
		//$ssql="select * from reporte order by id asc";
		$ssql="SELECT * FROM `reporte` WHERE `Usuario`= '$user'";
		return mysql_query($ssql);
	}

	function insertar_reporte($data)
	{
		
		$result= $this->db->insert_string('reporte',$data);
		return $result;

	}

	function modificar_reporte($data,$id)
	{
		$where = "Id = '$id'";
		$str = $this->db->update_string('reporte', $data, $where);
		return $str;

	}

	function eliminar($value)
	{
		$this->db->where('Id', $value);
		$this->db->delete('reporte');
	}

	
}

?>