<?php
include 'UsuarioController.php';
include 'ConectividadController.php';
session_start();
$_SESSION['cuenta']=$_REQUEST['cuenta'];

$cuenta=htmlspecialchars($_POST['cuenta']);
$password=htmlspecialchars($_POST['password']);

$loginUsuario = new UsuarioController($cuenta, $password);
$conectividad = new ConectividadController();
		if($conectividad->successConnection())
			$loginUsuario->iniciarsesionAction();
		else
			echo "error de conectividad";
$conectividad->closeConnection();

?>