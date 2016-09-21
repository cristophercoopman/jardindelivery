<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imagenes_model extends CI_Model{
	
	public function insertar($array){
		if( $this->db->insert('imagenes', $array)){
			return true;
		}else{
			return false;
		}
	}

	public function modificar($array, $id){
		$this->db->where('id', $id);
		if ($this->db->update('imagenes', $array)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function getImagenes(){
		$this->db->from('imagenes');
		$this->db->where('perfil', 2);
		$query	=	$this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
	}

	public function getImagenesNoPrincipalByProducto($id){
		$this->db->from('imagenes');
		$this->db->where('producto', $id);
		$this->db->where('principal', "N");
		$query	=	$this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
	}

	public function getImagenPrincipalByProducto($id){
		$this->db->from('imagenes');
		$this->db->where('producto', $id);
		$this->db->where('principal', "S");
		$query	=	$this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
	}

	public function updateNoPrincipales($producto){
		$array	=	array(
			'principal'	=> 	"N"
			);
		$this->db->where('producto', $producto);
		if ($this->db->update('imagenes', $array)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function updatePrincipal($id){
		$array	=	array(
			'principal'	=> 	"S"
			);
		$this->db->where('id', $id);
		if ($this->db->update('imagenes', $array)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function deleteByProducto($id){
		$this->db->where('producto', $id);
		if ($this->db->delete('imagenes')){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}