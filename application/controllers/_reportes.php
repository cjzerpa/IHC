<?php
class _Reportes extends CI_Controller
{
	function consultarSesion()
	{//funcion que pregunta si un usuario ya inicio sesion
			if(($this->session->userdata('logged_in'))==TRUE)
			{//llamada a la funcion que consulta el estado de la sesion
				return TRUE;//ha iniciado sesion
			}
			else
				return FALSE;//no ya inicio sesion
	}

	function esTecnico()
	{
		if($this->session->userdata('tipo_user')== '1')
			return TRUE;
		else
			return FALSE;
	}

	function index()
	{//Controlador de Inicio de sesion

			if(!$this->consultarSesion()){
				$this->load->view('/vistasReportesFallas/presentacionFallas');
				$this->load->view('/vistasReportesFallas/login');//llamada a la vista de login para iniciar sesion
				$this->load->view('/vistasReportesFallas/pieDePagina');
			}
			else
			{	
				if($this->esTecnico())//Vista para el tecnico
					$this->listarReportesTecnico();
				else//vista para el usuario regular
					$this->listarReportesUsuarios($this->session->userdata('nombre'));	
			}
	}

	function login()
	{

		$this->form_validation->set_rules('nombre','Usuario','required');
		$this->form_validation->set_rules('pass','Contrase&ntildea','required');

		if($this->form_validation->run() == TRUE)
		{
			$this->load->model('ReportesModel');//llamada al modelo que hace las consultas con la BD
			//$resp = $this->ReportesModel->existeUsuario($_POST['nombre'] ,$_POST['pass']);//se consulta a la BD si existe el usuario
			$resp = $this->ReportesModel->existeUsuario($_POST['nombre']);//se consulta a la BD si existe el usuario
			if ($resp->num_rows()>0)//funcion que de captura de erros y la query fue correcta
			{
				$row = $resp->row_array(1); 
				{
					
						if( crypt($_POST['pass'],$row['Pass_usuar']) == $row['Pass_usuar'])
						{
							$newdata = array(
								'nombre'=>$row['User_usuar'],
								'apellido'=>$row['Apellido'],
								'usuario'=>$row['Nombre'],
								'correo'=>$row['Email_usuar'],
								'telf'=>$row['Telefono_usuar'],
								'tipo_user'=>$row['verf_tecnico'],
								'logged_in'=> TRUE
								);

							$datos = $this->session->set_userdata($newdata);
									if($this->esTecnico())
										$this->listarReportesTecnico();//vista para tecnico
									else
										$this->listarReportesUsuarios($this->session->userdata('nombre'));
						}
						else
						{
							$this->autenticacion();		
						}
									
	
				}

					
								/*
					$newdata = array(
								'nombre'=>$row['User_usuar'],
								'apellido'=>$row['Apellido'],
								'usuario'=>$row['Nombre'],
								'correo'=>$row['Email_usuar'],
								'telf'=>$row['Telefono_usuar'],
								'tipo_user'=>$row['verf_tecnico'],
								'logged_in'=> TRUE
								);
				}
				$datos = $this->session->set_userdata($newdata);
				if($this->esTecnico())
					$this->listarReportesTecnico();//vista para tecnico
				else
					$this->listarReportesUsuarios($this->session->userdata('nombre'));
					*/       			
			}
			else
			{
					$this->autenticacion();			
			}

		}
		else
		{
			$this->autenticacion();
		}
		


		

	}

	function listarReportesTecnico()
	{
		if(!$this->consultarSesion())
		{
			$this->load->view('/vistasReportesFallas/presentacionFallas');
			$this->load->view('/vistasReportesFallas/login');
			$this->load->view('/vistasReportesFallas/pieDePagina');
		}
		else
		{
			$this->load->model('ReportesModel');
			$reportes= $this->ReportesModel->listarReportesTecnico();
			$datos = array('rs_' => $reportes);
			$this->load->view('/vistasReportesFallas/presentacionFallas');
			$this->load->view('/vistasReportesFallas/vistaReportesTecnico',$datos);
			$this->load->view('/vistasReportesFallas/vistaLogout');
			$this->load->view('/vistasReportesFallas/pieDePagina');

		}

	}

	function listarReportesUsuarios($user)
	{
		if(!$this->consultarSesion())
		{
			$this->load->view('/vistasReportesFallas/presentacionFallas');
			$this->load->view('/vistasReportesFallas/login');
			$this->load->view('/vistasReportesFallas/pieDePagina');
		}
		else
		{
			$this->load->model('ReportesModel');
			$reportes= $this->ReportesModel->listarReportesUsuarios($user);
			$datos = array('rs_' => $reportes);
			$this->load->view('/vistasReportesFallas/presentacionFallas');
			$this->load->view('/vistasReportesFallas/vistaReportesUsuarios',$datos);
			$this->load->view('/vistasReportesFallas/vistaLogout');
			$this->load->view('/vistasReportesFallas/pieDePagina');

		}
	}

