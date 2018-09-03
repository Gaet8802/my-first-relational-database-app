<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=cogip;charset=utf8', 'root', '');
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}

function addFactures($value='')
{
	global $bdd;

	$invoice_date = $_POST["invoice_date"];
	$id_company = $_POST["id_company"];
	$designation = $_POST["designation"];

	if ($invoice_date != NULL AND $id_company != "Choose" AND $objet != "") {
		$sql = $bdd->prepare('INSERT INTO invoices(invoice_date, id_company, designation) VALUES(:invoice_date, :id_company, :designation)');
		$sql->execute(array(
			'invoice_date' => $invoice_date,
			'id_company' => $id_company,
			'designation' => $designation
		));
		echo " <p> La facture a été ajoutée avec succès. </p>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajout d'une facture</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="">Déconnexion</a>
	<h1>Ajout d'une facture</h1>
    <a href="">Retour à l'accueil</a>
    <h3>Création d'une facture</h3>
	<form action="" method="post">
    <div>
			<label for="invoice_date">Date de la facture</label>
			<input type="date" name="invoice_date">
		</div>
        <div>
			<label for="id_company">Société</label>
			<select name="id_company">
				<option value="Choose">Choose</option>
				<option value="a">a </option>
				<option value="b">b </option>
				<option value="c">c </option>
				<option value="d">d </option>
				<option value="e">e </option>
			</select>
		</div>
	    <div>
			<label for="designation">Objet de la facture</label>
			<input type="textarea" name="designation" value="">
		</div>
	    </div>
		<button type="submit" name="button">Envoyer</button>
	</form>
	<?php if (isset($_POST["button"])) addFactures(); ?>
</body>
</html>
