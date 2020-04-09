<?php
    class Caballero_model extends CI_Model{
        function __construct(){
            $this->sskotz = $this->load->database("sskotz",TRUE);

            date_default_timezone_set("America/Argentina/Buenos_Aires");
        }
        public function buscar_caballeros(){
            log_message("error", "BUsco Caballeros");
            return $this->sskotz->get("saintseiyakotz.caballeros")->result_array();
        }
        public function buscar_caballero($id){
            return $this->sskotz->get_where("caballeros", ["id"=>$id])->row_array();
        }
    }