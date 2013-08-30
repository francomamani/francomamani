<?php
/**
* 
*/
class MySqlController implements ManejadorBaseDeDatosInterface
{
	
	const $servidor='localhost';
	const $conexion;
	const $base='proyecto_orange';
	const $usuario='root';
	const $password='123';

	function __construct()
	{
	}

	public function conectar()
	{
		$this->conexion=mysql_connect(self::servidor, self::usuario, self::clave);
		mysql_select_db(self::base, $this->conexion);
	}
	public function desconectar()
	{
		mysql_close($this->conexion);
	}
	public function getDatos(Sql $sql)
	{
		$resultado=mysql_query($sql, $this->conexion);
		while($fila=mysql_fetch_array($resultado))
		{
			$todo[]=$fila;
		}
		return $todo;
	}

}

?>