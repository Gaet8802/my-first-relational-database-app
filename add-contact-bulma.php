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
	<title>Ajout d'un contact</title>
  <link rel="stylesheet" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.css">
  <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js"></script>
</head>
<body>
	<a href="logout.php">Déconnexion</a>
	<h1>Ajout d'un contact</h1>
	<a href="accueil.php">Retour à l'accueil</a>
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
