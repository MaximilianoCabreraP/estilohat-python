<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Producto extends CI_Controller {
    public function index($msg = ""){
        $falta = $this->session->flashdata("falta");
        $datos_ingresados = $this->session->flashdata("datos_ingresados");
        $productos = $this->Producto_model->buscar_productos();

        $boton_add = '<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapse0" aria-expanded="false" aria-controls="collapse0"><i class="fa fa-plus-circle" aria-hidden="true"></i>Ingresar Producto</button>';

        $this->load->view("header", ["title" => "Estilo Hat | Productos"]);
        $this->load->view('cabecera', ['titulo' => 'Productos', 
                                       'boton_add' => $boton_add]);
        $this->load->view("productos/listado", ["productos" => $productos, 
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
        if(!$marca = $this->input->post("marca"))
            $falta[] = "Marca";
        if(!$tipo = $this->input->post("tipo"))
            $falta[] = "Tipo";
        if(!$estado = $this->input->post("estado"))
            $falta[] = "Estado";

        $producto = array(
            "id_producto" => $id_producto,
            "nombre" => $nombre,
            "descripcion" => $descripcion,
            "marca" => $marca,
            "tipo" => $tipo,
            "estado" => $estado
        );

        if(!empty($falta)){
            $this->session->set_flashdata("datos_ingresados", $producto);
            $this->session->set_flashdata("falta", $falta);
            redirect("/productos");
        }
        return $producto;
    }
}