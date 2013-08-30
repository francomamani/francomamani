<?php 
include '../../vendor/eden.php';

$database = eden('mysql', 'localhost' ,'db', 'root', 'admin');    //instantiate

$consulta=$database->query('SELECT * FROM cuenta WHERE flag=true');
$settings = array(
    'password' => $consulta[0]['password'],
    'flag' => false 
    );

     
$filter[] = array('username=%s', $consulta[0]['username']);     
 
$database->updateRows('cuenta', $settings, $filter);   // updates rows in 'user' table where user_id is 1
 		header('Location: ../frontal/principalFrontal.php');
?>
