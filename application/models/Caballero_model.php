<?php
    class Caballero_model extends CI_Model{
        function __construct(){
            $this->dbss = $this->load->database("sskotz",TRUE);

            date_default_timezone_set("America/Argentina/Buenos_Aires");
        }
        public function buscar_caballeros(){
            return $this->dbss->get("caballeros")->result_array();
        }/*
        public function buscar_caballero($id){
            return $this->dbss->get_where("caballeros", ["id"=>$id])->row_array();
        }*/
    }