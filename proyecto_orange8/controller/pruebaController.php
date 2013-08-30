<?php
include '../vendor/eden.php';
eden('debug')->output('hello world!!!! :D');
$database=eden('mysql', 'localhost', 'proyecto_orange', 'root', '123');

$query='SELECT * FROM usuario WHERE cuenta LIKE :cuenta';
$bind = array(':cuenta' => '%'.'marcelo'.'%');
$consulta=$database->query($query, $bind);
var_dump($consulta);
print_r($consulta) ;
foreach ($consulta as $fila) {
	foreach ($fila as $campo) {
		echo $campo.'<br>';
	}
}
?>