<?php

class Evaluacion
{
	 private $tipo; 	
	 private $fecha; 	
	 public function setTipo($tipo)
	 {
		$this->tipo=$tipo;	
	 }
	 public function setFecha($fecha)
	 {
	 	$this->fecha=$fecha;			
	 }
	public function getTipo()
	 {
		$this->tipo;	
	 }
	 public function getFecha()
	 {
	 	$this->fecha;			
	 }
}

?>