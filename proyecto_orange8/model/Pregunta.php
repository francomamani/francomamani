<?php
/**
* Pregunta es una pregunta de la Practica
*/
class Pregunta
{
	private $texto;

	function __construct(){}
	public function setTexto($texto)
	{
		$this->texto=$texto;
	}
	public function getTexto()
	{
		return $this->texto;
	}

}

?>