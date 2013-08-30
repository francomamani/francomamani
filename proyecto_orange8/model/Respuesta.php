<?php
/**
* 
*/
include 'Pregunta.php';

class Respuesta
{
	private $respuesta;
	private $pregunta;
	function __construct()
	{
		$this->pregunta= new Pregunta();
	}
	public function setRespuesta($respuesta)
	{
		$this->respuesta=$respuesta;
	}
	public function getRespuesta()
	{
		return $this->respuesta;
	} 
}
?>