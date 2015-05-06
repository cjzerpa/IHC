<?php
/*
*	UC-FACyT
*	Computacion
*	Electiva: Interaccion Humano Computador
*	Prof: Marylin Giugni
*	Realizado por:
*	-Daniel Gazcón
*	-Carlos Zerpa
*	Este es el modelo de la aplicacion desarrollado en CodeIgniter 2.2
*	en el se realizan todas las operaciones de consultas y modificaciones en la base de Datos
*/

class ReportesModel extends CI_model
{
	function __construct()
	{
		parent::__construct();
	}//fin function constructor

	function existeUsuario($user,$pass)//Funcion encargada de verificar si existe el usuario
	{
		$query = $this->db->query("SELECT * FROM `Usuario` WHERE (`User_usuar`='$user') and (`Pass_usuar`='$pass')");
			
		return $query;
	}//fin function

	function listarUsuarios()
	{
		$query = $this->db->query("SELECT `User_usuar` FROM `Usuario`");
		return $query;
	}//fin function

	function listarReportesTecnico()
	{
		$query = $this->db->query("SELECT * FROM `UserRealizaRepor` ORDER BY `Id_repor` DESC");
		return $query;
	}//fin function

	function listarReportesUsuarios($user)
	{

		$query = $this->db->query("SELECT * FROM `UserRealizaRepor` WHERE `User_usuar`= '$user'");
		return $query;
	}//fin function

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

	
	}//fin function

	function informacionReporte($id)
	{
		$query = $this->db->query("SELECT * FROM `UserRealizaRepor` WHERE `Id_repor`= '$id'");
		return $query;
	}//fin function

	function verPerfil($user)
	{
		$query = $this->db->query("SELECT * FROM `Usuario` WHERE `User_usuar`= '$user'");
		return $query;
	}//fin function

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

	}//fin function

	function crearUsuario($data)
	{
		$this->db->insert('Usuario',$data);
	}//fin function

	function eliminarReporte($value)
	{
		$this->db->where('Id', $value);
		$this->db->delete('Reporte');
	}//fin function

}//fin class

?>