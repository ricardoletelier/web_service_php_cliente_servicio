<?php
  require_once('soap/lib/nusoap.php');

  function sumar($num1,$num2){
    return $num1 + $num2;
  }

  function restar($num1,$num2){
    return $num1 - $num2;
  }

  function multiplicar($num1,$num2){
    return $num1 * $num2;
  }

  function dividir($num1,$num2){
    return $num1 / $num2;
  }

  $servicio = new soap_server();
  $ns = "http://localhost/test_webservices/servicio.php";
  $servicio->configureWSDL("Servicio web",$ns);
  $servicio->wsdl->schemaTargetNamespace = $ns;

  $servicio->register("sumar",array("num1"=>"xds:integer","num2"=>"xds:integer"),array('return' => 'xsd:integer'),$ns);
  $servicio->register("restar",array("num1"=>"xds:integer","num2"=>"xds:integer"),array('return' => 'xsd:integer'),$ns);
  $servicio->register("multiplicar",array("num1"=>"xds:integer","num2"=>"xds:integer"),array('return' => 'xsd:integer'),$ns);
  $servicio->register("dividir",array("num1"=>"xds:integer","num2"=>"xds:integer"),array('return' => 'xsd:integer'),$ns);
  
  
  $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
  $servicio->service($HTTP_RAW_POST_DATA);
?>