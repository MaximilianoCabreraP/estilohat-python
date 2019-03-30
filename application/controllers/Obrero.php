<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obrero extends CI_Controller {
    public function index($msg = ''){
        $obreros = $this->Obrero_model->buscar_obrero();
        $falta = $this->session->flashdata('falta');
        $datos_ingresados = $this->session->flashdata('datos_ingresados');
        
        $this->load->view('header', ['title' => 'Estilo Hat | Obreros']);
        $this->load->view('pedidos', ['obreros' => $obreros,
                                      'falta' => $falta,
                                      'datos_ingresados' => $datos_ingresados,
                                      'msg' => $msg]);
        $this->load->view('footer');
    }
    public function agregar_obrero(){
        $obrero = $this->verificar_datos();
        if($this->Obrero_model->agregar_obrero($obrero))
            redirect('/obreros/ok');
        $this->session->set_flashdata('datos_ingresados', $obrero);
        redirect('/obreros/error');
    }
    public function editar_orbero(){}
    public function verificar_datos(){}
}