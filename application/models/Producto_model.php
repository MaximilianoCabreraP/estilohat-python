<?php
class Producto_model extends CI_Model{
    function __construct(){
		$this->load->database();
        date_default_timezone_set("America/Argentina/Buenos_Aires");
    }
    public function buscar_productos(){
        return $this->db->get("producto")->result_array();
    }
    public function agregar($producto){
        $producto["fecha_ingreso"] = date("Y-m-d - H:i:s");
        $this->db->insert("producto", $producto);
        return $this->db->affected_rows()>0;
    }
    public function editar($producto){
        $this->db->where("id_producto", $producto["id_producto"])
                 ->update("producto", $producto);
        return $this->db->affected_rows()>0;
    }
    public function eliminar($id){
        $this->db->where("id_producto", $id)
                 ->delete("producto");
        return $this->db->affected_rows()>0;
    }
}