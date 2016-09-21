<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carrousel_model extends CI_Model{
	
	public function insertar($array){
		if( $this->db->insert('carrousel', $array)){
			return true;
		}else{
			return false;
		}
	}

	public function modificar($array, $id){
		$this->db->where('id', $id);
		if ($this->db->update('carrousel', $array)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function eliminar($id){
		$this->db->where('id', $id);
		if ($this->db->delete('carrousel')){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function getCarrousel(){
		$this->db->from('carrousel');
		$query	=	$this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
	}

}