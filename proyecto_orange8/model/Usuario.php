<?php
class Usuario
{
	private $_cuenta;
	private $_password;
	private $_ci;
	private $_nombres;
	private $_apellidos;
	private $_prioridad;
	private $_email;

	protected $_database;
	public function __construct(){
		$this->_database=eden("mysql", "localhost", "proyecto_orange", "root", "admin");
	}
	public function load($cuenta, $password)
	{
		$query=$this->_database->query("SELECT * FROM usuario WHERE cuenta='$cuenta' AND password='$password' ");
		foreach ($query as $key) {
			$this->_cuenta=$key["cuenta"];
			$this->_password=$key["password"];
			$this->_ci=$key["ci"];
			$this->_nombres=$key["nombres"];
			$this->_apellidos=$key["apellidos"];
			$this->_prioridad=$key["prioridad"];
			$this->_email=$key["email"];
		}
	}
	public function existeUsuario($cuenta, $password)
	{	
		$existe=$this->_database->query("SELECT COUNT(*) as cantidad FROM usuario WHERE cuenta='$cuenta' AND password='$password' ");
		foreach ($existe as $key) {
			$cantidad=$key["cantidad"];
		}
		if ($cantidad[0]=='1') 
			return true;
		else
			return false;
	}
	public function getTipoUsuario()
	{
		$query=$this->_database->query("SELECT prioridad FROM usuario WHERE cuenta='$this->_cuenta' AND password='$this->_password' ");
		foreach ($query as $key ) {
			$prioridad=$key["prioridad"];
		}
		switch ($prioridad) {
			case '0':
				return "Estudiante";
				break;
			case '1':
				return "Auxiliar";
				break;
			case '2':
				return "Docente";
				break;
			case '3':
				return "Administrador";
				break;
		}
	}

	public function listarDocente()
	{
		$docentes = array();
		$query=$this->_database->query("SELECT nombres, apellidos FROM usuario WHERE prioridad=2");
		foreach ($query as $docente ) {
			$nombres=$docente["nombres"];
			$apellidos=$docente["apellidos"];
			$docentes[]=$apellidos." ".$nombres;
		}
		return $docentes;
	}

	public function listarAuxiliar()
	{
		$nombre_completo=array();
		$query=$this->_database->query("SELECT nombres, apellidos FROM usuario WHERE prioridad=1");
		foreach ($query as $key ) {
			$nombres=$key["nombres"];
			$apellidos=$key["apellidos"];
			$nombre_completo[]=$apellidos." ".$nombres;
		}
		return $nombre_completo;
	}

	/*Generado por el sistema*/
	public function setCuenta($cuenta)
	{
		$this->_cuenta=$cuenta;
	}
	public function setPassword($password)
	{
		$this->_password=$password;
	}
	public function setCi($ci)
	{
		$this->_ci=$ci;
	}
	public function setNombres($nombres)
	{
		$this->_nombres=$nombres;
	}
	public function setApellidos($apellidos)
	{
		$this->_apellidos=$apellidos;
	}
	public function setPrioridad($prioridad)
	{
		$this->_prioridad=$prioridad;
	}
	public function setEmail($email)
	{
		$this->_email=$email;
	}


	/*getCuenta() y getPassword() usado unicamente de manera interna por el sistema*/
	public function getCuenta()
	{
		return $this->_cuenta;
	}
	public function getPassword()
	{
		return $this->_password;
	}
	public function getCi()
	{
		return $this->_ci;
	}
	public function getNombres()
	{
		return $this->_nombres;
	}
	public function getApellidos()
	{
		return $this->_apellidos;
	}
	public function getPrioridad()
	{
		return $this->_prioridad;
	}
	public function getEmail()
	{
		return $this->_email;
	}

	public function getUsuario()
	{
		return $this->_nombres." ".$this->_apellidos;
	}	

	public function __toString()
	{
		return $this->_apellidos." ".$this->_nombres;
	}	
}

?>
