<?php
class Obrero_model extends CI_Model{
    function __construct(){
		$this->load->database();
        date_default_timezone_set("America/Argentina/Buenos_Aires");
    }
    function buscar_obreros(){
        return $this->db->get("obrero")->result_array();
    }
    function agregar_obrero(){}
    function editar_orbero(){}
    function verificar_datos(){}
}