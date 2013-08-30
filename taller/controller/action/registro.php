<?php 
	include '../../vendor/eden.php';
	$username 	= htmlspecialchars($_POST['username']);
	$nombre= htmlspecialchars($_POST['nombre']);
	$apellido= htmlspecialchars($_POST['apellido']);
	$email= htmlspecialchars($_POST['email']);
	$password= htmlspecialchars($_POST['password']);
	$fecha_nac= htmlspecialchars($_POST['fecha_nac']);
	$sexo = htmlspecialchars($_POST['sexo']);

	switch ($sexo) 
	{
		case 'm':
			$sexo = 0;
			break;
		case 'v':
			$sexo = 1;
			break;
	}
	$database = eden('mysql', 'localhost' ,'db', 'root', 'admin');    //instantiate

	$query  = "SELECT * FROM cuenta WHERE username = '$username'";
	$consulta=$database->query($query);
	if ($consulta==null) {
		list($mm, $dd, $yy)=explode("/", $fecha_nac);
		$fecha_nac= $yy."-".$mm."-".$dd;
		$database = eden('mysql', 'localhost' ,'db', 'root', 'admin');    //instantiate
		$settings = array('username' => $username,'nombre' => $nombre,'apellido' => $apellido,'email' => $email,'fecha_nac' => $fecha_nac, 'sexo' => $sexo,'password' => $password);
		$database->insertRow('cuenta', $settings);   //insert into cuenta table	
		echo "SU REGISTRO FUE EXITOSO! :D";
	}
	else
	{
		echo "EL USUARIO YA EXISTE";
	}

?>