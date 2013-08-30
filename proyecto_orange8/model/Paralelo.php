<?php
include 'Usuario.php';
include 'Curso.php';
include 'Ponderacion.php';
include 'Practica.php';
include 'Gestion.php';
class Paralelo
{	
	/*
	private $_gestion; //gestion
	private $_sigla;   //curso
		
	private $_paralelo; //prorpio de la clase paralelo
	
	private $_docenteEntity;
	private $_auxiliarEntity;
	private $_ponderacionEntity;
	private $_gestionEntity;
	private $_cursoEntity;

	private $_coleccionEvaluaciones = array();
	private $_coleccionPracticas = array();
	*/
	private $_idCurso;
	private $_idGestion;
	private $_paralelo;
	private $_idDocente;
	private $_idAuxiliar;


	private $_database;

	 
	function __construct()
	{
		$this->_gestionEntity = new Gestion();
		$this->_cursoEntity = new Curso();
		$this->_docenteEntity = new Usuario();
		$this->_auxiliarEntity = new Usuario();
		$this->_ponderacionEntity = new Ponderacion();	
		$this->_database=eden("mysql", "localhost", "proyecto_orange", "root", "admin");
	}	

	public static function cortar($cadena)
	{
		$nombreCompleto=explode(" ", $cadena);
		
		if (count($nombreCompleto)==3) 
			$nombreCompletoAux=array("apellidos"=>$nombreCompleto[0]." ".$nombreCompleto[1], "nombres"=>$nombreCompleto[2]);
		else
			$nombreCompletoAux=array("apellidos"=>$nombreCompleto[0]." ".$nombreCompleto[1], "nombres"=>$nombreCompleto[2]." ".$nombreCompleto[3]);
		return $nombreCompletoAux;
	}	
	public function crearParalelo($gestion, $sigla, $paralelo, $docente, $auxiliar)
	{

		list($semestre, $anio)=explode("/", $gestion);
		if ($semestre=='V') 
			$semestre='3';
		$nombreCompleto1=Paralelo::cortar($docente);
		$nombreCompleto2=Paralelo::cortar($auxiliar);

		$queryCurso=$this->_database->query("SELECT id FROM curso WHERE sigla='$sigla'");
		foreach ($queryCurso as $key) {
			$idCurso=$key["id"];	
		}

		$queryGestion=$this->_database->query("SELECT id FROM gestion WHERE semestre='$semestre' AND anio='$anio'");
		foreach ($queryGestion as $key) {
			$idGestion= $key["id"];		
		}
		$queryDocente=$this->_database->query("SELECT id FROM usuario WHERE apellidos='".$nombreCompleto1['apellidos']."' AND nombres='".$nombreCompleto1['nombres']."'");
		foreach ($queryDocente as $key) {
			$idDocente=$key["id"];
		}
		$queryAuxiliar=$this->_database->query("SELECT id FROM usuario WHERE apellidos='".$nombreCompleto2['apellidos']."' AND nombres='".$nombreCompleto2['nombres']."'");
		foreach ($queryAuxiliar as $key) {
			$idAuxiliar=$key["id"];
		}
		$this->_database->query("INSERT INTO paralelo SET idCurso='$idCurso', idGestion='$idGestion', paralelo='$paralelo', idDocente='$idDocente', idAuxiliar='$idAuxiliar' ");
	}

	public function existeParalelo($paralelo)
	{
		$query=$this->_database->getRow('paralelo','paralelo', $paralelo);
		if(is_null($query))
			return false;
		else
			return true;		
	}
	public function addPractica(Practica $practica)
	{
		$this->coleccionPracticas[]=$practica;
	}
	public function addEvaluacion(Evaluacion $evaluacion)
	{
		$this->coleccionEvaluaciones[]=$evaluacion;
	}
	//setters
	public function setGestion($gestion)
	{
		list($semestre, $anio)=explode("/", $gestion);
		$this->_gestionEntity->crearGestion($semestre, $anio);
		/*
			$this->_gestionEntity->setSemestre($semestre);
			$this->_gestionEntity->setAnio($anio);	
		*/
	}
	public function setSigla($sigla)
	{
		$this->_sigla=$sigla;
	}
	public function setNombre($nombre)
	{
		$this->_nombre=$nombre;
	}
	public function setParalelo($paralelo)
	{
		$this->_paralelo=$paralelo;
	}
	public function setDocente($docente)
	{
		$this->_docente=$docente;
	}
	//getters
	public function getGestion()
	{
		return $this->_gestion;
	} 
	public function getSigla()
	{
		return $this->_sigla;
	} 

	public function getNombre()
	{
		return $this->_nombre;
	} 
	public function getParalelo()
	{
		return $this->_nombre;
	} 
	public function getDocente()
	{
		return $this->_docente;
	}
	public function getAuxiliar()
	{
		return $this->_docente;
	} 
}

?>
