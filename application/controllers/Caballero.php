<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Caballero extends CI_Controller{
	public function index($msg=""){
        $caballeros = $this->Caballero_model->buscar_caballeros();
        $this->load->view("sskotz/header", ["title" => "Listado Caballeros"]);
        $this->load->view("sskotz/listado_caballeros", ["caballeros" => $caballeros, "msg" => $msg, "msj" => $this->session->flashdata("msj")]);
        $this->load->view("sskotz/footer");
	}
	public function nuevo($msg=""){
        $this->load->view("sskotz/header", ["title" => "Nuevo Caballero"]);
        $this->load->view("sskotz/ingresar_caballero", ["caballero" => $this->session->flashdata("caballero")]);
        $this->load->view("sskotz/footer");
    }
    public function agregar_caballero(){
        $caballero = $this->input->post();
        if($this->Caballero_model->crear_caballero($caballero)){
            $this->session->set_flashdata("msj", "Se creó la ficha de $caballero[nombre] correctamente.");
            redirect("sskotz/caballeros/ok");
        }
        $this->session->set_flashdata("msj", "No se pudo crear la ficha de $caballero[nombre], volvé a intentarlo.");
        $this->session->set_flashdata("caballero", $caballero);
        redirect("sskotz/nuevo-caballero/error");
    }
    public function saint(){
        $nombre = $this->input->get("caballero");
        $caballero = $this->buscar_caballero($nombre);
        $this->load->view("sskotz/header", ["title" => "Caballero "]);
        $this->load->view("sskotz/template/cabecera", ["titulo" => "$nombre de $caballero[constelacion]", "volver"=> "Listado"]);
        $this->load->view("sskotz/saint", ["caballero" => $caballero]);
        $this->load->view("sskotz/footer");
    }

    public function buscar_caballero($nombre){
        if($caballero = $this->Caballero_model->buscar_caballero_by_nombre($nombre)){
            $skills = $this->Caballero_model->buscar_skills($caballero["id"]);
            $caballero = array_merge($caballero, $skills);
            return $caballero;
        }else{
            $this->session->set_flashdata("msj", "Error con el Caballero o Skills.");
            redirect("sskotz/caballeros/error");
        }
    }
}