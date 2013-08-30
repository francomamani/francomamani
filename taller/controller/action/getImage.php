<?php
include '../vendor/eden.php';

$database = eden('mysql', 'localhost' ,'db', 'root', 'admin');    //instantiate
$consulta=$database->getRow('producto', 'cod_producto', 13);
var_dump($consulta);

/*
*/

/*
$id = $_GET['id'];
$result=$database->query($query); // returns results of raw queries
$row = mysql_fetch_assoc($result);
  echo $precio;

  $id = $_GET['id'];
  // do some validation here to ensure id is safe


  $sql = "SELECT dvdimage FROM dvd WHERE id=$id";
  $result = mysql_query("$sql");
  mysql_close($link);

*/
?>