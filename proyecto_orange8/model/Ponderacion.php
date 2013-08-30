<?php

class Ponderacion
{
	private $examParciales;
	private $examFinal;
	private $laboratorio;	
	private $practicas;
	private $auxiliatura;
	public function setExamParciales($examParciales)
	{
		$this->examParciales=$examParciales;
	}
	public function setExamFinal($examFinal)
	{
		$this->examFinal=$examFinal;
	}
	public function setLaboratorio($laboratorio)
	{
		$this->laboratorio=$laboratorio;
	}
	public function setPracticas($practicas)
	{
		$this->practicas=$practicas;
	}
	public function setAuxiliatura($auxiliatura)
	{
		$this->auxiliatura=$auxiliatura;
	}

	public function getExamParciales()
	{
		return $this->examParciales;
	}
	public function getExamFinal()
	{
		return $this->examFinal;
	}
	public function getLaboratorio()
	{
		return $this->laboratorio;
	}
	public function getPracticas()
	{
		return $this->practicas;
	}
	public function getAuxiliatura()
	{
		return $this->auxiliatura;
	}
}

?>