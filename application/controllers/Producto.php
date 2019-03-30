<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Producto extends CI_Controller {
    public function index($msg = ""){
        $falta = $this->session->flashdata("falta");
        $datos_ingresados = $this->session->flashdata("datos_ingresados");

        $productos = $this->Producto_model->buscar_productos();
        $this->load->view("header", ["title" => "Estilo Hat | Productos"]);
        $this->load->view("productos", ["productos" => $productos, 
                                        "msg" => $msg, 
                                        "datos_ingresados" => $datos_ingresados, 
                                        "falta" => $falta]);
        $this->load->view("footer");
    }
    public function agregar(){
        $producto = $this->verificar_datos();
        if($this->Producto_model->agregar($producto))
            redirect("/productos/ok");
        $this->session->set_flashdata("datos_ingresados", $producto);
        redirect("/productos/error");
    }
    public function editar(){
        $producto = $this->verificar_datos();
        if($this->Producto_model->editar($producto))
            redirect("/productos/editado");
        $this->session->set_flashdata("datos_ingresados", $producto);
        redirect("/productos/error");
    }
    public function duplicar(){
        $producto = $this->verificar_datos();
        if($this->Producto_model->agregar($producto))
            redirect("/productos/ok");
        $this->session->set_flashdata("datos_ingresados", $producto);
        redirect("/productos/error");
    }
    public function eliminar($id){
        if($this->Producto_model->eliminar($id))
            redirect("/productos/eliminado");
        redirect("/productos/error");
    }
    public function verificar_datos(){
        $falta = "";
        $id_producto = $this->input->post("id_producto");
        if(!$nombre = $this->input->post("nombre"))
            $falta[] = "Nombre";
        if(!$descripcion = $this->input->post("descripcion"))
            $falta[] = "Descripcion";
        if(!$tipo = $this->input->post("tipo"))
            $falta[] = "Tipo";
        if(!$cantidad = $this->input->post("cantidad"))
            $falta[] = "Cantidad";

        $producto = array(
            "id_producto" => $id_producto,
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "tipo" => $tipo,
            "cantidad" => $cantidad
        );

        if(!empty($falta)){
            $this->session->set_flashdata("datos_ingresados", $producto);
            $this->session->set_flashdata("falta", $falta);
            redirect("/productos");
        }
        return $producto;
    }
}