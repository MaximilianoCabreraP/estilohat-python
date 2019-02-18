<?php
class Interno_model extends CI_Model {
    function __construct() {
		$this->load->database();
    }

    function getTabla($slug){
        return $this->db->select("*")->from($slug)->get()->result_array();
    }
}
?>