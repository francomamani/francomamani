<?php
require_once '../../vendor/Twig-1.11.1/lib/Twig/Autoloader.php';
include '../../vendor/eden.php';

$database = eden('mysql', 'localhost' ,'db', 'root', 'admin');    
$consulta=$database->query('SELECT vip, flag FROM cuenta WHERE flag=true');
	

Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../../view');
$twig = new Twig_Environment($loader, array('debug' => true));

	if ($consulta==null) 
	{
//		header('Location: ../frontal/registroFrontal.php');
		echo $twig->render('index.html', array('aviso'=>'Bienvenido de vuelta'));
	}
	else
	{
		if ($consulta[0]['vip']==0) {
			echo $twig->render('indexCliente.html', array('aviso'=>'Usted ya inicio sesion'));		
		}
		else
		{
			echo $twig->render('indexAdministrador.html', array('aviso'=>'Usted ya inicio sesion'));					
		}

	}
?>
