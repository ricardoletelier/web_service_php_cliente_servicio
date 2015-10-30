<?php
  	require_once('soap/lib/nusoap.php');
	$cliente = new nusoap_client("http://localhost/test_webservices/servicio.php",FALSE);
  	$err = $cliente->getError();
	if ($err) {
		die($err);
	}
	$num1 = 2; 
	$num2 = 8;
	$parametros = array("num1"=>$num1,"num2"=>$num2);
	$return = $cliente->call("multiplicar",$parametros);
	print_r ($return);
?>