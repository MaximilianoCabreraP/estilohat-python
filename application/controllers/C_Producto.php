<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Producto extends CI_Controller {
    //public $_nombre, $_id_producto, $_descripcion, $_tipo, $_cantidad, $_fecha_ingreso;
    public function __construct($id_producto, $nombre, $descripcion, $tipo, $cantidad, $fecha_ingreso){
        $this->_nombre = $nombre;
    }
    public function __destruct(){
        echo "Objeto destruido";
    }
    // Es un método setter para poner la propiedad privada sexo
    public function setNombre($nombre){
        $this->$_nombre = $nombre;
    }
    // Es un método getter para retornar la propiedad privada sexo
    public function getSexo() {
        return $this->$_sexo;
    }
    // Es un método de la clase
    public function saludar(){
        echo "Hola, mundo!";
    }
}