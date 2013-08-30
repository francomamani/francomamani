<?php
/**
* CursoController me va permitire ....
*/
include 'BaseDeDatosController.php';
include 'MySqlController.php';
include 'SqlController.php';

class CursoController 
{
	
	function __construct(){}
	public function run()
	{
		$bd=new BaseDeDatosController(new MySqlController());
		$sql= new SqlController();
		$sql->addCampos($campos);

		$sql->addSelect($tabla);
		$sql->addFrom($campos);
		$sql->addCampos($campos);
		$sql->addCampos($campos);	
	}
}
CursoController::run();
?>