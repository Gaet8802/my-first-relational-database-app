<?php

session_start ();

if ($_SESSION['typeUser'] == 'moderateur' OR $_SESSION['typeUser'] == 'superadmin') {
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=id7027355_cogip;charset=utf8', 'id7027355_tanolepro', 'tanolepro');
	}
	catch(Exception $e)
	{
	  die('Erreur : '.$e->getMessage());
	}
} else {
	header ('location: logout.php');
}

?>
