<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('categorias_model');
		$this->load->model('productos_model');
		$this->load->model('imagenes_model');
		$this->load->model('carrousel_model');
		$this->load->model('preguntas_model');
		$this->load->library('My_phpmailer');
	}

	public function home(){
		if($this->session->userdata('logueado')){
			$data 					=	array();
			$data['id']				=	$this->session->userdata('id');
			$data['nombreCompleto']	=	$this->session->userdata('nombreCompleto');
			$data['user']			=	$this->session->userdata('user');
			$data['password']		=	$this->session->userdata('password');
			$data['perfil']			=	$this->session->userdata('perfil');
			
			$data['carrousel']		= 	$this->carrousel_model->getCarrousel();
			$data['productos']		= 	$this->productos_model->getProductosHome();

			$data['exitoso']		=	$this->session->flashdata('mensaje_exitoso');
			$data['error']			=	$this->session->flashdata('mensaje_error');
			$this->load->view('home', $data);
		}else{	
			$data['carrousel']		= 	$this->carrousel_model->getCarrousel();
			$data['productos']		= 	$this->productos_model->getProductosHome();
			$data['error']	=	$this->session->flashdata('mensaje_error');
			$this->load->view('home', $data);
		}	
	}

	public function info(){
		$this->load->view('phpinfo');
	}	

	/********************************************/
	/***************** SESIONES *****************/
	/********************************************/

	public function iniciarSesion(){
		if($this->input->post()){
			$user 		=	$this->input->post('user');
			$password 	= 	$this->input->post('password');

			$admin 		=	$this->admin_model->login($user, $password);

			if($admin){
				$admin_data			=	array(
					'id'			=> 	$admin->id,
					'nombreCompleto'=> 	$admin->nombreCompleto,
					'user'			=> 	$admin->user,
					'password'		=>	$admin->password,
					'perfil'		=>	$admin->perfil,
					'logueado'		=>	TRUE 
					);

				$this->session->set_userdata($admin_data);
				redirect('panel'); 
			}else{
				$this->session->set_flashdata('mensaje_error', 'El usuario y/o la contraseña ingresadas son incorrectas. Por favor intente nuevamente ');
				redirect('home');
			}
		}else{
			$this->session->set_flashdata('mensaje_error', 'Debe iniciar sesión ');
			redirect('home');
		}
	}

	public function logueado(){
		if($this->session->userdata('logueado')){
			$data 					=	array();
			$data['id']				=	$this->session->userdata('id');
			$data['nombreCompleto']	=	$this->session->userdata('nombreCompleto');
			$data['user']			=	$this->session->userdata('user');
			$data['password']		=	$this->session->userdata('password');
			$data['perfil']			=	$this->session->userdata('perfil');
			
			$data['administradores']= 	$this->admin_model->getAdministradores();
			$sinResponder 			=	$this->preguntas_model->getCantSinResponder();
			$data['cantidad']		=	$sinResponder->cantidad;

			$this->load->view('admin_panel', $data);
		}else{	
			$this->session->set_flashdata('mensaje_error', 'Debe iniciar sesión ');
			redirect('home');
		}
	}

	public function cerrarSesion(){
		$this->session->sess_destroy();
		redirect('home');
	}

	/************************************************/
	/***************** FIN SESIONES *****************/
	/************************************************/

	/************************************************/
	/***************** MANTENEDORES *****************/
	/************************************************/

	public function panel(){
		if($this->session->userdata('logueado')){
			$data 					=	array();
			$data['id']				=	$this->session->userdata('id');
			$data['nombreCompleto']	=	$this->session->userdata('nombreCompleto');
			$data['user']			=	$this->session->userdata('user');
			$data['password']		=	$this->session->userdata('password');
			$data['perfil']			=	$this->session->userdata('perfil');
			
			$data['administradores']= 	$this->admin_model->getAdministradores();
			$sinResponder 			=	$this->preguntas_model->getCantSinResponder();
			$data['cantidad']		=	$sinResponder->cantidad;

			$data['exitoso']		=	$this->session->flashdata('mensaje_exitoso');
			$data['error']			=	$this->session->flashdata('mensaje_error');
			$this->load->view('admin_panel', $data);
		}else{	
			$this->session->set_flashdata('mensaje_error', 'Debe iniciar sesión ');
			redirect('home');
		}
	}

	public function productos(){
		if($this->session->userdata('logueado')){
			$data 					=	array();
			$data['id']				=	$this->session->userdata('id');
			$data['nombreCompleto']	=	$this->session->userdata('nombreCompleto');
			$data['user']			=	$this->session->userdata('user');
			$data['password']		=	$this->session->userdata('password');
			$data['perfil']			=	$this->session->userdata('perfil');

			$data['productos']		= 	$this->productos_model->getProductosImagenes();
			$sinResponder 			=	$this->preguntas_model->getCantSinResponder();
			$data['cantidad']		=	$sinResponder->cantidad;

			$data['exitoso']		=	$this->session->flashdata('mensaje_exitoso');
			$data['error']			=	$this->session->flashdata('mensaje_error');
			
			$this->load->view('admin_productos', $data);
		}else{	
			$this->session->set_flashdata('mensaje_error', 'Debe iniciar sesión ');
			redirect('home');
		}
	}

	public function carrousel(){
		if($this->session->userdata('logueado')){
			$data 					=	array();
			$data['id']				=	$this->session->userdata('id');
			$data['nombreCompleto']	=	$this->session->userdata('nombreCompleto');
			$data['user']			=	$this->session->userdata('user');
			$data['password']		=	$this->session->userdata('password');
			$data['perfil']			=	$this->session->userdata('perfil');

			$data['carrousel']		= 	$this->carrousel_model->getCarrousel();
			$sinResponder 			=	$this->preguntas_model->getCantSinResponder();
			$data['cantidad']		=	$sinResponder->cantidad;

			$data['exitoso']		=	$this->session->flashdata('mensaje_exitoso');
			$data['error']			=	$this->session->flashdata('mensaje_error');
			
			$this->load->view('admin_carrousel', $data);
		}else{	
			$this->session->set_flashdata('mensaje_error', 'Debe iniciar sesión ');
			redirect('home');
		}
	}

	public function preguntas(){
		if($this->session->userdata('logueado')){
			$data 					=	array();
			$data['id']				=	$this->session->userdata('id');
			$data['nombreCompleto']	=	$this->session->userdata('nombreCompleto');
			$data['user']			=	$this->session->userdata('user');
			$data['password']		=	$this->session->userdata('password');
			$data['perfil']			=	$this->session->userdata('perfil');

			$data['preguntas']		= 	$this->preguntas_model->getPreguntasActivasProductos();
			$sinResponder 			=	$this->preguntas_model->getCantSinResponder();
			$data['cantidad']		=	$sinResponder->cantidad;
			
			$data['exitoso']		=	$this->session->flashdata('mensaje_exitoso');
			$data['error']			=	$this->session->flashdata('mensaje_error');
			
			$this->load->view('admin_preguntas', $data);
		}else{	
			$this->session->set_flashdata('mensaje_error', 'Debe iniciar sesión ');
			redirect('home');
		}
	}

	/****************************************************/
	/***************** FIN MANTENEDORES *****************/
	/****************************************************/

	/***************************************************/
	/***************** ADMINISTRADORES *****************/
	/***************************************************/

	public function agregar_admin(){
		$array = array(
			'nombreCompleto'	=>	$this->input->post('nombre'),
			'user' 				=> 	$this->input->post('user'),
			'password' 			=> 	$this->input->post('password'),
			'perfil' 			=> 	2
            );

		$repass					=	$this->input->post('repassword');

		if($repass 	==	$array['password']){
			if(($this->admin_model->insertar_admi($array))){
				$this->session->set_flashdata('mensaje_exitoso', 'Nuevo administrador creado correctamente.');
				redirect('Admin_controller/panel');
			}else{
				$this->session->set_flashdata('mensaje_error', 'Se ha producido un error. <br> <strong>Ticket: [Admin_controller/agregar_admin]</strong>');
				redirect('Admin_controller/panel');
			}
		}else{
			$this->session->set_flashdata('mensaje_error', 'Debe reingresar la misma contraseña.');
			redirect('Admin_controller/panel');
		}
	}

	public function modificar_admin(){
		$array					=	array(
			'nombreCompleto'	=>	$this->input->post('nombre'),
			'password'			=>	$this->input->post('password')
			);

		$repass					=	$this->input->post('repassword');

		$id 					=	$this->input->post('user');

		if($repass 	==	$array['password']){
			if(($this->admin_model->modificar_admi($array, $id)) == true){
				$this->session->set_flashdata('mensaje_exitoso', 'Datos de administrador modificados exitosamente.');
				redirect('Admin_controller/panel');
			}else{
				$this->session->set_flashdata('mensaje_error', 'Se ha producido un error. <br> <strong>Ticket: [Admin_controller/modificar_admin]</strong>');
				redirect('Admin_controller/panel');
			}
		}else{
			$this->session->set_flashdata('mensaje_error', 'Debe reingresar la misma contraseña.');
			redirect('Admin_controller/panel');
		}
	}

	/*******************************************************/
	/***************** FIN ADMINISTRADORES *****************/
	/*******************************************************/

	/*********************************************/
	/***************** PRODUCTOS *****************/
	/*********************************************/

	public function nuevo_producto(){
		if($this->session->userdata('logueado')){
			$data 					=	array();
			$data['id']				=	$this->session->userdata('id');
			$data['nombreCompleto']	=	$this->session->userdata('nombreCompleto');
			$data['user']			=	$this->session->userdata('user');
			$data['password']		=	$this->session->userdata('password');
			$data['perfil']			=	$this->session->userdata('perfil');

			$data['categorias']		= 	$this->categorias_model->getCategorias();
			$sinResponder 			=	$this->preguntas_model->getCantSinResponder();
			$data['cantidad']		=	$sinResponder->cantidad;

			$data['exitoso']		=	$this->session->flashdata('mensaje_exitoso');
			$data['error']			=	$this->session->flashdata('mensaje_error');
			
			$this->load->view('admin_producto_nuevo', $data);
		}else{	
			$this->session->set_flashdata('mensaje_error', 'Debe iniciar sesión ');
			redirect('home');
		}
	}

	public function agregar_producto(){
		if(isset($_POST)){
 			$producto	=	array(
				'nombre' 			=> 	$this->input->post('nombre'),
				'precio' 			=> 	$this->input->post('precio'),
				'descripcion' 		=> 	$this->input->post('descripcion'),
				'estado' 			=> 	"A",
				'descripcion_corta'	=> 	$this->input->post('corta'),
				'categoria' 		=> 	$this->input->post('categoria')
				);

			if(($this->productos_model->insertar($producto)) == true)
			{
				$ultimoProducto	=	$this->productos_model->obtenerUltimoProducto();		
				
				if(!empty($ultimoProducto)){
					
					$nombre_random	=	substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
					
					for($i = 1 ; $i < 5 ; $i++){
						if(!empty($_FILES['imagen'.$i]['name']))
						{
							if($i == 1){
								$img 		= array(
									'nombre' 	=> 	$nombre_random.".jpg",
									'producto'	=> 	$ultimoProducto,
									'principal'	=>	"S"
								);	
							}else{
								$img 		= array(
									'nombre' 	=> 	$nombre_random.($i-1).".jpg",
									'producto'	=> 	$ultimoProducto,
									'principal'	=>	"N"
								);	
							}
							
							if(($this->imagenes_model->insertar($img)) == true){								

								$mi_archivo					=	'imagen'.$i; //"imagen" es el name del input file
						        $config['upload_path']		=	"assets/img/productos/";
						        $config['file_name']		=	$nombre_random;
						        $config['allowed_types']	=	"gif|jpg|png"; //"*" todos
						        $config['max_size'] 		=	"50000";
						        $config['max_width'] 		=	"2000";
						        $config['max_height'] 		=	"2000";

						        $this->load->library('upload', $config);

						        if (!$this->upload->do_upload($mi_archivo)) 
						        {
					        		//*** ocurrio un error
						            echo $this->upload->display_errors();
						            $this->session->set_flashdata('mensaje_error', 'Se ha producido un error al crear Producto.<br> <strong>Ticket: [Admin_controller/agregar_producto]</strong>');
						            redirect('Admin_controller/nuevo_producto');
						        }

						        $data['uploadSuccess'] = $this->upload->data();
							} //END IF INSERT
						} //END IF ISSET $_FILES	
					}//END FOR
					
					$this->session->set_flashdata('mensaje_exitoso', 'Producto nuevo creado exitosamente!.');
					redirect('Admin_controller/productos');	
				}else{
					$this->session->set_flashdata('mensaje_error', 'Se ha producido un error. No encuentra último producto<br> <strong>Ticket: [Admin_controller/agregar_producto]</strong>');
				}		
			}else{
				$this->session->set_flashdata('mensaje_error', 'Se ha producido un error al insertar Producto. No es POST<br> <strong>Ticket: [Admin_controller/agregar_producto]</strong>');
			}
		}else{
			$this->session->set_flashdata('mensaje_error', 'Se ha producido un error. No es POST<br> <strong>Ticket: [Admin_controller/agregar_producto]</strong>');
		}
	}

	public function activar_producto(){
		if(isset($_POST)){
 			$id 	=	$this->input->post('id');

			if($this->productos_model->activarById($id)){
					$this->session->set_flashdata('mensaje_exitoso', 'Producto activado! ');
				redirect('Admin_controller/productos');	
			}else{
					$this->session->set_flashdata('mensaje_error', 'Se ha producido un error. <br> <strong>Ticket: [Admin_controller/activar_producto]</strong>');
				redirect('Admin_controller/productos');	
			}
		}
	}

	public function desactivar_producto(){
		if(isset($_POST)){
 			$id 	=	$this->input->post('id');

			if($this->productos_model->desactivarById($id)){
					$this->session->set_flashdata('mensaje_exitoso', 'Producto desactivado! ');
				redirect('Admin_controller/productos');	
			}else{
					$this->session->set_flashdata('mensaje_error', 'Se ha producido un error. <br> <strong>Ticket: [Admin_controller/activar_producto]</strong>');
				redirect('Admin_controller/productos');	
			}
		}
	}

	public function upload_four_files(){
		if(isset($_POST)){
 						        
			$producto	=	array(
				'nombre' 			=> 	$this->input->post('nombre'),
				'precio' 			=> 	$this->input->post('precio'),
				'descripcion' 		=> 	$this->input->post('descripcion'),
				'estado' 			=> 	"A",
				'descripcion_corta'	=> 	$this->input->post('corta'),
				'categoria' 		=> 	$this->input->post('categoria')
				);

			if(($this->productos_model->insertar($producto)) == true)
			{
				$ultimoProducto	=	$this->productos_model->obtenerUltimoProducto();		
				
				if(!empty($ultimoProducto)){
					
					for($i = 1 ; $i < 5 ; $i++){
						if(isset($_FILES['imagen'.$i]))
						{
							$nombre_random	=	substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
							$nombre_random	=	$nombre_random.".jpg";

							if($i == 1){
								$img 		= array(
									'nombre' 	=> 	$nombre_random,
									'producto'	=> 	$ultimoProducto,
									'principal'	=>	"S"
								);	
							}else{
								$img 		= array(
									'nombre' 	=> 	$nombre_random,
									'producto'	=> 	$ultimoProducto,
									'principal'	=>	"N"
								);	
							}
							
							if(($this->imagenes_model->insertar($img)) == true){								

								$mi_archivo					=	'imagen'.$i; //"imagen" es el name del input file
						        $config['upload_path']		=	"assets/img/productos/";
						        $config['file_name']		=	$nombre_random;
						        $config['allowed_types']	=	"gif|jpg|png"; //"*" todos
						        $config['max_size'] 		=	"50000";
						        $config['max_width'] 		=	"2000";
						        $config['max_height'] 		=	"2000";

						        $this->load->library('upload', $config);

						        if (!$this->upload->do_upload($mi_archivo)) 
						        {
					        		//*** ocurrio un error
						            echo $this->upload->display_errors();
						            $this->session->set_flashdata('mensaje_error', 'Se ha producido un error al crear Producto.<br> <strong>Ticket: [Admin_controller/agregar_producto]</strong>');
						            redirect('Admin_controller/nuevo_producto');
						        }

						        $data['uploadSuccess'] = $this->upload->data();
							} //END IF INSERT
						} //END IF ISSET $_FILES	
					}//END FOR
					
					$this->session->set_flashdata('mensaje_exitoso', 'Producto nuevo creado exitosamente!.');
					redirect('Admin_controller/nuevo_producto');	
				}else{
					$this->session->set_flashdata('mensaje_error', 'Se ha producido un error. No encuentra último producto<br> <strong>Ticket: [Admin_controller/agregar_producto]</strong>');
				}		
			}else{
				$this->session->set_flashdata('mensaje_error', 'Se ha producido un error al insertar Producto. No es POST<br> <strong>Ticket: [Admin_controller/agregar_producto]</strong>');
			}
		}else{
			$this->session->set_flashdata('mensaje_error', 'Se ha producido un error. No es POST<br> <strong>Ticket: [Admin_controller/agregar_producto]</strong>');
		}
	}		

	public function ventana_modificar_producto(){
		if($this->session->userdata('logueado')){
			$data 					=	array();
			$data['id']				=	$this->session->userdata('id');
			$data['nombreCompleto']	=	$this->session->userdata('nombreCompleto');
			$data['user']			=	$this->session->userdata('user');
			$data['password']		=	$this->session->userdata('password');
			$data['perfil']			=	$this->session->userdata('perfil');
			
			$data['categorias']		= 	$this->categorias_model->getCategorias();
			$sinResponder 			=	$this->preguntas_model->getCantSinResponder();
			$data['cantidad']		=	$sinResponder->cantidad;

			if(isset($_POST)){
				$id 	=	$this->input->post('id');
				$producto		=	$this->productos_model->getProductoById($id);
				$data['producto'] = $producto[0];
				
				$imagen_principal		=	$this->imagenes_model->getImagenPrincipalByProducto($id);
				$data['imagenes']		=	$this->imagenes_model->getImagenesNoPrincipalByProducto($id);
				$data['img_principal']	=	$imagen_principal[0];
				
				$this->load->view('admin_producto_modificar', $data);
			}	
		}else{
			$this->session->set_flashdata('mensaje_error', 'Debe iniciar sesión ');
			redirect('home');
		}
	}

	public function eliminar_producto(){
		if(isset($_POST)){
			$id 	=	$this->input->post('id');
			if($this->imagenes_model->deleteByProducto($id)){
				if($this->productos_model->deleteById($id)){
					$this->session->set_flashdata('mensaje_exitoso', 'Producto eliminado exitosamente!.');
					redirect('Admin_controller/productos');	
				}else{
					$this->session->set_flashdata('mensaje_error', 'Se ha producido un error. No se ha podido eliminar el producto<br> <strong>Ticket: [Admin_controller/eliminar_producto]</strong>');
					redirect('Admin_controller/productos');
				}
			}else{
				$this->session->set_flashdata('mensaje_error', 'Se ha producido un error. No se ha podido eliminar el producto<br> <strong>Ticket: [Admin_controller/eliminar_producto]</strong>');
				redirect('Admin_controller/productos');
			}
		}
	}

	public function modificar_imagen_principal(){
		if(isset($_POST)){
			
			$id 		=	$this->input->post('id');
			$producto 	=	$this->input->post('producto');
			
			if($this->imagenes_model->updateNoPrincipales($producto)){
				if($this->imagenes_model->updatePrincipal($id)){
					$this->session->set_flashdata('mensaje_exitoso', 'Imagen principal cambiada exitosamente!.');
					redirect('Admin_controller/productos');	
				}
				else{
					$this->session->set_flashdata('mensaje_error', 'Se ha producido un error. No se ha podido cambiar la imagen principal<br> <strong>Ticket: [Admin_controller/modificar_imagen_principal]</strong>');
					redirect('Admin_controller/productos');
				}
			}	
		}
	}

	public function modificar_producto(){
		if(isset($_POST)){
			$data 	=	array(
				'nombre'			=>	$this->input->post('nombre'),
				'precio'			=>	$this->input->post('precio'),
				'descripcion'		=>	$this->input->post('descripcion'),
				'descripcion_corta'	=>	$this->input->post('corta'),
				'categoria'			=>	$this->input->post('categoria'),
				);
			
			$id 	=	$this->input->post('id');
			
			if($this->productos_model->modificar($data, $id)){
				$this->session->set_flashdata('mensaje_exitoso', 'Datos del producto modificados exitosamente!.');
				redirect('Admin_controller/productos');	
			}else{
				$this->session->set_flashdata('mensaje_error', 'Se ha producido un error. No se ha podido modificar los datos<br> <strong>Ticket: [Admin_controller/modificar_producto]</strong>');
				redirect('Admin_controller/productos');
			}	
		}
	}