	function solicitud()
	{
		if(!$this->consultarSesion())
		{
			$this->load->view('/vistasReportesFallas/presentacionFallas');
			$this->load->view('/vistasReportesFallas/login');
			$this->load->view('/vistasReportesFallas/pieDePagina');
		}
		else
		{
			if($this->esTecnico())//VERICACION SI ES UN TECNICO, SI ES TRUE MUESTRA LA VISTA DEL TECNICO SINO LA DEL USUARIO
			{
				$this->load->model('ReportesModel');
				$usuarios = $this->ReportesModel->listarUsuarios();
				$datos = array('rs_' => $usuarios);
				$this->load->view('/vistasReportesFallas/presentacionFallas');     
				$this->load->view('/vistasReportesFallas/vistaSolicitudTecnico',$datos);
				$this->load->view('/vistasReportesFallas/pieDePagina');
			}
			else
			{
				$this->load->view('/vistasReportesFallas/presentacionFallas');
				$this->load->view('/vistasReportesFallas/vistaSolicitudUsuario');
				$this->load->view('/vistasReportesFallas/pieDePagina');
			}
			
		}

	}

	function preModificarReporte($id)
	{
		if(!$this->consultarSesion())
		{
			$this->load->view('/vistasReportesFallas/presentacionFallas');
			$this->load->view('/vistasReportesFallas/login');
			$this->load->view('/vistasReportesFallas/pieDePagina');
		}
		else
		{
			if(!$this->esTecnico())
			{
				echo "Access Denied";
			}
			else
			{
				$this->load->model('ReportesModel');
				$info = $this->ReportesModel->informacionReporte($id);
				$datos = array('rs_'=>$info);
				$this->load->view('/vistasReportesFallas/presentacionFallas');
				$this->load->view('/vistasReportesFallas/modificarReporte',$datos);
				$this->load->view('/vistasReportesFallas/pieDePagina');
			}
		}
	}

	function generarReporte()
	{
		$depto = $_POST['depto'];
		$tipo = $_POST['tipo'];
		$asunto = $_POST['asunto'];
		$descrip = $_POST['descrip'];

		$this->form_validation->set_rules('depto','Departamento','required');
		$this->form_validation->set_rules('asunto','Asunto','required');
		$this->form_validation->set_rules('tipo','Tipo de Problema','required');
		$this->form_validation->set_rules('descrip','Descripcion','required');

		if($this->form_validation->run() == TRUE)
		{
			if(!$this->consultarSesion())//verifica si el usuario ya inicio sesion
				{
					$this->load->view('/vistasReportesFallas/presentacionFallas');
					$this->load->view('/vistasReportesFallas/login');
					$this->load->view('/vistasReportesFallas/pieDePagina');
				}
				else
				{
					$estado="En Progreso";
					$usuario = $this->session->userdata('nombre');
					$this->load->model('ReportesModel');
					$this->load->view('/vistasReportesFallas/presentacionFallas'); 
					$fecha=date('Y-m-d');
					$hora=date("h:i:s");

					if($this->esTecnico())	
					{
						if($_POST['usuario'] != "")
						{
							$usuario = $_POST['usuario'];
						}
						if(isset($_POST['estado'])==TRUE)
							$estado=$_POST['estado'];

					}

				$data2 = array("Id_repor"=>null,
							"User_usuar"=>$usuario,
							"Email_usuar"=>$this->session->userdata('correo'),
							"Telefono_usuar"=>$this->session->userdata('telf'),
							"Fecha"=>$fecha,
							"Hora"=>$hora,
							"Tipo"=>$tipo,
							"Asunto"=>$asunto,
							"Descrip"=>$descrip,
							"Estado"=>$estado,
							"Depto"=>$depto);

				if(isset($_POST['Enviar_modificacion']) == TRUE)
				{
					$response = $this->ReportesModel->modificarReporte($data2,$_POST['id']);
				}
				else
				{
					echo "hola";
					$response = $this->ReportesModel->insertarReporte($data2);
				}

					redirect('','auto');

			}


		}
		else
		{
			$this->load->model('ReportesModel');
			$data = array();
			$data['depto'] = $depto;
			$data['tipo'] = $tipo;
			$data['asunto'] = $asunto;
			$data['descrip'] = $descrip;

			if($this->esTecnico())
			{
				$usuarios = $this->ReportesModel->listarUsuarios();
				$data = array('rs_' => $usuarios);
				$this->load->view('/vistasReportesFallas/presentacionFallas');     
				$this->load->view('/vistasReportesFallas/vistaSolicitudTecnico',$data);
				$this->load->view('/vistasReportesFallas/pieDePagina');
		
			}
			else
			{
				$this->load->view('/vistasReportesFallas/presentacionFallas');     
				$this->load->view('/vistasReportesFallas/vistaSolicitudUsuario',$data);
				$this->load->view('/vistasReportesFallas/pieDePagina');
			}

		
			


		}

		

	}

