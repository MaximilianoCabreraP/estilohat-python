<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Caballero extends CI_Controller{
	public function index($msg=""){
        log_message("error", "-----Listado Caballero-----");
        $this->load->view("sskotz/header", ["title" => "Listado Caballeros"]);
        $this->load->view("sskotz/listado_caballeros", ["caballeros" => $this->Caballero_model->buscar_caballeros(), "msg" => $msg]);
        $this->load->view("sskotz/footer");
	}
	public function nuevo($msg=""){
        log_message("error", "-----Nuevo Caballero-----");
        $this->load->view("sskotz/header");
        $this->load->view("sskotz/ingresar_caballero");
        $this->load->view("sskotz/footer");
    }
    public function agregar_caballero(){
        log_message("error", "------------Agregar Caballero------------");
        $data = $this->input->post();
        $this->load->view("json", ["data" => $data]);
    }
}