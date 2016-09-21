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
	}

	public function home(){
		if($this->session->userdata('logueado')){
			$data 					=	array();
			$data['id']				=	$this->session->userdata('id');
			$data['nombreCompleto']	=	$this->session->userdata('nombreCompleto');
			$data['user']			=	$this->session->userdata('user');
			$data['password']		=	$this->session->userdata('password');
			$data['perfil']			=	$this->session->userdata('perfil');
			
			$data['exitoso']		=	$this->session->flashdata('mensaje_exitoso');
			$data['error']			=	$this->session->flashdata('mensaje_error');
			$this->load->view('home', $data);
		}else{	
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

			$data['exitoso']		=	$this->session->flashdata('mensaje_exitoso');
			$data['error']			=	$this->session->flashdata('mensaje_error');
			
			$this->load->view('admin_carrousel', $data);
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
					
					for($i = 1 ; $i < 5 ; $i++){
						if(!empty($_FILES['imagen'.$i]['name']))
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

	/*

/*<?php
    # definimos la carpeta destino
    $carpetaDestino="imagenes/";
 
    # si hay algun archivo que subir
    if($_FILES["archivo"]["name"][0])
    {
 
        # recorremos todos los arhivos que se han subido
        for($i=0;$i<count($_FILES["archivo"]["name"]);$i++)
        {
 
            # si es un formato de imagen
            if($_FILES["archivo"]["type"][$i]=="image/jpeg" || $_FILES["archivo"]["type"][$i]=="image/pjpeg" || $_FILES["archivo"]["type"][$i]=="image/gif" || $_FILES["archivo"]["type"][$i]=="image/png")
            {
 
                # si exsite la carpeta o se ha creado
                if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
                {
                    $origen=$_FILES["archivo"]["tmp_name"][$i];
                    $destino=$carpetaDestino.$_FILES["archivo"]["name"][$i];
 
                    # movemos el archivo
                    if(@move_uploaded_file($origen, $destino))
                    {
                        echo "<br>".$_FILES["archivo"]["name"][$i]." movido correctamente";
                    }else{
                        echo "<br>No se ha podido mover el archivo: ".$_FILES["archivo"]["name"][$i];
                    }
                }else{
                    echo "<br>No se ha podido crear la carpeta: up/".$user;
                }
            }else{
                echo "<br>".$_FILES["archivo"]["name"][$i]." - NO es imagen jpg";
            }
        }
    }else{
        echo "<br>No se ha subido ninguna imagen";
    }
    ?>
*/	

	/*************************************************/
	/***************** FIN PRODUCTOS *****************/
	/*************************************************/

	/*********************************************/
	/***************** CARROUSEL *****************/
	/*********************************************/
	
	// public function agregar_carrousel(){
	// 	if(isset($_POST)){
	// 		$nombreImagen	=	substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);

	// 		$array		=	array(
	// 			'imagen'=> $nombreImagen,
	// 			'titulo'=> $this->input->post('titulo'),
	// 			'texto'	=> $this->input->post('texto')
	// 			);

	// 		$mi_archivo					=	'imagen';
	// 	        $config['upload_path']		=	"assets/img/carrousel/";
	// 	        $config['file_name']		=	$nombreImagen;
	// 	        $config['allowed_types']	=	"*";
	// 	        $config['max_size'] 		=	"50000";
	// 	        $config['max_width'] 		=	"2000";
	// 	        $config['max_height'] 		=	"2000";

	//         $this->load->library('upload', $config);
		        
	//         if ($this->upload->do_upload($mi_archivo)) {
	//         	$data['uploadSuccess'] = $this->upload->data();

	//         	if($this->carrousel_model->insertar($array)){
	//         		$this->session->set_flashdata('mensaje_exitoso', 'Slider creado correctamente.');
	// 				redirect('Admin_controller/carrousel');    
	//         	}else{
	//         		$this->session->set_flashdata('mensaje_error', 'Se ha producido un error. <br> <strong>Ticket: [Admin_controller/agregar_carrousel]</strong>');
	// 				redirect('Admin_controller/carrousel');
	//         	}
	//         }else{
	//         	//*** ocurrio un error
	//             $data['uploadError'] = $this->upload->display_errors();
	//             echo $this->upload->display_errors();
	//             $this->session->set_flashdata('mensaje_error', 'Se ha producido un error al guardar la imágen seleccionada. <br> <strong>Ticket: [Admin_controller/agregar_carrousel]</strong>');
	// 			redirect('Admin_controller/carrousel');
	//         }
	// 	}
	// }

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
	