<?php
/**
*Registro permite registrar a un curso un estudiante 
*/
class Registro
{
	private $fechaRegistro;
	private $estudiante;
	private $curso;
	function __construct(Estudiante $estudiante, Curso $curso)
	{
		$this->estudiante=$estudiante;
		$this->curso=$curso;
	}
	public function setFechaRegistro($fechaRegistro)
	{
		$this->fechaRegistro=$fechaRegistro;
	}
	public function getFechaRegistro()
	{
		return $this->fechaRegistro;
	}
}
?>