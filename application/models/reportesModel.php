<?php
class ReportesModel extends CI_model
{
	function __construct()
	{
		parent::__construct();
	}

	function existeUsuario($user)//Funcion encargada de verificar si existe el usuario
	{
		//$resul=FALSE;
		$query = $this->db->query("SELECT * FROM `Usuario` WHERE (`User_usuar`='$user')");
		/*if( crypt('$pass', '$query') == $query)
		{
			resul = TRUE
		}
		else{}

		*/
		//$query = $this->db->query("SELECT * FROM `Usuario` WHERE (`User_usuar`='$user') and (`Pass_usuar`='$pass')");
			
		return $query;
	}

	function listarUsuarios()
	{
		$query = $this->db->query("SELECT `User_usuar` FROM `Usuario`");
		return $query;
	}

	function listarReportesTecnico()
	{
		$query = $this->db->query("SELECT * FROM `UserRealizaRepor` ORDER BY `Id_repor` DESC");
		return $query;
	}

	function listarReportesUsuarios($user)
	{

		$query = $this->db->query("SELECT * FROM `UserRealizaRepor` WHERE `User_usuar`= '$user'");
		return $query;
	}

	function insertarReporte($data1)
	{
		$this->db->set('Fecha',$data1['Fecha']);
		$this->db->set('Hora',$data1['Hora']);
		$this->db->set('tipo',$data1['Tipo']);
		$this->db->set('Asunto',$data1['Asunto']);
		$this->db->set('Descrip',$data1['Descrip']);
		$this->db->set('Estado',$data1['Estado']);
		$this->db->set('Depto',$data1['Depto']);
		$this->db->insert('Reporte');
		
		/*$query = $this->db->query("INSERT INTO `Reporte` (`Fecha`, `Hora`, `tipo`, `Asunto`, `Descrip`, `Estado`, `Depto`) 
			VALUES ('".$data1['Fecha']."','".$data1['Hora']."','".$data1['Tipo']."','".$data1['Asunto']."','".$data1['Descrip']."','".$data1['Estado']."','".$data1['Depto']."'   )");
			*/
		$id=mysql_insert_id();
		$this->db->set('Id_repor',$id);
		$this->db->set('User_usuar',$data1['User_usuar']);
		$this->db->set('Email_usuar',$data1['Email_usuar']);
		$this->db->set('Telefono_usuar',$data1['Telefono_usuar']);
		$this->db->set('Fecha',$data1['Fecha']);
		$this->db->set('Hora',$data1['Hora']);
		$this->db->set('tipo',$data1['Tipo']);
		$this->db->set('Asunto',$data1['Asunto']);
		$this->db->set('Descrip',$data1['Descrip']);
		$this->db->set('Estado',$data1['Estado']);
		$this->db->set('Depto',$data1['Depto']);
		$this->db->insert('UserRealizaRepor');

		/*$query2 = $this->db->query("INSERT INTO `UserRealizaRepor` (`Id_repor`,`User_usuar`,`Email_usuar`,`Telefono_usuar`,`Fecha`, `Hora`, `tipo`, `Asunto`, `Descrip`, `Estado`, `Depto`) 
			VALUES ('$id' ,'".$data1['User_usuar']."','".$data1['Email_usuar']."','".$data1['Telefono_usuar']."' ,'".$data1['Fecha']."','".$data1['Hora']."','".$data1['Tipo']."','".$data1['Asunto']."','".$data1['Descrip']."','".$data1['Estado']."','".$data1['Depto']."'   )");
*/
	}

	function informacionReporte($id)
	{
		$query = $this->db->query("SELECT * FROM `UserRealizaRepor` WHERE `Id_repor`= '$id'");
		return $query;
	}

	function verPerfil($user)
	{
		$query = $this->db->query("SELECT * FROM `Usuario` WHERE `User_usuar`= '$user'");
		return $query;
	}



	function modificarReporte($data1,$id)
	{
		$this->db->set('Fecha',$data1['Fecha']);
		$this->db->set('Hora',$data1['Hora']);
		$this->db->set('tipo',$data1['Tipo']);
		$this->db->set('Asunto',$data1['Asunto']);
		$this->db->set('Descrip',$data1['Descrip']);
		$this->db->set('Estado',$data1['Estado']);
		$this->db->set('Depto',$data1['Depto']);
		$this->db->where('Id',$id);
		$this->db->update('Reporte');

		$this->db->set('User_usuar',$data1['User_usuar']);
		$this->db->set('Email_usuar',$data1['Email_usuar']);
		$this->db->set('Telefono_usuar',$data1['Telefono_usuar']);
		$this->db->set('Fecha',$data1['Fecha']);
		$this->db->set('Hora',$data1['Hora']);
		$this->db->set('tipo',$data1['Tipo']);
		$this->db->set('Asunto',$data1['Asunto']);
		$this->db->set('Descrip',$data1['Descrip']);
		$this->db->set('Estado',$data1['Estado']);
		$this->db->set('Depto',$data1['Depto']);
		$this->db->where('Id_repor',$id);
		$this->db->update('UserRealizaRepor');

		

	}

	function crearUsuario($data)
	{
		$this->db->insert('Usuario',$data);
	}

	function eliminarReporte($value)
	{
		$this->db->where('Id', $value);
		$this->db->delete('Reporte');
	}

	
}

?>