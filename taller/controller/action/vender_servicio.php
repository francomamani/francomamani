<?php 
include '../../vendor/eden.php';

$username=htmlspecialchars($_POST["username"]);
$cod_producto_servicio=htmlspecialchars($_POST["cod_producto_servicio"]);
$nit=htmlspecialchars($_POST["nit"]);

$database = eden('mysql', 'localhost' ,'db', 'root', 'admin');    //instantiate

$query  = "SELECT * FROM cuenta WHERE username = '$username'";
$query1  = "SELECT * FROM  servicio WHERE cod_servicio = '$cod_producto_servicio'";

$consulta=$database->query($query); // returns results of raw queries
$consulta1=$database->query($query1); // returns results of raw queries

$settings = array(
    'cod_usuario'     => $username,
    'cod_producto_servicio'    => $cod_producto_servicio,
    'precio_total'    => $consulta1[0]['precio'],
    'nit'    => $nit,
    'tipo'    => true   
    );

$database->insertRow('factura', $settings);
 ?>