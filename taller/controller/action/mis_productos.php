<?php 
include '../../vendor/eden.php';

$database = eden('mysql', 'localhost' ,'db', 'root', 'admin');    //instantiate

$query  = "SELECT * FROM cuenta WHERE flag = 1";

$consulta=$database->query($query); // returns results of raw queries

$query1  = "SELECT * FROM factura WHERE cod_usuario='$consulta[0]['username']' and tipo=0";
$consulta1=$database->query($query1); // returns results of raw queries
	echo "<table>";
	echo "	<tr>";
	echo "		<th>"."Codigo Factura"."</th>";
	echo "		<th>"."Codigo Producto"."</th>";
	echo "		<th>"."Codigo Usuario"."</th>";
	echo "		<th>"."Precio Total"."</th>";
	echo "		<th>"."NIT"."</th>";
	echo "	</tr>";
	
foreach ($consulta1 as $row) {
	$a =$b =$c =$d= $e=$f=1;
	foreach ($row as $key) 
	{
		if ($a) {
			$cod_factura= $key;
			$a=0;
		}
		else
		{
			if ($b) {
				$cod_usuario= $key;
				$b=0;
			}
			else
			{
				if ($c) {
					$cod_producto_servicio= $key;
					$c=0;
				}	
				else
				{
					if ($d) {
						$precio_total= $key;
						$d=0;
					}
					else
					{
						if ($e) {
							$nit= $key;
							$e=0;	
						}
						else
						{
							if ($f) {
								$tipo= $key;
								$f=0;	
							}	
						}
					}
				}
			}
		}	
	}
	echo "	<tr>";
	echo "		<td>".$cod_factura."</td>";
	echo "		<td>".$cod_usuario."</td>";
	echo "		<td>".$cod_producto."</td>";
	echo "		<td>".$precio_total."</td>";
	echo "		<td>".$nit."</td>";
	echo "	</tr>";

}
	echo "</table>";
?>
