<?php
/**
* 
*/
class EntregaEvaluacion
{
	private $nota;
	private $estudiante;
	private $evaluacion;

	function __construct()
	{
		$this->estudiante=new Estudiante();
		$this->evaluacion=new Evaluacion();
	}

	public function setNota($nota)
	{
		$this->nota=$nota;
	}
	public function getNota()
	{
		return $this->nota;
	}
}
?>