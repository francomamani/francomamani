<?php
/**
* 
*/
class Gestion 
{
	
	private $_semestre;
	private $_anio;
	private $_database;
	function __construct()
	{
		$this->_database=eden('mysql', 'localhost', 'proyecto_orange', 'root', 'admin');
	}
	public function crearGestion($semestre, $anio)
	{
		$gestion = array('semestre' => $semestre,'anio'=>$anio);
		$this->_database->insertRow('gestion', $gestion);
		$this->_semestre=$semestre;
		$this->_anio=$anio;	
	}
	public function existeGestion($semestre, $anio)
	{
		//query es un array();
		$query=$this->_database->query("SELECT * FROM gestion WHERE semestre=".$semestre." AND anio=".$anio."");
		if(count($query)==0) //cuenta el numero de elementos del array
			return false;
		else
			return true;
	}
	public function listarGestion()
	{
		$gestiones = array();
		$query=$this->_database->query("SELECT semestre, anio FROM gestion ");
		foreach ($query as $gestion ) {
			$semestre=$gestion["semestre"];
			if($semestre == 3) 
				$semestre="V";
			$anio=$gestion["anio"];
			$gestiones[]=$semestre."/".$anio;
		}
		return $gestiones;
	}
	public function setSemestre($semestre)
	{
		$this->_semestre=$semestre;
	}
	public function setAnio($anio)
	{
		$this->_anio=$anio;
	}
	public function getIdGestion()
	{
		$this->_database->query("SELECT id FROM gestion WHERE semestre='$this->_semestre' AND anio='$this->_anio'");	
	}
	public function getSemestre()
	{
		return $this->_semestre;
	}
	public function getAnio()
	{
		return $this->_anio;
	}
}
?>
