<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido extends CI_Controller {
    public function index($msg = ""){
        $pedidos = $this->Pedido_model->buscar_pedidos();
        $productos = $this->Producto_model->buscar_productos();
        $falta_dato = $this->session->flashdata('falta_dato');
        $this->load->view('header', ['title' => 'Estilo Hat | Pedidos']);
        $this->load->view('pedidos', ['pedidos' => $pedidos,
                                      'productos' => $productos,
                                      'falta_dato' => $falta_dato,
                                      'msg' => $msg]);
        $this->load->view('footer');
    }
    public function agregar_pedido(){
        $pedido = $this->verificar_datos();
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
        $falta_dato = '';
        $pedido['id_pedido'] = $this->input->post('id_pedido');
        if($pedido['ids_producto'] = $this->input->post('ids_producto')){
            $pedido['ids_producto'] = implode(',', $pedido['ids_producto']);
        }
        
        if(!$pedido['obrero'] = $this->input->post('obrero'))
            $falta_dato[] = 'Obrero';
        if(!$pedido['cantidad'] = $this->input->post('cantidad'))
            $falta_dato[] = 'Cantidad';

        if(!empty($falta_dato)){
            log_message('error', '-falta_daton Datos-');
            foreach($falta_dato as $k=>$v){
                log_message('error', $k.': '.$v);
            }
            $this->session->set_flashdata('datos_ingresados', $pedido);
            $this->session->set_flashdata('falta_dato', $falta_dato);
            redirect('/pedidos');
        }
        log_message('error', '-Datos ok-');
        return $pedido;
    }
}