<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('carrousel_model');
		$this->load->model('categorias_model');
		$this->load->model('productos_model');
		$this->load->model('imagenes_model');
		$this->load->model('preguntas_model');
	}

	public function index(){
		$data['carrousel']		= 	$this->carrousel_model->getCarrousel();
		$data['productos']		= 	$this->productos_model->getProductosHome();
		$data['correo_enviado']	=	$this->session->flashdata('mensaje_exitoso');
		$data['error']			=	$this->session->flashdata('mensaje_error');

		$this->load->view('home', $data);
	}

	public function info(){
		$this->load->view('phpinfo');
	}	

	public function filtrar_categoria(){
		if(isset($_POST)){
			$categoria 			=	$this->input->post('categoria');
			$data['carrousel']	= 	$this->carrousel_model->getCarrousel();
			$data['productos']	= 	$this->productos_model->getProductosImagenesByCategoria($categoria);
			$this->load->view('home', $data);
		}
	}

	public function buscar(){
		if(isset($_POST)){
			$texto 				=	$this->input->post('texto');
			$data['carrousel']	= 	$this->carrousel_model->getCarrousel();
			$data['productos']	= 	$this->productos_model->getProductosImagenesByText($texto);
			$this->load->view('home', $data);
		}
	}

	public function detalle_producto(){
		if(isset($_POST['id'])){
			$id 		=	$this->input->post('id');

			$producto 	=	$this->productos_model->getDetalleProducto($id);
			$imagenes 	=	array();
			$principal	= 	"";

			if(!empty($producto)){
				
				foreach($producto as $row){
					if($row->principal == 'S'){
						$principal	=	$row->imagen;
					}else{
						array_push($imagenes, $row->imagen);	
					}
				}

				$preguntas 	=	$this->preguntas_model->getPreguntasActivasByProducto($id);

				$data	=	array(
					'id'		=>	$producto[0]->id,
					'nombre'	=>	$producto[0]->nombre,
					'precio'	=>	$producto[0]->precio,
					'descrip'	=>	$producto[0]->descripcion,
					'corta'		=>	$producto[0]->corta,
					'estado'	=>	$producto[0]->estado,
					'categoria'	=>	$producto[0]->categoria,
					'principal'	=>	$principal,
					'imagenes'	=>	$imagenes,
					'preguntas'	=>	$preguntas
					);

				$this->load->view('detalle_producto', $data);
			}
		}else{
			redirect('home');
		}
	}

	public function pregunta_nueva() {
		if(isset($_POST)){
			$array 	=	array(
				'email'		=>	$this->input->post('email'),
				'pregunta'	=>	$this->input->post('pregunta'),
				'producto'	=>	$this->input->post('idProducto'),
				'estado'	=>	"A"
			);

			if($this->preguntas_model->insertar($array)){
				$this->session->set_flashdata('mensaje_exitoso', 'Su pregunta será respondida a la brevedad!');
				redirect('Welcome/index');
			}else{
				$this->session->set_flashdata('mensaje_error', 'Se ha producido un error al enviar la pregunta, favor intentelo mas tarde.');
				redirect('Welcome/index');
			}
		}
	}
}
