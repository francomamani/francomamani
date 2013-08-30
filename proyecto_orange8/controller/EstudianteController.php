<?php
	namespace controller;
	include '../model/Estudiante.php';
	include './ConectividadController.php';
	use ConectividadController;
	use model\Estudiante;
	class EstudianteController
	{
		private $connect;
		public function __construct()
		{
			$connectivity = new ConectividadController();
			$this->connect=$connectivity->successConnection();
		}
		public function listarcursosAction()
		{
			if($this->connect)
			{
				
			}
			else
				return "No se pudo realizar la conexión";

		}
	}
?>