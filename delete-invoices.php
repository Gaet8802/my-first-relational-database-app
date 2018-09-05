<?php

require 'DBconnect.php';

$lesdonnees = $_POST["delete"];

  $req = $bdd->prepare("DELETE FROM invoices WHERE `Invoices`.`invoice_number` = '".$lesdonnees."' ");
	$req ->execute();
	header("Location:".$_POST['hiddenPage']."");
?>
