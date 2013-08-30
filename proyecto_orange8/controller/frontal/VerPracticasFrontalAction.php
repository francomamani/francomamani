<?php
session_start();
require_once '../../vendor/Twig-1.11.1/lib/Twig/Autoloader.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../../view');
$twig = new Twig_Environment($loader, array('debug' => true));

$lista=array();
$urls=array();
$contador=0;
$dir="../../view/fileupload/server/php/files/";
if(is_dir($dir))
{
	if ($directorio=opendir($dir)) 
	{
		while ($archivos=readdir($directorio))
		{	
			if($contador>1 && filetype($dir.$archivos)=='file')
			{
				$lista[]=$archivos;
				$urls[]=$dir.$archivos; 
			}
			$contador++;
		}
		closedir($directorio);
	}
}

echo $twig->render('verpracticasActionTemplate.html', array( 'estudiante'=>$_SESSION['estudiante'],'lista'=>$lista, 'urls'=>$urls));
?>
