<?php
/**
* Realiza la conectividad al servidor y a la base de datos
*/
class ConectividadController
{
	private $conexion;
	private $enlaceBdD;
	private $success_connection_server='0';
	private $success_connection_db='0';
	
	function __construct(){}

	public function successConnection()
	{
		$this->conexion=mysql_connect('localhost', 'root', '123');
		$this->enlaceBdD=mysql_select_db('proyecto_orange', $this->conexion);

		if($this->conexion && $this->enlaceBdD)
			return true;
		else
			return false;
	}
	public function closeConnection()
	{
		mysql_close($this->conexion);
	}
}
?>