<?php
/**
* 
*/
include 'Usuario.php';
class Administrador extends Usuario
{
	private $cargo;
	function __construct()
	{

	}
	public function setCargo($cargo)
	{
		$this->cargo=$cargo;
	}
	public function getCurso()
	{
		return $this->cargo;
	}
}
?>