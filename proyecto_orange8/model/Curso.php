<?php
/**
* Esta es la entidad Curso dentro de MODELO
*/
class Curso
{
	private $_sigla;
	private $_nombre;
	private $_database;
	function __construct()
	{
		$this->_database=eden('mysql','localhost','proyecto_orange', 'root', 'admin');
	}
	public function crearCurso($sigla, $nombre)
	{		
		$curso=array('sigla'=>$sigla, 'nombre'=>$nombre);
		$this->_database->insertRow('curso', $curso);
		$this->_sigla=$sigla;
		$this->_nombre=$nombre;
	}
	public function existeSigla($sigla)
	{
		$query=$this->_database->getRow('curso','sigla', $sigla);
		if(is_null($query))
			return false;
		else
			return true;
	}
	public function existeNombre($nombre_curso)
	{
		$query=$this->_database->getRow('curso','nombre', $nombre_curso);
		if(is_null($query))
			return false;
		else
			return true;
	}
	public function listarSiglaCurso()
	{
		$siglas=array();
		$query=$this->_database->query("SELECT sigla FROM curso ORDER BY sigla");//devuelve un array de array
		foreach ($query as $sigla ) {
			foreach ($sigla as $key ) {
				$siglas[]=$key;
			}
		}
		return $siglas;//devuelve un array simple :D
	}
	/*
	public function cargar($sigla)
	{
		$select->select('sigla, nombre');
		$select->from('curso');
		$select->where("sigla='".$sigla."'");
		
		$this->_sigla=$select[0];
		$this->_nombre=$select[1];
	}*/
	public function getSigla()
	{
		return $this->_sigla;
	}
	public function getNombre()
	{
		return $this->_nombre;
	}
}
?>
