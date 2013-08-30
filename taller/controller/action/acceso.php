<?php
	$nombre=$_POST['nombre'];
	$email='mamanipozofrancojesus@gmail.com';
	$asunto=$_POST['asunto'];
	$comentario=$_POST['comentario'];
	$cabecera = 'From: ' . $nombre . ' <' . $email . '>' . "\r\n" .'Content-type: text/plain; charset=UTF-8' . "\r\n" .
		    	'X-Mailer: PHP/' . phpversion();

	
	mail($email, $asunto, $comentario, $cabecera);
?>