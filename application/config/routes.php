<?php
defined("BASEPATH") OR exit("No direct script access allowed");

$route["default_controller"] = "panel";

//INTERNO
$route["interno/logs"] = "interno/logs";
$route["interno/(:any)"] = "interno/getTabla/$1";

//Productos
    $route["producto/agregar"]["POST"] = "producto/agregar";
    $route["producto/editar"] = "producto/editar";
    $route["producto/duplicar"] = "producto/duplicar";
    $route["productos"] = "producto/index";
    $route["productos/([a-z]*)"] = "producto/index/$1";

//PEDIDOS
    #Nuevo
        $route["pedido/agregar-pedido"]["POST"] = "pedido/agregar_pedido";
    #Editar
        $route["pedido/editar"] = "pedido/editar_pedido";
    #Listado
        $route["pedidos"] = "pedido/index";
        $route["pedidos/([a-z]*)"] = "pedido/index/$1";

//OBREROS
    #Nuevo
        $route["obrero/agregar-obrero"]["POST"] = "obrero/agregar_obrero";
    #Editar
        $route["obrero/editar"] = "obrero/editar_obrero";
    #Listado
        $route["obreros"] = "pedido/index";
        $route["obreros/([a-z]*)"] = "obrero/index/$1";

//SSKOTZ
    $route["sskotz/caballeros"] = "caballero/index";
    $route["sskotz/caballeros/([a-z]*)"] = "caballero/index/$1";
    $route["sskotz/saint"] = "caballero/saint";
    $route["sskotz/saint/([a-z]*)"] = "caballero/saint/$1";
    $route["sskotz/nuevo-caballero"] = "caballero/nuevo";
    $route["sskotz/nuevo-caballero/([a-z]*)"] = "caballero/nuevo/$1";
    $route["sskotz/agregar-caballero"] = "caballero/agregar_caballero";

$route["404_override"] = "";
$route["translate_uri_dashes"] = FALSE;