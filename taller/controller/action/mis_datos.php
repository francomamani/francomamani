<?php 
include '../../vendor/eden.php';

$database = eden('mysql', 'localhost' ,'db', 'root', 'admin');    //instantiate

$query  = "SELECT * FROM cuenta WHERE flag = 1";
$consulta=$database->query($query); // returns results of raw queries

$username=$consulta[0]['username'];
$nombre=$consulta[0]['nombre'];
$apellido=$consulta[0]['apellido'];
$email=$consulta[0]['email'];
$fecha_nac=$consulta[0]['fecha_nac'];
$sexo=$consulta[0]['sexo'];
	switch ($sexo) {
		case 1:
			$sexo="Varon";
			break;
		case 0:
			$sexo="Mujer";
			break;
	}

	echo "<div class='content'>";
	echo "<h3>"."Mi Cuenta"."</h3>";
	echo "</div>";

	echo "<table class='mis_datos'>";
	echo "<tr>";
			echo "<td class='info'>"."Username"."</td>";
			echo "<td class='datos username'>".$username."</td>";
	echo "</tr>";
	echo "<tr>";
			echo "<td class='info'>"."Nombre"."</td>";
			echo "<td class='datos nombre'>".$nombre."</td>";
	echo "</tr>";
	echo "<tr>";
			echo "<td class='info'>"."Apellido"."</td>";
			echo "<td class='datos'>".$apellido."</td>";
	echo "</tr>";
	echo "<tr>";
			echo "<td class='info'>"."Correo Electronico"."</td>";
			echo "<td class='datos email'>".$email."</td>";
	echo "</tr>";
	echo "<tr>";
			echo "<td class='info'>"."Fecha de Nacimiento"."</td>";
			echo "<td class='datos fecha_nac'>".$fecha_nac."</td>";
	echo "</tr>";
	echo "<tr>";
			echo "<td class='info'>"."Sexo"."</td>";
			echo "<td class='datos sexo'>".$sexo."</td>";
	echo "</tr>";
	echo "</table>";	

//require_once '../../vendor/Twig-1.11.1/lib/Twig/Autoloader.php';
//Twig_Autoloader::register();
//$loader = new Twig_Loader_Filesystem('../../view');
//$twig = new Twig_Environment($loader, array('debug' => true));
//echo $twig->render('clienteMiCuenta.html', array('username'=>$username, 'nombre' =>$nombre, 'apellido'=>$apellido, 'email'=>$email, 'fecha_nac'=>$fecha_nac, 'sexo'=>$sexo));

?>
