<?php
/**
* 
*/
class Planificacion
{
	private $objetivosCurso = array();
	private $temas = array();
	private $bibliografias = array();

	function __construct()
	{

	}
	public function addObjetivoCurso($objetivoCurso)
	{
		$this->objetivosCurso[]=$objetivoCurso;
	}
	public function addTema($tema)
	{
		$this->temas[]=$tema;
	}
	public function addBibliografia($bibliografia)
	{
		$this->bibliografias[]=$bibliografia;
	}

	public function printObjetivosCurso()
	{
		foreach ($this->objetivosCurso as $objetivoCurso ) 
		{
			echo $objetivoCurso."<br>";
		}
	}
	public function printTemas()
	{
		foreach ($this->temas as $tema ) 
		{
			echo $tema."<br>";
		}
	}
	public function printBibliografias()
	{
		foreach ($this->bibliografias as $bibliografia ) 
		{
			echo $bibliografia."<br>";
		}
	}
}
?>