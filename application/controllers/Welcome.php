<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('carrousel_model');
		$this->load->model('categorias_model');
		$this->load->model('productos_model');
		$this->load->model('imagenes_model');
	}

	public function index(){
		$data['carrousel']		= 	$this->carrousel_model->getCarrousel();
		$data['productos']		= 	$this->productos_model->getProductosHome();
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
		print_r("entramos");exit;
		if(isset($_POST)){
			$texto 				=	$this->input->post('texto');
			$data['carrousel']	= 	$this->carrousel_model->getCarrousel();
			$data['productos']	= 	$this->productos_model->getProductosImagenesByText($texto);
			$this->load->view('home', $data);
		}
	}
}
