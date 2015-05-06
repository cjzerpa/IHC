<?php
class Modelos extends CI_model
{
	function __construct()
	{
		parent::__construct();
	}

	function consulta($user,$pass)//Funcion encargada de verificar si existe el usuario
	{
		
		$query = $this->db->query("SELECT * FROM `Usuario` WHERE `User_usuar`='$user' and `Pass_usuar` = '$pass'");
		/*foreach($query->result_array() as $row)
		{
			$data = array(
				'usuario'=>$row['User_usuar'],
				'email'=>$row['Email_usuar'],
				'telf'=>$row['Telefono_usuar'],
				'verf'=>$row['verf_tecnico']
				);

		}*/

		return $query;
	}

}

?>