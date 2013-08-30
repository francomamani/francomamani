<?php
include '../../vendor/eden.php';

$nombre_del_producto=htmlspecialchars($_POST['nombre_del_producto']);
$cantidad=htmlspecialchars($_POST['cantidad']);
$precio = htmlspecialchars($_POST['precio']); 
$proveedor=htmlspecialchars($_POST['proveedor']);
$imagen=htmlspecialchars($_POST['imagen']);

$database = eden('mysql', 'localhost' ,'db', 'root', 'admin');

$producto = array(
    'nombre'    => $nombre_del_producto,
	'cantidad'     => $cantidad,
    'precio'     =>  $precio,
    'proveedor'     => $proveedor,
    'imagen'     => $imagen
);
     
$database->insertRow('producto', $producto); 
header('location: ../frontal/principalFrontal.php');
?>