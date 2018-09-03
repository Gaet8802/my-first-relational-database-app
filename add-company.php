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

	$company_name = $_POST["company_name"];
	$company_address = $_POST["company_address"];
	$country = $_POST["country"];
	$VAT_number = $_POST["VAT_number"];
	$company_phone = $_POST["company_phone"];

	if ($company_name != "" AND $company_address != "" AND $country != "" AND $VAT_number !="" AND $company_phone !="") {
		$sql = $bdd->prepare('INSERT INTO company(company_name, company_address, country, VAT_number, company_phone) VALUES(:company_name, :company_address, :country, :VAT_number, :company_phone)');
		$sql->execute(array(
			'company_name' => $company_name,
			'company_address' => $company_address,
			'country' => $country,
			'VAT_number' => $VAT_number,
			'company_phone' => $company_phone
		));
		echo " <p> La facture a été ajoutée avec succès. </p>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajout d'une scoiété</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="log-in-form.php">Déconnexion</a>
	<h1>Ajout d'une société</h1>
    <a href="accueil.php">Retour à l'accueil</a>
	<form action="" method="post">
		<div>
			<label for="Name">Désignation sociale</label>
			<input type="text" name="name" value="">
		</div>
        <div>
			<label for="adress">Adresse</label>
			<input type="textarea" name="name" value="">
		</div>
        <div>
			<label for="pays">Pays</label>
			<select name="société">
				<option value="">a </option>
				<option value="">b </option>
				<option value="">c </option>
				<option value="">d </option>
				<option value="">e </option>
			</select>
		</div>
	    <div>
			<label for="numéro">Numéro de téléphone</label>
			<input type="text" name="numéro" value="">
		</div>
        <div>
			<label for="numéro">Numéro de TVA</label>
			<input type="text" name="numéro" value="">
		</div>
	    </div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>
