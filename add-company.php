<?php

require 'DBconnect.php';

function addCompany($value='')
{
	global $bdd;

	$company_name = $_POST["company_name"];
	$company_address = $_POST["company_address"];
	$country = $_POST["country"];
	$VAT_number = $_POST["VAT_number"];
	$company_phone = $_POST["company_phone"];
	$company_type = $_POST["company_type"];

	if ($company_name != "" AND $company_address != "" AND $country != "" AND $VAT_number !="" AND $company_phone !="") {
		$sql = $bdd->prepare('INSERT INTO company(company_name, company_address, country, VAT_number, company_phone, company_type) VALUES(:company_name, :company_address, :country, :VAT_number, :company_phone, :company_type)');
		$sql->execute(array(
			'company_name' => $company_name,
			'company_address' => $company_address,
			'country' => $country,
			'VAT_number' => $VAT_number,
			'company_phone' => $company_phone,
			'company_type' => $company_type
		));

		if ($company_type == '0') {
			header("Location:suppliers.php");
		} else {
			header("Location:customers.php");
		}
	}else {
    echo "Champs incomplets";
  }
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<title>Ajout d'une scoiété</title>
	</head>
	<body>
		<?php include 'header.php' ?>
		<form action="" method="post">
			<div>
				<label for="company_name">Désignation sociale</label>
				<input type="text" name="company_name" value="">
			</div>
	    <div>
				<label for="company_address">Adresse</label>
				<input type="textarea" name="company_address" value="">
			</div>
			<div>
				<label for="country">Pays</label>
				<input type="text" name="country" value="">
			</div>
	    <div>
				<label for="VAT_number">Numéro de TVA</label>
				<input type="text" name="VAT_number" value="">
			</div>
			<div>
				<label for="company_phone">Numéro de téléphone</label>
				<input type="text" name="company_phone" value="">
			</div>
			<div>
				<label for="company_type">Type de company</label>
				<select class="" name="company_type">
					<option value="0">Fournisseur</option>
					<option value="1">Client</option>
				</select>
			</div>
		    </div>
			<button type="submit" name="button">Envoyer</button>
		</form>
		<?php if (isset($_POST["button"])) addCompany(); ?>
	</body>
</html>
