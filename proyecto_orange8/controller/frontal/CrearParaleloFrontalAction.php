<?php
session_start();
if($_SESSION['prioridad']!='3')
	header("Location: ./inicioFrontal.php");
else
{
	require_once "../../vendor/Twig-1.11.1/lib/Twig/Autoloader.php";
	require_once "../../model/Curso.php";
	require_once "../../model/Gestion.php";
	require_once "../../model/Usuario.php";
	require_once "../../vendor/eden.php";
	Twig_Autoloader::register();
	$loader = new Twig_Loader_Filesystem("../../view");
	$twig = new Twig_Environment($loader, array('debug' => "true" ));
	
	$gestion = new Gestion();
	
	$gestiones=$gestion->listarGestion();
	
	$curso = new Curso();
	$siglas=$curso->listarSiglaCurso();
	
	$paralelos=array();
	$count=0;
	for ($i='A'; $i <='Z' && $count<=25; $i++, $count++) { 
		$paralelos[]=$i;
	}
	
	$docentes = array();
	$docente = new Usuario();
	$query_docentes[]=$docente->listarDocente();
	foreach ($query_docentes as $nivel ) {
		foreach ($nivel as $key ) {
			$docentes[]=$key;
		}
	}
	$auxiliares = array();
	$auxiliar = new Usuario();
	$auxiliares=$auxiliar->listarAuxiliar();
	
	echo $twig->render("crearparaleloActionTemplate.html", array('administrador'=>$_SESSION['administrador'], "gestiones" => $gestiones,  "siglas"=>$siglas, "paralelos"=>$paralelos, "docentes"=>$docentes, "auxiliares"=>$auxiliares)); 	
	}	
?>