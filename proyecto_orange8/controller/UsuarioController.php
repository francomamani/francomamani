<?php
include '../model/Usuario.php';
session_start();

class UsuarioController 
{
	private $cuentaTemp;
	private $passwordTemp;
	private $query;
	function __construct($cuenta, $password)
	{
		$this->cuentaTemp=$cuenta;
		$this->passwordTemp=$password;
	}

	public function iniciarsesionAction()
	{
			$this->query=mysql_query("SELECT * FROM Usuario where cuenta='".$this->cuentaTemp."' and password='".$this->passwordTemp."'");
			$register=mysql_fetch_array($this->query);
			if(is_null($register['cuenta']) || is_null($register['password']))
			{
				header('Location: ./frontal/InicioFrontal.php');
			}
  			else
  			{
  				$usuario = new Usuario();

  				$usuario->setCuenta($register['cuenta']);
  				$usuario->setPassword($register['password']);
  				$usuario->setCi($register['ci']);
				$usuario->setNombres($register['nombres']);
				$usuario->setApellidos($register['apellidos']);
				$usuario->setPrioridad($register['prioridad']);
				$usuario->setEmail($register['email']);
				
  				$_SESSION['nombre_usuario']=$usuario->getNombres()." ".$usuario->getApellidos();
  				switch($usuario->getPrioridad())
				{
					case 0:
						header('Location: ./frontal/EstudianteFrontalEntity.php');
						break;		
					case 1:
						header('Location: ./frontal/AuxiliarFrontalEntity.php');
						break;
					case 2:
						header('Location: ./frontal/DocenteFrontalEntity.php');
						break;
					case 3:
						header('Location: ./frontal/AdministradorFrontalEntity.php');
						break;
				}
  			}
	}
}

?>