<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorias_model extends CI_Model{
	
	public function insertar($array){
		if( $this->db->insert('categorias', $array)){
			return true;
		}else{
			return false;
		}
	}

	public function modificar($array, $id){
		$this->db->where('id', $id);
		if ($this->db->update('categorias', $array)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function getCategorias(){
		$this->db->from('categorias');
		$query	=	$this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
	}
	
}