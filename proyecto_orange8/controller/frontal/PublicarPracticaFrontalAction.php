<?php
session_start();
require_once '../../vendor/Twig-1.11.1/lib/Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../../view/fileupload');
$twig = new Twig_Environment($loader, array('debug' => true));
echo $twig->render('publicarpracticaActionTemplate.html', array('nombre_usuario' => $_SESSION['nombre_usuario']));
?>
