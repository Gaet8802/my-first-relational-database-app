<?php

require 'DBconnect.php';

$lesdonnees = $_POST["delete"];

$req = $bdd->prepare("DELETE FROM customers WHERE Customer_number = '".$lesdonnees."' ");
$req ->execute();
header("Location:".$_POST['hiddenPage']."");
?>
