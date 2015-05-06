<?php
	class Reportes extends CI_Controller
	{

		function consultar_sesion()
		{//funcion que pregunta si un usuario ya inicio sesion
			if(!($this->session->userdata('logged_in'))==TRUE){//llamada a la funcion que consulta el estado de la sesion
				return 0;//no ha iniciado sesion
			}
			else
				return 1;//ya inicio sesion
			}
		function es_tecnico()//funcion que pregunta si un usuario es tecnico o un usuario regular
		{
			if($this->session->userdata('tipo_user') == '1' )
				return 1;
			else
				return 0;
		}

		function index()
		{//Controlador de Inicio de sesion
			if($this->consultar_sesion()==0){
				$this->load->view('presentacion_fallas');
				$this->load->view('login');//llamada a la vista de login para iniciar sesion
			}
			else
			{	
				if($this->session->userdata('tipo_user')== '1')
				{
					$this->listar();
				}
				else
				{
					$this->listar_reportes_usuario($this->session->userdata('nombre'));
				}
				
			}
		}

		function login()
		{//Controlador para manejar el inicio de la sesion


			$this->load->model('Reportes_model');//llamada al modelo que hace las consultas con la BD
			$resp = $this->Reportes_model->existe_usuario($_POST['nombre'] ,$_POST['pass']);//se consulta a la BD si existe el usuario
				

			//if ($this->db->simple_query($result))//funcion que de captura de erros
			//{
				if ($resp->num_rows()>0)//funcion que de captura de erros y la query fue correcta
				{
					$row = $resp->row_array(1); 
					{
						$newdata = array(
									'nombre'=>$_POST['nombre'],
									'correo'=>$row['Email_usuar'],
									'telf'=>$row['Telefono_usuar'],
									'tipo_user'=>$row['verf_tecnico'],
									'logged_in'=> TRUE
									);
						
					}
					
					$this->session->set_userdata($newdata);
					if($this->session->userdata('tipo_user')==1)
					{
						echo "estoy aqui";
						$this->listar();//vista para tecnico
					}
					else
					{
						$this->listar_reportes_usuario($this->session->userdata('nombre'));//enviar el usuario a para los reportes propios
					}
					
       			
				}
				else
				{
					$this->index();					
					echo "user no existe";
					
				}
        			
		}

		function listar()//funcion que muestra todas las solicitudes realizadas METODO DEDICADO AL TECNICO
		{
			if($this->consultar_sesion()==0)
			{
				$this->load->view('presentacion_fallas');
				$this->load->view('login');//llamada a la vista de login para iniciar sesion
			}
			else
			{
				$this->load->model('Reportes_model');
				$reportes= $this->Reportes_model->listar_reportes();//llamada a la funcion que lista los reportes
				$datos_vista = array('rs_articulos'=>$reportes);
				$this->load->view('presentacion_fallas');
				$this->load->view('hacerreporte',$datos_vista);//carga la vista con los reportes
				$this->load->view('vista_logout');
			}
			

		}

		function listar_reportes_usuario($user)//FUNCION QUE LISTA LOS REPORTES HECHOS POR UN USUARIO ESPECIFICO
		{
			if($this->consultar_sesion()==0)
			{
				$this->load->view('presentacion_fallas');
				$this->load->view('login');//llamada a la vista de login para iniciar sesion
			}
			else
			{
				$this->load->model('Reportes_model');
				$reportes= $this->Reportes_model->listar_reportes_usuario($user);//llamada a la funcion que lista los reportes
				$datos_vista = array('rs_articulos'=>$reportes);
				$this->load->view('presentacion_fallas');
				$this->load->view('vista_reportes_usuario',$datos_vista);//carga la vista con los reportes
				$this->load->view('vista_logout');
			}

		}
	
		
		function solicitud()//llamada a la vista para realizar solicitud
		{
			if($this->consultar_sesion()==0)
			{

				$this->load->view('presentacion_fallas');
				$this->load->view('login');//llamada a la vista de login para iniciar sesion
			}
			else
			{
				if($this->session->userdata('tipo_user')== '1')//VERICACION SI ES UN TECNICO, SI ES TRUE MUESTRA LA VISTA DEL TECNICO SINO LA DEL USUARIO
				{
					$this->load->view('presentacion_fallas');     
					$this->load->view('vista_solicitud_tecnico');
					$this->load->view('vista_logout');
				}
				else
				{
					$this->load->view('presentacion_fallas');
					$this->load->view('solicitud');
					$this->load->view('vista_logout');
				}
				
				
			}			
			
		}

		function generar_reporte()//Funcion encargada de llamar al modelo que inserta un nuevo reporte o actualiza los datos
		{

			if($this->consultar_sesion()==0)
			{

				$this->load->view('presentacion_fallas');
				$this->load->view('login');//llamada a la vista de login para iniciar sesion
			}
			else
			{
				$estado="En Progreso";
				$usuario = $this->session->userdata('nombre');
				$this->load->model('Reportes_model');
				$this->load->view('presentacion_fallas');
				$fecha=date('Y-m-d');
				$hora=date("h:i:s");

								
				if($this->es_tecnico())
				{
					
					if($_POST['usuario'] != '')
					{
						$usuario = $_POST['usuario'];
					}
					if($_POST['estado']!="En Progreso")
						$estado=$_POST['estado'];

				}
				$data = array("User_usuar"=>$usuario,
							"Email_usuar"=>$this->sesion->userdata('correo'),
							"Telefono_usuar"=>$this->sesion->userdata('telf'),
							"Fecha"=>$fecha,
							"Hora"=>$hora,
							"Tipo"=>$_POST['tipo'],
							"Asunto"=>$_POST['asunto'],
							"Descrip"=>$_POST['descrip'],
							"Estado"=>$estado,
							"Depto"=>$_POST['depto']														
							);


				if(isset($_POST['Enviar_modificacion'])==TRUE)//SE PREGUNTA SI SE ENVIO UNA SOLICITUD REGULAR O SI ES UNA LLAMADA PARA MODIFICAR LA SOLICITUD
				{
					
					$result= $this->Reportes_model->modificar_reporte($data,$_POST['id']);//armando array con los datos para la solicitud , llamado a la funcion para insertar nuevo reporte
				}
				else
				{
					
					$result= $this->Reportes_model->insertar_reporte($data);//armando array con los datos para la solicitud , llamado a la funcion para insertar nuevo reporte
												
				}	

				

			}

			

		}

		function modificarsolicitud()//FUNCION QUE LLAMA A UNA VISTA QUE PERMITE LA MODIFICACION DE UN REPORTE
		{

			if($this->consultar_sesion()==0)
			{
				$this->load->view('presentacion_fallas');
				$this->load->view('login');//llamada a la vista de login para iniciar sesion
			}
			else
			{
				
				if($this->es_tecnico())
				{
					$datos = array('id'=>$_POST['id'],
									'usuario'=>$_POST['usuario'],
									'asunto'=>$_POST['asunto'],
									'descrip'=> $_POST['descrip']);
					$this->load->view('presentacion_fallas');
					$this->load->view('modificar_solicitud',$datos);
					$this->load->view('vista_logout');

					

				}
				else
				{
					echo "Access Denied!";
				}
			}
			

		}

		function eliminar($id)
		{
			if($this->consultar_sesion()==0)
			{
				$this->load->view('presentacion_fallas');
				$this->load->view('login');//llamada a la vista de login para iniciar sesion
			}
			else
			{
				if($this->es_tecnico())
				{
					$this->load->model('Reportes_model');
					$result= $this->Reportes_model->eliminar($id);
					redirect('http://localhost/Reportedefallas/','auto');

				}
				else
				{
					echo "Access Denied";
				}

			}
			 
			
		}

		function logout()//funcion para realizar el logout
		{
			$newdata = array('logged_in' => FALSE);
			$this->session->unset_userdata($newdata);
			redirect('http://localhost/Reportedefallas/','auto');//redirecciona a la pagina principal del login
	
		}

	}	

?>