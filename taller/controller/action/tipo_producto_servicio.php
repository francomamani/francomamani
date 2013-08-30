<?php 
include '../../vendor/eden.php';

$database = eden('mysql', 'localhost' ,'db', 'root', 'admin');    //instantiate
	$tipo = $_GET['q'];
	switch ($tipo) {
		case 'p':
			$query  = "SELECT cod_producto, nombre, precio, cantidad FROM producto";
			$consulta=$database->query($query); // returns results of raw queries
			echo "<div class='content'>";
			echo "<table>";
			echo "<tr>";
			echo 	"<th class='info'>"."Codigo"."</th>";
			echo 	"<th class='info'>"."Nombre"."</th>";
			echo 	"<th class='info'>"."Precio"."</th>";
			echo 	"<th class='info'>"."Cantidad"."</th>";
			echo "</tr>";
			foreach ($consulta as $codigo) {
				$a = $b = $c = $d = 1;
				foreach ($codigo as $key) {
					if( $a ) {
						$cod_producto = $key;
						$a = 0;
					}
					else
					{
						if( $b ) {
							$nombre = $key;
							$b = 0;
						}
						else
						{
								if( $c ) {
									$precio = $key;
									$c = 0;
								}
								else
								{
									if( $d ) {
										$cantidad = $key;
										$d = 0;
									}
								}
						}
					
					}

				}
				echo "<tr>";
				echo 	"<td class='datos'>".$cod_producto."</td>";
				echo 	"<td class='datos'>".$nombre."</td>";
				echo 	"<td class='datos'>".$precio."</td>";
				echo 	"<td class='datos'>".$cantidad."</td>";
				echo "</tr>";

			}
echo "</table>";
echo "</div>";

				echo "<form method='post' action='../action/vender.php'>";
				echo 	"<legend>"."Vender Producto"."</legend>";
				echo 	"<div class='division'>";
				echo 		"<label for='cod_producto_servicio'>"."Codigo:"."</label>";
				echo 		"<input type='text' name='cod_producto_servicio' required autofocus/>";
				echo 	"</div>";
				echo 	"<div class='division'>";
				echo 		"<label for='cantidad'>"."Cantidad:"."</label>";
				echo 		"<input type='text' name='cantidad' required/>";
				echo 	"</div>";
				echo 	"<div class='division'>";
				echo 		"<label for='nit'>"."NIT:"."</label>";
				echo 		"<input type='text' name='nit' required/>";
				echo 	"</div>";
				echo 	"<div class='division'>";
				echo 		"<label for='username'>"."Usuario:"."</label>";
				echo 		"<input type='text' name='username' required/>";
				echo 	"</div>";
				echo 	"<div class='division'>";
				echo 		"<input type='submit' value='Vender'/>";
				echo 	"</div>";
				echo "</form>";

			break;
			case 's':
			$query  = "SELECT cod_servicio, nombre, precio FROM servicio";
			$consulta=$database->query($query); // returns results of raw queries
			echo "<div class='content'>";
			echo "<table>";
			echo "<tr>";
			echo 	"<th class='info'>"."Codigo"."</th>";
			echo 	"<th class='info'>"."Nombre"."</th>";
			echo 	"<th class='info'>"."Precio"."</th>";
			echo "</tr>";
			foreach ($consulta as $codigo) {
				$a = $b = $c = 1;
				foreach ($codigo as $key) {
					if( $a ) {
						$cod_servicio = $key;
						$a = 0;
					}
					else
					{
						if( $b ) {
							$nombre = $key;
							$b = 0;
						}
						else
						{
								if( $c ) {
									$precio = $key;
									$c = 0;
								}
						}
					
					}

				}
				echo "<tr>";
				echo 	"<td class='datos'>".$cod_servicio."</td>";
				echo 	"<td class='datos'>".$nombre."</td>";
				echo 	"<td class='datos'>".$precio."</td>";
				echo "</tr>";

			}
echo "</table>";
echo "</div>";

				echo "<form method='post' action='../action/vender_servicio.php'>";
				echo 	"<legend>"."Prestacion de Servicios"."</legend>";
				echo 	"<div class='division'>";
				echo 		"<label for='cod_producto_servicio'>"."Codigo:"."</label>";
				echo 		"<input type='text' name='cod_producto_servicio' required autofocus/>";
				echo 	"</div>";
				echo 	"<div class='division'>";
				echo 		"<label for='nit'>"."NIT:"."</label>";
				echo 		"<input type='text' name='nit' required/>";
				echo 	"</div>";
				echo 	"<div class='division'>";
				echo 		"<label for='username'>"."Usuario:"."</label>";
				echo 		"<input type='text' name='username' required/>";
				echo 	"</div>";
				echo 	"<div class='division'>";
				echo 		"<input type='submit' value='Facturar Servicio'/>";
				echo 	"</div>";
				echo "</form>";

			break;
	}

?>