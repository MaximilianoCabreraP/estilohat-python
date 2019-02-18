<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido extends CI_Controller {
    public function index($msg = ""){
        $pedidos = $this->Pedido_model->buscar_pedidos();
        $productos = $this->Producto_model->buscar_productos();
        $this->load->view('header', ['title' => 'Estilo Hat | Pedidos']);
        $this->load->view('pedidos', ['pedidos' => $pedidos, 
                                      'productos' => $productos, 
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

    public function verificar_datos(){
        $falta = '';
        $pedido['id_producto'] = $this->input->post('id_producto');
        if(!$pedido['obrero'] = $this->input->post('obrero'))
            $falta[] = 'Obrero';
        if(!$pedido['fecha_pedido'] = $this->input->post('fecha_pedido'))
            $falta[] = 'Fecha Pedido';
        if(!$pedido['estado'] = $this->input->post('estado'))
            $falta[] = 'Estado';
        if(!$pedido['cantidad'] = $this->input->post('cantidad'))
            $falta[] = 'Cantidad';

        if(!empty($falta)){
            $this->session->set_flashdata('datos_ingresados', $pedido);
            $this->session->set_flashdata('falta', $falta);
            redirect('/pedidos');
        }
        return $pedido;
    }
}