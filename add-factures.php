<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=cogip;charset=utf8', 'root', '');
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}

function optionCompany($value='')
{
	global $bdd;
	$reponse = $bdd->prepare('SELECT * FROM company');
	$reponse ->execute();

	foreach($reponse as $donnees)
	{
		echo "
			<option value='". $donnees['id'] ."'>". $donnees['company_name'] ."</option>
		";
	}
}

function optionCustomer($value='')
{
	global $bdd;
	$reponse = $bdd->prepare('SELECT * FROM customers');
	$reponse ->execute();

	foreach($reponse as $donnees)
	{
		echo "
			<option value='". $donnees['last_name'] ."'>". $donnees['last_name'] ."</option>
		";
	}
}

function addFactures($value='')
{
	global $bdd;

	$invoice_number = NULL;
	$id_company = $_POST["id_company"];
	$customer_name = $_POST["customer_name"];
	$invoice_date = $_POST["invoice_date"];
	$designation = $_POST["designation"];

	if ($invoice_date != NULL AND $customer_name != "Choose" AND $id_company != "Choose" AND $designation != "") {
		$sql = $bdd->prepare('INSERT INTO invoices(invoice_number, id_company, customer_name, invoice_date, designation) VALUES(:invoice_number, :id_company, :customer_name, :invoice_date, :designation)');
		$sql->execute(array(
			'invoice_number' => $invoice_number,
			'id_company' => $id_company,
			'customer_name' => $customer_name,
			'invoice_date' => $invoice_date,
			'designation' => $designation
		));
		header("Location:invoices.php");
	}else {
    echo "Champs incomplets";
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
	<a href="log-in-form.php">Déconnexion</a>
	<h1>Ajout d'une facture</h1>
    <a href="accueil.php">Retour à l'accueil</a>
    <h3>Création d'une facture</h3>
	<form action="" method="post">
		<div>
			<label for='id_company'>Société</label>
			<select name='id_company'>
				<option value='Choose'>Choose</option>
				<?php optionCompany(); ?>
			</select>
		</div>
		<div>
			<label for='customer_name'>Nom du client</label>
			<select name='customer_name'>
				<option value='Choose'>Choose</option>
				<?php optionCustomer(); ?>
			</select>
		</div>
		<div>
			<label for="invoice_date">Date de la facture</label>
			<input type="date" name="invoice_date">
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
