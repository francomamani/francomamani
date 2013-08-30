<?php
include '../../model/Curso.php';
include '../../vendor/eden.php';
$sigla=htmlspecialchars($_POST['sigla']);
$nombre_curso=htmlspecialchars($_POST['nombre']);
$curso = new curso();
if ($curso->existeSigla($sigla)) 
{	
	echo $sigla.' YA EXISTE!';	
}
else
{
	if ($curso->existeNombre($nombre_curso)) 
	{
		echo $nombre_curso.' YA EXISTE!';		
	}
	else
	{
		$curso->crearCurso($sigla, $nombre_curso);
		echo $sigla.' REGISTRADO!';
	}
}

?>