/********************************************/
/*************** FIN PRODUCTOS **************/
/********************************************/

/****************************************/
/*************** SLIDER **************/
/****************************************/

	public function agregar_carrousel(){
		if(isset($_POST)){
			$nombreImagen	=	substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
			$nombreImagen	=	$nombreImagen.".jpg";

			$array		=	array(
				'imagen'=> $nombreImagen,
				'titulo'=> $this->input->post('titulo'),
				'texto'	=> $this->input->post('texto')
				);

			if($this->carrousel_model->insertar($array)){

				$mi_archivo					=	'imagen';

		        $config['upload_path']		=	"assets/img/carrousel/";
		       
		        $config['file_name']		=	$nombreImagen;
		        $config['allowed_types']	=	"*";
		        $config['max_size'] 		=	"50000";
		        $config['max_width'] 		=	"2000";
		        $config['max_height'] 		=	"2000";

		        $this->load->library('upload', $config);
		        
		        if ($this->upload->do_upload($mi_archivo)) {
		        	$data['uploadSuccess'] = $this->upload->data();

		        	//print_r("SUCCESS - ");
		        	//print_r($data['uploadSuccess']);
		        	//exit;
					$this->session->set_flashdata('mensaje_exitoso', 'Slider creado correctamente.');
					redirect('Admin_controller/carrousel');    
		        }else{
		        	//*** ocurrio un error
		            $data['uploadError'] = $this->upload->display_errors();
		            echo $this->upload->display_errors();
		            //print_r("ERROR - ");
		        	//print_r($data['uploadError']);
		        	//exit;

		   		 	$this->session->set_flashdata('mensaje_error', 'Se ha producido un error. <br> <strong>Ticket: [Admin_controller/agregar_carrousel]</strong>');
					redirect('Admin_controller/carrousel');
		        }
			}else{
				$this->session->set_flashdata('mensaje_error', 'Se ha producido un error. No es POST<br> <strong>Ticket: [Admin_controller/agregar_carrousel]</strong>');
				redirect('Admin_controller/carrousel');
			}
		}
	}

	public function modificar_carrousel(){
		if(isset($_POST)){
			$array		=	array(
				'titulo'=> 	$this->input->post('titulo'),
				'texto'	=> 	$this->input->post('texto')
				);
			$id 		=	$this->input->post('id');	
			
			if($this->carrousel_model->modificar($array, $id)){
				$this->session->set_flashdata('mensaje_exitoso', 'Datos del Slider modificados exitosamente.');
				redirect('Admin_controller/carrousel');
			}else{
				$this->session->set_flashdata('mensaje_error', 'Se ha producido un error. <br> <strong>Ticket: [Admin_controller/modificar_carrousel]</strong>');
				redirect('Admin_controller/carrousel');
			}
		}
	}

	public function eliminar_carrousel(){
		if(isset($_POST)){
			$id 	=	$this->input->post('id');	
			
			if($this->carrousel_model->eliminar($id)){
				$this->session->set_flashdata('mensaje_exitoso', 'Imagen eliminada del Slider.');
				redirect('Admin_controller/carrousel');
			}else{
				$this->session->set_flashdata('mensaje_error', 'Se ha producido un error. <br> <strong>Ticket: [Admin_controller/eliminar_carrousel]</strong>');
				redirect('Admin_controller/carrousel');
			}
		}
	}

	/*************************************************/
	/***************** FIN CARROUSEL *****************/
	/*************************************************/

	/*********************************************/
	/***************** PREGUNTAS *****************/
	/*********************************************/
	
	public function responder(){
		if(isset($_POST)){
			$array	=	array(
				'respuesta'	=>	$this->input->post('respuesta')
				);

			$id 	=	$this->input->post('id');
			$mailto	=	$this->input->post('email');

			if($this->preguntas_model->responderPregunta($array, $id)){
				
				$email	=	"coto.coopman7@gmail.com";
				$nombre =	"coto";
				$mensaje= 	$this->input->post('respuesta');

	            //configuración del correo by PHPMailer
	            $mail = new PHPMailer();
	            $mail->IsSMTP();            // establecemos que utilizaremos SMTP
	            $mail->SMTPAuth     = true; // habilitamos la autenticación SMTP
	            $mail->SMTPSecure   = "ssl";//"ssl" o "tls" establecemos el prefijo del protocolo seguro de comunicación con el servidor
	            $mail->Host         = "smtp.gmail.com"; // establecemos GMail como nuestro servidor SMTP
	            $mail->Port         = 465;  // 465 o 587 establecemos el puerto SMTP en el servidor de GMail
	            $mail->Username     = "coto.coopman7@gmail.com";    // usuario de Gmail (se deben habilitar desde gmail el uso de servicios)
	            $mail->Password     = "lallevo7";                   // password de la cuenta GMail
	            $mail->SetFrom($email, $nombre);  // Quien envía el correo
	            $mail->AddReplyTo($email, $nombre);  //A quien debe ir dirigida la respuesta
	            $mail->Subject      = "Contacto desde sitio web JardinDelivery.cl";  //Asunto del mensaje
	            $mail->Body         = "Enviado desde formulario de Contacto del sitio www.jardindelivery.cl\nEnviado el ".date('d-m-Y')." a las ".date('H:i:s')."\n\n"."Respuesta a su pregunta: ".$mensaje;   //contenido del correo
	            //$mail->AltBody      = "Cuerpo en texto plano";  //contenido del correo
	            $mail->AddAddress($mailto, $mailto); //  destinatario

	            if(!$mail->Send()) {
	                //print_r($mail->ErrorInfo);
	                $this->session->set_flashdata('mensaje_error', 'Se ha producido un error. No se ha podido enviar el mensaje con la respuesta <br> <strong>Ticket: [Admin_controller/responder]</strong>');
	                redirect('Admin_controller/preguntas');
	            } else {
	                $this->session->set_flashdata('mensaje_exitoso', 'Pregunta respondida');
	                redirect('Admin_controller/preguntas');	
	            }
			}else{
				$this->session->set_flashdata('mensaje_error', 'Se ha producido un error. No se ha podido responder la pregunta<br> <strong>Ticket: [Admin_controller/responder]</strong>');
				redirect('Admin_controller/preguntas');
			}
		}
	}

	public function eliminar_pregunta(){
		if(isset($_POST)){
			$id	=	$this->input->post('id');

			if($this->preguntas_model->eliminarPregunta($id)){
				$this->session->set_flashdata('mensaje_exitoso', 'Pregunta eliminada!');
				redirect('Admin_controller/preguntas');	
			}else{
				$this->session->set_flashdata('mensaje_error', 'Se ha producido un error. No se pudo eliminar la pregunta<br> <strong>Ticket: [Admin_controller/eliminar_pregunta]</strong>');
				redirect('Admin_controller/preguntas');
			}
		}		
	}

	/*************************************************/
	/***************** FIN PREGUNTAS *****************/
	/*************************************************/

	//BORRAR
	public function test(){
		$data['admin'] = 	$this->admin_model->getAdministradores();

		if(!empty($data['admin'])){
			$this->load->view('phpinfo', $data);
		}else{
			echo "empty";
		}
	}
	//BORRAR
}
	