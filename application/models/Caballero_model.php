<?php
    class Caballero_model extends CI_Model{
        function __construct(){
            $this->sskotz = $this->load->database("sskotz",TRUE);
            date_default_timezone_set("America/Argentina/Buenos_Aires");
        }
        public function buscar_caballeros(){
            return $this->sskotz->get("caballeros")->result_array();
        }
        public function buscar_caballero($id){
            return $this->sskotz->get_where("caballeros", ["id"=>$id])->row_array();
        }
        public function buscar_caballero_by_nombre($nombre){
            return $this->sskotz->get_where("caballeros", ["nombre"=>$nombre])->row_array();
        }
        public function crear_caballero($caballero){
            $this->sskotz->insert("caballeros", $caballero);
            return $this->sskotz->affected_rows() > 0;
        }
    }