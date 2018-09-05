<?php

require 'DBconnect.php';

function optionCompany($value='')
{
	global $bdd;
	$reponse = $bdd->prepare('SELECT * FROM company');
	$reponse ->execute();

	foreach($reponse as $donnees)
	{
		echo "
			<option value='". $donnees['company_name'] ."'>". $donnees['company_name'] ."</option>
		";
	}
}

function addAnnuaire($value='')
{
	global $bdd;

	$Customer_number = NULL;
	$company = $_POST["company"];
	$last_name = $_POST["last_name"];
	$first_name = $_POST["first_name"];
	$phone_number = $_POST["phone_number"];
	$email = $_POST["email"];

	if ($company != "Choose" AND $last_name != "" AND $first_name != "" AND $phone_number !="" AND $email !="") {
		$sql = $bdd->prepare('INSERT INTO customers(Customer_number, company, last_name, first_name, phone_number, email) VALUES(:Customer_number, :company, :last_name, :first_name, :phone_number, :email)');
		$sql->execute(array(
			'Customer_number' => $Customer_number,
			'company' => $company,
			'last_name' => $last_name,
			'first_name' => $first_name,
			'phone_number' => $phone_number,
			'email' => $email
		));
		header("Location:annuaire.php");
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
	<title>Ajout d'un contact</title>
</head>
<body>
	<?php include 'header.php' ?>
	<form action="" method="post">
		<div>
			<label for='company'>Société</label>
			<select name='company'>
				<option value='Choose'>Choose</option>
				<?php optionCompany(); ?>
			</select>
		</div>
		<div>
			<label for="last_name">Last name</label>
			<input type="text" name="last_name" value="">
		</div>
		<div>
			<label for="first_name">First name</label>
			<input type="text" name="first_name" value="">
		</div>
		<div>
			<label for="phone_number">Phone number</label>
			<input type="duration" name="phone_number" value="">
		</div>
		<div>
			<label for="email">Email</label>
			<input type="text" name="email" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
	<?php if (isset($_POST["button"])) addAnnuaire(); ?>
</body>
</html>
