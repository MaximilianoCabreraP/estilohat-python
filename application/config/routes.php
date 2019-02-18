<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'panel';

//INTERNO
$route['interno/logs'] = 'interno/logs';
$route['interno/(:any)'] = 'interno/getTabla/$1';

//Productos
    $route['producto/agregar-producto']['POST'] = 'producto/agregar_producto';
    $route['producto/editar'] = 'producto/editar_producto';
    $route['producto'] = 'producto/index';
    $route['producto/([a-z]*)'] = 'producto/index/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;