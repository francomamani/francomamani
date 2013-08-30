<?php 
include '../../vendor/eden.php';

$username=htmlspecialchars($_POST["username"]);
$cod_producto_servicio=htmlspecialchars($_POST["cod_producto_servicio"]);
$cantidad=htmlspecialchars($_POST["cantidad"]);
$nit=htmlspecialchars($_POST["nit"]);

$database = eden('mysql', 'localhost' ,'db', 'root', 'admin');    //instantiate

$query  = "SELECT * FROM cuenta WHERE username = '$username'";
$query1  = "SELECT * FROM  producto WHERE cod_producto = '$cod_producto_servicio'";

$consulta=$database->query($query); // returns results of raw queries
$consulta1=$database->query($query1); // returns results of raw queries

$settings = array(
    'cod_usuario'     => $username,
    'cod_producto_servicio'    => $cod_producto_servicio,
    'precio_total'    => $consulta1[0]['precio']*$cantidad,
    'nit'    => $nit,
    'tipo'    => false    
    );

$database->insertRow('factura', $settings);
$aux =  $consulta1[0]['cantidad'];
$cantidad= $aux-$cantidad;
$settings1 = array(
	'nombre' =>$consulta1[0]['nombre'], 
    'cantidad'    => $cantidad, 
    'precio' =>$consulta1[0]['precio'], 
    'proveedor' =>$consulta1[0]['proveedor'],
    'imagen' =>$consulta1[0]['imagen']
    );
$filter[] = array('cod_producto=%s', $cod_producto_servicio);    

$database->updateRows('producto', $settings1, $filter);

 ?>