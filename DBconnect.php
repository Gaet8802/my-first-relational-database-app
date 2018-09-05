<?php

session_start ();

if ($_SESSION['typeUser'] == 'moderateur' OR $_SESSION['typeUser'] == 'superadmin') {
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=cogip;charset=utf8', 'root', 'root');
	}
	catch(Exception $e)
	{
	  die('Erreur : '.$e->getMessage());
	}
} else {
	header ('location: logout.php');
}

?>
