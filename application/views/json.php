<?php
	header('Content-Type: application/json');
	header('Access-Control-Allow-Origin: *'); // Revisar 
	echo json_encode($data);
?>