<?php
session_start();
require_once '../../vendor/Twig-1.11.1/lib/Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../../view');
$twig = new Twig_Environment($loader, array('debug' => true));
$anios = array();
for ($i=2013; $i <=2100; $i++) { 
	$anios[]=$i;
}
echo $twig->render('creargestionActionTemplate.html', array('administrador'=>$_SESSION['administrador'], 'anios'=>$anios));

?>
