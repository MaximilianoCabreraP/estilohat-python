<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Caballero extends CI_Controller{
	public function index($msg=""){
        log_message("error", "-----Listado Caballero-----");
        $caballeros = $this->Caballero_model->buscar_caballeros();
        log_message("error", "Caballeros: ".print_r($caballeros, true));
        $this->load->view("sskotz/header", ["title" => "Listado Caballeros"]);
        $this->load->view("sskotz/listado_caballeros", ["caballeros" => $caballeros, "msg" => $msg, "msj" => $this->session->flashdata("msj")]);
        $this->load->view("sskotz/footer");
	}
	public function nuevo($msg=""){
        log_message("error", "-----Nuevo Caballero-----");
        $this->load->view("sskotz/header", ["title" => "Nuevo Caballero"]);
        $this->load->view("sskotz/ingresar_caballero");
        $this->load->view("sskotz/footer");
    }
    public function agregar_caballero(){
        log_message("error", "------------Agregar Caballero------------");
        $caballero = $this->input->post();
        if($this->Caballero_model->crear_caballero($caballero)){
            $this->session->set_flashdata("msj", "Se creó la ficha de $caballero[nombre] correctamente.");
            redirect("caballeros/ok");
        }
        $this->session->set_flashdata("msj", "No se pudo crear la ficha de $caballero[nombre], volvé a intentarlo.");
        redirect("caballeros/error");
    }
}