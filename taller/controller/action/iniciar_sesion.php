<?php 
include '../../vendor/eden.php';

$username=htmlspecialchars($_POST["username"]);
$password=htmlspecialchars($_POST["password"]);

$database = eden('mysql', 'localhost' ,'db', 'root', 'admin');    //instantiate

$query  = "SELECT * FROM cuenta WHERE username = '$username'  AND password = '$password'";
$consulta=$database->query($query); // returns results of raw queries
	if ($consulta==null) 
	{
		header('Location: ../frontal/registroFrontal.php');
	}
	else
	{
		$settings = array('password'=> $password, 'flag' => true);
		$filter[] = array('username=%s', $username);     
 
		$database->updateRows('cuenta', $settings, $filter);   // updates rows in 'user' table where user_id is 1

		if ($consulta[0]['vip']==true) 
		{
 			header('Location: ../frontal/administradorFrontal.php');			
		}
		else
		{
 			header('Location: ../frontal/clienteFrontal.php');
		}
	}
?>
