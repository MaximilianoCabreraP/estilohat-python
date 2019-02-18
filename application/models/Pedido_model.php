<?php
class Pedido_model extends CI_Model{
    function __construct(){
		$this->load->database();
        date_default_timezone_set('America/Argentina/Buenos_Aires');
    }
    public function buscar_pedidos(){
        return $this->db->get('pedido')->result_array();
    }
    public function agregar_pedido($pedido){
        $pedido['fecha_pedido'] = date('Y-m-d - H:i:s');
        $pedido['estado'] = 1;
        $this->db->insert('pedido', $pedido);
        return $this->db->affected_rows()>0;
    }
}