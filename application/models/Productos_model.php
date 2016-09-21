<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productos_model extends CI_Model{
	
	public function insertar($array){
		if( $this->db->insert('productos', $array)){
			return true;
		}else{
			return false;
		}
	}

	public function modificar($array, $id){
		$this->db->where('id', $id);
		if ($this->db->update('productos', $array)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function getProductos(){
		$this->db->from('productos');
		$query	=	$this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
	}
	
	public function getProductoById($id){
		$this->db->from('productos');
		$this->db->where('id',$id);
		$query	=	$this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
	}

	public function getProductosImagenes(){
		$this->db->select('p.id AS `idProducto`, p.nombre AS `nombreProducto`, p.precio AS `precio`, 
			p.descripcion AS `descripcion`, p.estado AS `estado`, p.descripcion_corta AS `corta`, 
			p.categoria AS `categoriaProducto`, i.id AS `idImagen`, i.nombre AS `nombreImagen`, 
			i.producto AS `idProductoFK`, i.principal AS `principal`');
		$this->db->from('productos p');
		$this->db->join('imagenes i', 'p.id = i.producto');
		$this->db->where('i.principal = "S"');
		$query	=	$this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
	}

	public function getProductosHome(){
		$this->db->select('p.id AS `idProducto`, p.nombre AS `nombreProducto`, p.precio AS `precio`, 
			p.descripcion AS `descripcion`, p.estado AS `estado`, p.descripcion_corta AS `corta`, 
			p.categoria AS `categoriaProducto`, i.id AS `idImagen`, i.nombre AS `nombreImagen`, 
			i.producto AS `idProductoFK`, i.principal AS `principal`');
		$this->db->from('productos p');
		$this->db->join('imagenes i', 'p.id = i.producto');
		$this->db->where('i.principal = "S"');
		$this->db->where('p.estado', "A");
		$query	=	$this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
	}

	public function getProductosImagenesByCategoria($categoria){
		$this->db->select('p.id AS `idProducto`, p.nombre AS `nombreProducto`, p.precio AS `precio`, 
			p.descripcion AS `descripcion`, p.estado AS `estado`, p.descripcion_corta AS `corta`, 
			p.categoria AS `categoriaProducto`, i.id AS `idImagen`, i.nombre AS `nombreImagen`, 
			i.producto AS `idProductoFK`, i.principal AS `principal`');
		$this->db->from('productos p');
		$this->db->join('imagenes i', 'p.id = i.producto');
		$this->db->join('categorias c', 'p.categoria = c.id');
		$this->db->where('i.principal = "S"');
		$this->db->where('c.id', $categoria);
		$this->db->where('p.estado', "A");
		$query	=	$this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
	}

	public function getProductosImagenesByText($texto){
		$this->db->select('p.id AS `idProducto`, p.nombre AS `nombreProducto`, p.precio AS `precio`, 
			p.descripcion AS `descripcion`, p.estado AS `estado`, p.descripcion_corta AS `corta`, 
			p.categoria AS `categoriaProducto`, i.id AS `idImagen`, i.nombre AS `nombreImagen`, 
			i.producto AS `idProductoFK`, i.principal AS `principal`');
		$this->db->from('productos p');
		$this->db->join('imagenes i', 'p.id = i.producto');
		$this->db->where('i.principal = "S"');
		$this->db->like('p.nombre', $texto);
		$this->db->where('p.estado', "A");
		$query	=	$this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
	}

	public function getProductosActivos(){
		$this->db->from('productos');
		$this->db->where('estado', "A");
		$query	=	$this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
	}

	public function getProductosInactivos(){
		$this->db->from('productos');
		$this->db->where('estado', "I");
		$query	=	$this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
	}

	public function obtenerUltimoProducto(){
		$sql = "SELECT MAX(id) AS maximo FROM productos";
		$result = $this->db->query($sql);
        $row = $result->row_array();
        return $row['maximo'];
	}

	public function deleteById($id){
		$this->db->where('id', $id);
		if ($this->db->delete('productos')){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function activarById($id){
		$array 	=	array(
			'estado'	=>	"A"
			);
		$this->db->where('id', $id);
		if ($this->db->update('productos', $array)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function desactivarById($id){
		$array 	=	array(
			'estado'	=>	"I"
			);
		$this->db->where('id', $id);
		if ($this->db->update('productos', $array)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

}