	function eliminarReporte($id)
	{
		if(!$this->consultarSesion())
		{
			$this->load->view('/vistasReportesFallas/presentacionFallas');
			$this->load->view('/vistasReportesFallas/login');
			$this->load->view('/vistasReportesFallas/pieDePagina');
		}
		else
		{
			if(!$this->esTecnico())
			{
				echo "Access Denied";
			}
			else
			{
				$this->load->model('ReportesModel');
				$usuarios = $this->ReportesModel->eliminarReporte($id);
				redirect('','auto');
			}
		}
	}

	function verPerfil($user)
	{
		if(!$this->consultarSesion())
		{
			$this->load->view('/vistasReportesFallas/presentacionFallas');
			$this->load->view('/vistasReportesFallas/login');
			$this->load->view('/vistasReportesFallas/pieDePagina');
		}
		else
		{
			if(!$this->esTecnico())
			{
				echo "Access Denied";
			}
			else
			{
				$this->load->model('ReportesModel');
				$usuario = $this->ReportesModel->verPerfil($user);
				$datos = array('rs_'=>$usuario);
				$this->load->view('/vistasReportesFallas/presentacionFallas');
				$this->load->view('/vistasReportesFallas/verPerfil',$datos);
				$this->load->view('/vistasReportesFallas/pieDePagina');
			}
		}
	}

	function insertarUsuario()
	{

		if(!$this->consultarSesion())
		{
			$this->load->view('/vistasReportesFallas/presentacionFallas');
			$this->load->view('/vistasReportesFallas/login');
			$this->load->view('/vistasReportesFallas/pieDePagina');
		}
		else
		{
			if(!$this->esTecnico())
			{
				echo "Access Denied";
			}
			else
			{
				$this->load->view('/vistasReportesFallas/presentacionFallas');
				$this->load->view('/vistasReportesFallas/vistaCrearUsuario');
				$this->load->view('/vistasReportesFallas/pieDePagina');
			}
		}
	}

	function crearUsuario()
	{
		
		if(!$this->consultarSesion())
		{
			$this->load->view('/vistasReportesFallas/presentacionFallas');
			$this->load->view('/vistasReportesFallas/login');
			$this->load->view('/vistasReportesFallas/pieDePagina');
		}
		else
		{
			if(!$this->esTecnico())
			{
				echo "Access Denied";
			}
			else
			{	
				$this->form_validation->set_rules('nombre','Nombre','required');
				$this->form_validation->set_rules('apellido','Apellido','required');
				$this->form_validation->set_rules('user','Usuario','required');
				$this->form_validation->set_rules('correo','Correo','required|valid_email');
				$this->form_validation->set_rules('telf','Telefono','required');
				$this->form_validation->set_rules('depto','Departamento','required');
				$this->form_validation->set_rules('pass','Contrase&ntildea','required');
				$this->form_validation->set_rules('passconf','Confirmacion de Contrase&ntildea','required|matches[pass]');

				$pass = $this->crypt_blowfish_bydinvaders($_POST['pass']);

								$data2 = array("Nombre"=>$_POST['nombre'],
									"Apellido"=>$_POST['apellido'],
									"User_usuar"=>$_POST['user'],
									"Email_usuar"=>$_POST['correo'],
									"Telefono_usuar"=>$_POST['telf'],							
									"Escuela"=>$_POST['depto'],
									"Pass_usuar"=>$pass,
									"verf_tecnico"=>$_POST['verf_usuar']);


				if($this->form_validation->run() == TRUE)
				{

					//$pass = $_POST['password'];

					

					$this->load->model('ReportesModel');
					
					$usuario = $this->ReportesModel->crearUsuario($data2);

					$this->load->view('/vistasReportesFallas/presentacionFallas');
					$this->load->view('/vistasReportesFallas/usuarioCreado');
					$this->load->view('/vistasReportesFallas/pieDePagina');

				}
				else
				{
					$this->load->view('/vistasReportesFallas/presentacionFallas');
					$this->load->view('/vistasReportesFallas/vistaCrearUsuario',$data2);
					$this->load->view('/vistasReportesFallas/pieDePagina');


				}

				

				
				
			}
		}
	}

	

	function logout()//funcion para realizar el logout
	{
			$newdata = array('logged_in'=> FALSE);

			$this->session->unset_userdata($newdata);
			$this->session->sess_destroy();
			redirect('','refresh');//redirecciona a la pagina principal del login
	
	}

	function autenticacion()
	{
		$this->load->view('/vistasReportesFallas/presentacionFallas');
				$this->load->view('/vistasReportesFallas/autenticacionErronea');//llamada a la vista de login para iniciar sesion
				$this->load->view('/vistasReportesFallas/pieDePagina');

	}

	
	function crypt_blowfish_bydinvaders($password, $digito = 7) //FUNCION PARA ENCRIPTAR LA CONTRASEÑA DE UN NUEVO USUARIO
	{
		$set_salt = './1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$salt = sprintf('$2a$%02d$', $digito);
		for($i = 0; $i < 22; $i++)
		{
			$salt .= $set_salt[mt_rand(0, 22)];
		}
			return crypt($password, $salt);
	}
	

	


}
?>
