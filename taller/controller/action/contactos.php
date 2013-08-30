<?php 
        $nombre=htmlspecialchars($_POST['nombre']);
        $asunto=htmlspecialchars($_POST['asunto']);
        $email_guest=htmlspecialchars($_POST['email']);
        $email_target='mamanipozofrancojesus@gmail.com';
        $comentario=htmlspecialchars($_POST['comentario']);

        $texto="From: ".$nombre."\r\nCorreo Electronico: ".$email_guest."\r\nAsunto: ".$asunto."\r\nComentario: ".$comentario;

        $cabecera = 'From: ' . $nombre . ' <' . $email_target . '>' . "\r\n" .'Content-type: text/plain; charset=UTF-8' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
        mail($email, $asunto, $texto, $cabecera);

        //return $this->render('LaPlataformaWebPrincipalBundle:Principal:contactos.html.twig');
 ?>