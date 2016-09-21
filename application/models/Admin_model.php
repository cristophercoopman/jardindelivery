<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model{
	
	public function insertar_admi($array){
		if( $this->db->insert('admin', $array)){
			return true;
		}else{
			return false;
		}
	}

	public function modificar_admi($array, $id){
		$this->db->where('id', $id);
		if ($this->db->update('admin', $array)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function login($user, $password){
		$this->db->select('id, nombreCompleto, user, password, perfil');
		$this->db->from('admin');
		$this->db->where('user', $user);
		$this->db->where('password', $password);
		$query = $this->db->get();
		$resultado = $query->row();
		return $resultado;
	}

	public function getAdministradores(){
		$this->db->from('admin');
		$this->db->where('perfil', 2);
		$query	=	$this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
	}
}