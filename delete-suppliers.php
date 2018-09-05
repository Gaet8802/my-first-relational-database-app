<?php

require 'DBconnect.php';

$lesdonnees = $_POST["delete"];

  $req = $bdd->prepare("DELETE FROM company WHERE id = '".$lesdonnees."' ");
  $req ->execute();
	header("Location:".$_POST['hiddenPage']."");
?>
