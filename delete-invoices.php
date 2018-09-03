<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=cogip;charset=utf8', 'root', '');
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}

$lesdonnees = $_POST["delete"];

  $req = $bdd->prepare("DELETE FROM invoices WHERE `Invoices`.`invoice_number` = '$lesdonnees'");
	echo "sdljqgkhsqdhgsqdkljgsdg";
	// header("Location:".$_POST['hiddenPage']."");
?>
