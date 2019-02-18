<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {
    public function index($msg = ""){
        $falta = $this->session->flashdata('falta');
        $datos_ingresados = $this->session->flashdata('datos_ingresados');

        $productos = $this->Producto_model->buscar_productos();
        $this->load->view('header', ['title' => 'Estilo Hat | Productos']);
        $this->load->view('productos', ['productos' => $productos, 'msg' => $msg, 'datos_ingresados' => $datos_ingresados, 'falta' => $falta]);
        $this->load->view('footer');
    }
    public function agregar_producto(){
        $producto = $this->verificar_datos();
        if($this->Producto_model->agregar_producto($producto))
            redirect('/producto/ok');
        $this->session->set_flashdata('datos_ingresados', $producto);
        redirect('/producto/error');
    }
    public function editar_producto(){
        $producto = $this->verificar_datos();
        if($this->Producto_model->editar_producto($producto))
            redirect('/producto/editado');
        $this->session->set_flashdata('datos_ingresados', $producto);
        redirect('/producto/error');
    }
    public function duplicar_producto(){}
    public function eliminar_producto($id){
        if($this->Producto_model->eliminar_producto($id))
            redirect('/producto/eliminado');
        redirect('/producto/error');
    }
    public function verificar_datos(){
        $falta = '';
        $id_producto = $this->input->post('id_producto');
        if(!$nombre = $this->input->post('nombre'))
            $falta[] = 'Nombre';
        if(!$descripcion = $this->input->post('descripcion'))
            $falta[] = 'Descripcion';
        if(!$tipo = $this->input->post('tipo'))
            $falta[] = 'Tipo';
        if(!$cantidad = $this->input->post('cantidad'))
            $falta[] = 'Cantidad';

        $producto = array(
            'id_producto' => $id_producto,
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'tipo' => $tipo,
            'cantidad' => $cantidad
        );

        if(!empty($falta)){
            $this->session->set_flashdata('datos_ingresados', $producto);
            $this->session->set_flashdata('falta', $falta);
            redirect('/producto');
        }
        return $producto;
    }
}