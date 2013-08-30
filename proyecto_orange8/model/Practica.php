<?php
//include 'Pregunta.php';
class Practica
{
	private $nroPractica;
	private $fechaEmision; 
	private $fechaEntrega;
	private $tema;

	private $coleccionPreguntas = array();

	public function addPregunta(Pregunta $pregunta)
	{
		$this->coleccionPreguntas[]=$pregunta;
	}

	public function printPreguntas()
	{
		foreach ($this->coleccionPreguntas as $pregunta ) 
		{
			echo $pregunta->getTexto()."<br>";
		}
	} 
	public function setNroPractica($nroPractica)
	{
		$this->nroPractica=$nroPractica;
	}
	public function setFechaEmision($fechaEmision)
	{
		$this->fechaEmision=$fechaEmision;
	}
	public function setFechaEntrega($fechaEntrega)
	{
		$this->fechaEntrega=$fechaEntrega;
	}
	public function setTema($tema)
	{
		$this->tema=$tema;
	}
	public function getNroPractica()
	{
		$this->nroPractica;
	}
	public function getFechaEmision()
	{
		$this->fechaEmision;
	}
	public function getFechaEntrega()
	{
		$this->fechaEntrega;
	}
	public function getTema()
	{
		$this->tema;
	}
}
?>