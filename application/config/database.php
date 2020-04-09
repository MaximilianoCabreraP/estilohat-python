<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'estilohat',
	'password' => 'V87txSzuyLDzcfH8NGx8YL9T',
	'database' => 'panel',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => FALSE
);

$db['sskotz'] = array(
	'DSN'      => '',
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'saintseiyakotz',
	'DBDriver' => 'mysqli',
	'DBPrefix' => '',
	'pConnect' => TRUE,
	'DBDebug'  => (ENVIRONMENT !== 'production'),
	'cacheOn'  => false,
	'cacheDir' => '',
	'charset'  => 'utf8',
	'DBCollat' => 'utf8_general_ci',
	'swapPre'  => '',
	'encrypt'  => false,
	'compress' => false,
	'strictOn' => false,
	'failover' => [],
	'save_queries' => FALSE
);