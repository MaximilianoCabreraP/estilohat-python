<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido extends CI_Controller {
    public function index($msg = ""){
        $pedidos = $this->Pedido_model->buscar_pedidos();
        $productos = $this->Producto_model->buscar_productos();
        $falta = $this->session->flashdata('falta');
        $this->load->view('header', ['title' => 'Estilo Hat | Pedidos']);
        $this->load->view('pedidos', ['pedidos' => $pedidos,
                                      'productos' => $productos,
                                      'falta' => $falta,
                                      'msg' => $msg]);
        $this->load->view('footer');
    }
    public function agregar_pedido(){
        log_message('error', '------------Agregar Pedido------------');
        $pedido = $this->verificar_datos();
        log_message('error', '--Volvio el pedido--');
        if($this->Pedido_model->agregar_pedido($pedido))
            redirect('/pedidos/ok');
        $this->session->set_flashdata('datos_ingresados', $pedido);
        redirect('/producto/error');
    }
    public function editar_pedido(){
        $pedido = $this->verificar_datos();
        if($this->Pedido_model->editar_pedido($pedido))
            redirect('/pedidos/editado');
        $this->session->set_flashdata('datos_ingresados', $pedido);
        redirect('/pedidos/error');
    }

    public function verificar_datos(){
        log_message('error', '--Buscando datos--');
        $falta = '';
        $pedido['id_pedido'] = $this->input->post('id_pedido');
        $pedido['id_producto'] = $this->input->post('id_producto');
        if(!$pedido['obrero'] = $this->input->post('obrero'))
            $falta[] = 'Obrero';
        if(!$pedido['cantidad'] = $this->input->post('cantidad'))
            $falta[] = 'Cantidad';

        if(!empty($falta)){
            log_message('error', '-Faltan Datos-');
            foreach($falta as $k=>$v){
                log_message('error', $k.': '.$v);
            }
            $this->session->set_flashdata('datos_ingresados', $pedido);
            $this->session->set_flashdata('falta', $falta);
            redirect('/pedidos');
        }
        log_message('error', '-Datos ok-');
        return $pedido;
    }
}