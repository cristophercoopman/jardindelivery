<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Preguntas_model extends CI_Model{
	
	public function insertar($array){
		if( $this->db->insert('preguntas', $array)){
			return true;
		}else{
			return false;
		}
	}

	public function getPreguntas(){
		$this->db->from('preguntas');
		$query	=	$this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
	}

	public function getPreguntasActivasProductos(){
		$this->db->select("a.id 'id', a.email 'email', a.estado 'estado', a.pregunta 'pregunta', a.respuesta 'respuesta',
			b.nombre 'nombre'");
		$this->db->from('preguntas a');
		$this->db->join('productos b', 'b.id = a.producto');
		$this->db->where('a.estado', 'A');
		$query	=	$this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
	}
	
	public function getPreguntasActivasByProducto($idProducto){
		$this->db->from('preguntas');
		$this->db->where('producto', $idProducto);
		$this->db->where('estado', 'A');
		$query	=	$this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
	}

	public function responderPregunta($array, $id){
		$this->db->where('id', $id);
		if ($this->db->update('preguntas', $array)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function eliminarPregunta($id){
		$array 	=	array(
			'estado'	=>	"I"
			);
		$this->db->where('id', $id);
		if ($this->db->update('preguntas', $array)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function getCantSinResponder(){
		$array	=	array('',' ',null);
		$this->db->select('COUNT(id) "cantidad"');
		$this->db->from('preguntas');
		$this->db->where_in('respuesta', $array);
		$this->db->where('estado', "A");
		$query	=	$this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
	}
}