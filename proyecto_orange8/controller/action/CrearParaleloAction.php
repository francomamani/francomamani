<?php
include "../../model/Paralelo.php";
include "../../vendor/eden.php";


$gestion=htmlspecialchars($_POST["gestion"]);
$sigla=htmlspecialchars($_POST["sigla"]);
$letra_paralelo=htmlspecialchars($_POST["paralelo"]);
$docente=htmlspecialchars($_POST["docente"]);
$auxiliar=htmlspecialchars($_POST["auxiliar"]);

list($semestre, $anio)=explode('/', $gestion);
$paralelo = new Paralelo();
if ($paralelo->_gestionEntity->existeGestion($semestre, $anio) && $paralelo->_cursoEntity->existeSigla($sigla) && $paralelo->existeParalelo($letra_paralelo)) 
{
	echo "EL PARALELO ".$letra_paralelo." YA EXISTE!";
}
else
{
	$paralelo->crearParalelo($gestion, $sigla, $letra_paralelo, $docente, $auxiliar);
	echo "EL PARALELO ".$letra_paralelo." HA SIDO REGISTRADO!";
}

?>