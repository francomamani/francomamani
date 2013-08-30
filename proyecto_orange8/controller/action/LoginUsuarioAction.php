<?php
include "../../model/Usuario.php";
include "../../vendor/eden.php";
include "../../vendor/Twig-1.11.1/lib/Twig/Autoloader.php";
session_start();
$_SESSION['prioridad']='-1';

Twig_Autoloader::register();
$loaderFileSystem = new Twig_Loader_Filesystem("../../view/");
$environment= new Twig_Environment($loaderFileSystem, array("debug"=>true));

$cuenta = htmlspecialchars($_POST["cuenta"]);
$password=  htmlspecialchars($_POST["password"]);

$usuario = new Usuario();
$existeUsuario=$usuario->existeUsuario($cuenta, $password);

if($existeUsuario)
{
/*
	getTipoUsuario return:
		0:  Estudiante
		1:	Auxiliar
		2:	Docente
		3:	Administrador
	en funcion de su nivel de prioridad
*/
	$usuario->load($cuenta, $password);
	$_SESSION['prioridad']= $usuario->getPrioridad();
	$tipoUsuario=$usuario->getTipoUsuario();
	switch ($tipoUsuario) {
		case "Estudiante":
				if($_SESSION['prioridad']=='0')
				{
					$_SESSION['estudiante']=$usuario->getUsuario();
					echo $environment->render("Estudiante.html", array('estudiante' => $usuario));
				}
			break;
		case "Auxiliar":
				if($_SESSION['prioridad']=='1')
				{
					$_SESSION['auxiliar']=$usuario->getUsuario();
					echo $environment->render("Auxiliar.html", array('auxiliar' => $usuario));
				}
			break;
		case "Docente":
				if($_SESSION['prioridad']=='2')
				{
					$_SESSION['docente']=$usuario->getUsuario();
					echo $environment->render("Docente.html", array('docente' => $usuario));
				}
			break;
		case "Administrador":
				if($_SESSION['prioridad']=='3')
				{
					$_SESSION['administrador']=$usuario->getUsuario();
					echo $environment->render("Administrador.html", array('administrador' => $usuario));
				}
			break;
	}
}
else
{
	if($_SESSION['prioridad']=='-1')
		echo $environment->render("inicioTemplate.html", array('aviso'=>'No esta registrado!'));
}
	
?>