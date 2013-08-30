<?php
include '../../model/Gestion.php';
include '../../vendor/eden.php';

$semestre=htmlspecialchars((integer)$_POST['semestre']);
$anio=htmlspecialchars((integer)$_POST['anio']);
$gestion = new Gestion();
if($gestion->existeGestion($semestre, $anio))
{
	if($semestre!=3)
		echo $semestre."/".$anio." YA EXISTE!";
	else
		echo "V/".$anio." YA EXISTE!";		
}
else
{
	$gestion->crearGestion($semestre, $anio);
	if($semestre!=3)
		echo $semestre."/".$anio." REGISTRADO!";
	else
		echo "V/".$anio." REGISTRADO!";		
}	
?>